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
use Illuminate\Support\Str;

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
        // Ambil seluruh daftar mitra terdaftar untuk dropdown
        $mitras = Mitra::all();

        return view('pengajuan-kerjasama', compact('newNumber', 'newIdPemohon', 'jurusans', 'bidangs', 'mitras'));
    }

    /**
     * Store a newly created pengajuan kerjasama in storage.
     */
    public function store(Request $request)
    {
        // Normalize phone number: keep digits only for validation
        $request->merge([
            'nomor_telp' => preg_replace('/\D/', '', $request->nomor_telp),
        ]);

        // Basic validation to ensure required fields exist
        $validated = $request->validate([
            'no_permohonan'  => 'required',
            'nama_pemohon'   => ['required','string','regex:/^[A-Za-z\s]+$/'],
            'nomor_telp'     => 'required|string|min:10|max:12',
            'jurusans'       => 'required|array|min:1',
            'jurusans.*'     => 'exists:jurusan,id_jurusan',

            'tanggal_ajuan'  => 'required|date',

            'nama_mitra'     => [
                'required',
                'string',
                'regex:/^[A-Za-z\\s.,&-]+$/'
            ],
            'lingkup'        => 'required|string',
            'jenis_kerjasama'=> 'required|string',

            'dokumen'        => 'required|file|mimes:pdf,doc,docx|max:2048',
            'catatan'        => 'nullable|string|max:255',

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

            // Mitra: gunakan yang sudah ada atau buat baru jika belum ada
            $mitra = Mitra::firstOrCreate(
                ['nama_mitra' => $validated['nama_mitra']],
                ['lingkup'    => $validated['lingkup']]
            );

            // Upload dokumen file ke folder /public/assets/dokumen/
            $file = $request->file('dokumen');

            // Tentukan singkatan dokumen (MOU / MOA) jika sesuai
            $jenisRaw = strtolower($validated['jenis_kerjasama']);
            if (str_contains($jenisRaw, 'understanding')) {
                $jenisDokumen = 'MOU';
            } elseif (str_contains($jenisRaw, 'agreement')) {
                $jenisDokumen = 'MOA';
            } else {
                $jenisDokumen = Str::slug($validated['jenis_kerjasama'], '_');
            }

            // Format nama mitra (preserve kapital): ganti karakter non-alfanumerik dengan underscore
            $namaMitraRaw = $validated['nama_mitra'];
            $namaMitra    = preg_replace('/[^A-Za-z0-9]+/', '_', $namaMitraRaw);
            $namaMitra    = trim($namaMitra, '_');

            $tanggal      = \Carbon\Carbon::parse($validated['tanggal_mulai'])->format('Y-m-d');
            $extension    = $file->getClientOriginalExtension();

            $filename = $jenisDokumen . '_' . $namaMitra . '_' . $tanggal . '.' . $extension;

            // Pastikan direktori tujuan ada
            $destination = public_path('assets/dokumen');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }

            // Pindahkan file
            $file->move($destination, $filename);

            // Simpan hanya nama file (tanpa path) di database
            $filePath = $filename;

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