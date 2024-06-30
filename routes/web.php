<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DendaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});
Route::get('/nomor1', function () {
    return view('nomor1');
});
Route::get('/nomor2', [Controller::class, 'index']);
Route::get('/nomor3', [DendaController::class, 'index']);
Route::get('/tambah', [DendaController::class, 'create']);
Route::post('/tambah', [DendaController::class, 'store']);
Route::get('/bayar/{id}', [DendaController::class, 'show_bayar']);
Route::put('/bayar/{id}', [DendaController::class, 'bayar']);
Route::get('/kembalikan/{id}', [DendaController::class, 'show_kembalikan']);
Route::put('/kembalikan/{id}', [DendaController::class, 'kembalikan']);
