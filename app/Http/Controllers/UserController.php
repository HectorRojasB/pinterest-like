<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Helpers\PostsHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Transformers\UserTransformer;
use App\Transformers\PostTransformer;

class UserController extends Controller
{
    private $userTransformer;
    private $postTransformer;
    private $postsHelper;
    private $postsPerPage;

    function __construct(
        UserTransformer $userTransformer,
        PostTransformer $postTransformer,
        PostsHelper $postsHelper
    ) {
        $this->userTransformer = $userTransformer;
        $this->postTransformer = $postTransformer;
        $this->postsHelper = $postsHelper;
        $this->postPerPage = 20;
    }

    public function getUser(Request $request)
    {
        return response()->json([
            "data" => $this->userTransformer->transform($request->user()),
        ]);
    }

    public function getPosts(Request $request, User $user)
    {
        $postsPaginator = $user->posts()->paginate($this->postPerPage);
        return $this->postsHelper->paginator($postsPaginator)->toArray();
    }

    public function getFavorites(User $user)
    {
        return $user->favorites;
    }
}
