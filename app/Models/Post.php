<?php

namespace App\Models;

use App\Observers\PostObserver;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        "title",
        "description",
        "image_url",
        "authorized_by_user_id",
        "authorized_date",
        "user_id",
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
