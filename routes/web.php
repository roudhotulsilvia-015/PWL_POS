<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Models\KategoriModel;
use App\Models\LevelModel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/level', [LevelModel::class, 'index']);
Route::get('/kategori', [KategoriModel::class, 'index']);

// --- GROUP ROUTE USER ---

// Menampilkan Tabel Data User
Route::get('/user', [UserController::class, 'index']); 
Route::get('/user/tambah', [UserController::class, 'tambah']);          // Tampilkan Form (Tadi kamu kurang ini)
Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']); // Proses Simpan (Sesuaikan nama method)  
Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);        // Tampilkan Form Edit (Tadi kamu pakai PUT, harusnya GET)
Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']); // Proses Update (Sesuaikan nama method)
Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);

Route::get('/',[WelcomeController::class, 'index']);
Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']);          // menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list']);       // menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [UserController::class, 'create']);   // menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']);         // menyimpan data user baru
    Route::get('/create_ajax', [UserController::class, 'create_ajax']); // menampilkan halaman form tambah user dengan modal        
    Route::post('/ajax', [UserController::class, 'store_ajax']); // menyimpan data user baru dari ajax
    Route::get('/{id}/show_ajax', [UserController::class, 'show']);       // menampilkan detail user dengan ajax
    Route::get('/{id}/edit_ajax', [UserController::class, 'edit']);  // menampilkan halaman form edit user dengan ajax
    Route::post('/{id}/update_ajax', [UserController::class, 'update_ajax']);     // menyimpan perubahan data user dari ajax
    Route::get('/{id}', [UserController::class, 'show']);       // menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']);  // menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']);     // menyimpan perubahan data user
    Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete user Ajax
    Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']); // Untuk hapus data user Ajax
    Route::delete('/{id}', [UserController::class, 'destroy']); // menghapus data user
});

Route::get('/kategori', [KategoriController::class, 'index']);
Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', [KategoriController::class, 'index']);          // menampilkan halaman awal kategori
    Route::post('/list', [KategoriController::class, 'list']);       // menampilkan data kategori dalam bentuk json untuk datatables
    Route::get('/create', [KategoriController::class, 'create']);   // menampilkan halaman form tambah kategori
    Route::post('/', [KategoriController::class, 'store']);         // menyimpan data kategori baru
    Route::get('/create_ajax', [KategoriController::class, 'create_ajax']); // menampilkan halaman form tambah kategori dengan modal
    Route::post('/ajax', [KategoriController::class, 'store_ajax']); // menyimpan data kategori baru dari ajax
    Route::get('/{id}/show_ajax', [KategoriController::class, 'show']);       // menampilkan detail kategori dengan ajax
    Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit']);  // menampilkan halaman form edit kategori dengan ajax
    Route::post('/{id}/update_ajax', [KategoriController::class, 'update_ajax']);     // menyimpan perubahan data kategori dari ajax
    Route::get('/{id}', [KategoriController::class, 'show']);       // menampilkan detail kategori
    Route::get('/{id}/edit', [KategoriController::class, 'edit']);  // menampilkan halaman form edit kategori
    Route::put('/{id}', [KategoriController::class, 'update']);     // menyimpan perubahan data kategori
    Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete kategori Ajax
    Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']); // Untuk hapus data kategori Ajax
    Route::delete('/{id}', [KategoriController::class, 'destroy']); // menghapus data kategori
});

Route::get('/level', [LevelController::class, 'index']);
Route::group(['prefix' => 'level'], function () {
    Route::get('/', [LevelController::class, 'index']);          // menampilkan halaman awal level
    Route::post('/list', [LevelController::class, 'list']);       // menampilkan data level dalam bentuk json untuk datatables
    Route::get('/create', [LevelController::class, 'create']);   // menampilkan halaman form tambah level
    Route::post('/', [LevelController::class, 'store']);         // menyimpan data level baru
    Route::get('/create_ajax', [LevelController::class, 'create_ajax']); // menampilkan halaman form tambah level dengan modal
    Route::post('/ajax', [LevelController::class, 'store_ajax']); // menyimpan data level baru dari ajax
    Route::get('/{id}/show_ajax', [LevelController::class, 'show']);       // menampilkan detail level dengan ajax
    Route::get('/{id}/edit_ajax', [LevelController::class, 'edit']);  // menampilkan halaman form edit level dengan ajax
    Route::post('/{id}/update_ajax', [LevelController::class, 'update_ajax']);     // menyimpan perubahan data level dari ajax
    Route::get('/{id}', [LevelController::class, 'show']);       // menampilkan detail level
    Route::get('/{id}/edit', [LevelController::class, 'edit']);  // menampilkan halaman form edit level
    Route::put('/{id}', [LevelController::class, 'update']);     // menyimpan perubahan data level
    Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete level Ajax
    Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']); // Untuk hapus data level Ajax
    Route::delete('/{id}', [LevelController::class, 'destroy']); // menghapus data level
});     

Route::get('/supplier', [SupplierController::class, 'index']);
Route::group(['prefix' => 'supplier'], function () {
    Route::get('/', [SupplierController::class, 'index']);          // menampilkan halaman awal supplier
    Route::post('/list', [SupplierController::class, 'list']);       // menampilkan data supplier dalam bentuk json untuk datatables
    Route::get('/create', [SupplierController::class, 'create']);   // menampilkan halaman form tambah supplier
    Route::post('/', [SupplierController::class, 'store']);         // menyimpan data supplier baru
    Route::get('/create_ajax', [SupplierController::class, 'create_ajax']); // menampilkan halaman form tambah supplier dengan modal
    Route::post('/ajax', [SupplierController::class, 'store_ajax']); // menyimpan data supplier baru dari ajax
    Route::get('/{id}/show_ajax', [SupplierController::class, 'show']);       // menampilkan detail supplier dengan ajax
    Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit']);  // menampilkan halaman form edit supplier dengan ajax
    Route::post('/{id}/update_ajax', [SupplierController::class, 'update_ajax']);     // menyimpan perubahan data supplier dari ajax
    Route::get('/{id}', [SupplierController::class, 'show']);       // menampilkan detail supplier
    Route::get('/{id}/edit', [SupplierController::class, 'edit']);  // menampilkan halaman form edit supplier
    Route::put('/{id}', [SupplierController::class, 'update']);     // menyimpan perubahan data supplier
    Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete supplier Ajax
    Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']); // Untuk hapus data supplier Ajax
    Route::delete('/{id}', [SupplierController::class, 'destroy']); // menghapus data supplier
});     

Route::get('/barang', [BarangController::class, 'index']);
Route::group(['prefix' => 'barang'], function () {
    Route::get('/', [BarangController::class, 'index']);          // menampilkan halaman awal barang
    Route::post('/list', [BarangController::class, 'list']);       // menampilkan data barang dalam bentuk json untuk datatables
    Route::get('/create', [BarangController::class, 'create']);   // menampilkan halaman form tambah barang
    Route::post('/', [BarangController::class, 'store']);         // menyimpan data barang baru
    Route::get('/create_ajax', [BarangController::class, 'create_ajax']); // menampilkan halaman form tambah barang dengan modal
    Route::post('/ajax', [BarangController::class, 'store_ajax']); // menyimpan data barang baru dari ajax
    Route::get('/{id}/show_ajax', [BarangController::class, 'show']);       // menampilkan detail barang dengan ajax
    Route::get('/{id}/edit_ajax', [BarangController::class, 'edit']);  // menampilkan halaman form edit barang dengan ajax
    Route::post('/{id}/update_ajax', [BarangController::class, 'update_ajax']);     // menyimpan perubahan data barang dari ajax
    Route::get('/{id}', [BarangController::class, 'show']);       // menampilkan detail barang
    Route::get('/{id}/edit', [BarangController::class, 'edit']);  // menampilkan halaman form edit barang
    Route::put('/{id}', [BarangController::class, 'update']);     // menyimpan perubahan data barang
    Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete barang Ajax
    Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']); // Untuk hapus data barang Ajax
    Route::delete('/{id}', [BarangController::class, 'destroy']); // menghapus data barang
}); 
Route::pattern('id', '[0-9]+'); // Membatasi parameter id hanya angka
Route::get('/login', [AuthController::class, 'login'])->name('login'); // Menampilkan form login
Route::post('/login', [AuthController::class, 'postlogin']); // Proses login

Route::middleware(['auth'])->group(function () {
    Route::get('/', [WelcomeController::class, 'index']); // Redirect ke welcome setelah login
    Route::get('/logout', [AuthController::class, 'logout']); // Proses logout
    Route::get('/dashboard', [WelcomeController::class, 'index']); // Halaman dashboard (sama dengan welcome)
    // Tambahkan route lain yang membutuhkan autentikasi di sini
    });
    // artinya semua route di dalam group ini harus punya role ADM (Administrator)
Route::middleware(['authorize:ADM'])->group(function () {
    Route::get('/level', [LevelController::class, 'index']);
    Route::post('/level/list', [LevelController::class, 'list']); // untuk list json datatables
    Route::get('/level/create', [LevelController::class, 'create']);
    Route::post('/level', [LevelController::class, 'store']);
    Route::get('/level/{id}/edit', [LevelController::class, 'edit']); // untuk tampilkan form edit
    Route::put('/level/{id}', [LevelController::class, 'update']); // untuk proses update data
    Route::delete('/level/{id}', [LevelController::class, 'destroy']); // untuk proses hapus data

});