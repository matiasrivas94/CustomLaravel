<?php

use Illuminate\Support\Facades\Route;
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

Route::group(['prefix' => 'blog','as' => 'blg.'], function () {
    Route::get('posts', [\Modules\Blog\Http\Controllers\PostController::class, 'index'])->name('posts.index');
    Route::get('posts/{post}', [\Modules\Blog\Http\Controllers\PostController::class, 'show'])->name('posts.show');

    Route::get('category/{category}', [\Modules\Blog\Http\Controllers\PostController::class, 'category'])->name('posts.category');
});