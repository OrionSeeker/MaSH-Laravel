<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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
// Route::get('/list-kelas', [MenuController::class, 'list_kelas']);
// Route::get('/detail-kelas', [MenuController::class, 'detail_kelas']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('peserta', PesertaController::class)->middleware('can:isAdmin');
Route::resource('mentor', MentorController::class)->middleware('can:isAdmin');
Route::resource('admin', AdminController::class)->middleware('can:isAdmin');

Route::get('/kelola-user', [MenuController::class, 'kelola_user'])->middleware('can:isAdmin');

Route::get('/profile/edit', [HomeController::class, 'edit'])->name('profile.edit');
Route::post('/profile/edit', [HomeController::class, 'update'])->name('profile.update');

use App\Http\Controllers\CertificateController;
use App\Http\Controllers\KelasController;

Route::get('/certificate/{name}', [CertificateController::class, 'generateCertificate']);

Route::resource('kelas', KelasController::class)->middleware('can:isAdmin');

use App\Http\Controllers\JoinKelasController;
Route::resource('joinkelas', JoinKelasController::class);
Route::get('/detail-kelas/{id}', [JoinKelasController::class, 'show'])->name('detail-kelas.show');

Route::get('/list-kelas', [JoinKelasController::class, 'index'])->name('list-kelas');

use App\Http\Controllers\MateriController;

Route::resource('materi', MateriController::class);