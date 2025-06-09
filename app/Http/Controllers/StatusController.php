<?php

namespace App\Http\Controllers;

use App\Models\Kerjasama;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        // Ambil data kerjasama beserta relasi dokumen dan mitra
        $kerjasamas = Kerjasama::with(['dokumen', 'mitra', 'pemohon.jurusan'])->get();
        
        return view('status', [
            'kerjasamas' => $kerjasamas
        ]);
    }
}
