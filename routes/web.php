<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'blog.index');
Route::view('blog/{slug}', 'blog.show')->name('blog.show');

Route::view('posts', 'posts.index')->name('posts.index');
Route::view('posts/{post}', 'posts.show')->name('posts.show');

Route::view('users', 'users.index')->name('users.index');
Route::view('users/create', 'users.create')->name('users.create');
Route::view('users/{user}', 'users.show')->name('users.show');
Route::view('users/{user}/edit', 'users.edit')->name('users.edit');

Route::prefix('me')->group(function () {
    Route::view('/', 'me.index')->name('me.index');
    Route::view('profile', 'me.profile')->name('me.profile');

    Route::view('posts', 'me.posts.index')->name('me.posts.index');
    Route::view('posts/create', 'me.posts.create')->name('me.posts.create');
    Route::view('posts/{post}', 'me.posts.show')->name('me.posts.show');
    Route::view('posts/{post}/edit', 'me.posts.edit')->name('me.posts.edit');
});

require __DIR__ . '/auth.php';
