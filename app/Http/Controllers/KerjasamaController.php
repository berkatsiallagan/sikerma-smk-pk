<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kerjasama;

class KerjasamaController extends Controller
{
    public function destroy(Kerjasama $kerjasama)
    {
        $kerjasama->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $kerjasamas = Kerjasama::with(['dokumen', 'mitra'])
            ->when($search, function ($query, $search) {
                $query->whereHas('mitra', function ($q) use ($search) {
                    $q->where('nama_mitra', 'like', "%{$search}%");
                });
            })
            ->get();

        return view('status', compact('kerjasamas'));

    }
}
