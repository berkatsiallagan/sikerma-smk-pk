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

}
