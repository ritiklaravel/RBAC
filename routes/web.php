<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return 'Admin Dashboard';
})->middleware('role:Admin');

Route::get('/reports', function () {
    return 'Reports Page';
})->middleware('permission:view_reports');

Route::get('/profile', function () {
    return 'Edit Profile Page';
})->middleware('permission:edit_profile');
