<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Helpers\PostsHelper;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Transformers\PostTransformer;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    private $helper;
    private $postTransformer;
    private $postsPerPage;

    function __construct(PostTransformer $postTransformer, PostsHelper $helper)
    {
        $this->postTransformer = $postTransformer;
        $this->helper = $helper;
        $this->postPerPage = 20;
    }

    public function store(Request $request): JsonResponse
    {
        $post = Post::create([
            "image_url" => $request->image,
            "title" => $request->title,
            "description" => $request->description,
            "user_id" => $request->user_id,
        ]);

        return response()->json(["message" => "POST_CREATED", "data" => $post]);
    }

    public function index()
    {
        $postsPaginator = Post::orderBy("created_at", "desc")->paginate(
            $this->postPerPage
        );
        return $this->helper->paginator($postsPaginator)->toArray();
    }

    public function unauthorizedPosts()
    {
        $post = new Post();
        $postsPaginator = $post
            ->getUnauthorized()
            ->paginate($this->postPerPage);
        return $this->helper->paginator($postsPaginator)->toArray();
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

    public function favorites()
    {
        $favorites = auth()
            ->user()
            ->favorites();
        $postsPaginator = $favorites->paginate($this->postPerPage);
        return $this->helper->paginator($postsPaginator)->toArray();
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
