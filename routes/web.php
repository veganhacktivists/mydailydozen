<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::get('/', 'GroupController@index')->name('home');
Route::get('/groups/{group}', 'GroupController@show');
Route::view('/privacy', 'privacy_policy')->name('privacy_policy');

Route::view('/contact', 'contact.form')->name('contact.form');
Route::post('/contact', 'SendContactEmailController')->name('contact.send');

Route::get('/groups/{group}', 'GroupController@show')->where('group', '[0-9]+');

Route::middleware('auth')->group(function () {

    Route::post('/groups/checked/', 'GroupController@storeChecked');

    // Route::post('groups/checked', [GroupController::class, 'storeChecked']);

    Route::get('/settings', 'SettingsController@edit')->name('settings.edit');
    Route::put('/settings', 'SettingsController@update')->name('settings.update');

    Route::delete('/account', 'DeleteAccountController')->name('account.destroy');
});
