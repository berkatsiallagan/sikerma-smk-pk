<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BidangKerjasama;

class BidangController extends Controller
{
    public function index()
    {
        $bidang = BidangKerjasama::all();
        return view('bidang.kelolabidang', compact('bidang'));
    }

    public function create()
    {
        return view('bidang.createbidang');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_bidang' => 'required|unique:bidang_kerjasama,id_bidang',
            'nama_bidang' => 'required|string|max:255',
        ]);

        BidangKerjasama::create([
            'id_bidang' => $request->id_bidang,
            'nama_bidang' => $request->nama_bidang,
        ]);

        return redirect('/kelola-bidang')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id_bidang)
    {
        $bidang = BidangKerjasama::where('id_bidang', $id_bidang)->firstOrFail();
        return view('bidang.editbidang', compact('bidang'));
    }

    public function update(Request $request, $id_bidang)
    {
        $bidang = BidangKerjasama::where('id_bidang', $id_bidang)->firstOrFail();

        $request->validate([
            'id_bidang' => 'required|unique:bidang_kerjasama,id_bidang,' . $bidang->id_bidang . ',id_bidang',
            'nama_bidang' => 'required|string|max:255',
        ]);

        $bidang->update($request->only('id_bidang', 'nama_bidang'));

        return redirect('/kelola-bidang')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy($id_bidang)
    {
        $bidang = BidangKerjasama::findOrFail($id_bidang);
        $bidang->delete();
        return redirect('/kelola-bidang')->with('success', 'Data berhasil dihapus.');
    }
} 