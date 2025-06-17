<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusan';
    protected $primaryKey = 'id_jurusan';
    public $timestamps = false;

    protected $fillable = ['nama_jurusan'];
    // Hapus 'id_jurusan' dari fillable karena primary key biasanya tidak perlu mass assignment

    public function pemohons()
    {
        return $this->belongsToMany(
            Pemohon::class,
            'pemohon_jurusan',
            'id_jurusan',
            'id_pemohon'
        );
    }
}