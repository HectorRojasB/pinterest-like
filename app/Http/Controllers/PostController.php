<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Transformers\PostTransformer;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    private $postTransformer;

    function __construct(PostTransformer $postTransformer)
    {
        $this->postTransformer = $postTransformer;
    }

    public function store(Request $request): JsonResponse
    {
        $post = Post::create([
            "image_url" => $request->image,
            "title" => $request->title,
            "description" => $request->description,
        ]);

        return response()->json(["message" => "POST_CREATED", "data" => $post]);
    }

    public function index()
    {
        $posts = Post::all();
        $response = fractal()
            ->collection($posts)
            ->transformWith(new PostTransformer());

        return response()->json(["data" => $response]);
    }

    public function unauthorizedPosts()
    {
        $post = new Post();
        $response = fractal()
            ->collection($post->getUnauthorized())
            ->transformWith(new PostTransformer());

        return response()->json(["data" => $response]);
    }

    public function authorizePost(Post $post): JsonResponse
    {
        $post->update([
            "authorized_by_user_id" => auth()->user()->id,
            "authorized_date" => Carbon::now()->toDateString(),
        ]);

        return response()->json([
            "message" => "POST_AUTHORIZED",
            "data" => $post,
        ]);
    }

    public function favorites(): JsonResponse
    {
        $favorites = auth()->user()->favorites;
        $response = fractal()
            ->collection($favorites)
            ->transformWith(new PostTransformer());

        return response()->json([
            "data" => $response,
        ]);
    }

    public function addFavorite(Post $post): JsonResponse
    {
        $user = auth()->user();
        $user->favorites()->syncWithoutDetaching([$post->id]);

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
}
