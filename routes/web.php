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
use App\Http\Controllers\Report\EclaimReportController;
use App\Http\Controllers\MYLeave\MyleaveController;
use App\Http\Controllers\Eleave\EleaveController;
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
        Route::get('/loginAdmin', 'loginAdminView');
        Route::get('/registerView', 'registerView');
        Route::get('/verifiedView/{id}', 'verifiedView');
        Route::get('/forgotPassView', 'forgotPassView');
        Route::get('/forgotDomainView', 'forgotDomainView');
        Route::get('/resetPassView/{id}', 'resetPassView');
        Route::get('/resetDomainView', 'resetDomainView');
        Route::get('/logout/{type}', 'logoutTenant');
        Route::get('/selectPackage', 'selectPackage');
        Route::post('/forgotPassEmail', 'forgotPassEmail');
        Route::post('/activationEmail', 'activationEmail');
        Route::get('/activateView/{id}', 'activationView');
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

    Route::group(['middleware' => 'auth'], function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/dashboardTenant', 'dashboardTenant')->name('dashboardTenant');
            Route::get('/dashboardHost', 'dashboardHost')->name('dashboardHost');
        });

        Route::controller(ClaimApprovalController::class)->group(function () {
            Route::get('/claimApprovalView/{type}', 'claimApprovalView');
            Route::post('/updateStatusClaim/{id}/{status}/{stage}', 'updateStatusClaim');
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







            // Route::get('/dashboardHost', 'dashboardHost')->name('dashboardHost');
        });

        Route::controller(ProfileController::class)->group(function () {
            Route::get('/getProfileData', 'profileData');
            //Route::post('/updateProfilePicture', 'updateProfilePicture');
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

            Route::post('/addEducation', 'addEducation');
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
            Route::get('/getEmployeeById/{id}', 'getEmployeeById');
            Route::get('/getEmployeeByDepartmentId/{id}', 'getEmployeeByDepartmentId');
            //
            Route::post('/updateProfile_Picture/{id}', 'updateProfile_Picture');
            // hierarchy
            Route::post('/updateclaimhierarchy/{id}', 'updateclaimhierarchy');
            Route::post('/updatecashhierarchy/{id}', 'updatecashhierarchy');
            Route::post('/updateeleavehierarchy/{id}', 'updateeleavehierarchy');

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
            Route::get('/getRoleBy/{id}', 'getRoleBy');
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
            Route::get('/typeOfLogs', 'typeOfLogsView');
            Route::post('/createTypeOfLogs', 'createTypeOfLogs');
            Route::delete('/deleteTypeOfLogs/{id}', 'deleteTypeOfLogs');
            Route::get('/getTypeOfLogsById/{id}', 'getLogsById');
            Route::post('/updateTypeOfLogs/{id}', 'updateTypeOfLogs');
            Route::get('/departmentByCompanyId/{companyId}', 'departmentByCompanyId');
            Route::get('/unitByDepartmentId/{departmentId}', 'unitByDepartmentId');
            Route::get('/branchByUnitId/{unitId}', 'branchByUnitId');
            Route::get('/getActivityNamesById/{id}', 'getActivityNamesById');

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


            // eleave Leave Entitlement
            Route::get('/leaveEntitlement', 'eleaveEntitlementView');
            Route::post('/createLeaveEntitlement', 'createLeaveEntitlement');
            Route::get('/getcreateLeaveEntitlement/{id}', 'getcreateLeaveEntitlement');
            Route::post('/updateleaveEntitlement/{id}', 'updateleaveEntitlement');

            // eleave Leave Holiday
            Route::get('/holidaylist', 'holidaylistView');
            Route::post('/createholidaylist', 'createholidaylist');
            Route::get('/getcreateLeaveholiday/{id}', 'getcreateLeaveholiday');
            Route::post('/updateLeaveholiday/{id}', 'updateLeaveholiday');
            Route::delete('/deleteLeaveholiday/{id}', 'deleteLeaveholiday');
            Route::get('/updateStatusleaveholiday/{id}/{status}', 'updateStatusleaveholiday');

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
        });

        Route::controller(OrganizationController::class)->group(function () {
            Route::get('/getPhoneDirectory', 'getPhoneDirectory');
            Route::get('/getOrganizationChart', 'getOrganizationChart');
            Route::get('/getDepartmentTree', 'getDepartmentTree');
            Route::get('/phoneDirectory', 'phoneDirectoryView');
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
        });
        Route::controller(EclaimReportController::class)->group(function () {
            Route::get('/eclaimListing', 'eclaimListingView');
            Route::get('/eclaim/searchAllReport', 'reportAllView');
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
            Route::get('/getTimesheetById/{id}/{userId}', 'getTimesheetById');
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
            Route::get('/summarytimesheet', 'summarytimesheetView');
            Route::get('/summarytimesheet', 'timesheetSummaryView');
        });


        Route::controller(myClaimController::class)->group(function () {
            Route::get('/myClaimView', 'myClaimView');
            Route::get('/generalClaimView', 'generalClaimView');
            Route::get('/cashAdvanceView', 'cashAdvanceView');
            Route::get('/newMonthlyClaimView/{month}/{year}', 'newMonthlyClaimView');
            Route::post('/submitPersonalClaim', 'submitPersonalClaim');
            Route::post('/submitTravelClaim', 'submitTravelClaim');
            Route::post('/submitSubsClaim', 'submitSubsClaim');
            Route::get('/monthClaimEditView/edit/month/{id}', 'monthClaimEditView');
            Route::post('/submitMonthlyClaim/{id}', 'submitMonthlyClaim');
            Route::post('/submitCaClaim', 'submitCaClaim');
            Route::get('/appealMtcView', 'appealMtcView');
        });

        Route::controller(generalClaimController::class)->group(function () {
            Route::post('/createGeneralClaim', 'createGeneralClaim');
            Route::post('/submitGeneralClaim', 'submitGeneralClaim');
            Route::get('/editGeneralClaimView/{id}', 'editGeneralClaimView');
            Route::post('/updateGeneralClaim/{id}', 'updateGeneralClaim');
            Route::delete('/deleteGNCDetail/{id}', 'deleteGNCDetail');
            Route::post('/updateStatusGeneralClaims/{id}', 'updateStatusGeneralClaims');
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
            Route::post('/createtmyleave', 'createtmyleave');
            Route::get('/getcreatemyleave/{id}', 'getcreatemyleave');
            Route::delete('/deletemyleave/{id}', 'deletemyleave');
            Route::get('/getusermyleave/{id}', 'getusermyleave');

            //supervisor
            Route::get('/leaveAppr', 'leaveApprView');
            Route::get('/getuserleaveAppr/{id}', 'getuserleaveAppr');
            Route::post('/updatesupervisor/{id}', 'updatesupervisor');
            Route::post('/updatesupervisorreject/{id}', 'updatesupervisorreject');

            //hod
            Route::get('/leaveApprhod', 'leaveApprhodView');
            Route::get('/getuserleaveApprhod/{id}', 'getuserleaveApprhod');
            Route::post('/updatehod/{id}', 'updatehod');
            Route::post('/updatehodreject/{id}', 'updatehodreject');
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