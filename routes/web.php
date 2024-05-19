<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\MentorController;

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

Route::get('/', function () {
    return view('beranda');
}); 
Route::get('/beranda', [MenuController::class, 'home']);
Route::get('/list-kelas', [MenuController::class, 'list_kelas']);
Route::get('/detail-kelas', [MenuController::class, 'detail_kelas']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('peserta', PesertaController::class);
Route::resource('mentor', MentorController::class);