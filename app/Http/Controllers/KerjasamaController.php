<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kerjasama;

class KerjasamaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $kerjasamas = Kerjasama::with(['mitra', 'bidang', 'jurusan', 'dokumen'])
            ->when($search, function ($query, $search) {
                $query->whereHas('mitra', function ($q) use ($search) {
                    $q->where('nama_mitra', 'like', "%{$search}%");
                });
            })
            ->get();

        // Menggunakan view 'kerjasama' seperti pada versi pertama, atau 'status' seperti pada versi kedua
        // Anda perlu memilih salah satu yang sesuai dengan kebutuhan aplikasi
        return view('kerjasama', compact('kerjasamas'));
    }

    public function destroy(Kerjasama $kerjasama)
    {
        $kerjasama->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}