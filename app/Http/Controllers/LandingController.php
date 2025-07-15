<?php

namespace App\Http\Controllers;

use App\Models\Kerjasama;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    // Halaman Beranda
    public function index()
    {
        $jumlahNasional = Kerjasama::whereHas('mitra', function($q) {
            $q->where('lingkup', 'Nasional');
        })->count();

        $jumlahInternasional = Kerjasama::whereHas('mitra', function($q) {
            $q->where('lingkup', 'Internasional');
        })->count();

        return view('landing.index', compact(
            'jumlahNasional',
            'jumlahInternasional'
        ));
    }

    // Halaman Info Kerjasama
    public function infoKerjasama()
    {
        $kerjasama = Kerjasama::with(['mitra', 'bidang', 'pemohon.jurusans'])->take(10)->get();
        return view('info-kerjasama', compact('kerjasama'));
    }

    // Halaman Kontak Kami
    public function kontakKami()
    {
        return view('kontak-kami');
    }

    public function kerjasama()
    {
        $kerjasamas = \App\Models\Kerjasama::with(['mitra', 'bidang', 'pemohon.bidangs', 'pemohon.jurusans', 'dokumen'])
            ->whereHas('dokumen', function($query) {
                $query->where('status', 'aktif')
                      ->whereDate('tanggal_selesai', '>=', now());
            })
            ->get();
        return view('landing.kerjasama', compact('kerjasamas'));
    }

    public function contact()
    {
        return view('landing.contact');
    }
}
