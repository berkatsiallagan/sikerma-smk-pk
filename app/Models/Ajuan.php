<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ajuan extends Model
{
    protected $table = 'ajuan';
    protected $primaryKey = 'id_ajuan';
    public $timestamps = false;

    protected $fillable = [
        'tanggal_ajuan',
        'id_admin',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin');
    }
}
