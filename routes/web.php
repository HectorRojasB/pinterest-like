<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::resource("posts", PostController::class);

Route::post("/post/{post}/authorize", [
    PostController::class,
    "AuthorizedPost",
]);
Route::get("/users/{user}/posts", [UserController::class, "getPosts"]);

Route::post("/user/addFavorite/{post}", [UserController::class, "addFavorite"]);
Route::post("/user/removeFavorite/{post}", [
    UserController::class,
    "removeFavorite",
]);

Route::get("/users/{user}/addTofavorites", [
    UserController::class,
    "AddFavorites",
]);
