<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ForeignerController;

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

Route::redirect('/', '/foreigners')->middleware('auth');
Route::resource('foreigners', ForeignerController::class)->middleware('auth');

\Illuminate\Support\Facades\Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
