<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;

class JurusanController extends Controller
{
    public function index()
{
    $jurusan = Jurusan::all();  // ambil semua data jurusan
    return view('jurusan.kelolajurusan', compact('jurusan')); // kirim $jurusan ke view
}

public function create()
{
    return view('jurusan.createjurusan');  // tidak perlu kirim data apa-apa
}

public function store(Request $request)
{
    $request->validate([
        'id_jurusan' => 'required|unique:jurusan,id_jurusan',
        'nama_jurusan' => 'required|string|max:255',
    ]);

    Jurusan::create([
        'id_jurusan' => $request->id_jurusan,
        'nama_jurusan' => $request->nama_jurusan,
    ]);

    return redirect('/kelolajurusan')->with('success', 'Data berhasil ditambahkan.');
}


    public function edit($id_jurusan)
{
    $jurusan = Jurusan::where('id_jurusan', $id_jurusan)->firstOrFail();
    return view('jurusan.editjurusan', compact('jurusan')); // kirim data jurusan yg mau diedit
}


    public function update(Request $request, $id_jurusan)
    {
        $jurusan = Jurusan::where('id_jurusan', $id_jurusan)->firstOrFail();

        $request->validate([
            'id_jurusan' => 'required|unique:jurusan,id_jurusan,' . $jurusan->id_jurusan . ',id_jurusan',
            'nama_jurusan' => 'required|string|max:255',
        ]);

        $jurusan->update($request->only('id_jurusan', 'nama_jurusan'));

        return redirect('/kelolajurusan')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy($id_jurusan)
{
    $jurusan = Jurusan::findOrFail($id_jurusan);
    $jurusan->delete();
    return redirect('/kelolajurusan')->with('success', 'Data berhasil dihapus.');
}

}
