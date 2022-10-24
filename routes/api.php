<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\HRIS\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;

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


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('getSibling', [ProfileController::class, 'getSibling']);
});
// Route::group(['middleware' => ['web']], function () {
//     Route::controller(LoginController::class)->group(function () {
//         Route::post('/login', 'loginTenant');
//         Route::post('/loginHost', 'loginHost');
//         Route::post('/checkTenant', 'checkTenant');
//     });
// });


Route::controller(RegisterController::class)->group(function () {
    Route::post('/saveRegisterTenant', 'saveRegisterTenant');
    // Route::post('/checkTenant', 'checkTenant');
});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::controller(AjaxController::class)->group(function () {
//     Route::post('/ajaxRegisterSave', 'ajaxRegisterSave');
//     Route::post('/ajaxLoginDomain', 'ajaxLoginDomain');
//     Route::post('/ajaxLoginTenant', 'ajaxLoginTenant');
//     Route::post('/ajaxLoginAdmin', 'ajaxLoginAdmin');
//     Route::post('/sendEmailRegister', 'sendEmailRegister');
//     Route::post('/ajaxResetPass', 'ajaxResetPass');
//     Route::get('/ajaxGetVehicle', 'ajaxGetVehicle');
//     Route::post('/ajaxForgotDomain', 'ajaxForgotDomain');
//     Route::post('/ajaxForgotPass', 'ajaxForgotPass');
// });

// Route::controller(ProfileController::class)->group(function () {
//     Route::get('/getProfileData', 'profileData');
//     Route::post('/updateProfilePicture', 'updateProfilePicture');
//     Route::post('/updateMyProfile', 'updateMyProfile');
//     Route::post('/updateAddress', 'updateAddress');
//     Route::post('/updateEmergency', 'updateEmergency');
//     Route::post('/updateCompanion', 'updateCompanion');
//     Route::post('/updateChildren', 'updateChildren');
//     Route::post('/addParent', 'addParent');
//     Route::post('/addSibling', 'addSibling');
//     Route::get('/getParent', 'getParent');
//     Route::get('/getSibling', 'getSibling');
//     Route::post('/updatePass', 'updatePass');
//     Route::post('/addVehicle', 'addVehicle');
//     Route::post('/updateVehicle', 'updateVehicle');
//     Route::delete('/deleteVehicle/{id}', 'deleteVehicle');
// });
