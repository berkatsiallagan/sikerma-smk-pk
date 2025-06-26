<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;
use Illuminate\Contracts\Auth\CanResetPassword;

class Admin extends Authenticatable implements CanResetPassword
{
    use CanResetPasswordTrait, Notifiable;

    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    public $timestamps = false;

    protected $fillable = [
        'email',
        'kata_sandi',
    ];

    // Karena kolom password di DB 'kata_sandi', override getPasswordAttribute()
    public function getAuthPassword()
    {
        return $this->kata_sandi;
    }

    // Jika kamu mau fitur "remember me", pastikan kolom remember_token ada di DB,
    // dan uncomment property ini:
    // protected $rememberTokenName = 'remember_token';
}
