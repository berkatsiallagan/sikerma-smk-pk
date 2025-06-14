<?php

namespace App\Http\Controllers;

use App\Models\Kerjasama;
use Illuminate\Http\Request;

class ArsipController extends Controller
{
    public function index()
    {
        $kerjasamas = Kerjasama::with(['dokumen', 'mitra', 'pemohon.jurusan'])->get();
        
        return view('arsippengajuan', [
            'kerjasamas' => $kerjasamas
        ]);
    }
}
