<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\FicheController;

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
/*Route::group(['namespace' => 'Front'], function () {
    Route::get('/', 'HomeController@index');

});*/
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/fiches', [HomeController::class, 'fiches'])->name('fiches');
Route::post('/profils', [ProfilController::class, 'store'])->name('profils.store');
Route::put('/profils/{id}', [ProfilController::class, 'update'])->name('profils.update');
Route::put('/profils/{id}/toggle-status', [ProfilController::class, 'toggleStatus'])->name('profils.toggleStatus');
Route::post('/fiches-add', [FicheController::class, 'store'])->name('fiches.store');

