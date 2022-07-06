<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Auth::routes();

Route::get('/customerHome', [App\Http\Controllers\HomeController::class, 'index'])->name('customerHome');
Route::get('/customerHome/complaintRegistration', [App\Http\Controllers\HomeController::class, 'complaintRegistration'])->name('complaintRegistration');
Route::post('/customerHome/complaintRegistration', [App\Http\Controllers\HomeController::class, 'complaintRegistrationSave'])->name('complaintRegistrationSave');


// Route::get('/home', 'HomeController@index')->name('home');
Route::get('auth/google', [App\Http\Controllers\GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [App\Http\Controllers\GoogleController::class, 'handleGoogleCallback']);
