<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;

    protected $fillable = ["name", "email", "password"];
    protected $hidden = ["password", "remember_token"];

    public function posts()
    {
        return $this->hasMany(Posts::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
