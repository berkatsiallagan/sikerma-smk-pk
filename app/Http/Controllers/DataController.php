<?php

namespace App\Http\Controllers;

use App\Models\Kerjasama;
use App\Models\BidangKerjasama;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index(Request $request)
    {
        // Base query with eager loading
        $query = Kerjasama::with([
            'dokumen' => function($query) {
                $query->whereIn('status', ['Aktif', 'Akan Berakhir']);
            },
            'mitra',
            'pemohon' => function($query) {
                $query->with(['jurusans', 'bidangs']);
            },
            'ajuan',
            'bidang_kerjasama',
        ])->whereHas('dokumen', function($query) {
            $query->whereIn('status', ['Aktif', 'Akan Berakhir']);
        });

        // Search filter
        if ($request->has('search')) {
            $query->whereHas('mitra', function($q) use ($request) {
                $q->where('nama_mitra', 'like', '%'.$request->search.'%');
            });
        }

        // Status filter (if added to UI)
        if ($request->has('status')) {
            $query->whereHas('dokumen', function($q) use ($request) {
                $q->where('status', $request->status);
            });
        }

        $kerjasamas = $query->get();

        // Get used bidang kerjasama
        $usedBidangIds = $kerjasamas->pluck('id_bidang')->filter()->unique();
        $bidangKerjasamas = BidangKerjasama::whereIn('id_bidang', $usedBidangIds)->get();

        return view('datakerjasama', [
            'kerjasamas' => $kerjasamas,
            'bidangKerjasamas' => $bidangKerjasamas,
            'search' => $request->search,
            'status' => $request->status,
        ]);
    }
}