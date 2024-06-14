<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EndUserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\PriceSubmitController;

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

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/',[LoginController::class, 'login']);
Route::post('/',[LoginController::class, 'authenticating']);
Route::get('/logout',[LoginController::class, 'logout']);

// ADMIN AKSESS
Route::middleware('auth')->group(function(){
    //Dashboard
    Route::get('/dashboard',[DashboardController::class, 'index']);
    //User
    Route::get('/user',[UserController::class, 'index']);
    Route::get('/user/{id}',[UserController::class, 'show']);
    Route::get('/user-add',[UserController ::class, 'add']);
    Route::post('/user-add',[UserController ::class, 'store']);
    Route::get('/user-destroy/{id}',[UserController ::class, 'destroy']);
    Route::get('/user-edit/{slug}',[UserController ::class, 'edit']);
    Route::post('/user-edit/{slug}',[UserController ::class, 'update']);
    //Karyawan
    Route::get('/karyawan',[KaryawanController::class, 'index']);
    Route::get('/karyawan-add',[KaryawanController ::class, 'add']);
    Route::post('/karyawan-add',[KaryawanController ::class, 'store']);
    Route::get('/karyawan-edit/{slug}',[KaryawanController ::class, 'edit']);
    Route::post('/karyawan-edit/{slug}',[KaryawanController ::class, 'update']);
    Route::get('/karyawan-destroy/{id}',[KaryawanController ::class, 'destroy']);
    //Kriteria
    Route::get('/kriteria',[KriteriaController::class, 'index']);
    Route::get('/kriteria-add',[KriteriaController ::class, 'add']);
    Route::post('/kriteria-add',[KriteriaController ::class, 'store']);
    Route::get('/kriteria-edit/{slug}',[KriteriaController ::class, 'edit']);
    Route::post('/kriteria-edit/{slug}',[KriteriaController ::class, 'update']);
    Route::get('/kriteria-destroy/{id}',[KriteriaController ::class, 'destroy']);
     //Alternatif
    Route::get('/alternatif',[AlternatifController::class, 'index']);
    Route::get('/alternatif-add',[AlternatifController ::class, 'add']);
    Route::post('/alternatif-add',[AlternatifController ::class, 'store']);
    Route::get('/alternatif-edit/{slug}',[AlternatifController ::class, 'edit']);
    Route::post('/alternatif-edit/{slug}',[AlternatifController ::class, 'update']);
    Route::get('/alternatif-destroy/{id}',[AlternatifController ::class, 'destroy']);
    //Perhitunggan
    Route::get('/perhitungan',[PerhitunganController::class, 'index']);
});