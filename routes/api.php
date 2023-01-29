<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Auth routes
Route::post("/login", [AuthController::class, "login"]);
Route::post("/register", [AuthController::class, "register"]);

//Posts
Route::resource("posts", PostController::class);

//Protected routes
Route::middleware("auth:api")->group(function () {
    Route::get("/user", [UserController::class, "getUser"]);
    Route::post("/logout", [AuthController::class, "logout"]);

    Route::get("/users/{user}/posts", [UserController::class, "getPosts"]);

    Route::get("/unauthorized/posts", [
        PostController::class,
        "unauthorizedPosts",
    ]);
    Route::post("/authorize/posts/{post}/", [
        PostController::class,
        "authorizePost",
    ]);
});
