<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $post = Post::create([
            "image_url" => $request->image,
            "title" => $request->title,
            "description" => $request->description,
        ]);

        return response()->json(["message" => "POST_CREATED", "data" => $post]);
    }

    public function index(): JsonResponse
    {
        $posts = Post::all();
        return response()->json(["data" => $posts]);
    }
}
