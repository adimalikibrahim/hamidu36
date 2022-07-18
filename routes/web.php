<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AnggotaKorController;
use App\Http\Controllers\AnggotaAngController;
use App\Http\Controllers\AsramaController;
use App\Http\Controllers\AngkatanController;
use App\Http\Controllers\KordinatorController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\web\HomeController as WebHomeController;

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


Auth::routes();
Route::get('/', [WebHomeController::class, 'webIndex'])->named('webIndex');
Route::get('/chart', [HomeController::class, 'KordinatorChart'])->named('KordinatorChart');

Route::group(['prefix' => 'hamidu'], function(){
    Route::get('/kordinator', [WebHomeController::class, 'webKor'])->named('webKor');
    // Route::get('/angkatan', [WebHomeController::class, 'webAng'])->named('webAng');
    Route::get('/alumni', [WebHomeController::class, 'webAlumni'])->named('webAlumni');
    Route::get('/anggota-kordinator/{id}', [WebHomeController::class, 'angKor'])->named('angKor');
    Route::get('/anggota-angkatan/{id}', [WebHomeController::class, 'angAng'])->named('angAng');
});

Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/home', [HomeController::class, 'index'])->named('home');
    Route::get('/profile', [DatauserController::class, 'profile'])->named('profile');
    Route::put('/account/{id}', [DatauserController::class, 'accountUpdate'])->named('accountUpdate');
    
    Route::get('/alumni', [AlumniController::class, 'alumni'])->named('alumni');
    Route::post('/alumni', [AlumniController::class, 'alumniAdd'])->named('alumniAdd');
    Route::put('/alumni/{id}', [AlumniController::class, 'alumniEdit'])->named('alumniEdit');
    
    Route::get('/kordinator', [KordinatorController::class, 'kordinator'])->named('kordinator');
    
    Route::get('/anggota-kordinator/{id}', [AnggotaKorController::class, 'anggotaKor'])->named('anggotaKor');
    Route::post('/anggota-kordinator/{id}', [AnggotaKorController::class, 'anggotaKorAdd'])->named('anggotaKorAdd');
    Route::delete('/anggota-kordinator/{id}', [AnggotaKorController::class, 'anggotaKorDelete'])->named('anggotaKorDelete');
    
    Route::get('/angkatan', [AngkatanController::class, 'angkatan'])->named('angkatan');
    
    Route::get('/anggota-angkatan/{id}', [AnggotaAngController::class, 'anggotaAng'])->named('anggotaAng');
    Route::post('/anggota-angkatan/{id}', [AnggotaAngController::class, 'anggotaAngAdd'])->named('anggotaAngAdd');
    Route::delete('/anggota-angkatan/{id}', [AnggotaAngController::class, 'anggotaAngDelete'])->named('anggotaAngDelete');
    
    Route::group(['middleware' => ['admin']], function () {
        Route::get('/alumni/json', [AlumniController::class, 'alumniJson'])->named('alumni.json');

        Route::get('/account', [DatauserController::class, 'account'])->named('account');
        Route::post('/account', [DatauserController::class, 'accountAdd'])->named('accountAdd');
        Route::put('/keygen/{id}', [DatauserController::class, 'keygen'])->named('keygen');
        Route::delete('/account/{id}', [DatauserController::class, 'accountHapus'])->named('accountHapus');

        Route::delete('/alumni/{id}', [AlumniController::class, 'alumniHapus'])->named('alumniHapus');

        Route::post('/kordinator', [KordinatorController::class, 'kordinatorAdd'])->named('kordinatorAdd');
        Route::put('/kordinator/{id}', [KordinatorController::class, 'kordinatorEdit'])->named('kordinatorEdit');
        Route::delete('/kordinator/{id}', [KordinatorController::class, 'kordinatorHapus'])->named('kordinatorHapus');

        Route::post('/angkatan', [AngkatanController::class, 'angkatanAdd'])->named('angkatanAdd');
        Route::put('/angkatan/{id}', [AngkatanController::class, 'angkatanEdit'])->named('angkatanEdit');
        Route::delete('/angkatan/{id}', [AngkatanController::class, 'angkatanHapus'])->named('angkatanHapus');
    });
});
