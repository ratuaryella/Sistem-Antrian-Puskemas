<?php

use App\Http\Controllers\PoliController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AntriansController;
use App\Http\Controllers\NewPasswordController;
use App\Http\Controllers\DokterController;



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

Route::resource('/posts', AntriansController::class);
Route::get('/', [UserController::class, 'index'])->name('/');
Route::get('/register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('/logout');
Route::get('/forgot-password', [NewPasswordController::class, 'showFormForgotPass'])->name('forgot-password');
Route::post('/forgot-password', [NewPasswordController::class, 'forgotPassword']);
Route::get('/token', [NewPasswordController::class, 'token'])->name('token');
Route::get('/reset-password', [NewPasswordController::class, 'showFormResetPass'])->name('reset-password');
Route::post('/reset-password', [NewPasswordController::class, 'reset']);
// Route::resource('/poli', PoliController::class);


//Admin
Route::get('/admin', [AdminController::class, 'index'])->name('/admin');
Route::get('/kelola-antrian', [AdminController::class, 'kelolaAntrian'])->name('/kelola-antrian');
Route::get('/kelola-dokter', [AdminController::class, 'kelolaDokter']);
Route::get('/kelola-poli', [AdminController::class, 'kelolaPoli']);
Route::post('add-poli', [PoliController::class, 'store']);
Route::get('edit-poli/{id}', [PoliController::class, 'edit']);
Route::put('update-poli', [PoliController::class, 'update']);
Route::delete('delete-poli', [PoliController::class, 'destroy']);

Route::post('add-dokter', [AdminController::class, 'store']);
Route::get('edit-dokter/{id}', [AdminController::class, 'edit']);
Route::put('update-dokter', [AdminController::class, 'update']);
Route::delete('delete-dokter', [AdminController::class, 'destroy']);
Route::put('update-antrian', [AntriansController::class, 'update_antrian']);


//Route::resource('/poli', PoliController::class);

//dokter
Route::get('/dokter', [DokterController::class, 'index'])->name('/dokter');
Route::post('/ubah-status', [DokterController::class, 'updateStatus'])->name('/ubah-status');
