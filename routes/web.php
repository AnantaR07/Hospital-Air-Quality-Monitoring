<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChangeController;
use App\Http\Controllers\TelegramController;
use App\Http\Controllers\SensorController;

// Route untuk halaman utama (homepage)
Route::get('/', function () {
    return view('homepage');
})->name('homepage');

// Route untuk menampilkan data sensor ke website
Route::get('/', [HomeController::class, 'index'])->name('homepage');

// Route untuk halaman (tentang kami)
Route::get('/tentangkami', function () {
    return view('tentangkami');
})->name('tentangkami');

// Route untuk halaman (kontak)
Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

// Route untuk halaman login admin
Route::get('/adm/adminLogin', function () {
    return view('adm.adminLogin'); // Pastikan untuk menambahkan 'adm.' sebelum 'adminLogin'
})->name('adminLogin');

// Route untuk login admin
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Route untuk menampilkan data admin
Route::get('/adm/adminHomepage', [AdminController::class, 'index_admin'])->name('adminHomepage');

// Route untuk Ubah Data Admin
Route::post('/adminUpdate', [ChangeController::class, 'adminUpdate'])->name('adminUpdate');


// Route untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Route untuk halaman bot Telegram
Route::get('/botTelegram', function () {
    return view('botTelegram');
})->name('botTelegram');


Route::get('/botTelegram', [TelegramController::class, 'index'])->name('botTelegram');
Route::post('/sendMessage', [TelegramController::class, 'sendMessage'])->name('sendMessage');

Route::post('/sensor', [SensorController::class, 'store']);
Route::get('/sensor/check', [SensorController::class, 'checkNewData']);

