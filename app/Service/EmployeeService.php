<?php

namespace App\Service;

use App\Models\Attachments;
use App\Models\Employee;
use App\Models\JobHistory;
use App\Models\Subscription;
use App\Models\UserAddress;
use App\Models\UserChildren;
use App\Models\UserCompanion;
use App\Models\UserEmergency;
use App\Models\UserParent;
use App\Models\UserProfile;
use App\Models\Users;
use App\Models\UsersDetails;
use App\Models\UserSibling;
use App\Models\Vehicle;
use Illuminate\Mail\Attachment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class EmployeeService
{
    public function addProfile($r)
    {
        $input = $r->input();

        $user = Users::where('username', $r['username'])->first();

        if ($user) {
            $data['status'] = false;
            $data['title'] = 'Error';
            $data['type'] = 'error';
            $data['msg'] = 'email already exist';
        }else{
            $user['type'] = 'employee';
            $user['status'] = 'active';
            $user['username'] = $r['username'];
            $user['tenant_id'] = Auth::user()->tenant_id;
            $user['tenant'] = Auth::user()->tenant;
            $user['type'] = 'employee';
            $user['password'] = Hash::make('password');

            Users::create($user);

            $user = Users::where('username', $r['username'])->first();

            $input['user_id'] = $user->id;
            $input['DOB'] = date_format(date_create($input['DOB']),"Y/m/d H:i:s");
            $input['expiryDate'] = date_format(date_create($input['expiryDate']),"Y/m/d H:i:s");
            $input['tenant_id'] = Auth::user()->tenant_id;

            UserProfile::create($input);

            $data['status'] = true;
            $data['title'] = 'Success';
            $data['type'] = 'success';
            $data['msg'] = 'Success create user profile';
            $data['data'] = UserProfile::where('user_id', $user->id)->first();
        }

        return $data;
    }

    public function addAddress($r)
    {
        $input= $r->input();

        UserAddress::create($input);

        $data['status'] = true;
        $data['title'] = 'Success';
        $data['type'] = 'success';
        $data['msg'] = 'Success create address';
        $data['data'] = UserAddress::where('user_id', $input['user_id'])->first();

        return $data;
    }

    public function getEmployee()
    {
        $data = [];
        $data['status'] = true;
        $data['msg'] = 'Success get user employment';
        $data['data'] = Employee::all();

        return $data;
    }

    public function terminateEmployment($r)
    {
        $input = $r->input();

        $status['status'] = 'inactive';

        // check attachment
        // pr($r->file());
        if ($r->hasfile('file')) {
            foreach ($r->file('file') as $file) {
                $nameFile = upload($file);
                $attch['user_id'] = $input['user_id'];
                $attch['type'] = 'termination';
                $attch['file'] = $nameFile['filename'];
                Attachments::create($attch);
            }
        }

        // update status users and employment $table
        Users::where('id', $input['user_id'])->update($status);

        Employee::where('user_id', $input['user_id'])->update($status);

        // add data in jobHistory
        $input['updatedBy'] = Auth::user()->username;
        unset($input['status']);

        $jobHistory = [];
        $jobHistory['user_id'] = $input['user_id'];
        $jobHistory['employmentDetail'] = $input['employmentDetail'];
        $jobHistory['effectiveDate'] = date_format(date_create($input['effectiveFrom']),"Y/m/d H:i:s");
        $jobHistory['updatedBy'] = $input['updatedBy'];

        JobHistory::create($jobHistory);

        $data = [];
        $data['status'] = true;
        $data['msg'] = 'Success terminate user employment';
        $data['title'] = 'Success!';
        $data['type'] = 'success';

        return $data;
    }

    public function getEmployeeInfo()
    {
        $userId = Auth::user()->tenant_id;
        $data = [];
        $data['status'] = true;
        $data['msg'] = 'Success get user employment';
        $data['data'] = DB::table('employment as a')
        ->leftjoin('userProfile as b', 'a.user_id', '=', 'b.user_id')
        ->leftjoin('department as c', 'a.department', '=', 'c.id')
        ->select('a.employeeId', 'a.user_id', 'b.firstName', 'b.lastName', 'b.personalEmail as email', 'b.phoneNo', 'c.departmentName as department', 'a.supervisor', 'a.status')
        ->where('a.tenant_id', $userId)
        ->get();


        return $data;
    }

    public function editEmployeeData($user_id)
    {
        $data['user_id'] = $user_id;

        $data['user'] = Users::where('id', $data['user_id'])->first();
        $data['profile'] = UserProfile::where('user_id', $data['user_id'])->first();
        $data['address'] = UserAddress::where('user_id', $data['user_id'])->first();
        $data['emergency'] = UserEmergency::where('user_id', $data['user_id'])->first();
        $data['companions'] = UserCompanion::where('user_id', $data['user_id'])->get();
        $data['childrens'] = UserChildren::where('user_id', $data['user_id'])->get();
        $data['parents'] = UserParent::where('user_id', $data['user_id'])->get();
        $data['siblings'] = UserSibling::where('user_id', $data['user_id'])->get();
        $data['employment'] = Employee::where('user_id', $data['user_id'])->first();
        $data['jobHistorys'] = JobHistory::where('user_id', $data['user_id'])->get();
        $data['vehicles'] = Vehicle::where('user_id', $data['user_id'])->get();
        // dd($data['jobHistorys']);
        $childId[] = '';
        if ($data['childrens']) {
            foreach ($data['childrens'] as $child) {
                $childId[] = $child->id ?? null;
            }
        }

        $siblingId[] = '';
        if ($data['siblings']) {
            foreach ($data['siblings'] as $sibling) {
                $siblingId[] = $sibling->id ?? null;
            }
        }

        $parentId[] = '';
        if ($data['parents']) {
            foreach ($data['parents'] as $parent) {
                $parentId[] = $parent->id ?? null;
            }
        }

        $data['siblingId'] = implode(',', $siblingId);

        $data['parentId'] = implode(',', $parentId);

        $data['childId'] = implode(',', $childId);

        $data['idRun'] = 1;

        $data['username'] = $data['user']->username;

        // $data['user_id'] = Auth::user()->id;

        $data['gender'] = gender();
        $data['maritalStatus'] = getMaritalStatus();
        $data['educationLevel'] = educationLevel();
        $data['educationType'] = educationType();
        $data['states'] = state();
        $data['relationships'] = relationship();
        $data['citys'] = city();
        $data['americass'] = americas();
        $data['asias'] = asias();

        return $data;

    }

    public function updateEmployeeProfile($input)
    {
        $user_id = $input['user_id'];

        $profile = UserProfile::where('user_id', $user_id)->first();

        if(!$profile)
        {
            $data['status'] = config('app.response.error.status');;
            $data['title'] = config('app.response.error.title');
            $data['type'] = config('app.response.error.type');
            $data['msg'] = 'Profile not found';
        }else{
            if(!$input['religion'])
            {
                unset($input['religion']);
            }

            if(!$input['race'])
            {
                unset($input['race']);

            }

            if(!$input['phoneNo'])
            {
                unset($input['phoneNo']);

            }

            if(!$input['homeNo'])
            {
                unset($input['homeNo']);

            }

            if(!$input['extensionNo'])
            {
                unset($input['extensionNo']);

            }

            if ($input['username']) {

                $username['username'] = $input['username'];

                Users::where('id', $user_id)->update($username);
            }

            UserProfile::where('user_id', $user_id)->update($input);

            $data['status'] = config('app.response.success.status');
            $data['title'] = config('app.response.success.title');
            $data['type'] = config('app.response.success.type');
            $data['msg'] = 'Success update Profile';
        }

        return $data;

    }

    public function updateEmployeeAddress($input)
    {
        $user_id = $input['user_id'];

        $user = UserAddress::where('user_id', $user_id)->first();

        if(!$user)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        }else{

            if(!$input['address2'])
            {
                unset($input['address2']);
            }

            if(!$input['address2c'])
            {
                unset($input['address2c']);

            }
            $sameAsPermenant = $input['sameAsPermenant'] ?? '';

            if ($sameAsPermenant) {
                $input['address1c'] = $input['address1'];
                $input['address2c'] = $input['address2'];
                $input['postcodec'] = $input['postcode'];
                $input['cityc'] = $input['city'];
                $input['countryc'] = $input['country'];
                $input['statec'] = $input['state'];
            }
            unset($input['sameAsPermenant']);

            UserAddress::where('user_id', $user_id)->update($input);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success update Address';

        }

        return $data;
    }

    public function updateEmployeeEmergency($input)
    {
        $user_id = Auth::user()->id;
        $id = $input['id'] ?? 1;

        $user = UserEmergency::where('id', $id)->first();

        if(!$user)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        }else{

            if(!$input['address2'])
            {
                unset($input['address2']);
            }

            UserEmergency::where('id', $id)->update($input);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success update Emergency Contact';

        }

        return $data;
    }

    public function updateEmployeeCompanion($r)
    {
        $input = $r->input();

        $user_id = $input['user_id'];

        $user = UserCompanion::where('user_id', $user_id)->first();

        if(!$user)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        }else{

            if ($_FILES['payslip']['name'])
            {
                $payslip = upload($r->file('payslip'));
                $input['payslip'] = $payslip['filename'];

                if (!$input['payslip']) {
                    unset($input['payslip']);
                }
            }

            if ($_FILES['marrigeCert']['name'])
            {
                $marrigeCert = upload($r->file('marrigeCert'));
                $input['marrigeCert'] = $marrigeCert['filename'];

                if (!$input['marrigeCert']) {
                    unset($input['marrigeCert']);
                }
            }

            if(!$input['DOM'])
            {
                unset($input['DOM']);
            }

            if(!$input['address2'])
            {
                unset($input['address2']);
            }

            if(!$input['companyName'])
            {
                unset($input['companyName']);
            }

            if(!$input['incomeTax'])
            {
                unset($input['incomeTax']);
            }

            if(!$input['officeNo'])
            {
                unset($input['officeNo']);
            }

            if(!$input['address2E'])
            {
                unset($input['address2E']);
            }

            // $input['dateJoined'] = "'".dateFormatInput($input['dateJoined'])."'";
            // $input['expiryDate'] = "'".dateFormatInput($input['expiryDate'])."'";
            // $input['DOM'] = "'".dateFormatInput($input['DOM'])."'";
            // $input['DOB'] = "'".dateFormatInput($input['DOB'])."'";
            $id = $input['id'];
            UserCompanion::where('id', $id)->update($input);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success update Companion';
        }

        return $data;

    }

    public function addEmployeeCompanion($r)
    {
        $input = $r->input();

        $id = $input['user_id'];

        $companion = UserCompanion::where('user_id', $id)->count();

        if ($companion >= 4) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Max Companion can add only 4';
        }else{

            if ($_FILES['payslip']['name'])
            {
                $payslip = upload($r->file('payslip'));
                $input['payslip'] = $payslip['filename'];

                if (!$input['payslip']) {
                    unset($input['payslip']);
                }
            }

            if ($_FILES['marrigeCert']['name'])
            {
                $marrigeCert = upload($r->file('marrigeCert'));
                $input['marrigeCert'] = $marrigeCert['filename'];

                if (!$input['marrigeCert']) {
                    unset($input['marrigeCert']);
                }
            }

            $input['dateJoined'] = dateFormat($input['dateJoined']);
            $input['expiryDate'] = dateFormat($input['expiryDate']);
            $input['DOM'] = dateFormat($input['DOM']);
            $input['DOB'] = dateFormat($input['DOB']);
            UserCompanion::create($input);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success add Companion';
        }

        return $data;
    }

    public function updateEmployeeChildren($r)
    {
        $input = $r->input();

        $user_id = Auth::user()->id;
        $id = $input['id'] ?? 1;

        $user = UserChildren::where('id', $id)->first();

        if(!$user)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        }else{

            if ($_FILES['supportDoc']['name'])
            {
                $payslip = upload($r, 'supportDoc');
                $input['supportDoc'] = $payslip['filename'];

                if (!$input['supportDoc']) {
                    unset($input['supportDoc']);
                }
            }

            UserChildren::where('id', $id)->update($input);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success update Children';
        }

        return $data;

    }

    public function addEmployeeChildren($r)
    {
        $input = $r->input();

        if ($_FILES['supportDoc']['name']) {
            $payslip = upload($r->file('supportDoc'));
            $input['supportDoc'] = $payslip['filename'];

            if (!$input['supportDoc']) {
                unset($input['supportDoc']);
            }
        }

        // $input['user_id'] = Auth::user()->id;
        UserChildren::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success add children';

        return $data;
    }

    public function getSibling($user_id = '')
    {
        $user_id = Auth::user()->id;

        $data['data'] = UserSibling::where('user_id', $user_id)->get();
        $data['msg'] = 'Success get sibling data';

        return $data;
    }

    public function getParentByUserId($user_id = '')
    {
        $user_id = Auth::user()->id;
        $data['data'] = UserParent::where('user_id', $user_id)->get();
        $data['msg'] = 'Success get parent data';

        return $data;
    }

    public function addEmployeeSibling($r)
    {
        $input = $r->input();
        $input['user_id'] = $input['user_id'];

        UserSibling::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success add Sibling';

        return $data;
    }

    public function updateEmployeeSibling($r)
    {
        $input = $r->input();

        $id = $input['id'] ?? 1;

        $user = UserSibling::where('id', $id)->first();

        if(!$user)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        }else{
            $sameAddress = $input['sameAddress'] ?? null;
            if ($sameAddress) {
                $userProfile = UserProfile::where('user_id', Auth::user()->id)->first();

                $input['address1'] = $userProfile->address1;
                $input['address2'] = $userProfile->address2;
                $input['city'] = $userProfile->city;
                $input['state'] = $userProfile->state;
                $input['country'] = $userProfile->country;
                unset($input['sameAddress']);
            }

            UserSibling::where('id', $id)->update($input);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success update Sibling';
        }

        return $data;

    }

    public function addEmployeeParent($r)
    {
        $input = $r->input();
        $sameAddress = $input['sameAddress'] ?? null;
        $user_id = $input['user_id'];
        if ($sameAddress) {
            $userProfile = UserAddress::where('user_id', $user_id)->first();

            $input['address1'] = $userProfile->address1;
            $input['address2'] = $userProfile->address2;
            $input['postcode'] = $userProfile->postcode;
            $input['city'] = $userProfile->city;
            $input['state'] = $userProfile->state;
            $input['country'] = $userProfile->country;
            unset($input['sameAddress']);
        }
        // $input['user_id'] = Auth::user()->id;
        // pr($input);
        UserParent::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success add Parent';

        return $data;
    }

    public function updateEmployeeParent($r)
    {
        $input = $r->input();

        $id = $input['id'] ?? 1;

        $user = UserParent::where('id', $id)->first();

        if(!$user)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        }else{
            unset($input['sameAddress']);
            UserParent::where('id', $id)->update($input);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success update Parent';
        }

        return $data;

    }

    public function updateEmployee($r)
    {
        $input = $r->input();

        $id = $input['id'];
        // $id = $input['empId'];

        $user = Employee::where('id', $id)->first();

        if(!$user)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        }else{

            Employee::where('id', $id)->update($input);
            $user = Auth::user();
            // add job history
            $jobz = [];

            $jobz['user_id'] = $input['user_id'];
            // $jobz['employmentDetail'] = $input['user_id'];
            // $jobz['event'] = $input['user_id'];
            $jobz['effectiveDate'] = $input['effectiveFrom'];
            $jobz['tenant_id'] = $user->id;
            $jobz['updatedBy'] = $user->username;
               // pr($input);
            // pr($input_job);
            JobHistory::create($jobz);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success update Employee';
        }

        return $data;

    }

    public function addEmployment($r)
    {
        $input= $r->input();
        $input['tenant_id'] = Auth::user()->tenant_id;
        $input['status'] = 'inactive';
        $input['joinedDate'] = date_format(date_create($input['joinedDate']), 'y-m-d');
        Employee::create($input);

        $ec['user_id'] = $input['user_id'];
        UserEmergency::create($ec);
        $jh['user_id'] = $input['user_id'];
        $jh['tenant_id'] = Auth::user()->tenant_id;
        $jh['updatedBy'] = Auth::user()->username;
        $jh['effectiveDate'] = $input['joinedDate'];
        JobHistory::create($jh);

        $ls = new LoginService;

        $ls->temporaryPasswordEmail($input);

        $data['status'] = true;
        $data['title'] = 'Success';
        $data['type'] = 'success';
        $data['msg'] = 'Success create user employment';
        $data['data'] = Employee::where('user_id', $input['user_id'])->first();

        return $data;
    }

    public function updateVehicle($r)
    {
        $input = $r->input();

        $id = $input['id'];

        $user = Vehicle::where('id', $id)->first();

        if(!$user)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        }else{

            Vehicle::where('id', $id)->update($input);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success update Vehicle';
        }

        return $data;

    }

    public function addVehicle($r)
    {
        $input = $r->input();
        // $input['user_id'] = Auth::user()->id;
        Vehicle::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success add Vehicle';

        return $data;
    }

    public function deleteVehicle($id)
    {

        $vehicle = Vehicle::find($id);

        if (!$vehicle) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'vehicle not found';
        } else {
            $vehicle->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success delete Vehicle';
        }

        return $data;
    }

    public function getEmployeeProject()
    {
        $tenant_id = Auth::user()->tenant_id;
        $data = [];
        $data = Employee::where('tenant_id', $tenant_id)->get();

        return $data;
        // $data = DB::table('employment as a')
        // ->leftjoin('userProfile as b', 'a.user_id', '=', 'b.user_id')
        // ->leftjoin('department as c', 'a.department', '=', 'c.id')
        // ->leftjoin('designation as c', 'a.designation', '=', 'c.id')
        // ->leftjoin('unit as c', 'a.unit', '=', 'c.id')
        // ->leftjoin('branch as c', 'a.branch', '=', 'c.id')
        // ->select('a.*')
        // ->where('a.tenant_id', $userId)
        // ->get();


        // return $data;
    }

    public function getEmployeeById($id)
    {
        $tenant_id = Auth::user()->tenant_id;
        $data = [];
        $data = Employee::where([['tenant_id', $tenant_id], ['id', $id]])->first();

        return $data;
    }

    public function getEmployeeByDepartmentId($department_id)
    {
        $tenant_id = Auth::user()->tenant_id;
        $data = [];
        $data = Employee::where([['tenant_id', $tenant_id], ['department', $department_id]])->get();

        return $data;
    }

}
