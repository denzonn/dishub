<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PejabatController;
use App\Http\Controllers\Admin\SakipController;
use App\Http\Controllers\Admin\StruktureController;
use App\Http\Controllers\Admin\VisiController;
use App\Http\Controllers\Admin\PengaduanController as AdminPengaduanController;
use App\Http\Controllers\Admin\SurveyController;
use App\Http\Controllers\FormSurveyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengaduanController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'index'])
    ->name('home');
Route::get('/visi-misi', [HomeController::class, 'visi'])
    ->name('visi-misi');
Route::get('/tugas-fungsi', [HomeController::class, 'job'])
    ->name('job');
Route::get('/kedudukan', [HomeController::class, 'kedudukan'])
    ->name('kedudukan');
Route::get('/struktur-organisasi', [HomeController::class, 'struktur'])
    ->name('struktur');
Route::get('/pejabat-struktural', [HomeController::class, 'pejabat'])
    ->name('pejabat');
Route::get('/sakip', [HomeController::class, 'sakip'])
    ->name('sakip');
Route::get('/news', [HomeController::class, 'news'])
    ->name('news');
Route::get('/news-detail/{slug}', [HomeController::class, 'news_detail'])
    ->name('news-detail');
Route::get('/gallery-kegiatan', [HomeController::class, 'gallery'])
    ->name('gallery');

Route::middleware(['auth'])
    ->group(function () {
        Route::resource('pengaduan', PengaduanController::class);
        Route::get('/pengaduan-status', [PengaduanController::class, 'status'])
            ->name('pengaduan.status');

        Route::get('/form-survey', [FormSurveyController::class, 'index'])
            ->name('form-survey');
        Route::post('/form-survey', [FormSurveyController::class, 'store'])
            ->name('form-survey-store');
    });

Route::prefix('admin')
    ->middleware(['auth', 'isAdmin'])
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('admin-dashboard');
        Route::resource('gallery', GalleryController::class);
        Route::resource('news', NewsController::class);
        Route::resource('visi', VisiController::class);
        Route::resource('job', JobController::class);
        Route::resource('struktur', StruktureController::class);
        Route::resource('pejabat', PejabatController::class);
        Route::resource('sakip', SakipController::class);
        Route::resource('admin-pengaduan', AdminPengaduanController::class);
        Route::resource('admin-survey', SurveyController::class);
    });
