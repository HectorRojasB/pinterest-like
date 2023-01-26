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
        $post->authorized_by_user_id = $this->isUserAuthorized();
        $post->user_id = $this->isUserAuthorized();
        $post->authorized_date = $this->isDateAuthorized();
    }

    public function storeImage($image)
    {
        $fileName = uniqid() . "." . $image->getClientOriginalExtension();

        $path = Storage::disk("s3")->put("image", $image);
        $path = Storage::disk("s3")->url($path);
        return $path;
    }

    public function isUserAuthorized()
    {
        return Auth::user() ? Auth::user()->id : null;
    }

    public function isDateAuthorized()
    {
        $currentDate = Carbon::now()->toDateString();
        return Auth::user() ? $currentDate : null;
    }
}
