<?php

namespace App\Http\Controllers;

use App\Models\Kerjasama;
use Illuminate\Http\Request;

class ArsipController extends Controller
{
    public function index(Request $request)
    {
        // Ambil query awal dengan eager loading
        $query = Kerjasama::with(['dokumen', 'mitra', 'pemohon.jurusan', 'bidang']);

        // Filter berdasarkan pencarian
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('mitra', function ($q) use ($search) {
                $q->where('nama_mitra', 'like', '%' . $search . '%');
            });
        }

        // Sorting berdasarkan tahun dokumen
        $sort = $request->input('sort');
        $order = $request->input('order') === 'desc' ? 'desc' : 'asc';

        if ($sort === 'tahun') {
            $query->join('dokumen', 'kerjasama.id_dokumen', '=', 'dokumen.id_dokumen')
                ->orderByRaw("YEAR(dokumen.tanggal_mulai) $order")
                ->select('kerjasama.*');
        } elseif ($sort === 'mitra') {
            $query->join('mitra', 'kerjasama.id_mitra', '=', 'mitra.id_mitra')
                ->orderBy('mitra.nama_mitra', $order)
                ->select('kerjasama.*');
        } elseif ($sort === 'tanggal_mulai') {
            $query->join('dokumen', 'kerjasama.id_dokumen', '=', 'dokumen.id_dokumen')
                ->orderBy('dokumen.tanggal_mulai', $order)
                ->select('kerjasama.*');
        } elseif ($sort === 'sisa_hari') {
            $query->join('dokumen', 'kerjasama.id_dokumen', '=', 'dokumen.id_dokumen')
                ->orderByRaw("DATEDIFF(dokumen.tanggal_selesai, NOW()) $order")
                ->select('kerjasama.*');
        }
             
        $kerjasamas = $query->get();

        return view('arsipdokumen', [
            'kerjasamas' => $kerjasamas
        ]);
    }
}