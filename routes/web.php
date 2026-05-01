<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PhotoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/                                                                                                                                          
// Praktikum 1 - Langkah 6: Ubah route '/' untuk menampilkan 'Selamat Datang'
Route::get('/', function () {return 'Selamat Datang';});

// Langkah 2: Menampilkan string Hello
Route::get('/hello', [WelcomeController::class, 'hello']);

// Langkah 4: Menampilkan string World
Route::get('/world', function () {
    return 'World';
});

// Langkah 7: Menampilkan NIM dan Nama (Silakan isi NIM kamu)
Route::get('/about', function () {
    return 'NIM: 24552021015, Nama: Roudhotul Silvia'; 
});

// Langkah 13: Route dengan parameter ID Artikel
Route::get('/articles/{id}', function ($id) {
    return "Halaman Artikel dengan ID " . $id;
});

// Praktikum 1.3 - Langkah 17: Parameter Opsional dengan Default Value
// Catatan: hilangkan route dengan spasi pada URI dan gunakan parameter opsional di bawah
Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return "Post ke-" . $postId . ", Komentar ke-" . $commentId;
});
Route::get('/user/{name?}', function ($name = 'John') {
    return 'Nama saya ' . $name;
});
Route::resource('photos', PhotoController::class);

Route::get('/greeting', [WelcomeController::class, 'greeting']);