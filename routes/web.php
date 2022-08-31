<?php

use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HRIS\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HRIS\EmployeeController;

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

Route::get('/registerTenant/{package}', [RegisterController::class,'registerTenant']);
Route::post('/saveRegisterTenant', [RegisterController::class,'saveRegisterTenant']);

Route::controller(ProfileController::class)->group(function () {
    // Route::get('/profile', 'profile')->middleware('auth');
    Route::get('/profile', 'profile');
});


Route::group(['middleware' => ['web']], function () {
    Route::controller(LoginController::class)->group(function () {
        Route::post('/login/{type}', 'login');
        Route::post('/checkTenant', 'checkTenant');
        Route::get('/', 'loginView');
        Route::get('/home', 'index');
        Route::get('/loginTenant', 'loginView')->name('loginView');
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

    Route::controller(AjaxController::class)->group(function () {
        // Route::post('/ajaxRegisterSave', 'ajaxRegisterSave');
        // Route::post('/ajaxLoginDomain', 'ajaxLoginDomain');
        // Route::post('/ajaxLoginTenant', 'ajaxLoginTenant');
        // Route::post('/ajaxLoginAdmin', 'ajaxLoginAdmin');
        Route::post('/sendEmailRegister', 'sendEmailRegister');
        Route::post('/ajaxResetPass', 'ajaxResetPass');
        Route::post('/ajaxForgotDomain', 'ajaxForgotDomain');
        Route::post('/ajaxForgotPass', 'ajaxForgotPass');
    });

    Route::group(['middleware' => 'auth'], function(){
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/dashboardTenant', 'dashboardTenant')->name('dashboardTenant');
            Route::get('/dashboardHost', 'dashboardHost')->name('dashboardHost');
        });

        Route::controller(ProfileController::class)->group(function () {
            Route::get('/getProfileData', 'profileData');
            Route::post('/updateProfilePicture', 'updateProfilePicture');
            Route::post('/updateMyProfile', 'updateMyProfile');
            Route::post('/updateAddress', 'updateAddress');
            Route::post('/updateEmergency', 'updateEmergency');
            Route::post('/updateCompanion', 'updateCompanion');
            Route::post('/addCompanion', 'addCompanion');
            Route::post('/updateChildren', 'updateChildren');
            Route::post('/addParent', 'addParent');
            Route::post('/updateParent', 'updateParent');
            Route::post('/addSibling', 'addSibling');
            Route::post('/updateSibling', 'updateSibling');
            Route::post('/addChildren', 'addChildren');
            Route::get('/getParent/{id}', 'getParent');
            Route::get('/getSibling/{id}', 'getSibling');
            Route::post('/updatePass', 'updatePass');
            Route::post('/addVehicle', 'addVehicle');
            Route::post('/updateVehicle', 'updateVehicle');
            Route::delete('/deleteVehicle/{id}', 'deleteVehicle');
            Route::post('/addJobHistory', 'addJobHistory');
            Route::get('/getJobHistory', 'getJobHistory');
            Route::get('/getVehicle', 'getVehicle');
            Route::get('/getChildren/{id}', 'getChildren');
            Route::get('/getSiblingById/{id}', 'getSiblingById');
            Route::get('/getParentById/{id}', 'getParentById');
            Route::get('/getVehicleById/{id}', 'getVehicleById');
            Route::get('/myProfile', 'myProfileView');
            Route::delete('/deleteChildren/{id}', 'deleteChildren');
            Route::delete('/deleteParent/{id}', 'deleteParent');
            Route::delete('/deleteSibling/{id}', 'deleteSibling');
            Route::post('/resetPassword', 'resetPassword');


        });

        Route::controller(EmployeeController::class)->group(function () {
            Route::post('/addProfile', 'addProfile');
            Route::post('/addAddress', 'addAddress');
            Route::post('/addEmployment', 'addEmployment');
            Route::get('/getEmployee', 'getEmployee');
            Route::post('/terminateEmployment', 'terminateEmployment');
            Route::get('/employeeInfoView', 'employeeInfoView');
            Route::get('/registerEmployee', 'registerEmployeeView');
            Route::get('/editEmployee/{user_id}', 'editEmployeeView');
            Route::post('/updateEmployeeProfile', 'updateEmployeeProfile');
            Route::post('/updateEmployeeAddress', 'updateEmployeeAddress');
            Route::post('/updateEmployeeEmergency', 'updateEmployeeEmergency');
            Route::post('/addEmployeeCompanion', 'addEmployeeCompanion');
            Route::post('/updateEmployeeCompanion', 'updateEmployeeCompanion');
            Route::post('/updateEmployeeChildren', 'updateEmployeeChildren');
            Route::post('/addEmployeeChildren', 'addEmployeeChildren');
            Route::post('/addEmployeeSibling', 'addEmployeeSibling');
            Route::post('/updateEmployeeSibling', 'updateEmployeeSibling');
            Route::post('/addEmployeeParent', 'addEmployeeParent');
            Route::post('/updateEmployeeParent', 'updateEmployeeParent');
            Route::post('/updateEmployeeVehicle', 'updateVehicle');
            Route::post('/addEmployeeVehicle', 'addVehicle');
            Route::post('/addEmployment', 'addEmployment');
            Route::post('/updateEmployee', 'updateEmployee');

        });

        Route::controller(SettingController::class)->group(function () {
            Route::get('/getRole', 'getRole');
            Route::post('/updateRole/{id}', 'updateRole');
            Route::post('/createRole', 'createRole');
            Route::delete('/deleteRole/{id}', 'deleteRole');
            Route::get('/getCompany', 'getCompany');
            Route::post('/updateCompany/{id}', 'updateCompany');
            Route::post('/createCompany', 'createCompany');
            Route::delete('/deleteCompany/{id}', 'deleteCompany');
            Route::get('/getDepartment', 'getDepartment');
            Route::post('/updateDepartment/{id}', 'updateDepartment');
            Route::post('/createDepartment', 'createDepartment');
            Route::delete('/deleteDepartment/{id}', 'deleteDepartment');
            Route::get('/getUnit', 'getUnit');
            Route::post('/updateUnit/{id}', 'updateUnit');
            Route::post('/createUnit', 'createUnit');
            Route::delete('/deleteUnit/{id}', 'deleteUnit');
            Route::get('/getJobGrade', 'getJobGrade');
            Route::post('/updateJobGrade/{id}', 'updateJobGrade');
            Route::post('/createJobGrade', 'createJobGrade');
            Route::delete('/deleteJobGrade/{id}', 'deleteJobGrade');
            Route::get('/getDesignation', 'getDesignation');
            Route::post('/updateDesignation/{id}', 'updateDesignation');
            Route::post('/createDesignation', 'createDesignation');
            Route::delete('/deleteDesignation/{id}', 'deleteDesignation');
            Route::get('/getSOP', 'getSOP');
            Route::post('/updateSOP/{id}', 'updateSOP');
            Route::post('/createSOP', 'createSOP');
            Route::delete('/deleteSOP/{id}', 'deleteSOP');
            Route::get('/getPolicy', 'getPolicy');
            Route::post('/updatePolicy/{id}', 'updatePolicy');
            Route::post('/createPolicy', 'createPolicy');
            Route::delete('/deletePolicy/{id}', 'deletePolicy');
            Route::get('/getNews', 'getNews');
            Route::post('/updateNews/{id}', 'updateNews');
            Route::post('/createNews', 'createNews');
            Route::delete('/deleteNews/{id}', 'deleteNews');
            Route::post('/updateBranch/{id}', 'updateBranch');
            Route::post('/createBranch', 'createBranch');
            Route::delete('/deleteBranch/{id}', 'deleteBranch');
            Route::get('/getPhoneDirectory', 'getPhoneDirectory');
            Route::get('/setting', 'settingView');
            Route::get('/branch', 'branchView');
            Route::get('/company', 'companyView');
            Route::get('/department', 'departmentView');
            Route::get('/designation', 'designationView');
            Route::get('/jobGrade', 'jobGradeView');
            Route::get('/news', 'newsView');
            Route::get('/role', 'roleView');
            Route::get('/sop', 'sopView');
            Route::get('/unit', 'unitView');
            Route::get('/getRoleById/{id}', 'getRoleById');
            Route::get('/getCompanyById/{id}', 'getCompanyById');
            Route::get('/getDepartmentById/{id}', 'getDepartmentById');
            Route::get('/getUnitById/{id}', 'getUnitById');
            Route::get('/getBranchById/{id}', 'getBranchById');
            Route::get('/getJobGradeById/{id}', 'getJobGradeById');
            Route::get('/getDesignationById/{id}', 'getDesignationById');
            Route::get('/getPolicyById/{id}', 'getPolicyById');
            Route::get('/getSOPById/{id}', 'getSOPById');
            Route::get('/getNewsById/{id}', 'getNewsById');
            Route::get('/getEmploymentTypeById/{id}', 'getEmploymentTypeById');
            Route::get('/employmentType', 'employmentTypeView');
            Route::post('/createEmploymentType', 'createEmploymentType');
            Route::delete('/deleteEmploymentType/{id}', 'deleteEmploymentType');
            Route::post('/updateEmploymentType/{id}', 'updateEmploymentType');


        });
        Route::controller(OrganizationController::class)->group(function () {
            Route::get('/getPhoneDirectory', 'getPhoneDirectory');
            Route::get('/getOrganizationChart', 'getOrganizationChart');
            Route::get('/getDepartmentTree', 'getDepartmentTree');
            Route::get('/phoneDirectory', 'phoneDirectoryView');
            Route::get('/organizationChart', 'chartView');
            Route::get('/departmentTree', 'treeView');


        });
    });
});
// Route::group(['middleware' => ['auth']], function () {

// });

// require __DIR__.'/auth.php';
