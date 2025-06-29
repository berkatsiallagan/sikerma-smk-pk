<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pemohon;

class BidangKerjasama extends Model
{
    protected $table = 'bidang_kerjasama';
    protected $primaryKey = 'id_bidang';
    public $timestamps = false;

    protected $fillable = [
        'id_bidang',
        'nama_bidang',
    ];

    public function kerjasamas()
    {
        return $this->belongsToMany(
            Kerjasama::class,
            'kerjasama_bidang',
            'id_bidang',
            'id_kerjasama'
        );
    }

    public function pemohons()
    {
        return $this->belongsToMany(
            Pemohon::class,
            'pemohon_bidang',
            'id_bidang',
            'id_pemohon'
        );
    }
}
