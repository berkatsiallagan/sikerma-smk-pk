<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mitra;

class MitraController extends Controller
{
    public function index()
    {
        $mitra = Mitra::all();
        return view('mitra.kelolamitra', compact('mitra'));
    }

    public function create()
    {
        return view('mitra.createmitra');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_mitra'    => 'required|unique:mitra,id_mitra',
            'nama_mitra'  => 'required|string|max:255',
            'lingkup'     => 'required|in:Nasional,Internasional',
            'website'     => 'required|url|max:100',
            'email'       => 'required|email|max:100',
        ]);

        Mitra::create([
            'id_mitra'   => $request->id_mitra,
            'nama_mitra' => $request->nama_mitra,
            'lingkup'    => $request->lingkup,
            'website'    => $request->website,
            'email'      => $request->email,
        ]);

        return redirect('/kelola-mitra')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id_mitra)
    {
        $mitra = Mitra::where('id_mitra', $id_mitra)->firstOrFail();
        return view('mitra.editmitra', compact('mitra'));
    }

    public function update(Request $request, $id_mitra)
    {
        $mitra = Mitra::where('id_mitra', $id_mitra)->firstOrFail();

        $request->validate([
            'id_mitra'    => 'required|unique:mitra,id_mitra,' . $mitra->id_mitra . ',id_mitra',
            'nama_mitra'  => 'required|string|max:255',
            'lingkup'     => 'required|in:Nasional,Internasional',
            'website'     => 'required|url|max:100',
            'email'       => 'required|email|max:100',
        ]);

        $mitra->update($request->only('id_mitra', 'nama_mitra', 'lingkup', 'website', 'email'));

        return redirect('/kelola-mitra')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy($id_mitra)
    {
        $mitra = Mitra::findOrFail($id_mitra);
        $mitra->delete();
        return redirect('/kelola-mitra')->with('success', 'Data berhasil dihapus.');
    }
} 