<?php

namespace App\Http\Controllers;

use App\Models\Kerjasama;
use Illuminate\Http\Request;

class ArsipController extends Controller
{
    public function index(Request $request)
{
    $query = Kerjasama::with(['dokumen', 'mitra', 'pemohon.jurusan', 'bidang_kerjasama']);

    if ($request->has('search') && $request->search != '') {
        $search = $request->search;
        $query->whereHas('mitra', function ($q) use ($search) {
            $q->where('nama_mitra', 'like', '%' . $search . '%');
        });
    }

    $kerjasamas = $query->get();

    return view('arsipdokumen', [
        'kerjasamas' => $kerjasamas
    ]);
}

}
