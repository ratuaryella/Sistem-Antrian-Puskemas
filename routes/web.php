<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AntriansController;
use Carbon\Carbon;
use App\Models\Antrians;

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

Route::get('/greeting', function () {

    $tanggal = Carbon::now()->toDateString();
    $tanggal_terakhir = Antrians::all()->last()->get('tanggal');
    $data = json_encode($tanggal_terakhir);


    if ($data == $tanggal) {
        return "true";
    } else {

        return var_dump($data);
    }
});



Route::get('/', [UserController::class, 'index'])->name('/');
Route::get('/register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
