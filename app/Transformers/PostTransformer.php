<?php

namespace App\Transformers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use League\Fractal\TransformerAbstract;

class PostTransformer extends TransformerAbstract
{
    public function transform(Post $post)
    {
        return [
            "id" => $post->id,
            "title" => $post->title,
            "description" => $post->description,
            "image_url" => $post->image_url,
            "likes" => 0,
            "is_logged_user_favorite" => Auth::user()
                ? $post->isUserFavorite(Auth::user())
                : false,
        ];
    }
}
