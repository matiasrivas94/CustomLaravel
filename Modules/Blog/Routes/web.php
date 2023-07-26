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
    Route::get('posts/{post}', [\Modules\Blog\Http\Controllers\PostController::class, 'show'])->name('posts.show');
    Route::get('category/{category}', [\Modules\Blog\Http\Controllers\PostController::class, 'category'])->name('posts.category');
    Route::get('tag/{tag}', [\Modules\Blog\Http\Controllers\PostController::class, 'tag'])->name('posts.tag');

    //RUTAS DE CATEGORIES
    Route::get('categories', [\Modules\Blog\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
    Route::post('categories', [\Modules\Blog\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/create', [\Modules\Blog\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
    Route::put('categories/{category}', [\Modules\Blog\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/{category}', [\Modules\Blog\Http\Controllers\CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('categories/{category}/edit', [\Modules\Blog\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');
});

