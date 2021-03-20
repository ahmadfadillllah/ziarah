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

Route::get('/', function () {
    return view('layouts.form.dashboard');
});

Route::get('/data-jenazah', function () {
    return view('layouts.admin.data-jenazah');
})->name('dataJenazah');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('layouts.admin.dashboard');
})->name('dashboard');
