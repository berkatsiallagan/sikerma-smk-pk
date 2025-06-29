<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;

    protected $table = 'mitra';
    protected $primaryKey = 'id_mitra';
    
    protected $fillable = [
        'nama_mitra',
        'lingkup',
    ];

    // Jika Anda ingin menggunakan timestamps
    public $timestamps = false;

    /**
     * Relasi kontak-kontak milik mitra.
     */
    public function kontak()
    {
        return $this->hasMany(MitraKontak::class, 'id_mitra', 'id_mitra');
    }
}