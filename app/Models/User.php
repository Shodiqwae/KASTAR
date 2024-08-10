<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    protected $fillable = [
        'name', 'email', 'password', 'role', 'gambar', 'alamat',  // tambahkan ini
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getGambarAttribute($value)
    {
        return $value ?? 'prf.png';
    }
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
