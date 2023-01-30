<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostObserver
{
    public function creating(Post $post)
    {
        $post->image_url = $this->storeImage($post->image_url);
        $post->authorized_by_user_id = $this->isUserAuthorized($post->user_id);
        $post->user_id = $this->isUserAuthorized($post->user_id);
        $post->authorized_date = $this->isDateAuthorized($post->user_id);
    }

    public function storeImage($image)
    {
        $fileName = uniqid() . "." . $image->getClientOriginalExtension();

        $path = Storage::disk("s3")->put("image", $image);
        $path = Storage::disk("s3")->url($path);
        return $path;
    }

    public function isUserAuthorized($user_id)
    {
        return $user_id != "undefined" ? $user_id : null;
    }

    public function isDateAuthorized($user_id)
    {
        $currentDate = Carbon::now()->toDateString();
        return $user_id != "undefined" ? $currentDate : null;
    }
}
