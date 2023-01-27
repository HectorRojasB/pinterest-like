<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function getPosts(User $user): JsonResponse
    {
        return response()->json(["data" => $user->posts]);
    }
}
