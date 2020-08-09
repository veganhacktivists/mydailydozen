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
            ["name" => "Beans", "checkboxes" => 3],
            ["name" => "Berries", "checkboxes" => 3],
            ["name" => "Other Fruits", "checkboxes" => 3],
            ["name" => "Cruciferous Veg", "checkboxes" => 1],
            ["name" => "Greens", "checkboxes" => 2],
            ["name" => "Other Veg", "checkboxes" => 2],
            ["name" => "Flaxseeds", "checkboxes" => 1],
            ["name" => "Nuts and Seeds", "checkboxes" => 1],
            ["name" => "Herbs and Spices", "checkboxes" => 1],
            ["name" => "Whole Grains", "checkboxes" => 3],
            ["name" => "Beverages", "checkboxes" => 5],
            ["name" => "Exercise", "checkboxes" => 1],
        ],
        "recc" => [
            ["name" => "Vitamin B12", "checkboxes" => 1],
            ["name" => "Sleep", "checkboxes" => 1],
            ["name" => "Meditation", "checkboxes" => 1],
        ],
        "custom" => [
            ["name" => "Act of compassion", "checkboxes" => 1],
            ["name" => "Socialize a little", "checkboxes" => 1],
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
