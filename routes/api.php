<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AntrianController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PoliController;
use App\Http\Controllers\Api\EmailVerificationController;
use App\Http\Controllers\Api\NewPasswordController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::post('email/verification-notification', [EmailVerificationController::class, 'sendVerificationEmail'])->middleware('auth:sanctum');
Route::get('verify-email/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify')->middleware('auth:sanctum');

Route::post('forgot-password', [NewPasswordController::class, 'forgotPassword']);
Route::post('reset', [NewPasswordController::class, 'reset']);


Route::get('poli', [PoliController::class, 'getAllPoli']);
Route::post('tambah', [PoliController::class, 'addAntrian']);

Route::get('antrian', [AntrianController::class, 'showAntrianById']);
Route::get('antrian-byPoli', [AntrianController::class, 'getAllAntrianByPoli']);
Route::post('ubah-status', [AntrianController::class, 'updateStatus']);
Route::get('riwayat', [AntrianController::class, 'riwayat']);

//Route::resource('antrian', AntrianController::class);
Route::get('all-poli', [PoliController::class, 'getAllPoli']);
