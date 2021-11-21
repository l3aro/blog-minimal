<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'blog.index');
Route::view('blog/{slug}', 'blog.show')->name('blog.show');

Route::middleware(['auth', 'can:access-admin-function'])->group(function () {
    Route::get('posts', \App\Http\Livewire\Post\Index::class)->name('posts.index');
    Route::get('posts/{post}', \App\Http\Livewire\Post\Show::class)->name('posts.show');

    Route::view('users', 'users.index')->name('users.index');
    Route::view('users/create', 'users.create')->name('users.create');
    Route::view('users/{user}', 'users.show')->name('users.show');
    Route::view('users/{user}/edit', 'users.edit')->name('users.edit');
});

Route::middleware('auth')->prefix('me')->group(function () {
    Route::view('/', 'me.index')->name('me.index');
    Route::view('profile', 'me.profile')->name('me.profile');

    Route::get('posts', \App\Http\Livewire\Me\Post\Index::class)->name('me.posts.index');
    Route::get('posts/create', \App\Http\Livewire\Me\Post\Create::class)->name('me.posts.create');
    Route::get('posts/{post}', \App\Http\Livewire\Me\Post\Show::class)->name('me.posts.show');
    Route::get('posts/{post}/edit', \App\Http\Livewire\Me\Post\Edit::class)->name('me.posts.edit');
});

require __DIR__ . '/auth.php';
