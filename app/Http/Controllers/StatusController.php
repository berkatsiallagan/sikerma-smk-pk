<?php

namespace App\Http\Controllers;

use App\Models\Kerjasama;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        // Ambil data kerjasama beserta relasi dokumen dan mitra dengan filter status dokumen
        $kerjasamas = Kerjasama::with(['dokumen', 'mitra', 'pemohon.jurusan'])
            ->whereHas('dokumen', function ($query) {
                $query->whereIn('status', ['Aktif', 'Akan Berakhir']);
            })
            ->get();
        
        return view('status', [
            'kerjasamas' => $kerjasamas
        ]);
    }
}
