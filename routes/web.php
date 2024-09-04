<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Rute default Laravel
Route::get('/', function () {
    return redirect()->route('posts.index');  // Redirect ke halaman daftar post
});

// Rute resource untuk CRUD Post
Route::resource('posts', PostController::class);
