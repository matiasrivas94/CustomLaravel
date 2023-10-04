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

Route::group(['prefix' => 'blog', 'as' => 'blg.'], function () {
    //RUTAS DE POSTS
    Route::get('posts', [\Modules\Blog\Http\Controllers\PostController::class, 'index'])->name('posts.index');
    Route::get('posts/create', [\Modules\Blog\Http\Controllers\PostController::class, 'create'])->name('posts.create');
    Route::get('posts/{post}', [\Modules\Blog\Http\Controllers\PostController::class, 'show'])->name('posts.show');
    Route::get('category/{category}', [\Modules\Blog\Http\Controllers\PostController::class, 'category'])->name('posts.category');
    Route::get('tag/{tag}', [\Modules\Blog\Http\Controllers\PostController::class, 'tag'])->name('posts.tag');
    //Route::resource('/posts', 'PostController');

    //RUTAS DE CATEGORIES
    // Route::get('categories', [\Modules\Blog\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
    // Route::post('categories', [\Modules\Blog\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');
    // Route::get('categories/create', [\Modules\Blog\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
    // Route::put('categories/{category}', [\Modules\Blog\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');
    // Route::get('categories/{category}/edit', [\Modules\Blog\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');
    // Route::delete('categories/{category}/delete', [\Modules\Blog\Http\Controllers\CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::resource('/categories', 'CategoryController');

    //RUTAS DE TAGS
    Route::get('tags', [\Modules\Blog\Http\Controllers\TagController::class, 'index'])->name('tags.index');
    Route::post('tags', [\Modules\Blog\Http\Controllers\TagController::class, 'store'])->name('tags.store');
    Route::get('tags/create', [\Modules\Blog\Http\Controllers\TagController::class, 'create'])->name('tags.create');
    Route::put('tags/{tag}', [\Modules\Blog\Http\Controllers\TagController::class, 'update'])->name('tags.update');
    Route::get('tags/{tag}/edit', [\Modules\Blog\Http\Controllers\TagController::class, 'edit'])->name('tags.edit');
    Route::delete('tags/{tag}/delete', [\Modules\Blog\Http\Controllers\TagController::class, 'destroy'])->name('tags.destroy');
});

