<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\JagaController;
use App\Http\Controllers\SpesialisController;

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

Route::get('/', function () {
    return view('Layout');
});


Route::get('dokter',[DokterController::class,'index']);
Route::post('dokter/tambah',[DokterController::class,'tambah']);
Route::post('dokter/hapus',[DokterController::class,'hapus']);
Route::post('dokter/edit',[DokterController::class,'edit']);

Route::get('jaga',[JagaController::class,'index']);
Route::post('jaga/tambah',[JagaController::class,'tambah']);
Route::post('jaga/hapus',[JagaController::class,'hapus']);
Route::post('jaga/edit',[JagaController::class,'edit']);

Route::get('spesialis',[SpesialisController::class,'index']);
Route::post('spesialis/tambah',[SpesialisController::class,'tambah']);
Route::post('spesialis/hapus',[SpesialisController::class,'hapus']);
Route::post('spesialis/edit',[SpesialisController::class,'edit']);