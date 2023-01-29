<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles, HasApiTokens;

    protected $fillable = ["name", "email", "password"];
    protected $hidden = ["password", "remember_token"];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Post::class, "favorites");
    }

    public function scopeHasFavorite($query, $post_id)
    {
        return $query
            ->whereHas("favorites", function ($query) use ($post_id) {
                $query->where("post_id", $post_id);
            })
            ->exists();
    }
}
