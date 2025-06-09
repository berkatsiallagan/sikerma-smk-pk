<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerjasama extends Model
{
    use HasFactory;

    protected $table = 'kerjasama';
    protected $primaryKey = 'id_kerjasama';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'no_kerjasama',
        'id_ajuan',
        'id_pemohon',
        'id_mitra',
        'id_bidang',
        'id_dokumen',
        'jenis_kerjasama',
    ];

    // Contoh relasi ke model lain (jika ada)
    public function ajuan()
    {
        return $this->belongsTo(Ajuan::class, 'id_ajuan');
    }

   public function pemohon()
   {
        return $this->belongsTo(Pemohon::class, 'id_pemohon');
   }

    public function mitra()
    {
        return $this->belongsTo(Mitra::class, 'id_mitra');
    }

    public function bidang()
    {
        return $this->belongsTo(BidangKerjasama::class, 'id_bidang');
    }

    public function dokumen()
    {
        return $this->belongsTo(Dokumen::class, 'id_dokumen');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }
}
