<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfilController;

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
    return view('auth.login');
});

Route::get('/forgetpassword', function () {

    return view('auth.forgot-password');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');






// start groupe Admin Middleware
Route::middleware(['auth', 'roles:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

//------------------------------------------------------------------


//------------------------------------------------------------------



}); // end groupe Admin Middleware


Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

// start groupe Admin Middleware
Route::middleware(['auth', 'role:profil'])->group(function () {
    Route::get('/profil/dashboard', [ProfilController::class, 'ProfilDashboard'])->name('profil.dashboard');



}); // end groupe Admin Middleware

require __DIR__.'/auth.php';
