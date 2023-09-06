<?php

use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HRIS\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Eclaim\ClaimApprovalController;
use App\Http\Controllers\Eclaim\cashAdvanceController;
use App\Http\Controllers\Eclaim\generalClaimController;
use App\Http\Controllers\Eclaim\myClaimController;
use App\Http\Controllers\HRIS\EmployeeController;
use App\Http\Controllers\Timesheet\MyTimesheetController;
use App\Http\Controllers\Project\CustomerController;
use App\Http\Controllers\Project\ProjectController;
use App\Http\Controllers\Report\ProjectReportController;
use App\Http\Controllers\Report\TimesheetReportController;
use App\Http\Controllers\Report\EleaveReportController;
use App\Http\Controllers\Report\EclaimReportController;
use App\Http\Controllers\COR\CORReportController;
use App\Http\Controllers\MYLeave\MyleaveController;
use App\Http\Controllers\Eleave\EleaveController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Storage;

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

Route::get('/registerTenant/{package}', [RegisterController::class, 'registerTenant']);
Route::post('/saveRegisterTenant', [RegisterController::class, 'saveRegisterTenant']);



Route::controller(ProfileController::class)->group(function () {
    // Route::get('/profile', 'profile')->middleware('auth');
    Route::get('/profile', 'profile');
});

// Route::get('/', 'Auth\LoginController@loginView')->name('login');
Route::group(['middleware' => ['web']], function () {
    Route::controller(LoginController::class)->group(function () {
        Route::post('/login/{type}', 'login');
        Route::post('/checkTenant', 'checkTenant');
        Route::get('/', 'loginView');
        Route::get('/home', 'index');
        Route::get('/loginTenant', 'loginView')->name('loginView');
        Route::get('/loginHost', 'loginHostView');
        Route::get('/domainView', 'domainView');
        Route::get('/domainName', 'domainNameView'); //domain name
        Route::get('/forgotDomain', 'forgotDomainView'); //forgot domain
        Route::get('/loginAdmin', 'loginAdminView');
        Route::get('/registerView', 'registerView');
        Route::get('/verifiedView/{id}', 'verifiedView');
        Route::get('/forgotPassView', 'forgotPassView');
        Route::get('/resetPassView/{id}', 'resetPassView');
        Route::get('/resetDomainView', 'resetDomainView');
        Route::get('/logout/{type}', 'logoutTenant');
        Route::get('/selectPackage', 'selectPackage');
        Route::post('/forgotPassEmail', 'forgotPassEmail');
        Route::post('/forgotDomainEmail', 'forgotDomainEmail');
        Route::post('/activationEmail', 'activationEmail');
        Route::get('/activateView/{id}', 'activationView');
    });

    Route::controller(EleaveController::class)->group(function () {
        Route::post('/bulkUploadHoliday', 'bulkUploadHoliday');
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
        Route::get('/seeder', 'seeder');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/dashboardTenant', 'dashboardTenant')->name('dashboardTenant');
            Route::get('/dashboardHost', 'dashboardHost')->name('dashboardHost');
        });

        Route::controller(ClaimApprovalController::class)->group(function () {
            Route::get('/claimApprovalView/{type}', 'claimApprovalView');
            Route::post('/updateStatusClaim/{id}/{status}/{stage}/{desc}', 'updateStatusClaim');
            Route::get('/supervisorDetailClaimView/{id}', 'supervisorDetailClaimView');
            Route::get('/getTravelById/{id}', 'getTravelById');
            Route::get('/getPersonalById/{id}', 'getPersonalById');
            Route::get('/hodDetailClaimView/{id}', 'hodDetailClaimView');
            Route::get('/getGncById/{id}', 'getGncById');
            Route::get('/financeCheckerView', 'financeCheckerView');
            Route::get('/financeCheckerDetail/{id}', 'financeCheckerDetail');
            Route::post('/updateStatusGncClaim/{id}/{status}/{stage}', 'updateStatusGncClaim');
            Route::post('/updateStatusPersonalClaim/{id}/{status}/{stage}', 'updateStatusPersonalClaim');
            Route::post('/updateStatusTravelClaim/{id}/{status}/{stage}', 'updateStatusTravelClaim');
            Route::get('/financeRecView', 'financeRecView');
            Route::get('/financeRecDetailClaimView/{id}', 'financeRecDetailClaimView');
            Route::get('/financeApprovalView', 'financeApprovalView');
            Route::get('/financeAppDetailClaimView/{id}', 'financeAppDetailClaimView');
            Route::get('/adminCheckerView', 'adminCheckerView');
            Route::get('/adminCheckerDetail/{id}', 'adminCheckerDetail');
            Route::get('/adminApprovalView', 'adminApprovalView');
            Route::get('/adminApprovalDetail/{id}', 'adminApprovalDetail');
            Route::get('/adminRecView', 'adminRecView');
            Route::get('/adminRecDetailView/{id}', 'adminRecDetailView');
            Route::get('/cashAdvanceApproverView', 'cashAdvanceApproverView');
            Route::post('/createPvNumber/{id}', 'createPvNumber');
            Route::post('/createChequeNumber/{id}', 'createChequeNumber');
            Route::get('/cashAdvanceApproverDetail/{id}/{type}', 'cashAdvanceApproverDetail');
            Route::post('/updateStatusCashAdvance/{id}/{status}/{stage}', 'updateStatusCashAdvance');
            Route::get('/cashAdvanceFcheckerView', 'cashAdvanceFcheckerView');
            Route::get('/cashAdvanceFcheckerDetail/{id}/{type}', 'cashAdvanceFcheckerDetail');
            Route::get('/cashAdvanceFapproverDetail/{id}/{type}', 'cashAdvanceFapproverDetail');
            Route::get('/cashAdvanceFrecommenderDetail/{id}/{type}', 'cashAdvanceFrecommenderDetail');

            Route::get('/cashAdvanceFrecommenderView', 'cashAdvanceFrecommenderView');
            Route::get('/cashAdvanceFapproverView', 'cashAdvanceFapproverView');

            Route::post('/createChequeNumberCa/{id}', 'createChequeNumberCa');
            Route::post('/createPvNumberCa/{id}', 'createPvNumberCa');
            Route::post('/createClearCa/{id}', 'createClearCa');
            Route::post('/approveAllClaim', 'approveAllClaim');
            Route::post('/approveAllCa', 'approveAllCa');
            Route::post('/skipAllClaim', 'skipAllClaim');
            Route::post('/skipAllClaimApp', 'skipAllClaimApp');
            Route::post('/updateTravelMtcAdminApp/{id}', 'updateTravelMtcAdminApp');
            Route::post('/updateSubsMtcAdminApp', 'updateSubsMtcAdminApp');
            Route::post('/updateOtherMtcAdminApp', 'updateOtherMtcAdminApp');
            Route::post('/updateTravelMtcSuperVApp/{id}', 'updateTravelMtcSuperVApp');
            Route::post('/updateOtherMtcSuperVApp', 'updateOtherMtcSuperVApp');
            Route::post('/updateTravelMtcSuperVRec/{id}', 'updateTravelMtcSuperVRec');
            Route::post('/updateSubsMtcSuperVRec', 'updateSubsMtcSuperVRec');
            Route::post('/updateOtherMtcSuperVRec', 'updateOtherMtcSuperVRec');
            Route::post('/updateTravelMtcFinanRec/{id}', 'updateTravelMtcFinanRec');
            Route::post('/updateSubsMtcFinanRec', 'updateSubsMtcFinanRec');
            Route::post('/updateOtherMtcFinanRec', 'updateOtherMtcFinanRec');
            Route::post('/updateTravelMtcFinanApp/{id}', 'updateTravelMtcFinanApp');
            Route::post('/updateSubsMtcFinanApp', 'updateSubsMtcFinanApp');
            Route::post('/updateOtherMtcFinanApp', 'updateOtherMtcFinanApp');
            Route::post('/updateTravelMtcFinanChk/{id}', 'updateTravelMtcFinanChk');
            Route::post('/updateSubsMtcFinanChk', 'updateSubsMtcFinanChk');
            Route::post('/updateOtherMtcFinanChk', 'updateOtherMtcFinanChk');
            Route::post('/updateSubsMtcSuperVApp', 'updateSubsMtcSuperVApp');


            ////checked
            Route::post('/updateCheckMtc/{id}/{date}/{level}', 'updateCheckMtc');



            Route::post('/updateTravelMtcAdminRec/{id}', 'updateTravelMtcAdminRec');
            Route::post('/updateSubsMtcAdminRec', 'updateSubsMtcAdminRec');
            Route::post('/updateOtherMtcAdminRec', 'updateOtherMtcAdminRec');

            // Route::get('/dashboardHost', 'dashboardHost')->name('dashboardHost');
        });

        Route::controller(ProfileController::class)->group(function () {
            Route::get('/getProfileData', 'profileData');
            Route::post('/updateMyProfile', 'updateMyProfile');
            Route::get('/getStatebyCountryProfile/{id}', 'getStatebyCountryProfile');
            Route::get('/getCitybyStateProfile/{id}', 'getCitybyStateProfile');
            Route::get('/getPostcodeByCityProfile/{id}', 'getPostcodeByCityProfile');
            Route::post('/createAddress', 'createAddress');
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
            Route::post('/addEducation', 'addEducation');
            Route::post('/addEducation2', 'addEducation2');
            Route::post('/updateEducation', 'updateEducation');
            Route::get('/getEducation/{id}', 'getEducation');
            Route::get('/getEducationById/{id}', 'getEducationById');
            Route::delete('/deleteEducation/{id}', 'deleteEducation');
            Route::post('/addOthers', 'addOthers');
            Route::post('/updateOthers', 'updateOthers');
            Route::get('/getOthers/{id}', 'getOthers');
            Route::delete('/deleteOthers/{id}', 'deleteOthers');
            Route::post('/addAddressDetails', 'addAddressDetails');
            Route::get('/getAddressDetails/{id}', 'getAddressDetails');
            Route::post('/updateAddressDetails', 'updateAddressDetails');
            Route::delete('/deleteAddressDetails/{id}', 'deleteAddressDetails');
            Route::get('/getAddressforCompanion/{id}', 'getAddressforCompanion');
            Route::get('/getSibling/{id}', 'getSibling');
            Route::post('/updatePass', 'updatePass');
            Route::post('/addVehicle', 'addVehicle');
            Route::post('/updateVehicle', 'updateVehicle');
            Route::delete('/deleteVehicle/{id}', 'deleteVehicle');
            Route::post('/addJobHistory', 'addJobHistory');
            Route::get('/getJobHistory', 'getJobHistory');
            Route::get('/getVehicle', 'getVehicle');
            Route::get('/getChildren/{id}', 'getChildren');
            Route::get('/getChildrenById/{id}', 'getChildrenById');
            Route::get('/getSiblingById/{id}', 'getSiblingById');
            Route::get('/getParent/{id}', 'getParent');
            Route::get('/getParentById/{id}', 'getParentById');
            Route::get('/getVehicleById/{id}', 'getVehicleById');
            Route::get('/view/{filename}', function ($filename) {
                $path = 'public/' . $filename;

                if (!Storage::disk('local')->exists($path)) {
                    abort(404);
                }

                $file = Storage::disk('local')->get($path);
                $mimeType = Storage::disk('local')->mimeType($path);

                $headers = [
                    'Content-Type' => $mimeType,
                    'Content-Disposition' => 'inline',
                ];

                return response($file, 200, $headers);
            })->name('view');

            Route::get('/download/{filename}', function ($filename) {
                $path = 'public/' . $filename;
                if (!Storage::disk('local')->exists($path)) {
                    abort(404);
                }
                return Storage::download($path);
            })->name('download');
            Route::get('/myProfile', 'myProfileView');
            Route::delete('/deleteChildren/{id}', 'deleteChildren');
            Route::delete('/deleteParent/{id}', 'deleteParent');
            Route::delete('/deleteSibling/{id}', 'deleteSibling');
            Route::delete('/deleteCompanion/{id}', 'deleteCompanion');
            Route::post('/resetPassword', 'resetPassword');
            Route::get('/getCompanionById/{id}', 'getCompanionById');
            Route::get('/getUserWithSelectedUser/{id}', 'getUserWithSelectedUser');
        });

        Route::controller(EmployeeController::class)->group(function () {
            Route::post('/addProfile', 'addProfile');
            Route::post('/addAddress', 'addAddress');
            Route::get('/getStatebyCountryEmployee/{id}', 'getStatebyCountryEmployee');
            Route::get('/getCitybyStateEmployee/{id}', 'getCitybyStateEmployee');
            Route::get('/getPostcodeByCityEmployee/{id}', 'getPostcodeByCityEmployee');
            Route::post('/addEmployment', 'addEmployment');
            Route::get('/getEmployee', 'getEmployee');
            Route::post('/terminateEmployment', 'terminateEmployment');
            Route::post('/cancelTerminateEmployment/{id}', 'cancelTerminateEmployment');
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
            Route::get('/getEmployeeParent/{id}', 'getEmployeeParent');
            Route::get('/getEmployeeParentById/{id}', 'getEmployeeParentById');
            Route::post('/addEmployeeSibling', 'addEmployeeSibling');
            Route::post('/updateEmployeeSibling', 'updateEmployeeSibling');
            Route::post('/addEmployeeParent', 'addEmployeeParent');
            Route::get('/getEmployeeAddressforParent/{id}', 'getEmployeeAddressforParent');
            Route::post('/updateEmployeeParent', 'updateEmployeeParent');
            Route::post('/updateEmployeeVehicle', 'updateVehicle');
            Route::post('/addEmployeeVehicle', 'addVehicle');
            Route::post('/addEmployment', 'addEmployment');
            Route::post('/updateEmployee', 'updateEmployee');
            Route::get('/getEmployeeById/{id}', 'getEmployeeById');
            Route::get('/getEmployeeByDepartmentId/{id}', 'getEmployeeByDepartmentId');
            Route::get('/getEmployeeByJobHistory', 'getEmployeeByJobHistory');
            Route::get('/getEmployeeByJobHistoryById/{id}', 'getEmployeeByJobHistoryById');
            Route::post('/updateProfile_Picture/{id}', 'updateProfile_Picture');
            Route::post('/updateclaimhierarchy/{id}', 'updateclaimhierarchy');
            Route::post('/updateeleavehierarchy/{id}', 'updateeleavehierarchy');
            Route::post('/updatecashhierarchy/{id}', 'updatecashhierarchy');
            Route::post('/updatetimehierarchy/{id}', 'updatetimehierarchy');
            Route::post('/updatetimehierarchy2/{id}', 'updatetimehierarchy2');
            Route::get('/view/{filename}', function ($filename) {
                $path = 'public/' . $filename;

                if (!Storage::disk('local')->exists($path)) {
                    abort(404);
                }

                $file = Storage::disk('local')->get($path);
                $mimeType = Storage::disk('local')->mimeType($path);

                $headers = [
                    'Content-Type' => $mimeType,
                    'Content-Disposition' => 'inline',
                ];

                return response($file, 200, $headers);
            })->name('view');

            Route::get('/getEmployeeAddressforCompanion/{id}', 'getEmployeeAddressforCompanion');

            Route::post('/addEmployeeEducation', 'addEmployeeEducation');
            Route::post('/updateEmployeeEducation', 'updateEmployeeEducation');
            Route::get('/getEmployeeEducation/{id}', 'getEmployeeEducation');
            Route::get('/getEmployeeEducationById/{id}', 'getEmployeeEducationById');
            Route::delete('/deleteEmployeeEducation/{id}', 'deleteEmployeeEducation');
            Route::post('/addEmployeeOthers', 'addEmployeeOthers');
            Route::post('/updateEmployeeOthers', 'updateEmployeeOthers');
            Route::get('/getEmployeeOthers/{id}', 'getEmployeeOthers');
            Route::delete('/deleteEmployeeOthers/{id}', 'deleteEmployeeOthers');

            Route::post('/addEmployeeAddressDetails', 'addEmployeeAddressDetails');
            Route::get('/getEmployeeAddressDetails/{id}', 'getEmployeeAddressDetails');
            Route::post('/updateEmployeeAddressDetails', 'updateEmployeeAddressDetails');
            Route::delete('/deleteEmployeeAddressDetails/{id}', 'deleteEmployeeAddressDetails');
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

            Route::get('/newRole', 'newRole');
            Route::get('/newCreateRole', 'newCreateRole');
            Route::get('/newUpdateRole/{id}', 'newUpdateRole');
            Route::get('/systemUser', 'systemUser');
            // Route::get('/systemUserCreate', 'systemUserCreate');
            Route::get('/systemUserUpdate/{id}', 'systemUserUpdate');
            Route::post('/updateSystemRole/{id}', 'updateSystemRole');
            // Route::get('/setting', 'settingView');

            Route::get('/download/{filename}', function ($filename) {
                $path = 'public/' . $filename;
                if (!Storage::disk('local')->exists($path)) {
                    abort(404);
                }
                return Storage::download($path);
            })->name('download');

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
            Route::post('/createLocation', 'createLocation');
            Route::delete('/deleteLocation/{id}', 'deleteLocation');
            Route::post('/createStateCountry', 'createStateCountry');
            Route::delete('/deleteStateCountry/{id}', 'deleteStateCountry');
            Route::get('/getPhoneDirectory', 'getPhoneDirectory');
            Route::get('/setting', 'settingView');
            Route::get('/branch', 'branchView');

            Route::get('/getStatebyCountry/{id}', 'getStatebyCountry');
            Route::get('/getCitybyState/{id}', 'getCitybyState');
            Route::get('/getPostcodeByCity/{id}', 'getPostcodeByCity');

            Route::get('/company', 'companyView');
            Route::get('/department', 'departmentView');
            Route::get('/designation', 'designationView');
            Route::get('/jobGrade', 'jobGradeView');
            Route::get('/news', 'newsView');
            Route::get('/role', 'roleView');
            Route::get('/sop', 'sopView');
            Route::get('/unit', 'unitView');
            Route::get('/location', 'locationView');
            Route::get('/getRoleById/{id}', 'getRoleById');
            Route::get('/getRoleBy/{id}', 'getRoleBy');
            Route::get('/getCompanyById/{id}', 'getCompanyById');
            Route::get('/getDepartmentById/{id}', 'getDepartmentById');
            Route::get('/getUnitById/{id}', 'getUnitById');
            Route::get('/getBranchById/{id}', 'getBranchById');
            Route::get('/getLocationById/{id}', 'getLocationById');
            Route::get('/getStateCountryById/{id}', 'getStateCountryById');
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
            Route::get('/typeOfLogs', 'typeOfLogsView');
            Route::post('/createTypeOfLogs', 'createTypeOfLogs');
            Route::delete('/deleteTypeOfLogs/{id}', 'deleteTypeOfLogs');
            Route::get('/getTypeOfLogsById/{id}', 'getLogsById');
            Route::post('/updateTypeOfLogs/{id}', 'updateTypeOfLogs');
            Route::get('/departmentByCompanyId/{companyId}', 'departmentByCompanyId');
            Route::get('/unitByDepartmentId/{departmentId}', 'unitByDepartmentId');
            Route::get('/branchByUnitId/{companyId}', 'branchByUnitId');
            Route::get('/getActivityNamesById/{id}', 'getActivityNamesById');
            Route::get('/branchByCountry/{id}', 'branchByCountry');

            // eclaim
            Route::get('/setting/eclaimGeneralView', 'eclaimGeneralView');
            Route::get('/setting/eclaimDateView', 'eclaimDateView');
            Route::get('/setting/eclaimCategoryView', 'eclaimCategoryView');
            Route::get('/setting/eclaimEntitleGroupView', 'eclaimEntitleGroupView');
            Route::get('/setting/cashAdvanceView', 'cashAdvanceView');
            Route::get('/setting/approvalConfigView', 'approvalConfigView');
            Route::get('/setting/approvalRoleView', 'approvalRoleView');
            Route::get('/setting/addClaimView', 'addClaimView');

            // Route::get('/setting/editClaimView', 'editClaimView');
            Route::get('/setting/addClaimView', 'addClaimView');
            Route::get('/setting/editClaimView/{id}', 'editClaimView');
            Route::get('/setting/eclaimEntitleGroupAddView', 'eclaimEntitleGroupAddView');
            Route::get('/setting/eclaimEntitleGroupEditView/{id}', 'eclaimEntitleGroupEditView');
            Route::post('/createSubsistance', 'createSubsistance');
            Route::post('/updateSubsistance', 'updateSubsistance');
            Route::get('/getEclaimGeneralById/{id}', 'getEclaimGeneralById');
            Route::post('/createClaimCategory', 'createClaimCategory');
            Route::post('/updateClaimCategory/{id}', 'updateClaimCategory');
            Route::delete('/deleteClaimCategory/{id}', 'deleteClaimCategory');
            Route::post('/createEntitleGroup', 'createEntitleGroup');
            Route::post('/updateEntitleGroup/{id}', 'updateEntitleGroup');
            Route::get('/updateStatusEntitleGroup/{id}/{status}', 'updateStatusEntitleGroup');
            Route::delete('/deleteEntitleGroup/{id}', 'deleteEntitleGroup');
            Route::post('/updateSubsistance/{id}', 'updateSubsistance');
            Route::delete('/deleteSubsistance/{id}', 'deleteSubsistance');
            Route::get('/claimCatById/{id}', 'claimCatById');
            Route::post('/createGeneralApprover', 'createGeneralApprover');
            Route::get('/getUserByRole/{id}', 'getUserByRole');
            Route::get('/getUserByJobGrade/{id}', 'getUserByJobGrade');
            Route::get('/getUserByUserRole/{id}', 'getUserByUserRole');
            Route::post('/createDomainList', 'createDomainList');
            Route::get('/getClaimCategoryContent/{id}', 'getClaimCategoryContent');
            Route::get('/getClaimCategoryById/{id}', 'getClaimCategoryById');
            Route::post('/updateClaimDate', 'updateClaimDate');
            Route::get('/getEntitlementContent/{id}', 'getEntitlementContent');
            Route::get('/getAccomodation', 'getAccomodation');
            Route::get('/getroleAdmin/{id}', 'getroleAdmin');
            Route::get('/getroleFinance/{id}', 'getroleFinance');
            Route::get('/getroleCA/{id}', 'getroleCA');





            // eleave Anual leave
            Route::get('/leaveAnnual', 'leaveAnnualView');
            Route::post('/updateAnualLeave', 'updateAnualLeave');
            Route::post('/updateSickLeave', 'updateSickLeave');
            Route::post('/updateCarryForward', 'updateCarryForward');


            // eleave Weekend Entitlement
            Route::get('/weekendEntitlement', 'weekendEntitlementView');
            Route::get('/getweekend/{id}', 'getweekend');
            Route::post('/updateweekend', 'updateweekend');
            Route::post('/createleaveweekend', 'createleaveweekend');

            // eleave Leave Entitlement
            Route::get('/leaveEntitlement', 'leaveEntitlementIndex');
            Route::post('/createLeaveEntitlement', 'createLeaveEntitlement');
            Route::get('/getcreateLeaveEntitlement/{id}', 'getcreateLeaveEntitlement');
            Route::post('/updateleaveEntitlement/{id}', 'updateleaveEntitlement');

            Route::post('/leaveEntitlementSelect', 'leaveEntitlementSelect');



            // eleave Leave Holiday
            Route::get('/holidaylist', 'holidaylistView');
            Route::post('/holidaylist', 'holidaylistView');
            Route::post('/createholidaylist', 'createholidaylist');
            Route::get('/getcreateLeaveholiday/{id}', 'getcreateLeaveholiday');
            Route::post('/updateLeaveholiday/{id}', 'updateLeaveholiday');
            Route::delete('/deleteLeaveholiday/{id}', 'deleteLeaveholiday');
            Route::get('/updateStatusleaveholiday/{id}/{status}', 'updateStatusleaveholiday');


            //get State Holiday
            Route::get('/getstateholiday/{id}', 'getstateholiday');
            Route::get('/getstateholidaydetail/{id}', 'getstateholidaydetail');
            Route::post('/updateholidaystate', 'updateholidaystate');


            // eleave Leave Types
            Route::get('/leavetypes', 'leavetypesView');
            Route::post('/createtypes', 'createtypes');
            Route::get('/getcreateLeavetypes/{id}', 'getcreateLeavetypes');
            Route::post('/updateLeaveleavetypes/{id}', 'updateLeaveleavetypes');
            Route::delete('/deleteLeavetypes/{id}', 'deleteLeavetypes');
            Route::get('/updateStatusleavetypes/{id}/{status}', 'updateStatusleavetypes');

            // timesheet period
            Route::get('/timesheetperiod', 'timesheetperiodView');


            Route::post('/updateEclaimSettingGeneral', 'updateEclaimSettingGeneral');
            Route::delete('/deleteClaimCategoryContent/{id}', 'deleteClaimCategoryContent');
            Route::post('/updateStatusClaimCategory/{id}/{status}', 'updateStatusClaimCategory');


            Route::get('/getClaimEntitleById/{id}/{type}', 'getClaimEntitleById');
            Route::get('/getEntitleClaimDetailById/{id}', 'getEntitleClaimDetailById');
            Route::post('/updateEntitleDetail/{id}', 'updateEntitleDetail');
            Route::post('/updateApprovalConfig/{id}', 'updateApprovalConfig');
            Route::post('/updateApprovalConfigDetail/{id}', 'updateApprovalConfigDetail');
            Route::get('/getUserByRoleId/{id}', 'getUserByRoleId');
            Route::get('/getPermissionByRoleId/{id}', 'getPermissionByRoleId');
        });

        Route::controller(OrganizationController::class)->group(function () {
            Route::get('/getPhoneDirectory', 'getPhoneDirectory');
            Route::get('/getOrganizationChart', 'getOrganizationChart');
            Route::get('/getDepartmentTree', 'getDepartmentTree');
            Route::get('/phoneDirectory', 'phoneDirectoryView');
            Route::get('/policysop', 'policysopView');
            Route::get('/organizationChart', 'chartView');
            Route::get('/departmentTree', 'treeView');
        });

        Route::controller(CustomerController::class)->group(function () {
            Route::get('/customer', 'customerView');
            Route::post('/createCustomer', 'createCustomer');
            Route::post('/updateCustomer/{id}', 'updateCustomer');
            Route::get('/getCustomerById/{id}', 'getCustomerById');
            Route::delete('/deleteCustomer/{id}', 'deleteCustomer');
            Route::post('/updateStatusCustomer/{id}/{status}', 'updateStatus');

            Route::get('/getStatebyCountry/{id}', 'getStatebyCountry');
            Route::get('/getCitybyState/{id}', 'getCitybyState');
            Route::get('/getPostcodeByCity/{id}', 'getPostcodeByCity');
        });

        Route::controller(ProjectController::class)->group(function () {
            Route::get('/projectInfo', 'projectInfoView');
            Route::post('/createProject', 'createProject');
            Route::get('/projectInfoEdit/{id}', 'projectInfoEditView');
            Route::post('/updateProject/{id}', 'updateProject');
            Route::post('/createProjectLocation', 'createProjectLocation');
            Route::get('/getProjectLocationById/{id}', 'getProjectLocationById');
            Route::post('/updateProjectLocation/{id}', 'updateProjectLocation');
            Route::delete('/deleteProjectLocation/{id}', 'deleteProjectLocation');
            Route::post('/createProjectMember', 'createProjectMember');
            Route::get('/getProjectMemberById/{id}', 'getProjectMemberById');
            Route::get('/getProjectandMemberById/{id}', 'getProjectandMemberById');
            Route::get('/getProjectbyIdDate/{id}', 'getProjectbyIdDate');
            Route::post('/updateProjectMember/{id}', 'updateProjectMember');
            Route::post('/assignProjectMember', 'assignProjectMember');
            Route::get('/projectRequest', 'projectRequestView');
            Route::get('/getRequestProjectById/{id}', 'getRequestProjectById');
            Route::post('/addRequestProject/{id}', 'addRequestProject');
            Route::post('/approveProjectMember/{id}', 'approveProjectMember');
            Route::post('/rejectProjectMember/{id}', 'rejectProjectMember');
            Route::post('/cancelProjectMember/{id}', 'cancelProjectMember');
            Route::get('/myProject', 'myProjectView');
            Route::get('/projectAssignView/{id}', 'projectAssignView');
            Route::post('/deleteAssignLocation/{id}/{member_id}', 'deleteAssignLocation');
            Route::get('/getProjectById/{id}', 'getProjectById');
            Route::get('/getLocationsProjectMemberById/{id}', 'getLocationsProjectMemberById');
            Route::get('/projectNameByCustomerId/{id}', 'projectNameByCustomerId');
            Route::get('/getRejectProject/{id}', 'getRejectProject');
            Route::get('/projectViewAssignLocation/{id}', 'projectViewAssignLocationView');
            Route::get('/projectLocTable', 'projectLocTable');
        });

        Route::controller(ProjectReportController::class)->group(function () {
            Route::get('/projectListing', 'projectListingView');
            Route::get('/projectDetail/{id}', 'projectDetail');
            Route::get('/projectFilter', 'projectFilter');
            Route::get('/getProjectByCustomerId/{customer_id}', 'getProjectByCustomerId');
            Route::get('/searchReportProject', 'searchReport');
            Route::post('/updateStatus/{id}/{status}', 'updateStatus');
        });

        Route::controller(TimesheetReportController::class)->group(function () {
            Route::get('/statusReport', 'statusReportView');
            Route::get('/employeeReport', 'employeeReportView');
            Route::get('/overtimeReport', 'overtimeReportView');
            Route::get('/getProjectByCustomerId/{customer_id}', 'getProjectByCustomerId');
            Route::get('/searchReport', 'searchReport');
            Route::post('/updateStatus/{id}/{status}', 'updateStatus');
            Route::post('/searchStatusReport', 'searchStatusReport');
            Route::post('/searchEmployeeTimesheetReport', 'searchEmployeeTimesheetReport');
            Route::post('/searchEmployeeReport', 'searchEmployeeReport');
            Route::post('/searchOvertimeReport', 'searchOvertimeReport');
            // Route::get('/getReportAllEmployee', 'getReportAllEmployee');
            Route::get('/getEmployeeNamebyDepartment/{id}', 'getEmployeeNamebyDepartment');
        });

        Route::controller(EleaveReportController::class)->group(function () {
            Route::get('/leaveReport', 'leaveReportView');
            Route::post('/searchEleaveReport', 'searchEleaveReport');
        });


        Route::controller(EclaimReportController::class)->group(function () {
            Route::get('/eclaimListing', 'eclaimListingView');
            Route::get('/cashadvanceListing', 'cashadvanceListingView');
            // Route::get('/eclaim/searchAllReport', 'reportAllView');
            Route::post('/eclaim/searchAllReport', 'reportAllView');
            Route::post('/eclaim/cashadvanceReport', 'cashadvanceReportView');
        });
        Route::controller(MyTimesheetController::class)->group(function () {
            Route::get('/myTimesheet', 'myTimesheetView');
            Route::post('/createLog', 'createLog');
            Route::post('/createEvent', 'createEvent');
            Route::get('/getEvents', 'getEvents');
            Route::get('/getLogs', 'getLogs');
            Route::get('/getTimesheet', 'getTimesheet');
            Route::get('/getLogsById/{id}', 'getLogsById');
            Route::get('/getEventById/{id}', 'getEventById');
            Route::post('/updateTimesheetLog/{id}', 'updateTimesheetLog');
            Route::post('/updateTimesheetEvent/{id}', 'updateTimesheetEvent');
            Route::get('/getLocationByProjectId/{id}', 'getLocationByProjectId');
            Route::get('/getActivityByProjectId/{id}', 'getActivityByProjectId');
            Route::get('/getActivityNamebyLogsId/{id}', 'getActivityNamebyLogsId');
            Route::get('/timesheetApproval', 'timesheetApprovalView');
            Route::delete('/deleteTimesheet/{id}', 'deleteTimesheet');
            Route::get('/updateStatusTimesheet/{id}/{status}', 'updateStatusTimesheet');
            Route::post('/submitForApproval/{userId}', 'submitForApproval');
            Route::post('/searchTimesheet', 'searchTimesheet');
            Route::post('/approveAllTimesheet', 'approveAllTimesheet');
            Route::get('/viewTimesheet/{id}/{userId}', 'viewTimesheet');
            Route::get('/viewTimesheetLeave/{userId}', 'viewTimesheetLeave');
            Route::get('/getTimesheetById/{id}/{userId}', 'getTimesheetById');
            Route::get('/getTimesheetByIdLeave/{userId}', 'getTimesheetByIdLeave');
            Route::get('/getProjectByidTimesheet/{id}', 'getProjectByidTimesheet');
            Route::get('/getActivityNameById/{id}', 'getActivityNameById');
            Route::get('/updateAttendStatus/{id}/{status}', 'updateAttendStatus');
            Route::get('/getAttendanceById/{eventId}/{userId}', 'getAttendanceById');
            Route::get('/realtimeEventTimesheet', 'realtimeEventTimesheetView');
            Route::get('/realtimeEmployeeTimesheet', 'realtimeEmployeeTimesheetView');
            Route::get('/getAttendanceByEventId/{eventId}', 'getAttendanceByEventId');
            Route::post('/searchRealtimeEventTimesheet', 'searchRealtimeEventTimesheet');
            Route::post('/deleteEvent/{id}', 'deleteEvent');
            Route::post('/deleteLog/{id}', 'deleteLog');
            Route::get('/getTimesheetamendById/{id}', 'getTimesheetamendById');
            // Route::get('/addamendreason/{id}/{status}', 'addamendreason');
            Route::post('/updatereason', 'updatereason');
            Route::get('/getParticipantNameById/{id}', 'getParticipantNameById');
            Route::get('/getConfirmSubmitById/{id}', 'getConfirmSubmitById');
            //SUMMARY TIMESHEET
            // Route::get('/summarytimesheet', 'summarytimesheetView');
            Route::get('/summarytimesheet', 'timesheetSummaryView');
            //appeal
            Route::post('/createAppeal', 'createAppeal');
            Route::get('/getAppealidList', 'getAppealidList');
            Route::get('/appealtimesheet', 'appealtimesheetview');
            Route::get('/updateStatusappeal/{id}/{status}', 'updateStatusappeal');
            Route::get('/getAppealById/{id}', 'getAppealById');
            Route::post('/approveAllTimesheetAppeal', 'approveAllTimesheetAppeal');
            Route::get('/getApproverAppeal', 'getApproverAppeal');
            Route::get('/getStateById/{id}', 'getStateById');
            Route::get('/getWorkingHourWeekendbyState/{stateid}', 'getWorkingHourWeekendbyState');
            Route::post('/updatereasonreaject/{id}', 'updatereasonreaject');
        });


        Route::controller(myClaimController::class)->group(function () {
            Route::get('/myClaimView', 'myClaimView');
            Route::get('/generalClaimView', 'generalClaimView');
            Route::get('/cashAdvanceView', 'cashAdvanceView');
            Route::get('/viewMtcClaim/{id}', 'viewMtcClaim');
            Route::get('/newMonthlyClaimView/{month}/{year}', 'newMonthlyClaimView');
            Route::post('/submitPersonalClaim', 'submitPersonalClaim');
            Route::post('/submitTravelClaim', 'submitTravelClaim');
            Route::post('/submitSubsClaim', 'submitSubsClaim');
            Route::get('/monthClaimEditView/edit/month/{id}', 'monthClaimEditView');
            Route::post('/submitMonthlyClaim/{id}/{desc}', 'submitMonthlyClaim');
            Route::post('/submitCaClaim', 'submitCaClaim');
            Route::get('/appealMtcView', 'appealMtcView');
            Route::post('/appealMtc', 'createAppealMtc');
            Route::post('/approveAppealMtc/{id}', 'approveAppealMtc');
            Route::post('/rejectAppealMtc/{id}', 'rejectAppealMtc');
            Route::post('/cancelGNC/{id}', 'cancelGNC');
            Route::post('/cancelMTC/{id}', 'cancelMTC');
            Route::get('/getTravelDataByGeneralId/{id}/{date}', 'getTravelDataByGeneralId');
            Route::get('/getSubsDataByGeneralId/{id}', 'getSubsDataByGeneralId');
            Route::get('/getProjectNameById/{id}', 'getProjectNameById');
            Route::get('/getOthersDataByGeneralId/{id}', 'getOthersDataByGeneralId');
            Route::get('/getClaimCategoryNameById/{id}', 'getClaimCategoryNameById');
            Route::post('/updateOtherMtc', 'updateOtherMtc');
            Route::post('/updateSubsMtc', 'updateSubsMtc');
            Route::post('/updateTravelMtc/{id}', 'updateTravelMtc');
            Route::post('/saveTravellingAttachment', 'saveTravellingAttachment');
            Route::post('/saveSubsAttachment', 'saveSubsAttachment');
            Route::get('/getStartTimeDrop/{id}', 'getStartTimeDrop');
            Route::get('/getEndTimeDrop/{id}', 'getEndTimeDrop');
            Route::get('/monthlyClaimView/{id}', 'monthlyClaimView');
            Route::post('/updateCashMtc', 'updateCashMtc');
        });

        Route::controller(generalClaimController::class)->group(function () {
            Route::post('/createGeneralClaim', 'createGeneralClaim');
            Route::post('/submitGeneralClaim', 'submitGeneralClaim');
            Route::get('/editGeneralClaimView/{id}', 'editGeneralClaimView');
            Route::post('/updateGeneralClaim/{id}', 'updateGeneralClaim');
            Route::delete('/deleteGNCDetail/{id}', 'deleteGNCDetail');
            Route::delete('/deletePersonalDetail/{id}', 'deletePersonalDetail');
            Route::delete('/deleteTravelAttachment/{id}', 'deleteTravelAttachment');
            Route::delete('/deleteSubsAttachment/{id}', 'deleteSubsAttachment');
            Route::delete('/deleteTravelDetail/{id}', 'deleteTravelDetail');
            Route::post('/updateStatusGeneralClaims/{id}/{desc}', 'updateStatusGeneralClaims');
            Route::get('/viewGeneralClaim/{id}', 'viewGeneralClaim');
            Route::get('/getClaimContentById/{id}', 'getClaimContentById');
        });

        Route::controller(cashAdvanceController::class)->group(function () {
            Route::post('/createCashAdvance', 'createCashAdvance');
            Route::get('/viewCashAdvance/{id}', 'viewCashAdvance');
            Route::post('/submitCashAdvance', 'submitCashAdvance');
            Route::delete('/cancelCashClaim/{id}', 'cancelCashClaim');
            Route::get('/editCashAdvance/{id}', 'editCashAdvance');
            Route::post('/updateCashAdvance', 'updateCashAdvance');
            Route::post('/submitUpdateCashAdvance', 'submitUpdateCashAdvance');
        });

        // MYLEAVE

        Route::controller(MyleaveController::class)->group(function () {

            //myleave
            Route::get('/myleave', 'myleaveView');
            Route::post('/myleave', 'myleaveView');
            Route::post('/createtmyleave', 'createtmyleave');
            Route::get('/getcreatemyleave/{id}', 'getcreatemyleave');
            Route::delete('/deletemyleave/{id}', 'deletemyleave');
            Route::get('/getusermyleave/{id}', 'getusermyleave');
            Route::get('/getpieleave', 'getpieleave');
            Route::get('/getpieleave2', 'getpieleave2');
            Route::get('/getEarnedLeave', 'getEarnedLeave');
            Route::get('/getLapseLeave', 'getLapseLeave');
            Route::get('/totalNoPaidLeave', 'totalNoPaidLeave');


            Route::get('/checkLeaveEntitlement', 'checkLeaveEntitlement');



            //checking holiday

            Route::get('/myholiday/{date}', 'myholiday');

            //seaching myleave
            Route::post('/searchmyleavehistory', 'searchmyleavehistory');

            //supervisor
            Route::get('/leaveRecommender', 'leaveRecommenderIndex');
            Route::post('/leaveRecommender', 'leaveRecommenderIndex');
            Route::get('/getuserRecommender/{id}', 'getuserRecommender');
            Route::get('/getuserRecommenderView/{id}', 'getuserRecommenderView');
            Route::post('/updateRecommender/{id}', 'updateRecommender');
            Route::post('/updateRecommenderReject/{id}', 'updateRecommenderReject');

            //hod
            Route::get('/leaveApprover', 'leaveApproverIndex');
            Route::post('/leaveApprover', 'leaveApproverIndex');
            Route::get('/getuserleaveApprhod/{id}', 'getuserleaveApprhod');
            Route::get('/getuserleaveApprhodview/{id}', 'getuserleaveApprhodview');
            Route::post('/updatehod/{id}', 'updatehod');
            Route::post('/updatehodreject/{id}', 'updatehodreject');
        });

        Route::controller(CORReportController::class)->group(function () {
            Route::get('/corlisting', 'corlisting');
            Route::post('/searchcor', 'searchcor');
        });

        Route::controller(NotificationController::class)->group(function () {
            Route::get('/send-notification', 'sendGeneralNotification');
            Route::post('/markNotification', 'markNotification');
            // Route::post('/searchcor', 'searchcor');
        });
    });
});
// Route::group(['middleware' => ['auth']], function () {

// });

// require __DIR__.'/auth.php';


//

Route::get('org/chartchild', function () {
    return view('pages.org.chartchild');
});

Route::get('org/charthumanresource', function () {
    return view('pages.org.childChartHumanResource');
});

Route::get('org/childfinancialaccounting', function () {
    return view('pages.org.childFinancialAccounting');
});

Route::get('org/childfinancialaccounting', function () {
    return view('pages.org.childFinancialAccounting');
});

Route::get('org/childinternalaudit', function () {
    return view('pages.org.childInternalAudit');
});