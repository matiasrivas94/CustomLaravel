<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/people', function (Request $request) {
    return $request->user();
});

//People register
Route::get('getall', [Modules\People\Http\Controllers\Api\PeopleController::class, 'index'])->name('people.index');
Route::get('getone', [Modules\People\Http\Controllers\Api\PeopleController::class, 'show'])->name('people.show');
Route::post('create', [Modules\People\Http\Controllers\Api\PeopleController::class, 'store'])->name('people.store');
Route::put('edit', [Modules\People\Http\Controllers\Api\PeopleController::class, 'update'])->name('people.update');
Route::delete('delete', [Modules\People\Http\Controllers\Api\PeopleController::class, 'destroy'])->name('people.destroy');