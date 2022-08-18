<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HRIS\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisterController;

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


Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'loginView');
    Route::get('/home', 'index');
    Route::get('/loginTenant', 'loginView')->name('login');
    Route::get('/loginHost', 'loginHostView');
    Route::get('/domainView', 'domainView');
    Route::get('/loginAdmin', 'loginAdminView');
    Route::get('/registerView', 'registerView');
    Route::get('/verifiedView/{id}', 'verifiedView');
    Route::get('/forgotPassView', 'forgotPassView');
    Route::get('/forgotDomainView', 'forgotDomainView');
    Route::get('/resetPassView/{id}', 'resetPassView');
    Route::get('/resetDomainView', 'resetDomainView');
    Route::get('/logout/{type}', 'logoutTenant');
    Route::get('/selectPackage', 'selectPackage');
});
Route::get('/registerTenant/{package}', [RegisterController::class,'registerTenant']);

Route::controller(ProfileController::class)->group(function () {
    // Route::get('/profile', 'profile')->middleware('auth');
    Route::get('/profile', 'profile');
});

// Route::middleware(['auth:sanctum'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        // Route::get('/profile', 'profile')->middleware('auth');
        Route::get('/dashboardTenant', 'dashboardTenant')->name('dashboardTenant');
        Route::get('/dashboardHost', 'dashboardHost')->name('dashboardHost');
    });
// });

