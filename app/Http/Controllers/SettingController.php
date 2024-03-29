<?php

namespace App\Http\Controllers;

use App\Service\myClaimService;
use App\Service\SettingService;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{

    public function getRole()
    {
        $ss = new SettingService;

        $result = $ss->getRole();

        return response()->json($result);
    }

    public function createRole(Request $r)
    {
        $ss = new SettingService;

        $result = $ss->createRole($r);

        return response()->json($result);
    }

    public function updateRole(Request $r, $id)
    {
        $ss = new SettingService;

        $result = $ss->updateRole($r, $id);

        return response()->json($result);
    }

    public function deleteRole($id)
    {
        $ss = new SettingService;

        $result = $ss->deleteRole($id);

        return response()->json($result);
    }

    public function getCompany()
    {
        $ss = new SettingService;

        $result = $ss->getCompany();

        return response()->json($result);
    }

    public function createCompany(Request $r)
    {
        $ss = new SettingService;

        $result = $ss->createCompany($r);

        return response()->json($result);
    }

    public function updateCompany(Request $r, $id)
    {
        $ss = new SettingService;

        $result = $ss->updateCompany($r, $id);

        return response()->json($result);
    }

    public function deleteCompany($id)
    {
        $ss = new SettingService;

        $result = $ss->deleteCompany($id);

        return response()->json($result);
    }

    public function getDepartment()
    {
        $ss = new SettingService;

        $result = $ss->getDepartment();

        return response()->json($result);
    }

    public function createDepartment(Request $r)
    {
        $ss = new SettingService;

        $result = $ss->createDepartment($r);

        return response()->json($result);
    }

    public function updateDepartment(Request $r, $id)
    {
        $ss = new SettingService;

        $result = $ss->updateDepartment($r, $id);

        return response()->json($result);
    }

    public function deleteDepartment($id)
    {
        $ss = new SettingService;

        $result = $ss->deleteDepartment($id);

        return response()->json($result);
    }

    public function getUnit()
    {
        $ss = new SettingService;

        $result = $ss->getUnit();

        return response()->json($result);
    }

    public function createUnit(Request $r)
    {
        $ss = new SettingService;

        $result = $ss->createUnit($r);

        return response()->json($result);
    }

    public function updateUnit(Request $r, $id)
    {
        $ss = new SettingService;

        $result = $ss->updateUnit($r, $id);

        return response()->json($result);
    }

    public function deleteUnit($id)
    {
        $ss = new SettingService;

        $result = $ss->deleteUnit($id);

        return response()->json($result);
    }

    public function getBranch()
    {
        $ss = new SettingService;

        $result = $ss->getBranch();

        return response()->json($result);
    }

    public function createBranch(Request $r)
    {
        $ss = new SettingService;

        $result = $ss->createBranch($r);
        return response()->json($result);
    }

    public function updateBranch(Request $r, $id)
    {
        $ss = new SettingService;

        $result = $ss->updateBranch($r, $id);
        return response()->json($result);
    }

    public function deleteBranch($id)
    {
        $ss = new SettingService;

        $result = $ss->deleteBranch($id);

        return response()->json($result);
    }

    public function getStateCountry()
    {
        $ss = new SettingService;

        $result = $ss->getStateCountry();

        return response()->json($result);
    }

    public function createStateCountry(Request $r)
    {
        $ss = new SettingService;

        $result = $ss->createStateCountry($r);

        return response()->json($result);
    }

    public function updateStateCountry(Request $r, $id)
    {
        $ss = new SettingService;

        $result = $ss->updateStateCountry($r, $id);

        return response()->json($result);
    }

    public function deleteStateCountry($id)
    {
        $ss = new SettingService;

        $result = $ss->deleteStateCountry($id);

        return response()->json($result);
    }

    public function getLocation()
    {
        $ss = new SettingService;

        $result = $ss->getLocation();

        return response()->json($result);
    }

    public function createLocation(Request $r)
    {
        $ss = new SettingService;

        $result = $ss->createLocation($r);

        return response()->json($result);
    }

    public function updateLocation(Request $r, $id)
    {
        $ss = new SettingService;

        $result = $ss->updateLocation($r, $id);

        return response()->json($result);
    }

    public function deleteLocation($id)
    {
        $ss = new SettingService;

        $result = $ss->deleteLocation($id);

        return response()->json($result);
    }

    public function getJobGrade()
    {
        $ss = new SettingService;

        $result = $ss->getJobGrade();

        return response()->json($result);
    }

    public function createJobGrade(Request $r)
    {
        $ss = new SettingService;

        $result = $ss->createJobGrade($r);

        return response()->json($result);
    }

    public function updateJobGrade(Request $r, $id)
    {
        $ss = new SettingService;

        $result = $ss->updateJobGrade($r, $id);

        return response()->json($result);
    }

    public function deleteJobGrade($id)
    {
        $ss = new SettingService;

        $result = $ss->deleteJobGrade($id);

        return response()->json($result);
    }

    public function getDesignation()
    {
        $ss = new SettingService;

        $result = $ss->getDesignation();

        return response()->json($result);
    }

    public function createDesignation(Request $r)
    {
        $ss = new SettingService;

        $result = $ss->createDesignation($r);

        return response()->json($result);
    }

    public function updateDesignation(Request $r, $id)
    {
        $ss = new SettingService;

        $result = $ss->updateDesignation($r, $id);

        return response()->json($result);
    }

    public function deleteDesignation($id)
    {
        $ss = new SettingService;

        $result = $ss->deleteDesignation($id);

        return response()->json($result);
    }

    public function getSOP(Request $r, $id)
    {
        $ss = new SettingService;

        $result = $ss->getSOP();

        return response()->json($result);
    }

    public function createSOP(Request $r)
    {
        $ss = new SettingService;

        $result = $ss->createSOP($r);

        return response()->json($result);
    }

    public function updateSOP(Request $r, $id)
    {
        $ss = new SettingService;

        $result = $ss->updateSOP($r, $id);

        return response()->json($result);
    }

    public function deleteSOP($id)
    {
        $ss = new SettingService;

        $result = $ss->deleteSOP($id);

        return response()->json($result);
    }

    public function getPolicy()
    {
        $ss = new SettingService;

        $result = $ss->getPolicy();

        return response()->json($result);
    }

    public function createPolicy(Request $r)
    {
        $ss = new SettingService;

        $result = $ss->createPolicy($r);

        return response()->json($result);
    }

    public function updatePolicy(Request $r, $id)
    {
        $ss = new SettingService;

        $result = $ss->updatePolicy($r, $id);

        return response()->json($result);
    }

    public function deletePolicy($id)
    {
        $ss = new SettingService;

        $result = $ss->deletePolicy($id);

        return response()->json($result);
    }

    public function getEmploymentType()
    {
        $ss = new SettingService;

        $result = $ss->getEmploymentType();

        return response()->json($result);
    }

    public function createEmploymentType(Request $r)
    {
        $ss = new SettingService;

        $result = $ss->createEmploymentType($r);

        return response()->json($result);
    }

    public function updateEmploymentType(Request $r, $id)
    {
        $ss = new SettingService;

        $result = $ss->updateEmploymentType($r, $id);

        return response()->json($result);
    }

    public function deleteEmploymentType($id)
    {
        $ss = new SettingService;

        $result = $ss->deleteEmploymentType($id);

        return response()->json($result);
    }

    public function getNews()
    {
        $ss = new SettingService;

        $result = $ss->getNews();

        return response()->json($result);
    }

    public function createNews(Request $r)
    {
        $ss = new SettingService;

        $result = $ss->createNews($r);

        return response()->json($result);
    }

    public function updateNews(Request $r, $id)
    {
        $ss = new SettingService;

        $result = $ss->updateNews($r, $id);

        return response()->json($result);
    }

    public function deleteNews($id)
    {
        $ss = new SettingService;

        $result = $ss->deleteNews($id);

        return response()->json($result);
    }

    public function settingView()
    {
        return view('pages.setting.dashboard');
    }

    public function branchView()
    {
        $ss = new SettingService;

        $data['branchs']  = $ss->branchView();
        $data['country'] = $ss->branchCountry();
        $data['state'] = $ss->branchState();
        $data['city'] = $ss->branchCity();
        $data['postcode'] = $ss->branchPostcode();

        return view('pages.setting.branch', $data);
    }

    public function getPostcodeByCountryBranch($id = '')
    {
        $ss = new SettingService;

        $result = $ss->getPostcodeByCountryBranch($id);

        return $result;
    }

    public function getStateAndCityByCountryBranch($id = '')
    {
        $ss = new SettingService;

        $result = $ss->getStateAndCityByCountryBranch($id);

        return $result;
    }

    public function getCitybyStateBranch($id = '')
    {
        $ss = new SettingService;

        $result = $ss->getCitybyStateBranch($id);

        return $result;
    }

    public function getPostcodeByCityBranch($id = '')
    {
        $ss = new SettingService;

        $result = $ss->getPostcodeByCityBranch($id);


        return $result;
    }

    public function locationView()
    {
        $ss = new SettingService;

        $data['locations'] = $ss->locationView();
        $data['country'] = $ss->branchCountry();
        $data['state'] = $ss->branchState();

        return view('pages.setting.location', $data);
    }

    public function employmentTypeView()
    {
        $ss = new SettingService;

        $result = $ss->employmentTypeView();

        return view('pages.setting.employmentType', $result);
    }

    public function companyView()
    {
        $ss = new SettingService;

        $result = $ss->companyView();

        return view('pages.setting.company', $result);
    }

    public function departmentView()
    {
        $ss = new SettingService;

        $result = $ss->departmentView();

        return view('pages.setting.department', $result);
    }

    public function designationView()
    {
        $ss = new SettingService;

        $result = $ss->designationView();

        return view('pages.setting.designation', $result);
    }

    public function jobGradeView()
    {
        $ss = new SettingService;

        $result = $ss->jobGradeView();

        return view('pages.setting.jobGrade', $result);
    }

    public function newsView()
    {
        $ss = new SettingService;

        $result = $ss->newsView();

        return view('pages.setting.news',$result);
    }

    public function knowledgeLib()
    {
        $ss = new SettingService;

        $result = $ss->knowledgeLibView();

        return view('pages.setting.knowledgeLibrary', $result);
    }

    public function roleView()
    {
        $ss = new SettingService;

        // $result = $ss->roleView();
        $data['roles'] = $ss->roleView();
        $data['rolestaff'] = $ss->myrolestaff();
        // $data['listuserrole'] = $ss->listuserrole();


        return view('pages.setting.role', $data);
    }

    public function sopView()
    {
        $ss = new SettingService;

        $result = $ss->sopView();
        // pr($result);

        return view('pages.setting.sop', $result);
    }

    public function unitView()
    {
        $ss = new SettingService;

        $result = $ss->UnitView();

        return view('pages.setting.unit', $result);
    }

    public function getRoleById($id = '')
    {
        $ss = new SettingService;

        $result = $ss->getRoleById($id);

        return $result;
    }

    public function getRoleBy($id = '')
    {
        $ss = new SettingService;

        $result = $ss->getRoleBy($id);

        return $result;
    }

    public function getCompanyById($id = '')
    {
        $ss = new SettingService;

        $result = $ss->getCompanyById($id);

        return $result;
    }

    public function getDepartmentById($id = '')
    {
        $ss = new SettingService;

        $result = $ss->getDepartmentById($id);

        return $result;
    }

    public function getUnitById($id = '')
    {
        $ss = new SettingService;

        $result = $ss->getUnitById($id);

        return $result;
    }

    public function getBranchById($id = '')
    {
        $ss = new SettingService;

        $result = $ss->getBranchById($id);

        return $result;
    }

    public function getLocationById($id = '')
    {
        $ss = new SettingService;

        $result = $ss->getLocationById($id);

        return $result;
    }

    public function getJobGradeById($id = '')
    {
        $ss = new SettingService;

        $result = $ss->getJobGradeById($id);

        return $result;
    }

    public function getDesignationById($id = '')
    {
        $ss = new SettingService;

        $result = $ss->getDesignationById($id);

        return $result;
    }

    public function getPolicyById($id = '')
    {
        $ss = new SettingService;

        $result = $ss->getPolicyById($id);

        return $result;
    }

    public function getSOPById($id = '')
    {
        $ss = new SettingService;

        $result = $ss->getSOPById($id);

        return $result;
    }

    public function getNewsById($id = '')
    {
        $ss = new SettingService;

        $result = $ss->getNewsById($id);

        return $result;
    }

    public function getEmploymentTypeById($id = '')
    {
        $ss = new SettingService;

        $result = $ss->getEmploymentTypeById($id);

        return $result;
    }

    public function typeOfLogsView()
    {
        $ss = new SettingService;

        $result['datas'] = $ss->getTypeOfLogsView();

        return view('pages.setting.typeOfLogs', $result);
    }

    public function createTypeOfLogs(Request $r)
    {
        $ss = new SettingService;

        $result = $ss->createTypeOfLogs($r);

        return response()->json($result);
    }

    public function deleteTypeOfLogs($id = '')
    {
        $ss = new SettingService;

        $result = $ss->deleteTypeOfLogs($id);

        return response()->json($result);
    }

    public function getLogsById($id = '')
    {
        $ss = new SettingService;

        $result = $ss->getLogsById($id);

        return $result;
    }

    public function updateTypeOfLogs(Request $r, $id)
    {
        $ss = new SettingService;

        $result = $ss->updateTypeOfLogs($r, $id);

        return response()->json($result);
    }

    public function departmentByCompanyId($id = '')
    {
        $ss = new SettingService;

        $result = $ss->departmentByCompanyId($id);

        return $result;
    }

    public function unitByDepartmentId($id = '')
    {
        $ss = new SettingService;

        $result = $ss->unitByDepartmentId($id);

        return $result;
    }

    public function branchByUnitId($id = '')
    {
        $ss = new SettingService;

        $result = $ss->branchByUnitId($id);

        return $result;
    }


    public function branchByCountry($id = '')
    {
        $ss = new SettingService;

        $result = $ss->branchByCountry($id);
        return $result;
    }

    public function getActivityNamesById($id = '')
    {
        $ss = new SettingService;

        $result = $ss->getActivityNamesById($id);

        return $result;
    }

    public function eclaimGeneralView()
    {
        $ss = new SettingService;

        $data = $ss->eclaimGeneralView();
        $result['subsistances'] = $data['subs'];
        $result['general'] = $data['general'];

        return view('pages.setting.eclaim.eclaimGeneral', $result);
    }

    public function eclaimCategoryView()
    {
        $ss = new SettingService;

        $result['claimCategorys'] = $ss->eclaimCategoryView();

        return view('pages.setting.eclaim.eclaimCategory', $result);
    }

    public function eclaimEntitleGroupView()
    {
        $ss = new SettingService;

        $result['entitles'] = $ss->eclaimEntitleGroupView();

        $result['transports'] = $ss->getAllTransportMillage();

        $result['subsistances'] = $ss->eclaimGeneralView();
        $result['claimCategorys'] = $ss->eclaimCategoryView();
        //pr($result);
        return view('pages.setting.eclaim.eclaimEntitleGroup', $result);
    }

    public function eclaimEntitleGroupAddView()
    {
        $ss = new SettingService;

        $result['datas'] = $ss->eclaimGeneralView();
        $result['subsistances'] = $ss->eclaimGeneralView();
        $result['claimCategorys'] = $ss->eclaimCategoryView();

        return view('pages.setting.eclaim.addEntitle', $result);
    }

    public function eclaimEntitleGroupEditView($id = '')
    {
        $ss = new SettingService;

        $result['entitys'] = $ss->eclaimEntitleGroupEditView($id);
        $result['transports'] = $ss->getTransportMillage($id);
        $result['claimCategorys'] = $ss->getClaimEntitleById($id, 'category');
        $result['subsistances'] = $ss->getClaimEntitleById($id, 'subs');

        return view('pages.setting.eclaim.editEntitle', $result);
    }

    public function cashAdvanceView()
    {
        $ss = new SettingService;

        $result['cashAdvance'] = $ss->eclaimCashAdvance();

        //dd($result['cashAdvance']);

        return view('pages.setting.eclaim.eclaimCashAdvance', $result);
    }

    public function updatecashAdvance($id, $status)
    {
        $ss = new SettingService;

        $result = $ss->updatecashAdvance($id, $status);

        return response()->json($result);
    }



    public function approvalConfigView()
    {
        $ss = new SettingService;

        $result['configs'] = $ss->eclaimApprovalConfig();

        return view('pages.setting.eclaim.eclaimApprovalConfig', $result);
    }

    public function approvalRoleView()
    {
        $ss = new SettingService;

        $result['datas'] = $ss->approvalRoleView();
        $result['companys'] = getCompany();
        $result['roles'] = $ss->getRoles(); //admin
        $result['rolesFinance'] = $ss->getRolesFinances();
        $result['rolesCA'] = $ss->getRolesCashA();
        return view('pages.setting.eclaim.eclaimApprovalRole', $result);
    }

    public function addClaimView()
    {
        $ss = new SettingService;

        return view('pages.setting.eclaim.addClaim');
    }

    public function createClaimCategory(Request $r)
    {
        $ss = new SettingService;

        $result = $ss->createClaimCategory($r);

        return response()->json($result);
    }

    public function updateClaimCategory(Request $r, $id)
    {
        $ss = new SettingService;

        $result = $ss->updateClaimCategory($r, $id);

        return response()->json($result);
    }

    public function editClaimView($id = '')
    {
        $ss = new SettingService;

        $result['claimCategory'] = $ss->editClaimView($id);
        // dd($result);

        return view('pages.setting.eclaim.editClaim', $result);
    }

    public function claimCatById($id = '')
    {
        $ss = new SettingService;

        $result = $ss->editClaimView($id);

        return response()->json($result);
    }

    public function eclaimDateView()
    {
        $ss = new SettingService;

        $result['data'] = $ss->getDateClaim();

        return view('pages.setting.eclaim.eclaimDate', $result);
    }

    public function getEclaimGeneralById($id = '')
    {
        $ss = new SettingService;

        $result = $ss->getEclaimGeneralById($id);

        return $result;
    }

    public function createSubsistance(Request $r)
    {
        $ss = new SettingService;

        $result = $ss->createSubsistance($r);

        return response()->json($result);
    }

    public function updateSubsistance(Request $r, $id)
    {
        $ss = new SettingService;

        $result = $ss->updateSubsistance($r, $id);

        return response()->json($result);
    }

    public function deleteSubsistance($id)
    {
        $ss = new SettingService;

        $result = $ss->deleteSubsistance($id);

        return response()->json($result);
    }

    public function deleteClaimCategory($id)
    {
        $ss = new SettingService;

        $result = $ss->deleteClaimCategory($id);

        return response()->json($result);
    }

    public function createEntitleGroup(Request $r)
    {
        $ss = new SettingService;

        $result = $ss->createEntitleGroup($r);

        return response()->json($result);
    }

    public function updateEntitleGroup(Request $r, $id)
    {
        $ss = new SettingService;

        $result = $ss->updateEntitleGroup($r, $id);

        return response()->json($result);
    }

    public function updateStatusEntitleGroup($id, $status)
    {
        $ss = new SettingService;

        $result = $ss->updateStatusEntitleGroup($id, $status);

        return response()->json($result);
    }

    public function deleteEntitleGroup($id)
    {
        $ss = new SettingService;

        $result = $ss->deleteEntitleGroup($id);

        return response()->json($result);
    }

    public function createGeneralApprover(Request $r)
    {
        $ss = new SettingService;

        $result = $ss->createGeneralApprover($r);

        return response()->json($result);
    }

    public function getUserByRole($id = '')
    {
        $result = getUserByRole($id);
        // pr($result->userProfile->id);
        return response()->json($result);
    }

    public function getUserByJobGrade($id = '')
    {
        $result = getUserByJobGrade($id);

        return response()->json($result);
    }
    public function getUserByUserRole($id = '')
    {
        $result = getUserByUserRole($id);

        return response()->json($result);
    }

    public function createDomainList(Request $r)
    {
        $ss = new SettingService;

        $result = $ss->createDomainList($r);

        return response()->json($result);
    }

    public function getClaimCategoryContent($id = '')
    {
        $data = getClaimCategoryContentByClaimId($id);

        return response()->json($data);
    }
    public function getClaimCategoryDetails($id = '')
    {
        $data = getClaimCategoryDetails($id);

        return response()->json($data);
    }
    public function getEntitlementContent($id = '')
    {
        $data = getareaContentById($id);

        return response()->json($data);
    }

    public function getAccomodation()
    {
        $mcs = new myClaimService;

        $data['user_id'] = Auth::user()->id;
        $data['area'] = $mcs->getEntitlementAreaByJobGrade($data['user_id']);

        return response()->json($data);
    }

    public function getClaimCategoryById($id = '')
    {
        $data = getClaimCategoryById($id);

        return response()->json($data);
    }

    public function leaveEntitlementIndex()
    {
        $ss = new SettingService;

        $data['entitlementActive'] = $ss->leaveEntitlementActive();
        $data['entitlementCurrent'] = $ss->leaveEntitlementCurrent();
        $data['nameStaff'] = $ss->leaveNameStaff();
        // dd($data['nameStaff']);
        // die;


        return view('pages.setting.eleave.eleaveentitlement', $data);
    }

    public function leaveAnnualView()
    {
        $ss = new SettingService;

        $data['anualLeave'] = $ss->leaveAnnualView();
        $data['sickleave'] = $ss->sickLeaveView();
        $data['carryforward'] = $ss->carryForwardView();

        return view('pages.setting.eleave.leaveAnnual', $data);
    }
    public function leaveSickView()
    {
        $ss = new SettingService;

        $data['leave'] = $ss->leaveEntitlementView();
        $data['nameStaff'] = $ss->leaveNameStaff();

        return view('pages.setting.eleave.leaveSick', $data);
    }
    public function leaveCarrForwardView()
    {
        $ss = new SettingService;

        $data['leave'] = $ss->leaveEntitlementView();
        $data['nameStaff'] = $ss->leaveNameStaff();

        return view('pages.setting.eleave.leaveCarrForward', $data);
    }
    public function weekendEntitlementView()
    {
        $ss = new SettingService;

        $data['weekend'] = $ss->weekendview();
        $data['state'] = $ss->getstate();

        // dd($data['state']);
        // // die;

        return view('pages.setting.eleave.weekendEntitlement', $data);
    }
    //module add weekend-Weekend entitlement
    public function createWeekendEntitlement(Request $r)
    {
        $ss = new SettingService;

        $result = $ss->createWeekendEntitlement($r);

        return response()->json($result);
    }

    public function createLeaveEntitlement(Request $r)
    {

        $ss = new SettingService;

        $result = $ss->createLeaveEntitlement($r);

        // dd($result);
        // die;

        return response()->json($result);
    }

    public function getcreateLeaveEntitlement($id = '')
    {
        $ss = new SettingService;

        $result = $ss->getcreateLeaveEntitlement($id);

        // dd($result);
        // die;

        return $result;
    }

    public function updateleaveEntitlement(Request $r, $id)
    {
        $ss = new SettingService;

        $result = $ss->updateleaveEntitlement($r, $id);

        return response()->json($result);
    }

    public function leaveEntitlementSelect(Request $r)
    {
        // $input = $r->input();
        // dd($input);
        // die;
        $ss = new SettingService;

        $result = $ss->leaveEntitlementSelect($r);

        return response()->json($result);
    }


    // public function eleaveEntitlementView(){
    //      return view('pages.setting.eleave.eleaveentitlement');
    // }


    public function updateClaimDate(Request $r)
    {
        $ss = new SettingService;

        $result = $ss->updateClaimDate($r);

        return response()->json($result);
    }

    public function updateStatusleaveholiday($id, $status)
    {
        $ss = new SettingService;

        $result = $ss->updateStatusleaveholiday($id, $status);

        return response()->json($result);
    }


    public function leavetypesView()
    {
        $ltv = new SettingService;

        $result = $ltv->leavetypesView();

        return view('pages.setting.eleave.leavetypes', $result);
    }



    public function createtypes(Request $r)
    {

        $clt = new SettingService;

        $result = $clt->createtypes($r);

        return response()->json($result);
    }

    public function getcreateLeavetypes($id = '')
    {
        $gclh = new SettingService;

        $result = $gclh->getcreateLeavetypes($id);

        return $result;
    }

    public function updateLeaveleavetypes(Request $r, $id)
    {
        $ss = new SettingService;

        $result = $ss->updateLeaveleavetypes($r, $id);

        return response()->json($result);
    }

    public function deleteLeavetypes($id)
    {
        $dlh = new SettingService;

        $result = $dlh->deleteLeavetypes($id);

        return response()->json($result);
    }

    public function updateStatusleavetypes($id, $status)
    {
        $ss = new SettingService;

        $result = $ss->updateStatusleavetypes($id, $status);

        return response()->json($result);
    }

    public function holidaylistView(Request $r)
    {

        $hlv = new SettingService;

        $data['holiday'] = $hlv->holidaylistView();
        $data['country'] = $hlv->country();
        $data['countrySearch'] = '';

        $input = $r->input();

        if (isset($input['countrySearch'])) {
            $data['holiday'] = $hlv->searchHolidaylist($r);
            $data['countrySearch'] = isset($input['countrySearch']) ? $input['countrySearch'] : '';
        }

        return view('pages.setting.eLeave.holidaylist', $data);
    }

    public function createholidaylist(Request $r)
    {
        // $input = $r->input();

        // dd($input);
        // die;

        $chl = new SettingService;

        $result = $chl->createholidaylist($r);

        return response()->json($result);
    }

    public function updateholidaystate(Request $r)
    {
        // $input = $r->input();

        // dd($input);
        // die;

        $chl = new SettingService;

        $result = $chl->updateholidaystate($r);

        return response()->json($result);
    }


    public function getcreateLeaveholiday($id = '')
    {
        $gclh = new SettingService;

        $result = $gclh->getcreateLeaveholiday($id);

        return $result;
    }

    public function updateLeaveholiday(Request $r, $id)
    {
        $ss = new SettingService;

        $result = $ss->updateLeaveholiday($r, $id);

        return response()->json($result);
    }

    public function deleteLeaveholiday($id)
    {
        $dlh = new SettingService;

        $result = $dlh->deleteLeaveholiday($id);
        return response()->json($result);
    }

    // timesheet period
    public function timesheetperiodView()
    {
        // $ltv = new SettingService;

        // $result = $ltv->timesheetperiodView();

        //return view('pages.setting.timesheet.settingtimesheetperiod', $result);
        return view('pages.setting.timesheet.settingtimesheetperiod');
    }

    public function updateEclaimSettingGeneral(Request $r)
    {
        $chl = new SettingService;

        $result = $chl->updateEclaimSettingGeneral($r);

        return response()->json($result);
    }

    public function deleteClaimCategoryContent($id)
    {
        $dlh = new SettingService;

        $result = $dlh->deleteClaimCategoryContent($id);

        return response()->json($result);
    }

    public function updateStatusClaimCategory($id = '', $status = '')
    {
        $dlh = new SettingService;

        $result = $dlh->updateStatusClaimCategory($id, $status);

        return response()->json($result);
    }

    public function getClaimEntitleById($id = '', $status = '')
    {
        $dlh = new SettingService;

        $result = $dlh->getClaimEntitleById($id, $status);

        return response()->json($result);
    }

    public function getEntitleClaimDetailById($id = '')
    {
        $dlh = new SettingService;

        $result = $dlh->getEntitleClaimDetailById($id);

        return response()->json($result);
    }

    public function updateEntitleDetail(Request $r, $id = '')
    {
        $dlh = new SettingService;

        $result = $dlh->updateEntitleDetail($r, $id);

        return response()->json($result);
    }

    public function updateApprovalConfig(Request $r, $id = '')
    {
        $dlh = new SettingService;

        $result = $dlh->updateApprovalConfig($r, $id);

        return response()->json($result);
    }

    public function updateApprovalConfigDetail(Request $r, $id = '')
    {
        $dlh = new SettingService;

        $result = $dlh->updateApprovalConfigDetail($r, $id);

        return response()->json($result);
    }

    public function getUserByRoleId($id = '')
    {
        $dlh = new SettingService;

        $result = $dlh->getUserByRoleId($id);

        return response()->json($result);
    }

    public function getPermissionByRoleId($id = '')
    {
        $dlh = new SettingService;

        $result = $dlh->getPermissionByRoleId($id);

        return response()->json($result);
    }

    public function updateAnualLeave(Request $r)
    {
        $input = $r->input();

        // dd($input);
        // die;

        $ss = new SettingService;

        $result = $ss->updateAnualLeave($r);

        return response()->json($result);
    }

    public function createleaveweekend(Request $r)
    {
        $input = $r->input();

        // dd($input);
        // die;

        $ss = new SettingService;

        $result = $ss->createleaveweekend($r);



        return response()->json($result);
    }
    public function updateweekend(Request $r)
    {
        $input = $r->input();

        // dd($input);
        // die;

        $ss = new SettingService;

        $result = $ss->updateweekend($r);



        return response()->json($result);
    }

    public function getweekend($id = '')
    {


        $ss = new SettingService;

        $result = $ss->getweekend($id);

        return response()->json($result);
    }

    public function updateSickLeave(Request $r)
    {
        $input = $r->input();

        // dd($input);
        // die;

        $ss = new SettingService;

        $result = $ss->updateSickLeave($r);

        return response()->json($result);
    }

    public function updateCarryForward(Request $r)
    {
        $input = $r->input();

        // dd($input);
        // die;

        $ss = new SettingService;

        $result = $ss->updateCarryForward($r);

        return response()->json($result);
    }

    public function newRole()
    {
        $ss = new SettingService;

        $result = $ss->getRole();

        return view('pages.setting.newRole', $result);
    }
    public function newCreateRole()
    {
        // $ss = new SettingService;

        $result['role'] = [];

        return view('pages.setting.newCreateRole');
    }
    public function newUpdateRole($id = '')
    {

        $result['role'] = getRoleById($id);

        return view('pages.setting.newUpdateRole', $result);
    }

    public function systemUser()
    {
        $ss = new SettingService;

        $result['users'] = $ss->systemUserData();

        return view('pages.setting.systemUser', $result);
    }
    // public function systemUserCreate()
    // {
    //     // $ss = new SettingService;

    //     // $result = $ss->systemUser();

    //     return view('pages.setting.systemUserCreate');
    // }
    public function systemUserUpdate($id = '')
    {

        $ss = new SettingService;

        $result['user'] = $ss->getUserById($id);

        return view('pages.setting.systemUserUpdate', $result);
    }


    //
    public function getstateholiday($id = '')
    {
        $gclh = new SettingService;

        $result = $gclh->getstateholiday($id);

        return $result;
    }

    public function getstateholidaydetail($id = '')
    {
        $gclh = new SettingService;

        $result = $gclh->getstateholidaydetail($id);

        return $result;
    }

    public function getroleAdmin($id = '')
    {
        $ss = new SettingService;

        $result = $ss->getroleAdmin($id);

        return $result;
    }

    public function getroleFinance($id = '')
    {
        $ss = new SettingService;

        $result = $ss->getroleFinance($id);

        return $result;
    }

    public function getroleCA($id = '')
    {
        $ss = new SettingService;

        $result = $ss->getroleCA($id);

        return $result;
    }

    public function updateSystemRole(Request $r, $id)
    {
        $ss = new SettingService;

        $result = $ss->updateSystemRole($r, $id);

        return response()->json($result);
    }

    public function createknowledgeLib(Request $r)
    {
        $ss = new SettingService;

        $result = $ss->createknowledgeLib($r);

        return response()->json($result);
    }

    public function getKnowledgebyId($id = '')
    {
        $ss = new SettingService;

        $result = $ss->getKnowledgebyId($id);

        return $result;
    }

    public function deleteKnowledgeLib($id)
    {
        $ss = new SettingService;

        $result = $ss->deleteKnowledgeLib($id);

        return response()->json($result);
    }
}
