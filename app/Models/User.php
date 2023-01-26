<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ["name", "email", "password"];
    protected $hidden = ["password", "remember_token"];

    public function pins()
    {
        return $this->hasMany(Pin::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
