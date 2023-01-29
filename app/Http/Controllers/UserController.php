<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Transformers\UserTransformer;
use App\Transformers\PostTransformer;

class UserController extends Controller
{
    private $userTransformer;
    private $postTransformer;

    function __construct(
        UserTransformer $userTransformer,
        PostTransformer $postTransformer
    ) {
        $this->userTransformer = $userTransformer;
        $this->postTransformer = $postTransformer;
    }

    public function getUser(Request $request): JsonResponse
    {
        return response()->json([
            "data" => $this->userTransformer->transform($request->user()),
        ]);
    }

    public function getPosts(Request $request, User $user): JsonResponse
    {
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
