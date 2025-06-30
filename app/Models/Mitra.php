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
        'website',
        'email',
    ];

    // Jika Anda ingin menggunakan timestamps
    public $timestamps = false;

    // Removed kontak() relationship to mitra_kontak table as it does not exist in the database
}
