<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'kata_sandi' => 'required',
        ]);

        // Cek apakah email terdaftar
        $admin = Admin::where('email', $request->email)->first();

        if (!$admin) {
            return redirect()->back()->withErrors(['email' => 'Email tidak ditemukan'])->withInput();
        }

        // Cek kecocokan password
        if (!Hash::check($request->kata_sandi, $admin->kata_sandi)) {
            return redirect()->back()->withErrors(['kata_sandi' => 'Kata sandi salah'])->withInput();
        }

        // Simpan informasi admin ke session
        Session::put('admin_id', $admin->id_admin);
        Session::put('admin_email', $admin->email);

        // Kirim notifikasi sukses untuk ditampilkan di dashboard
        session()->flash('success', 'Selamat datang kembali, ' . $admin->email . '!');

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('login');
    }
}
