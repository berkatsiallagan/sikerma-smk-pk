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
        'nomor_telp'
        // Hapus 'id_jurusan' karena menggunakan relasi many-to-many
    ];

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