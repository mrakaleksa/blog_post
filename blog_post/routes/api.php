<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\PostTestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/posts/{id}', [PostTestController::class, 'show']);
//Route::get('/posts', [PostTestController::class, 'index']);

//Route::resource('posts', PostController::class);
Route::resource('users.posts', UserPostController::class)->only(['index']);

Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
//Route::get('/users/{id}/posts', [UserPostController::class, 'index'])->name('users.posts.index');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });
    Route::resource('posts', PostController::class)->only(['update', 'store', 'destroy']);
    // API route for logout user
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::resource('posts', PostController::class)->only(['index']);
