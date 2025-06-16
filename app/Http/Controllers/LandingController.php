<?php

namespace App\Http\Controllers;

use App\Models\Kerjasama;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    // Halaman Beranda
    public function index()
    {
        $jumlahDudiNasional = Kerjasama::whereHas('mitra', function($q) {
            $q->where('kategori', 'dudi_nasional');
        })->count();

        $jumlahDudiInternasional = Kerjasama::whereHas('mitra', function($q) {
            $q->where('kategori', 'dudi_internasional');
        })->count();

        $jumlahInstansiNasional = Kerjasama::whereHas('mitra', function($q) {
            $q->where('kategori', 'instansi_nasional');
        })->count();

        $jumlahInstansiInternasional = Kerjasama::whereHas('mitra', function($q) {
            $q->where('kategori', 'instansi_internasional');
        })->count();

        return view('landing', compact(
            'jumlahDudiNasional',
            'jumlahDudiInternasional',
            'jumlahInstansiNasional',
            'jumlahInstansiInternasional'
        ));
    }

    // Halaman Info Kerjasama
    public function infoKerjasama()
    {
        $kerjasama = Kerjasama::with(['mitra', 'bidang', 'jurusan'])->take(10)->get();
        return view('info-kerjasama', compact('kerjasama'));
    }

    // Halaman Kontak Kami
    public function kontakKami()
    {
        return view('kontak-kami');
    }
}

