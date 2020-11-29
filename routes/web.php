<?php

use App\Http\Controllers\DetailTypeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SendContactEmailController;
use App\Http\Controllers\ServingSizeController;
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


Route::get('/', HomeController::class);
Route::get('/contact', fn () => Auth::check() ? view('contact-auth') : view('contact-public'));
Route::post('/contact/send', SendContactEmailController::class);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource('groups', GroupController::class)->only([
        'index', 'show', 'update'
    ]);
    Route::get('groups/{group}/edit/{detailType?}', [GroupController::class, 'edit']);


    Route::get('groups/{group}/serving-sizes/create', [ServingSizeController::class, 'create']);
    Route::post('groups/{group}/serving-sizes', [ServingSizeController::class, 'store']);
    Route::get('groups/{group}/serving-sizes/{servingSize}/edit', [ServingSizeController::class, 'edit']);
    Route::put('groups/{group}/serving-sizes/{servingSize}', [ServingSizeController::class, 'update']);
    Route::delete('groups/{group}/serving-sizes/{servingSize}', [ServingSizeController::class, 'destroy']);


    Route::get('history', [HistoryController::class, 'index'])->name('history');
    Route::get('settings', [UserController::class, 'show'])->name('settings');
    Route::put('settings/all', [UserController::class, 'selectAll']);
    Route::put('settings/none', [UserController::class, 'unselectAll']);
    Route::put('settings/{group}', [UserController::class, 'update']);
});


/*
 * Admin routes
 */
Route::middleware(['auth', 'admin'])->namespace('Admin')->group(function () {
    Route::post('/details', [DetailTypeController::class, 'store'])->name('detail.store');
    Route::put('/details/{detail}', [DetailTypeController::class, 'update'])->name('detail.update');
    Route::delete('/details/{detail}', [DetailTypeController::class, 'destroy'])->name('detail.destroy');
});
