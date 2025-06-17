<?php

namespace App\Http\Controllers;

use App\Models\Pemohon;
use App\Models\Jurusan;
use App\Models\Ajuan;
use App\Models\Mitra;
use App\Models\Dokumen;
use App\Models\Kerjasama;
use App\Models\BidangKerjasama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengajuanKerjasamaController extends Controller
{
    /**
     * Display the pengajuan kerjasama form.
     */
    public function create()
    {
        $last = Pemohon::select('no_permohonan')
            ->orderBy(DB::raw('CAST(SUBSTRING(no_permohonan, 4) AS UNSIGNED)'), 'desc')
            ->first();

        $newNumber = $last
            ? 'PMH' . str_pad(((int) substr($last->no_permohonan, 3)) + 1, 2, '0', STR_PAD_LEFT)
            : 'PMH01';

        $newIdPemohon = (Pemohon::max('id_pemohon') ?? 0) + 1;
        $jurusans = Jurusan::all();
        $bidangs = BidangKerjasama::all();

        return view('pengajuan-kerjasama', compact('newNumber', 'newIdPemohon', 'jurusans', 'bidangs'));
    }

    /**
     * Store a newly created pengajuan kerjasama in storage.
     */
    public function store(Request $request)
    {
        // Basic validation to ensure required fields exist
        $validated = $request->validate([
            'no_permohonan'  => 'required',
            'nama_pemohon'   => 'required|string',
            'nomor_telp'     => 'required|string',
            'jurusans'       => 'required|array|min:1',
            'jurusans.*'     => 'exists:jurusan,id_jurusan',

            'tanggal_ajuan'  => 'required|date',

            'nama_mitra'     => 'required|string',
            'lingkup'        => 'required|string',
            'website'        => 'nullable|url',
            'email'          => 'required|email',
            'jenis_kerjasama'=> 'required|string',

            'dokumen'        => 'required|file|mimes:pdf,doc,docx|max:2048',
            'catatan'        => 'nullable|string',

            'bidangs'        => 'required|array|min:1',
            'bidangs.*'      => 'exists:bidang_kerjasama,id_bidang',

            'tanggal_mulai'  => 'required|date',
            'tanggal_selesai'=> 'required|date|after_or_equal:tanggal_mulai',
        ]);

        DB::beginTransaction();

        try {
            // Hitung id_pemohon berikutnya secara manual
            $nextId = (Pemohon::max('id_pemohon') ?? 0) + 1;

            // Pemohon
            $pemohon = new Pemohon([
                'no_permohonan'=> $validated['no_permohonan'],
                'nama_pemohon' => $validated['nama_pemohon'],
                'nomor_telp'   => $validated['nomor_telp'],
            ]);
            $pemohon->id_pemohon = $nextId;
            $pemohon->save();

            // Attach jurusan
            $pemohon->jurusans()->attach($validated['jurusans']);

            // Attach bidang ke pemohon
            $pemohon->bidangs()->attach($validated['bidangs']);

            // Ajuan
            $ajuan = Ajuan::create([
                'tanggal_ajuan' => $validated['tanggal_ajuan'],
            ]);

            // Mitra
            $mitra = Mitra::create([
                'nama_mitra' => $validated['nama_mitra'],
                'lingkup'    => $validated['lingkup'],
                'website'    => $validated['website'],
                'email'      => $validated['email'],
            ]);

            // Upload dokumen file
            $filePath = $request->file('dokumen')->store('dokumen', 'public');

            // Dokumen
            $dokumen = Dokumen::create([
                'catatan'         => $validated['catatan'] ?? null,
                'dokumen'         => $filePath,
                'tanggal_mulai'   => $validated['tanggal_mulai'],
                'tanggal_selesai' => $validated['tanggal_selesai'],
            ]);

            // Kerjasama
            $nextKerjasamaId = (Kerjasama::max('id_kerjasama') ?? 0) + 1;
            $kerjasama = new Kerjasama([
                'id_ajuan'       => $ajuan->id_ajuan,
                'id_pemohon'     => $pemohon->id_pemohon,
                'id_mitra'       => $mitra->id_mitra,
                'id_dokumen'     => $dokumen->id_dokumen,
                'jenis_kerjasama'=> $validated['jenis_kerjasama'],
            ]);
            $kerjasama->id_kerjasama = $nextKerjasamaId;
            $kerjasama->save();

            DB::commit();

            return redirect()->route('pengajuan-kerjasama.create')->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
} 