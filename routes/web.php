<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'user-access:user'])->group(function () {
   // Route::get('/home', [HomeController::class, 'index'])->name('home2');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

//Admin Routes List
Route::middleware(['auth', 'user-access:manager'])->group(function () {

    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});
Route::post('/home', [App\Http\Controllers\Pay::class, 'add'])->name('addbil');
Route::post('/pay', [App\Http\Controllers\Pay::class, 'pay'])->name('pay');

Route::post('/pdf', [App\Http\Controllers\Pay::class, 'down'])->name('down');
Route::post('/changerat', [App\Http\Controllers\Pay::class, 'changerat'])->name('changerat');
