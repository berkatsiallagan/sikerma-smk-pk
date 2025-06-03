<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BidangKerjasama extends Model
{
    protected $table = 'bidang_kerjasama';
    protected $primaryKey = 'id_bidang';
    public $timestamps = false;

    protected $fillable = [
        'nama_bidang',
    ];
}
