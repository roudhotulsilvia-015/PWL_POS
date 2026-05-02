<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/level', [LevelController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);

// --- GROUP ROUTE USER ---

// Menampilkan Tabel Data User
Route::get('/user', [UserController::class, 'index']);

// Fitur Tambah
Route::get('/user/tambah', [UserController::class, 'tambah']);          // Tampilkan Form (Tadi kamu kurang ini)
Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']); // Proses Simpan (Sesuaikan nama method)

// Fitur Ubah
Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);        // Tampilkan Form Edit (Tadi kamu pakai PUT, harusnya GET)
Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']); // Proses Update

// Fitur Hapus
Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);