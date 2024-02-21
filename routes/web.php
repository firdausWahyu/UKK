<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PeminjamanController;

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



 
Route::get('/login', [PetugasController::class, 'index']);
Route::post('/login', [PetugasController::class, 'login']);

    Route::get('/', [UserController::class, 'index']);
    Route::get('/user', [UserController::class, 'show']);
    Route::post('/user-create', [UserController::class, 'store']);
    Route::get('/user-{id}-update', [UserController::class, 'update']);
    Route::put('/user-{id}-update', [UserController::class, 'edit']);
    Route::delete('/user-{id}-delete', [UserController::class, 'destroy']);
    
    Route::get('/buku', [BukuController::class, 'index']);
    Route::post('/buku-create', [BukuController::class, 'store']);
    Route::get('/buku-{id}-update', [BukuController::class, 'update']);
    Route::put('/buku-{id}-update', [BukuController::class, 'edit']);
    Route::delete('/buku-{id}-delete', [BukuController::class, 'destroy']);
    
    Route::get('/peminjaman', [PeminjamanController::class, 'index']);
    Route::post('/peminjaman-create', [PeminjamanController::class, 'store']);
    Route::get('/peminjaman-{id}-update', [PeminjamanController::class, 'update']);
    Route::put('/peminjaman-{id}-update', [PeminjamanController::class, 'edit']);
    Route::delete('/peminjaman-{id}-delete', [PeminjamanController::class, 'destroy']);

