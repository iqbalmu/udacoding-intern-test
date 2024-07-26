<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth'])->group(function() {

    Route::get('/', function () {
        return view('pages.home');
    })->name('home');

    Route::get('siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('siswa/add', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('siswa', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::get('siswa/{id}', [SiswaController::class, 'show'])->name('siswa.show');
    Route::put('siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('siswa/{id}', [SiswaController::class, 'remove'])->name('siswa.remove');

    Route::delete('/auth/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/auth/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/auth/login', [AuthController::class, 'login'])->name('login.proses');

Route::get('/auth/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/auth/register', [AuthController::class, 'register'])->name('register.proses');
