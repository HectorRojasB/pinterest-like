<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Transformers\PostTransformer;

class UserController extends Controller
{
    public function getPosts(User $user): JsonResponse
    {
        dd("sajhsha");
        $response = fractal()
            ->collection($user->posts)
            ->transformWith(new PostTransformer());
        return response()->json(["data" => $response]);
    }

    public function addFavorite(Post $post): JsonResponse
    {
        $user = Auth::user();
        $user->favorites()->sync([$post->id]);

        return response()->json([
            "message" => "POST_ADDED_TO_FAVORITES",
            "data" => null,
        ]);
    }

    public function removeFavorite(Post $post): JsonResponse
    {
        $user = Auth::user();
        $user->favorites()->detach($post->id);

        return response()->json([
            "message" => "POST_REMOVIED_FROM_FAVORITES",
            "data" => null,
        ]);
    }

    public function getFavorites(User $user)
    {
        return $user->favorites;
    }
}
