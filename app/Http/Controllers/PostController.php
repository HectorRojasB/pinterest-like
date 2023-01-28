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

    public function getUnauthorized(): JsonResponse
    {
        $post = new Post();
        return response()->json(["data" => $post->getUnauthorized()]);
    }

    public function AuthorizedPost(Post $post): JsonResponse
    {
        $post->update([
            "authorized_by_user_id" => Auth::user()->id,
            "authorized_date" => Carbon::now()->toDateString(),
        ]);

        return response()->json(["POST_AUTHORIZED", "data" => $post]);
    }
}
