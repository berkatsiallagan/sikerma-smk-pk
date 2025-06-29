<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MitraKontak extends Model
{
    use HasFactory;

    protected $table = 'mitra_kontak';
    protected $primaryKey = 'id_kontak';

    protected $fillable = [
        'id_mitra',
        'website',
        'email',
        'tipe_kontak',
    ];

    public $timestamps = false;

    public function mitra()
    {
        return $this->belongsTo(Mitra::class, 'id_mitra', 'id_mitra');
    }
} 