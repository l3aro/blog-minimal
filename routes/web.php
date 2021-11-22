<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Http\Livewire\Blog\Index::class)->name('blog.index');
Route::view('blog/{slug}', 'blog.show')->name('blog.show');

Route::middleware(['auth', 'can:access-admin-function'])->group(function () {
    Route::get('posts', \App\Http\Livewire\Post\Index::class)->name('posts.index');
    Route::get('posts/{post}', \App\Http\Livewire\Post\Show::class)->name('posts.show');

    Route::get('users', \App\Http\Livewire\User\Index::class)->name('users.index');
    Route::get('users/create', \App\Http\Livewire\User\Create::class)->name('users.create');
    Route::get('users/{user}', \App\Http\Livewire\User\Show::class)->name('users.show');
    Route::get('users/{user}/edit', \App\Http\Livewire\User\Edit::class)->name('users.edit');
});

Route::middleware('auth')->prefix('me')->group(function () {
    Route::get('profile', \App\Http\Livewire\Me\Index::class)->name('me.index');
    Route::get('profile/edit', \App\Http\Livewire\Me\Edit::class)->name('me.edit');

    Route::get('posts', \App\Http\Livewire\Me\Post\Index::class)->name('me.posts.index');
    Route::get('posts/create', \App\Http\Livewire\Me\Post\Create::class)->name('me.posts.create');
    Route::get('posts/{post}', \App\Http\Livewire\Me\Post\Show::class)->name('me.posts.show');
    Route::get('posts/{post}/edit', \App\Http\Livewire\Me\Post\Edit::class)->name('me.posts.edit');
});

require __DIR__ . '/auth.php';
