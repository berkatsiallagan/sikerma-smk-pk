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
    public $timestamps = false;

    protected $fillable = [
        'id_ajuan',
        'id_pemohon',
        'id_mitra',
        'id_dokumen',
        'id_bidang',
        'jenis_kerjasama',
    ];

    // One-to-many relationship with Pemohon
    public function pemohon()
    {
        return $this->belongsTo(Pemohon::class, 'id_pemohon', 'id_pemohon');
    }

    // One-to-many relationship with Mitra
    public function mitra()
    {
        return $this->belongsTo(Mitra::class, 'id_mitra', 'id_mitra');
    }

    // One-to-many relationship with Dokumen
    public function dokumen()
    {
        return $this->belongsTo(Dokumen::class, 'id_dokumen', 'id_dokumen');
    }

    /**
     * Relasi Kerjasama ke Ajuan (many-to-one)
     */
    public function ajuan()
    {
        return $this->belongsTo(
            Ajuan::class,
            'id_ajuan', // foreign key pada tabel kerjasama
            'id_ajuan'  // primary key pada tabel ajuan
        );
    }

    /**
     * Relasi many-to-one antara Kerjasama dan BidangKerjasama
     * Setiap kerjasama hanya memiliki satu bidang utama (kolom id_bidang pada tabel kerjasama).
     */
    public function bidang()
    {
        return $this->belongsTo(
            BidangKerjasama::class,
            'id_bidang',   // foreign key pada tabel kerjasama
            'id_bidang'    // primary key pada tabel bidang_kerjasama
        );
    }
}