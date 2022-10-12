<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminPostController;

Route::get('/',[PostController::class,'index']);
Route::get('posts/{post:slug}',[PostController::class,'show']);

Route::post('posts/{post:slug}/comments',[CommentController::class,'store']);

Route::get('/register',[AuthController::class,'create'])->middleware('guest');
Route::post('/register',[AuthController::class,'store'])->middleware('guest');
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth');

Route::get('/login',[AuthController::class,'login'])->middleware('guest');
Route::post('/login',[AuthController::class,'post_login'])->middleware('guest');

Route::post('/posts/{post:slug}/sub',[PostController::class,'handler']);

Route::middleware('can:admin')->group(function()
{
    Route::get('/admin/posts',[AdminPostController::class,'index']);
    Route::get('/admin/posts/create',[AdminPostController::class,'create']);
    Route::post('/admin/posts/store',[AdminPostController::class,'store']);

    Route::get('/admin/posts/{post:slug}/edit',[AdminPostController::class,'edit']);
    Route::patch('/admin/posts/{post:slug}/update',[AdminPostController::class,'update']);

    Route::delete('/admin/posts/{post:slug}/delete',[AdminPostController::class,'destory']);
});

