<?php

namespace App\Http\Controllers;

use App\Models\Kerjasama;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        $kerjasamas = Kerjasama::with([
            'dokumen',
            'mitra',
            'pemohon.jurusan',
            'pemohon.jurusans',
            'pemohon.bidangs',
            'ajuan',
            'bidang_kerjasama',
        ])->get();
        
        // Ambil Bidang Kerjasama yang digunakan oleh mitra pada kerjasama yang terdaftar
        $usedBidangIds = $kerjasamas->pluck('id_bidang')->unique();
        $bidangKerjasamas = \App\Models\BidangKerjasama::whereIn('id_bidang', $usedBidangIds)->get();
        
        return view('datakerjasama', [
            'kerjasamas' => $kerjasamas,
            'bidangKerjasamas' => $bidangKerjasamas,
        ]);
    }
}
