<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Dokumen;

class DokumenController extends Controller
{
    /**
     * Download file dokumen berdasarkan ID dokumen.
     */
    public function download($id)
{
    $dokumen = Dokumen::findOrFail($id);
    $filename = trim($dokumen->dokumen); // GUNAKAN kolom 'dokumen' (bukan file_dokumen)
    $path = 'dokumen/' . $filename;

    if (!Storage::disk('public')->exists($path)) {
        abort(404, "File tidak ditemukan: $path");
    }

    return Storage::disk('public')->download($path);
}



}
