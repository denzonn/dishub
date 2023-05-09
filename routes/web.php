<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');
Route::get('/visi-misi', [App\Http\Controllers\HomeController::class, 'visi'])
    ->name('visi-misi');
Route::get('/tugas-fungsi', [App\Http\Controllers\HomeController::class, 'job'])
    ->name('job');
Route::get('/kedudukan', [App\Http\Controllers\HomeController::class, 'kedudukan'])
    ->name('kedudukan');
Route::get('/struktur-organisasi', [App\Http\Controllers\HomeController::class, 'struktur'])
    ->name('struktur');
Route::get('/pejabat-struktural', [App\Http\Controllers\HomeController::class, 'pejabat'])
    ->name('pejabat');
Route::get('/sakip', [App\Http\Controllers\HomeController::class, 'sakip'])
    ->name('sakip');
Route::get('/news', [App\Http\Controllers\HomeController::class, 'news'])
    ->name('news');
