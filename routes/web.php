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

Route::group(['middleware' => 'auth', 'user', 'admin'], function(){
    Route::get('/home', [HomeController::class, 'index'])->named('home');
    // Route::get('/profile', [DatauserController::class, 'profile'])->named('profile');
    
    // Route::get('/account', [DatauserController::class, 'account'])->named('account');
    // Route::post('/account', [DatauserController::class, 'accountAdd'])->named('accountAdd');
    // Route::post('/keygen/{id}', [DatauserController::class, 'keygen'])->named('keygen');
    // Route::put('/account/{id}', [DatauserController::class, 'accountUpdate'])->named('accountUpdate');

    // Route::get('/santri', [SantriController::class, 'santri'])->named('santri');
    // Route::post('/santri', [SantriController::class, 'santriAdd'])->named('santriAdd');

    Route::get('/alumni', [AlumniController::class, 'alumni'])->named('alumni');
    Route::post('/alumni', [AlumniController::class, 'alumniAdd'])->named('alumniAdd');
    Route::put('/alumni/{id}', [AlumniController::class, 'alumniEdit'])->named('alumniEdit');
    Route::delete('/alumni/{id}', [AlumniController::class, 'alumniHapus'])->named('alumniHapus');
    
    Route::get('/kordinator', [KordinatorController::class, 'kordinator'])->named('kordinator');
    Route::post('/kordinator', [KordinatorController::class, 'kordinatorAdd'])->named('kordinatorAdd');
    Route::patch('/kordinator/{id}', [KordinatorController::class, 'kordinatorEdit'])->named('kordinatorEdit');
    Route::delete('/kordinator/{id}', [KordinatorController::class, 'kordinatorHapus'])->named('kordinatorHapus');
    
    Route::get('/anggota-kordinator/{id}', [AnggotaKorController::class, 'anggotaKor'])->named('anggotaKor');
    Route::post('/anggota-kordinator/{id}', [AnggotaKorController::class, 'anggotaKorAdd'])->named('anggotaKorAdd');
    Route::delete('/anggota-kordinator/{id}', [AnggotaKorController::class, 'anggotaKorDelete'])->named('anggotaKorDelete');
    
    Route::get('/angkatan', [AngkatanController::class, 'angkatan'])->named('angkatan');
    Route::post('/angkatan', [AngkatanController::class, 'angkatanAdd'])->named('angkatanAdd');
    Route::put('/angkatan/{id}', [AngkatanController::class, 'angkatanEdit'])->named('angkatanEdit');
    Route::delete('/angkatan/{id}', [AngkatanController::class, 'angkatanHapus'])->named('angkatanHapus');
    
    Route::get('/anggota-angkatan/{id}', [AnggotaAngController::class, 'anggotaAng'])->named('anggotaAng');
    Route::post('/anggota-angkatan/{id}', [AnggotaAngController::class, 'anggotaAngAdd'])->named('anggotaAngAdd');
    Route::delete('/anggota-angkatan/{id}', [AnggotaAngController::class, 'anggotaAngDelete'])->named('anggotaAngDelete');

    // Route::get('/asrama', [AsramaController::class, 'asrama'])->named('asrama');
    // Route::post('/asrama', [AsramaController::class, 'asramaAdd'])->named('asramaAdd');
    // Route::put('/asrama/{id}', [AsramaController::class, 'asramaEdit'])->named('asramaEdit');
    // Route::delete('/asrama/{id}', [AsramaController::class, 'asramaHapus'])->named('asramaHapus');
    
});

Route::group(['middleware' => 'admin'], function(){
});
