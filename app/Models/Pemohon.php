<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BidangKerjasama;

class Pemohon extends Model
{
    use HasFactory;

    protected $table = 'pemohon';
    protected $primaryKey = 'id_pemohon';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'no_permohonan',
        'nama_pemohon',
        'nomor_telp',
        'id_jurusan'
    ];

    /**
     * Relasi Pemohon ke Jurusan (many-to-one)
     * Setiap pemohon berasal dari satu jurusan.
     */
    public function jurusan()
    {
        return $this->belongsTo(
            Jurusan::class,
            'id_jurusan', // foreign key pada tabel pemohon
            'id_jurusan'  // primary key pada tabel jurusan
        );
    }

    public function jurusans()
    {
        return $this->belongsToMany(
            Jurusan::class, 
            'pemohon_jurusan', // nama tabel pivot
            'id_pemohon',      // foreign key di tabel pivot untuk model saat ini
            'id_jurusan'        // foreign key di tabel pivot untuk model terkait
        );
    }

    public function bidangs()
    {
        return $this->belongsToMany(
            BidangKerjasama::class,
            'pemohon_bidang',
            'id_pemohon',
            'id_bidang'
        );
    }
}