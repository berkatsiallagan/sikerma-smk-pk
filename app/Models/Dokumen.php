<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    protected $table = 'dokumen';
    protected $primaryKey = 'id_dokumen';
    
    protected $fillable = [
        'catatan',
        'dokumen',
        'status',
        'tanggal_mulai',
        'tanggal_selesai'
    ];

    // Casting untuk tipe data khusus
    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    // Nilai default untuk atribut
    protected $attributes = [
        'status' => 'aktif',
    ];

    // Jika Anda ingin menggunakan timestamps
    public $timestamps = true;
}