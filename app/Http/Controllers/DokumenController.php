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

        // 1. Coba direktori public/assets/dokumen
        $publicPath = public_path('assets/dokumen/' . $filename);
        if (file_exists($publicPath)) {
            return response()->download($publicPath);
        }

        // 2. Jika tidak ada ekstensi, coba tambahkan .pdf secara otomatis
        if (!str_contains($filename, '.')) {
            $publicPathPdf = public_path('assets/dokumen/' . $filename . '.pdf');
            if (file_exists($publicPathPdf)) {
                return response()->download($publicPathPdf);
            }
        }

        // 3. Coba via storage (misal disimpan di storage/app/public)
        if (\Storage::disk('public')->exists($filename)) {
            return \Storage::disk('public')->download($filename);
        }

        abort(404, 'File dokumen tidak ditemukan.');
    }
    



}
