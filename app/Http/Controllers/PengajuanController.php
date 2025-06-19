<?php

namespace App\Http\Controllers;

use App\Models\Pemohon;
use App\Models\Mitra;
use App\Models\Kerjasama;
use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PengajuanController extends Controller
{
    public function showStep1()
    {
        $jurusans = \App\Models\Jurusan::all(); // Assuming you have a Jurusan model
        return view('inputajuan1', compact('jurusans'));
    }

    public function saveStep1(Request $request)
    {
        $validated = $request->validate([
            'no_permohonan' => 'required|string',
            'nama_pemohon' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'jurusans' => 'required|array',
            'jurusans.*' => 'exists:jurusan,id_jurusan', // Assuming jurusan table exists
        ]);

        // Store in session for multi-step
        Session::put('form_data.step1', $validated);

        // Create pemohon (we'll save to DB only at the end or you can save now)
        $pemohon = Pemohon::create([
            'no_permohonan' => $validated['no_permohonan'],
            'nama_pemohon' => $validated['nama_pemohon'],
            'nomor_telp' => $validated['no_hp'],
            // Assuming you'll handle jurusan relationship separately
        ]);

        // Store pemohon ID in session
        Session::put('form_data.id_pemohon', $pemohon->id_pemohon);

        return redirect()->route('show.step2');
    }

    public function showStep2()
    {
        return view('inputajuan2');
    }

    public function saveStep2(Request $request)
    {
        $validated = $request->validate([
            'nama_mitra' => 'required|string|max:255',
            'negara' => 'required|string|in:Dalam Negeri,Luar Negeri',
            'website' => 'nullable|url',
            'email' => 'required|email',
            'jenis_kerjasama' => 'required|string|in:Memorandum of Understanding (MoU),Memorandum of Agreement (MoA)',
        ]);

        // Store in session
        Session::put('form_data.step2', $validated);

        // Create mitra
        $mitra = Mitra::create([
            'nama_mitra' => $validated['nama_mitra'],
            'negara' => $validated['negara'],
            'website' => $validated['website'],
            'email' => $validated['email'],
        ]);

        // Create kerjasama
        $kerjasama = Kerjasama::create([
            'id_pemohon' => Session::get('form_data.id_pemohon'),
            'id_mitra' => $mitra->id_mitra,
            'jenis_kerjasama' => $validated['jenis_kerjasama'],
            // Other fields can be filled later
        ]);

        // Store IDs in session
        Session::put('form_data.id_mitra', $mitra->id_mitra);
        Session::put('form_data.id_kerjasama', $kerjasama->id_kerjasama);

        return redirect()->route('show.step3');
    }

    public function saveStep3(Request $request)
    {
        $validated = $request->validate([
            'catatan' => 'nullable|string',
            'dokumen' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Ambil data dari session
        $mitra = Mitra::find(Session::get('form_data.id_mitra'));
        $kerjasama = Kerjasama::find(Session::get('form_data.id_kerjasama'));

        // Format nama file
        $originalName = pathinfo($request->file('dokumen')->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $request->file('dokumen')->getClientOriginalExtension();
        $customName = str_replace(' ', '_', $mitra->nama_mitra) . '_' . 
                    str_replace(' ', '_', $kerjasama->jenis_kerjasama) . '_' . 
                    time() . '.' . $extension;

        // Pastikan folder tujuan ada (create if not exists)
        $destinationPath = public_path('assets/dokumen/');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // Pindahkan file ke public/assets/dokumen/
        $request->file('dokumen')->move($destinationPath, $customName);

        // Simpan path relatif (tanpa public/) ke database
        $relativePath = 'assets/dokumen/' . $customName;

        // Simpan ke database
        $dokumen = Dokumen::create([
            'catatan' => $validated['catatan'],
            'dokumen' => $relativePath,  // Contoh: 'assets/dokumen/PTABC_MoU_1712345678.pdf'
            'status' => 'pending',
            'tanggal_mulai' => now(),
        ]);

        // Update kerjasama
        $kerjasama->id_dokumen = $dokumen->id_dokumen;
        $kerjasama->save();

        Session::forget('form_data');
        return redirect()->route('pengajuan.success')->with('success', 'Pengajuan berhasil!');
    }
}