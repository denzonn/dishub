<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DenahKantorController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\LinkTerkaitController;
use App\Http\Controllers\Admin\MitraKerjaController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PejabatController;
use App\Http\Controllers\Admin\SakipController;
use App\Http\Controllers\Admin\StruktureController;
use App\Http\Controllers\Admin\VisiController;
use App\Http\Controllers\Admin\PengaduanController as AdminPengaduanController;
use App\Http\Controllers\Admin\RunningTextController;
use App\Http\Controllers\Admin\SurveyController;
use App\Http\Controllers\Admin\UnitKerjaController;
use App\Http\Controllers\AllTautan;
use App\Http\Controllers\DenahController;
use App\Http\Controllers\FormSurveyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\SurveyKeretaApiController;
use App\Http\Controllers\SurveyLaluLintasController;
use App\Http\Controllers\SurveyPelayaranController;
use App\Http\Controllers\SurveyPenunjangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UnitKerjaController as UnitController;
use App\Models\RunningText;
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
Route::get('/denah-kantor', [DenahController::class, 'index'])
    ->name('denah');
Route::get('/news-detail/{slug}', [HomeController::class, 'news_detail'])
    ->name('news-detail');
Route::get('/gallery-kegiatan', [HomeController::class, 'gallery'])
    ->name('gallery');
Route::get('/unit-kerja', [UnitController::class, 'index'])
    ->name('unit-kerja');
Route::get('/unit-kerja/detail/{slug}', [UnitController::class, 'detail'])
    ->name('unit-kerja-detail');
Route::get('/mitra-kerja', [MitraController::class, 'index'])
    ->name('mitra-kerja');

Route::middleware(['auth'])
    ->group(function () {
        Route::resource('pengaduan', PengaduanController::class);
        Route::get('/pengaduan-status', [PengaduanController::class, 'status'])
            ->name('pengaduan.status');

        Route::get('/form-survey', [FormSurveyController::class, 'index'])
            ->name('form-survey');

        Route::get('/form-survey/lalu-lintas', [FormSurveyController::class, 'laluLintas'])
            ->name('form-survey-lalu-lintas');
        Route::get('/form-survey/pelayaran', [FormSurveyController::class, 'pelayaran'])
            ->name('form-survey-pelayaran');
        Route::get('/form-survey/kereta-api', [FormSurveyController::class, 'kereta'])
            ->name('form-survey-kereta-api');
        Route::get('/form-survey/penunjang-urusan-pemerintahan-umum', [FormSurveyController::class, 'penunjang'])
            ->name('form-survey-penunjang-urusan-pemerintahan-umum');

        Route::post('/form-survey/lalu-lintas', [FormSurveyController::class, 'storeLaluLintas'])
            ->name('form-survey-store-lalu-lintas');
        Route::post('/form-survey/pelayaran', [FormSurveyController::class, 'storePelayaran'])
            ->name('form-survey-store-pelayaran');
        Route::post('/form-survey/kereta-api', [FormSurveyController::class, 'storeKereta'])
            ->name('form-survey-store-kereta');
        Route::post('/form-survey/penunjang-urusan-pemerintahan-umum', [FormSurveyController::class, 'storePenunjang'])
            ->name('form-survey-store-penunjang');
    });

Route::prefix('admin')
    ->middleware(['auth', 'isAdmin', 'isActive'])
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
        Route::resource('unit-kerja', UnitKerjaController::class);
        Route::resource('link-terkait', LinkTerkaitController::class);
        Route::resource('mitra-kerja', MitraKerjaController::class);

        Route::get('/admin-survey-option', [SurveyController::class, 'option'])
            ->name('admin-survey-option');
        Route::post('/admin-survey-option', [SurveyController::class, 'storeOption'])
            ->name('admin-survey-store-option');
        Route::get('/admin-survey-delete/{id}', [SurveyController::class, 'deleteAns'])
            ->name('admin-survey-store-delete-ans');
        Route::get('/admin-survey-delete-option/{id}', [SurveyController::class, 'deleteOption'])
            ->name('admin-survey-store-delete-option');
        Route::resource('admin-survey-kereta', SurveyKeretaApiController::class);
        Route::resource('admin-survey-lalu-lintas', SurveyLaluLintasController::class);
        Route::resource('admin-survey-pelayaran', SurveyPelayaranController::class);
        Route::resource('admin-survey-penunjang', SurveyPenunjangController::class);


        // Foto Beranda
        Route::get('/foto-beranda', [AllTautan::class, 'indexFoto'])
            ->name('admin-foto-beranda');
        Route::get('/foto-beranda/create', [AllTautan::class, 'createFoto'])
            ->name('admin-foto-beranda-create');
        Route::post('/foto-beranda/create', [AllTautan::class, 'storeFoto'])
            ->name('admin-foto-beranda-store');
        Route::delete('/foto-beranda/delete/{id}', [AllTautan::class, 'deleteFoto'])
            ->name('admin-foto-beranda-delete');

        // Tautan Menu
        Route::get('/tautan-menu', [AllTautan::class, 'indexTautan'])
            ->name('admin-tautan-menu');
        Route::get('/tautan-menu/create', [AllTautan::class, 'createTautan'])
            ->name('admin-tautan-menu-create');
        Route::post('/tautan-menu/create', [AllTautan::class, 'storeTautan'])
            ->name('admin-tautan-menu-store');
        Route::get('/tautan-menu/edit/{id}', [AllTautan::class, 'editTautan'])
            ->name('admin-tautan-menu-edit');
        Route::put('/tautan-menu/edit/{id}', [AllTautan::class, 'updateTautan'])
            ->name('admin-tautan-menu-update');
        Route::delete('/tautan-menu/delete/{id}', [AllTautan::class, 'deleteTautan'])
            ->name('admin-tautan-menu-delete');

        //Media Sosial
        Route::get('/media-sosial', [AllTautan::class, 'indexMedia'])
            ->name('admin-media-sosial');
        Route::get('/media-sosial/create', [AllTautan::class, 'createMedia'])
            ->name('admin-media-sosial-create');
        Route::post('/media-sosial/create', [AllTautan::class, 'storeMedia'])
            ->name('admin-media-sosial-store');
        Route::get('/media-sosial/edit/{id}', [AllTautan::class, 'editMedia'])
            ->name('admin-media-sosial-edit');
        Route::put('/media-sosial/edit/{id}', [AllTautan::class, 'updateMedia'])
            ->name('admin-media-sosial-update');
        Route::delete('/media-sosial/delete/{id}', [AllTautan::class, 'deleteMedia'])
            ->name('admin-media-sosial-delete');


        Route::get('/users', [UserController::class, 'index'])
            ->name('admin-users');
        Route::get('/users/edit/{id}', [UserController::class, 'edit'])
            ->name('admin-users-edit');

        Route::get('/running-text', [RunningTextController::class, 'index'])
            ->name('admin-running-text');
        Route::get('/running-text/edit/{id}', [RunningTextController::class, 'edit'])
            ->name('admin-running-text-edit');
        Route::put('/running-text/edit/{id}', [RunningTextController::class, 'update'])
            ->name('admin-running-text-update');

        Route::get('/denah-kantor', [DenahKantorController::class, 'index'])
            ->name('admin-denah-kantor');
        Route::get('/denah-kantor/edit/{id}', [DenahKantorController::class, 'edit'])
            ->name('admin-denah-kantor-edit');
        Route::put('/denah-kantor/edit/{id}', [DenahKantorController::class, 'update'])
            ->name('admin-denah-kantor-update');
    });
