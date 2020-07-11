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

$groupDummyData = [
    'groups' => [
        "main" => [
            "Beans",
            "Berries",
            "Other Fruits",
            "Cruciferous Veg",
            "Greens",
            "Other Veg",
            "Flaxseeds",
            "Nuts and Seeds",
            "Herbs and Spices",
            "Whole Grains",
            "Beverages",
            "Exercise",
        ],
        "recc" => [
            "Vitamin B12",
            "Sleep",
            "Meditation",
        ],
        "custom" => [
            "Act of compassion",
            "Socialize a little",

        ],
    ],
];

Route::view('/', 'welcome', $groupDummyData)->name('home');
Route::view('/privacy', 'privacy_policy')->name('privacy_policy');

Route::view('/contact', 'contact.form')->name('contact.form');
Route::post('/contact', 'SendContactEmailController')->name('contact.send');

Route::middleware('auth')->group(function () {
    Route::get('/settings', 'SettingsController@edit')->name('settings.edit');
    Route::put('/settings', 'SettingsController@update')->name('settings.update');

    Route::delete('/account', 'DeleteAccountController')->name('account.destroy');
});
