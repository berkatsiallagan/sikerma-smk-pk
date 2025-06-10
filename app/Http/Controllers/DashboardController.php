<?php

namespace App\Http\Controllers;

use App\Models\Kerjasama;
use App\Models\Mitra;
use App\Models\Dokumen;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Count total documents
        $totalDocuments = Dokumen::count();
        
        // Count total partners
        $totalMitra = Mitra::count();
        
        // Count documents expiring soon (within 30 days)
        $expiringSoon = Dokumen::where('status', 'aktif')
            ->whereDate('tanggal_selesai', '>=', Carbon::today())
            ->whereDate('tanggal_selesai', '<=', Carbon::today()->addDays(30))
            ->count();
            
        // Count MOU and MOA agreements
        $mouCount = Kerjasama::where('jenis_kerjasama', 'Memorandum of Understanding (MoU)')->count();
        $moaCount = Kerjasama::where('jenis_kerjasama', 'Memorandum of Agreement (MoA)')->count();
        
        // Get recent agreements (last 6 months)
        $recentAgreements = Kerjasama::with(['mitra', 'dokumen'])
            ->whereHas('dokumen', function($query) {
                $query->where('tanggal_mulai', '>=', Carbon::now()->subMonths(6));
            })
            ->orderByDesc('id_kerjasama')
            ->limit(5)
            ->get();
            
        return view('dashboard', [
            'totalDocuments' => $totalDocuments,
            'totalMitra' => $totalMitra,
            'expiringSoon' => $expiringSoon,
            'mouCount' => $mouCount,
            'moaCount' => $moaCount,
            'recentAgreements' => $recentAgreements
        ]);
    }
}