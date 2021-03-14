<?php

use App\Http\Controllers\FriendsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', function () {
    return view('layouts.app');
})->name('main');

Route::resource('/posts', PostsController::class);

Route::get('/friends', [FriendsController::class, 'index'])
    ->name('friends');

Route::post('/friends/{user}', [FriendsController::class, 'store']);

Route::get('search', SearchController::class)
    ->name('search');

Route::get('/profile/{user}', [ProfilesController::class, 'show'])
    ->name('profile');

Route::get('/profile/{user}/edit', [ProfilesController::class, 'edit'])
    ->name('profile.edit');

Route::put('/profile/{user}', [ProfilesController::class, 'update'])
    ->name('profile.update');
