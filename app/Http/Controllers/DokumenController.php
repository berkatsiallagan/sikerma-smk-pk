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
        $filename = trim($dokumen->dokumen);
        $path = public_path('assets/dokumen/' . $filename);
    
        if (!file_exists($path)) {
            abort(404, "File tidak ditemukan: $path");
        }
    
        return response()->download($path);
    }
    



}
