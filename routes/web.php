<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BantuanController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\PenerimaController;
use App\Http\Controllers\PerangkatController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AdminPimpinanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NagariController;
use App\Http\Controllers\DataUserController;

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
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/', function () {	return view('outter.regislog');	})->middleware('belumlogin');
Route::post('/proses-login', [LoginController::class, 'prosesLogin']);
Route::post('regist-proses', [LoginController::class, 'regist']);
Route::get('regist', function () {	return view('outter.regist');	});

Route::group(['middleware' => 'sudahlogin'], function(){
	Route::resource('profile', NagariController::class);

	Route::resource('datauser', DataUserController::class);
 
	Route::resource('bantuan', BantuanController::class);
	Route::get('bantuan-delete/{id}', [BantuanController::class, 'destroy']);

	Route::resource('penduduk', PendudukController::class);
	Route::get('penduduk-delete/{id}', [PendudukController::class, 'destroy']);

	Route::resource('penerima', PenerimaController::class);
	Route::get('penerima-delete/{id}', [PenerimaController::class, 'destroy']);

	Route::resource('perangkat', PerangkatController::class);
	Route::get('perangkat-delete/{id}', [PerangkatController::class, 'destroy']);

	Route::resource('admin', AdminPimpinanController::class);
	Route::get('admin-delete/{id}', [AdminPimpinanController::class, 'destroy']);

	Route::resource('user', LoginController::class);

	// LAPORAN
	Route::get('laporan-penerima', [LaporanController::class, 'laporanPenerima']);
	Route::get('laporan-penerima-search', [LaporanController::class, 'searchPenerima']);
	Route::get('laporan-penerima-cetak/{id_bantuan}', [LaporanController::class, 'cetakPenerima']);
	Route::get('laporan-penduduk', [LaporanController::class, 'laporanPenduduk']);
	Route::get('laporan-penduduk-cetak', [LaporanController::class, 'cetakPenduduk']);
	Route::get('laporan-perangkat', [LaporanController::class, 'laporanPerangkat']);
	Route::get('laporan-perangkat-cetak', [LaporanController::class, 'cetakPerangkat']);

	Route::get('logout', [LoginController::class, 'logout']);
});




