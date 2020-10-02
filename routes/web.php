<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\UserController;
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

Route::get('/', fn() => view('welcome'));
Route::get('/contact', fn() => view('contact'));

Route::middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::resource('groups', GroupController::class)->only([
        'index', 'show', 'update'
    ]);
    Route::get('history', [GroupController::class, 'history'])->name('history');
    Route::get('settings', [UserController::class, 'show'])->name('settings');
    Route::put('settings/all', [UserController::class, 'selectAll']);
    Route::put('settings/none', [UserController::class, 'unselectAll']);
    Route::put('settings/{group}', [UserController::class, 'update']);
});
