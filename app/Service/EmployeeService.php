<?php

namespace App\Service;

use App\Models\Users;
use App\Models\Country;
use App\Models\State;
use App\Models\Vehicle;
use App\Models\Employee;
use App\Models\Location;
use App\Models\JobHistory;
use App\Models\UserParent;
use App\Models\Attachments;
use App\Models\UserAddress;
use App\Models\UserProfile;
use App\Models\UserSibling;
use App\Models\Subscription;
use App\Models\UserChildren;
use App\Models\UsersDetails;
use App\Models\UserCompanion;
use App\Models\UserEmergency;
use Illuminate\Mail\Attachment;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\UserQualificationOthers;
use Illuminate\Support\Facades\Session;
use App\Models\UserQualificationEducation;

class EmployeeService
{
    public function addProfile($r)
    {
        $input = $r->input();

        if (isset($r['username'])) {
            // $user = Users::join('userprofile', 'users.id', '=', 'userprofile.user_id')
            //     ->where('users.tenant_id', Auth::user()->tenant_id)
            //     ->where('userprofile.personalEmail', $r['personalEmail'])
            //     ->where('users.status', 'active')
            //     ->select('users.*', 'userprofile.personalEmail')
            //     ->first();
            $user = Users::where([['tenant_id', Auth::user()->tenant_id], ['username', $r['username']], ['status', 'active']])->first();


            if ($user) {
                $data['status'] = false;
                $data['title'] = 'Error';
                $data['type'] = 'error';
                $data['msg'] = 'email already exists';
            } else {
                $user['type'] = 'employee';
                $user['status'] = 'not complete';
                $user['username'] = $r['username'];
                $user['tenant_id'] = Auth::user()->tenant_id;
                $user['tenant'] = Auth::user()->tenant;
                $user['password'] = Hash::make('password');

                Users::create($user);

                $user = Users::where('username', $r['username'])->first();

                $input['user_id'] = $user->id;
                $input['DOB'] = date_format(date_create($input['DOB']), "Y/m/d H:i:s");
                $input['expiryDate'] = date_format(date_create($input['expiryDate']), "Y/m/d H:i:s");
                $input['tenant_id'] = Auth::user()->tenant_id;

                UserProfile::create($input);

                $data['status'] = true;
                $data['title'] = 'Success';
                $data['type'] = 'success';
                $data['msg'] = 'Employee Profile is created';
                $data['data'] = UserProfile::where('user_id', $user->id)->first();
            }
        } else {
            // Handle the case when personalEmail is not provided
            $data['status'] = false;
            $data['title'] = 'Error';
            $data['type'] = 'error';
            $data['msg'] = 'Personal Email is required';
        }

        return $data;
    }

    public function getStatebyCountryEmployee($id = '')
    {
        $data = Country::join('location_states', 'location_states.country_id', '=', 'location_country.country_id')
            ->where('location_states.country_id', $id)
            ->get();


        return $data;
    }

    public function getCitybyStateEmployee($id = '')
    {

        $data = State::join('location_cities', 'location_states.id', '=', 'location_cities.state_id')
            ->where('location_cities.state_id', $id)
            ->groupBy('location_cities.name')
            ->get();


        return $data;
    }

    public function getPostcodeByCityEmployee($id = '')
    {

        $data = Location::select('*')
            ->where('name', $id)
            ->get();


        return $data;
    }

    public function addAddress($r)
    {
        $input = $r->input();

        // Check if the "permanent same as correspondent address" checkbox is not checked
        if (!isset($input['sameAsPermenant']) || $input['sameAsPermenant'] != 'on') {
            // Save the address as permanent
            UserAddress::create([
                'user_id' => $input['user_id'],
                'addressType' => 1,
                'address1' => $input['address1'],
                'address2' => $input['address2'],
                'postcode' => $input['postcode'],
                'city' => $input['city'],
                'state' => $input['state'],
                'country' => $input['country'],
            ]);

            // Save the address as correspondent
            UserAddress::create([
                'user_id' => $input['user_id'],
                'addressType' => 2,
                'address1' => $input['address1c'],
                'address2' => $input['address2c'],
                'postcode' => $input['postcodec'],
                'city' => $input['cityc'],
                'state' => $input['statec'],
                'country' => $input['countryc'],
            ]);
        } else {
            // Save the address as both permanent and correspondent
            UserAddress::create([
                'user_id' => $input['user_id'],
                'addressType' => 3,
                'address1' => $input['address1'],
                'address2' => $input['address2'],
                'postcode' => $input['postcode'],
                'city' => $input['city'],
                'state' => $input['state'],
                'country' => $input['country'],
            ]);
        }

        $data['status'] = true;
        $data['title'] = 'Success';
        $data['type'] = 'success';
        $data['msg'] = 'Address is created';
        $data['data'] = UserAddress::where('user_id', $input['user_id'])->first();

        return $data;
    }


    public function getEmployee()
    {
        $data = [];
        $data['status'] = true;
        $data['msg'] = 'Success Get User Employment';
        $data['data'] = Employee::leftJoin('userprofile', 'employment.report_to', '=', 'userprofile.id')
        ->where('employment.tenant_id', Auth::user()->tenant_id)
        ->select('employment.*', 'userprofile.fullName')
        ->get();

        return $data;
    }

    public function terminateEmployment($r)
    {
        $input = $r->input();
        // dd($input);
        $status['status'] = 'terminate';

        // update status users and employment $table
        Users::where('id', $input['user_id'])->update($status);

        $effectiveFrom['effectiveFrom'] = $input['effectiveFrom'];

        Employee::where('user_id', $input['user_id'])
        ->update([
            'status'=> $status['status'],
            'effectiveFrom' => $input['effectiveFrom']
        ]);


        $jobHistory['user_id'] = $input['user_id'];
        $jobHistory['remarks'] = $input['remarks'];
        $jobHistory['employmentDetail'] = $input['employmentDetail'];
        $jobHistory['statusHistory'] = $input['status'] = 'terminate';
        $updateBy = Auth::user()->username;
        $jobHistory['updatedBy'] = $updateBy;

        $jobHistory = new JobHistory($jobHistory);
        $jobHistory->save();
        $lastInsertedId = $jobHistory->id;

        if ($r->hasFile('files')) {
            $uploadedFiles = $r->file('files');

            foreach ($uploadedFiles as $uploadedFile) {
                $statusFile = upload($uploadedFile);

                if ($statusFile['filename']) {
                    $attch = [
                        'file' => $statusFile['filename'],
                        'user_id' => $input['user_id'],
                        'type' => 'termination',
                        'jobHistoryId' => $lastInsertedId,
                    ];

                    Attachments::create($attch);
                }
            }
        }

        $data = [];
        $data['status'] = true;
        $data['msg'] = 'User is Deactivated';
        $data['title'] = 'Success!';
        $data['type'] = 'success';

        return $data;
    }

    public function getEmployeeInfo()
    {
        $userId = Auth::user()->tenant_id;
        $data = [];
        $data['status'] = true;
        $data['msg'] = 'Success Get User Employment';
        $data['data'] = DB::table('employment as a')
            ->leftjoin('userProfile as b', 'a.user_id', '=', 'b.user_id')
            ->leftjoin('department as c', 'a.department', '=', 'c.id')
            ->select('a.id', 'a.employeeId', 'a.user_id', 'b.firstName', 'b.lastName', 'b.email as email', 'b.phoneNo', 'c.departmentName as department', 'a.supervisor', 'a.report_to', 'a.status')
            ->where([['a.tenant_id', $userId], ['status', '!=', 'not complete']])
            ->orderBy('id', 'desc')
            ->get();


        return $data;
    }

    public function editEmployeeData($user_id)
    {
        $data['user_id'] = $user_id;

        $data['user'] = Users::where('id', $data['user_id'])->first();
        $data['profile'] = UserProfile::where('user_id', $data['user_id'])->first();
        $data['educations'] = UserQualificationEducation::where('user_id', $data['user_id'])->latest()->get();
        $data['others'] = UserQualificationOthers::where('user_id', $data['user_id'])->latest()->get();
        $data['address'] = UserAddress::where('user_id', $data['user_id'])->first();
        $data['addressDetails'] = UserAddress::where('user_id', $data['user_id'])->latest()->get();
        $data['emergency'] = UserEmergency::where('user_id', $data['user_id'])->first();
        $data['companions'] = UserCompanion::where('user_id', $data['user_id'])->get();
        $data['childrens'] = UserChildren::where('user_id', $data['user_id'])->latest()->get();
        $data['parents'] = UserParent::where('user_id', $data['user_id'])->latest()->get();
        $data['siblings'] = UserSibling::where('user_id', $data['user_id'])->get();
        $data['employment'] = Employee::where('user_id', $data['user_id'])->first();
        $data['jobHistorys'] = JobHistory::where('user_id', $data['user_id'])->get();
        $data['vehicles'] = Vehicle::where('user_id', $data['user_id'])->latest()->get();

        $data['country'] = Country::all();
        $data['state'] = State::all();
        $data['city'] = Location::all();
        $data['postcode'] = Location::all();

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

        $addressId[] = '';
        if ($data['addressDetails']) {
            foreach ($data['addressDetails'] as $address) {
                $addressId[] = $address->id ?? null;
            }
        }

        $educationId[] = '';
        if ($data['educations']) {
            foreach ($data['educations'] as $education) {
                $educationId[] = $education->id ?? null;
            }
        }

        $othersId[] = '';
        if ($data['others']) {
            foreach ($data['others'] as $others) {
                $othersId[] = $others->id ?? null;
            }
        }

        $data['siblingId'] = implode(',', $siblingId);

        $data['parentId'] = implode(',', $parentId);

        $data['childId'] = implode(',', $childId);

        $data['addressId'] = implode(',', $addressId);

        $data['educationId'] = implode(',', $educationId);

        $data['othersId'] = implode(',', $othersId);

        $data['idRun'] = 1;

        $data['username'] = $data['user']->username;

        // $data['user_id'] = Auth::user()->id;

        $data['gender'] = gender();
        $data['maritalStatus'] = getMaritalStatus();
        $data['educationLevel'] = educationLevel();
        $data['educationType'] = educationType();
        $data['states'] = state();
        $data['relationshipEmergencyContact'] = relationshipEmergencyContact();
        $data['relationshipFamily'] = relationshipFamily();
        $data['citys'] = city();
        $data['americass'] = americas();
        $data['asias'] = asias();
        $data['addressType'] = addressType();

        return $data;
    }

    public function registerEmployeeView()
    {

        $data['country'] = Country::all();
        $data['state'] = State::all();
        $data['city'] = Location::all();
        $data['postcode'] = Location::all();

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

        } else {


            if ($input['fullName']) {
                 $employee['employeeName'] = $input['fullName'];
                 Employee::where('user_id', $user_id)->update($employee);
            }

            if ($input['personalEmail']) {
                $employee['employeeEmail'] = $input['personalEmail'];
                Employee::where('user_id', $user_id)->update($employee);
            }

            if (!$input['religion']) {
                unset($input['religion']);
            }

            if(!isset($input['nonNetizen']))
            {
                $input['nonNetizen'] = null;
            }

            if(!isset($input['okuStatus']))
            {
                $input['okuStatus'] = null;
                $input['okuCardNum'] = null;
                $input['okuFile'] = null;
            }

            if(!isset($input['passport']))
            {
                $input['passport'] = null;
                $input['expiryDate'] = null;
                $input['issuingCountry'] = null;
            }

            if ($input['username']) {

                $username['username'] = $input['username'];

                Users::where('id', $user_id)->update($username);
            }

            if ($_FILES['fileID']['name']) {
                $payslip = upload(request()->file('fileID'));
                $input['fileID'] = $payslip['filename'];

                if (!$input['fileID']) {
                    unset($input['fileID']);
                }
            }

            if (isset($_FILES['okuFile']['name']) && !empty($_FILES['okuFile']['name'])) {
                $payslip = upload(request()->file('okuFile'));
                $input['okuFile'] = $payslip['filename'];
            } elseif (isset($_FILES['okuFile']['name']) && empty($_FILES['okuFile']['name']) && isset($_POST['okuFile_disabled'])) {
                $input['okuFile'] = null;
            }

            if(isset($input['nonNetizen']) && $input['nonNetizen'] == 'on') {
                $input['idNo'] = null;
            }

            UserProfile::where('user_id', $user_id)->update($input);

            $data['status'] = config('app.response.success.status');
            $data['title'] = config('app.response.success.title');
            $data['type'] = config('app.response.success.type');
            $data['msg'] = 'My Profile is updated';
        }

        return $data;
    }

    public function updateEmployeeAddress($input)
    {
        $user_id = $input['user_id'];

        $user = UserAddress::where('user_id', $user_id)->first();

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        } else {

            if (!$input['address2']) {
                unset($input['address2']);
            }

            if (!$input['address2c']) {
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
            $data['msg'] = 'Address Is Updated';
        }

        return $data;
    }

    public function updateEmployeeEmergency($input)
    {
        $user_id = Auth::user()->id;
        $id = $input['id'] ?? 1;

        $user = UserEmergency::where('id', $id)->first();

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        } else {

            if (!$input['address2']) {
                unset($input['address2']);
            }

            UserEmergency::where('id', $id)->update($input);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Emergency Contact is Updated';
        }

        return $data;
    }

    public function updateEmployeeCompanion($r)
    {
        $input = $r->input();

        $user_id = $input['user_id'];

        $user = UserCompanion::where('user_id', $user_id)->first();

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        } else {

            if ($_FILES['idFile']['name'])
            {
                $idAttachment = upload($r->file('idFile'));
                $input['idFile'] = $idAttachment['filename'];

                if (!$input['idFile']) {
                    unset($input['idFile']);
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

            if (isset($_FILES['okuID']['name']) && !empty($_FILES['okuID']['name'])) {
                $payslip = upload(request()->file('okuID'));
                $input['okuID'] = $payslip['filename'];
            } elseif (isset($_FILES['okuID']['name']) && empty($_FILES['okuID']['name']) && isset($_POST['okuID_disabled'])) {
                $input['okuID'] = null;
            }

            if (!$input['DOM']) {
                unset($input['DOM']);
            }

            if (!$input['DOM']) {
                unset($input['DOM']);
            }

            if (!$input['address2']) {
                unset($input['address2']);
            }

            if (!$input['companyName']) {
                unset($input['companyName']);
            }

            if (!$input['incomeTax']) {
                unset($input['incomeTax']);
            }

            if (!$input['officeNo']) {
                unset($input['officeNo']);
            }

            if (!$input['address2E']) {
                unset($input['address2E']);
            }

            if(!isset($input['okuStatus']))
            {
                $input['okuStatus'] = null;
                $input['okuNumber'] = null;
                $input['okuID'] = null;
            }

            $id = $input['id'];
            UserCompanion::where('id', $id)->update($input);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success Update Companion';
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
            $data['msg'] = 'You have exceeded the maximum companion data.';
        } else {

            if ($_FILES['idFile']['name']) {
                $idAttachment = upload($r->file('idFile'));
                $input['idFile'] = $idAttachment['filename'];

                if (!$input['idFile']) {
                    unset($input['idFile']);
                }
            }

            if ($_FILES['marrigeCert']['name']) {
                $marrigeCert = upload($r->file('marrigeCert'));
                $input['marrigeCert'] = $marrigeCert['filename'];

                if (!$input['marrigeCert']) {
                    unset($input['marrigeCert']);
                }
            }




            if (isset($_FILES['okuattach']['name'])) {
                $idOku = upload(request()->file('okuattach'));
                $input['okuattach'] = $idOku['filename'];
            } else {
                $input['okuattach'] = null;
            }

            $input['dateJoined'] = dateFormat($input['dateJoined']);



            if(!isset($input['expiryDate']))
            {
                $input['expiryDate'] = null;
            }

            $input['DOB'] = dateFormat($input['DOB']);

            $input['mainCompanion'] = isset($input['mainCompanion']) ? 1 : 0;
            $companion = UserCompanion::create($input);

            // Set the main companion if the checkbox is checked
            if ($r->input('mainCompanion')) {
                // Set the mainCompanion attribute of the new companion to 1
                $companion->mainCompanion = 1;
                $companion->save();

                // Set the mainCompanion attribute of all other companions to 0
                UserCompanion::where('user_id', $id)
                    ->where('id', '<>', $companion->id)
                    ->update(['mainCompanion' => 0]);
            }

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'New Companion is created.';
        }

        return $data;
    }

    public function updateEmployeeChildren($r)
    {
        $input = $r->input();

        $user_id = Auth::user()->id;
        $id = $input['id'] ?? 1;

        $user = UserChildren::where('id', $id)->first();

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        } else {

            if ($_FILES['birthID']['name']) {
                $payslip = upload($r->file('birthID'));
                $input['birthID'] = $payslip['filename'];

                if (!$input['birthID']) {
                    unset($input['birthID']);
                }
            }

            if ($_FILES['idFile']['name']) {
                $payslip = upload($r->file('idFile'));
                $input['idFile'] = $payslip['filename'];

                if (!$input['idFile']) {
                    unset($input['idFile']);
                }
            }

            if (isset($_FILES['okuFile']['name']) && !empty($_FILES['okuFile']['name'])) {
                $payslip = upload(request()->file('okuFile'));
                $input['okuFile'] = $payslip['filename'];
            } elseif (isset($_FILES['okuFile']['name']) && empty($_FILES['okuFile']['name']) && isset($_POST['okuFile_disabled'])) {
                $input['okuFile'] = null;
            }

            if ($_FILES['supportDoc']['name']) {
                $payslip = upload($r->file('supportDoc'));
                $input['supportDoc'] = $payslip['filename'];

                if (!$input['supportDoc']) {
                    unset($input['supportDoc']);
                }
            }

            if(!isset($input['okuStatus']))
            {
                $input['okuStatus'] = null;
                $input['okuNo'] = null;
                $input['okuFile'] = null;
            }

            if(!isset($input['passport']))
            {
                $input['passport'] = null;
                $input['expiryDate'] = null;
                $input['issuingCountry'] = null;
            }

            if(!isset($input['idNo']))
            {
                $input['idNo'] = null;

            }

            if(!isset($input['nonCitizen']))
            {
                $input['nonCitizen'] = null;
            }

            UserChildren::where('id', $id)->update($input);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Children is Updated.';
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
        $data['msg'] = 'New Children is Created.';

        return $data;
    }

    public function getSibling($user_id = '')
    {
        $user_id = Auth::user()->id;

        $data['data'] = UserSibling::where('user_id', $user_id)->get();
        $data['msg'] = 'Success Get Sibling Data';

        return $data;
    }

    public function getEmployeeParentById($id = '')
    {
        $data['data'] = UserParent::where('id', $id)->first();
        $data['msg'] = 'Success Get Parent Data';

        return $data;
    }

    public function getEmployeeParent($user_id = '')
    {
        $user_id = Auth::user()->id;
        $data['data'] = UserParent::where('user_id', $user_id)->get();
        $data['msg'] = 'Success Get Parent Data';

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

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        } else {
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
            $data['msg'] = 'Success Update Sibling';
        }

        return $data;
    }

    public function addEmployeeParent($r)
    {
        $input = $r->input();


        if ($_FILES['idFile']['name']) {
            $iDFile = upload($r->file('idFile'));
            $input['idFile'] = $iDFile['filename'];

            if (!$input['idFile']) {
                unset($input['idFile']);
            }
        }

        if(!isset($input['non_citizen']))
        {
            $input['non_citizen'] = null;
        }

        if(isset($input['non_citizen']) && $input['non_citizen'] == 'on') {
            $input['idNo'] = null;
        }


        if(!isset($input['oku_status']))
        {
            $input['oku_status'] = null;
        }

        if(!isset($input['oku_status']) && $input['oku_status'] == 'on') {
            $input['okuFile'] = null;
            $input['okuCardNum'] = null;
        }

        if (isset($_FILES['okuFile']['name'])) {
            $okuAttach = upload(request()->file('okuFile'));
            $input['okuFile'] = $okuAttach['filename'];
        } else {
            $input['okuFile'] = null;
        }


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

        UserParent::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'New family is Created';

        return $data;
    }

    public function getEmployeeAddressforParent($id)
    {

        $addressDetails = UserAddress::where('user_id', $id)
        ->whereIn('addressType', [1, 3])
        ->select('address1', 'address2', 'postcode', 'city', 'state', 'country')
        ->first();



        if(!$addressDetails)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Address not found';
        }else{
            $data['data'] = $addressDetails;
            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success Get Address Data';
        }

        return $data;
    }

    public function updateEmployeeParent($r)
    {
        $input = $r->input();

        $id = $input['id'] ?? 1;
        if ($_FILES['idFile']['name'])
        {
            $idAttachment = upload($r->file('idFile'));
            $input['idFile'] = $idAttachment['filename'];

            if (!$input['idFile']) {
                unset($input['idFile']);
            }
        }

       if (isset($_FILES['okuFile']['name']) && !empty($_FILES['okuFile']['name'])) {
            $payslip = upload(request()->file('okuFile'));
            $input['okuFile'] = $payslip['filename'];
        } elseif (isset($_FILES['okuFile']['name']) && empty($_FILES['okuFile']['name']) && isset($_POST['okuFile_disabled'])) {
            $input['okuFile'] = null;
        }

        if(!isset($input['oku_status']))
            {
                $input['oku_status'] = null;
                $input['okuFile'] = null;
                $input['okuCardNum'] = null;
            }

        if(!isset($input['passport']))
        {
            $input['passport'] = null;
            $input['expiryDate'] = null;
            $input['issuingCountry'] = null;
        }

        if(!isset($input['idNo']))
        {
            $input['idNo'] = null;

        }

        if(!isset($input['non_citizen']))
        {
            $input['non_citizen'] = null;
        }



        $user = UserParent::where('id', $id)->first();

        if(!$user)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';

        } else {
            unset($input['sameAddress']);

            UserParent::where('id', $id)->update($input);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Family is updated.';
        }

        return $data;
    }

    public function updateEmployee($r)
    {
        $input = $r->input();
        $id = $input['id'];

        $user = Employee::where('id', $id)->first();

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';

        } else {

            if ($input['roleId']) {
                $input['role'] = $input['roleId'];
                $userRole['role_id'] = $input['role'];
                unset($input['roleId']);
            }

            Users::where('id', $input['user_id'])->update($userRole);

            if ($input['branchId']) {
                $input['branch'] = $input['branchId'];
                unset($input['branchId']);
            }

            if ($input['departmentId']) {
                $input['department'] = $input['departmentId'];
                unset($input['departmentId']);
            }

            if (isset($input['unitId'])) {
                $input['unit'] = $input['unitId'];
                unset($input['unitId']);
            } else {
                $input['unit'] = null;
                unset($input['unitId']);
            }

            Employee::where('id', $id)->update($input);

            $jobHistory = [];

            if ($input['role'] !== $user->role) {
                $jobHistory['roleHistory'] = $input['role'];

            } else if ($input['role'] === $user->role) {
                $jobHistory['roleHistory'] = null;
            }

            if ($input['company'] !== $user->company) {
                $jobHistory['companyHistory'] = $input['company'];

            } else if ($input['company'] === $user->company) {
                $jobHistory['companyHistory'] = null;
            }

            if ($input['department'] !== $user->department) {
                $jobHistory['departmentHistory'] = $input['department'];

            } else if ($input['department'] === $user->department) {
                $jobHistory['departmentHistory'] = null;
            }

            if ($input['unit'] !== $user->unit) {
                $jobHistory['unitHistory'] = $input['unit'];

            } else if ($input['unit'] === $user->unit) {
                $jobHistory['unitHistory'] = null;
            }

            if ($input['branch'] !== $user->branch) {
                $jobHistory['branchHistory'] = $input['branch'];

            } else if ($input['branch'] === $user->branch) {
                $jobHistory['branchHistory'] = null;
            }

            if ($input['joinedDate'] !== $user->joinedDate) {
                $jobHistory['joinedDateHistory'] = $input['joinedDate'];

            } else if ($input['joinedDate'] === $user->joinedDate) {
                $jobHistory['joinedDateHistory'] = null;
            }

            if ($input['jobGrade'] !== $user->jobGrade) {
                $jobHistory['jobGradeHistory'] = $input['jobGrade'];

            } else if ($input['jobGrade'] === $user->jobGrade) {
                $jobHistory['jobGradeHistory'] = null;
            }

            if ($input['designation'] !== $user->designation) {
                $jobHistory['designationHistory'] = $input['designation'];

            } else if ($input['designation'] === $user->designation) {
                $jobHistory['designationHistory'] = null;
            }

            if ($input['report_to'] !== $user->report_to) {
                $jobHistory['ReportToHistory'] = $input['report_to'];

            } else if ($input['report_to'] === $user->report_to) {
                $jobHistory['ReportToHistory'] = null;
            }

            if ($input['employmentType'] !== $user->employmentType) {
                $jobHistory['employmentTypeHistory'] = $input['employmentType'];

            } else if ($input['employmentType'] === $user->employmentType) {
                $jobHistory['employmentTypeHistory'] = null;
            }

            if ($input['COR'] !== $user->COR) {
                $jobHistory['CORHistory'] = $input['COR'];

            } else if ($input['COR'] === $user->COR) {
                $jobHistory['CORHistory'] = null;
            }

            if ($input['event'] !== $user->event) {
                $jobHistory['event'] = $input['event'];

            } else if ($input['event'] === $user->event) {
                $jobHistory['event'] = null;
            }

            $jobHistory['effectiveDate'] = $input['EffectiveFrom'];
            $jobHistory['tenant_id'] = $user->tenant_id;
            $jobHistory['updatedBy'] = $user->username;
            $jobHistory['event'] = $input['event'];
            $jobHistory['user_id'] = $input['user_id'];
            $updateBy = Auth::user()->username;
            $jobHistory['updatedBy'] = $updateBy;

            JobHistory::create($jobHistory);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Employment Details is updated.';
        }

        return $data;
    }

    public function addEmployment($r)
    {
        $input = $r->input();
        $workingEmail = Employee::where('workingEmail', $input['workingEmail'])->first();

        if ($workingEmail) {
            $data['status'] = false;
            $data['title'] = 'Error';
            $data['type'] = 'error';
            $data['msg'] = 'Email already exist.';

        } else {


            if ($input['branchId']) {
                $input['branch'] = $input['branchId'];
                unset($input['branchId']);
            }

            if ($input['departmentId']) {
                $input['department'] = $input['departmentId'];
                unset($input['departmentId']);
            }

            if (isset($input['unitId'])) {
                $input['unit'] = $input['unitId'];
                unset($input['unitId']);
            } else {
                $input['unit'] = null;
                unset($input['unitId']);
            }

            $input['tenant_id'] = Auth::user()->tenant_id;
            $input['status'] = 'active';
            $input['joinedDate'] = date_format(date_create($input['joinedDate']), 'y-m-d');
            Employee::create($input);

            $ec['user_id'] = $input['user_id'];
            UserEmergency::create($ec);

            $userprofileEmail['email'] = $input['workingEmail'];
            UserProfile::where('user_id', $input['user_id'])->update($userprofileEmail);

            $user['status'] = 'active';
            User::where('id', $input['user_id'])->update($user);

            $ls = new LoginService;

            $ls->temporaryPasswordEmail($input);

            $data['status'] = true;
            $data['title'] = 'Success';
            $data['type'] = 'success';
            $data['msg'] = 'Employment Details is created';
            $data['data'] = Employee::where('user_id', $input['user_id'])->first();
        }


        return $data;
    }

    public function cancelTerminateEmployment($id)
    {
        $update = [
            'status' => 'active'
        ];

        $user = Employee::where('user_id',$id)->get();

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Cancel Termination not found';
        } else {
            Employee::where('user_id', $id)->update($update);
            Users::where('id', $id)->update($update);

            // $jobHistory['effectiveDate'] = $input['EffectiveFrom'];
            $jobHistory['user_id'] = $id;
            $updateBy = Auth::user()->username;
            $jobHistory['updatedBy'] = $updateBy;
            $jobHistory['statusHistory'] = 'active';
            JobHistory::create($jobHistory);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success Cancel Termination user';
        }

        return $data;
    }
    public function updateVehicle($r)
    {
        $input = $r->input();

        $id = $input['id'];

        $user = Vehicle::where('id', $id)->first();

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        } else {

            Vehicle::where('id', $id)->update($input);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Vehicle is updated';
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
        $data['msg'] = 'Vehicle is created';

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
        $data = Employee::leftJoin('userprofile', 'employment.report_to', '=', 'userprofile.id')
        ->where('employment.tenant_id', $tenant_id)
        ->where('employment.id', $id)
        ->select('employment.*' ,'userprofile.fullName')
        ->first();
        return $data;
    }

    public function getEmployeeByDepartmentId($department_id)
    {
        $tenant_id = Auth::user()->tenant_id;
        $data = [];
        $data = Employee::where([['tenant_id', $tenant_id], ['department', $department_id]])->get();

        return $data;
    }

    public function updateclaimhierarchy($r, $id)
    {
        $input = $r->input();

        $data1 = $input['eclaimrecommender'];
        $data2 = $input['eclaimapprover'];


        $input = [
            'eclaimrecommender' => $data1,
            'eclaimapprover' => $data2
        ];

        Employee::where('user_id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'eClaim Hierarchy is Updated';

        return $data;
    }

    public function updatecashhierarchy($r, $id)
    {
        $input = $r->input();


        $data2 = $input['caapprover'];


        $input = [

            'caapprover' => $data2
        ];

        Employee::where('user_id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Cash Advance Hierarchy is Updated';

        return $data;
    }

    public function updateeleavehierarchy($r, $id)
    {
        $input = $r->input();

        $data1 = $input['eleaverecommender'];
        $data2 = $input['eleaveapprover'];


        $input = [
            'eleaverecommender' => $data1,
            'eleaveapprover' => $data2
        ];

        Employee::where('user_id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'eLeave Hierarchy is Updated';

        return $data;
    }

    public function updatetimehierarchy($r, $id)
    {
        $input = $r->input();


        $data2 = $input['tsapprover'];


        $input = [

            'tsapprover' => $data2
        ];

        Employee::where('user_id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Timesheet Hierarchy is Updated';

        return $data;
    }

    public function updatetimehierarchy2($r, $id)
    {
        $input = $r->input();


        $data2 = $input['tsapprover2'];


        $input = [

            'tsapprover2' => $data2
        ];

        Employee::where('user_id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Timesheet Hierarchy is Updated';

        return $data;
    }

    public function updateProfile_Picture($r, $id)
    {
        $input = $r->input();
        if ($r->hasFile('uploadFile')) {
            $uploadfile = uploadPic($r->file('uploadFile'));
            if ($uploadfile && array_key_exists('filename', $uploadfile)) {
                $input['uploadFile'] = $uploadfile['filename'];
            } else {
                unset($input['uploadFile']);
            }
        }

        UserProfile::where('user_id', $id)->update($input);

        $data['status'] = true;
        $data['title'] = 'Success';
        $data['type'] = 'success';
        $data['msg'] = 'Success Upload Profile Picture';
        $data['data'] = UserProfile::where('user_id', $input['user_id'])->first();

        return $data;
    }

    public function getEmployeeAddressDetails($id = '')
    {
        $data['data'] = UserAddress::where('id', $id)->first();
        $data['msg'] = 'Success Get Address Data';

        return $data;
    }

    public function addEmployeeAddressDetails($r)
    {
        $input = $r->input();

        if (!UserAddress::where('user_id', $input['user_id'])->exists()) {
            $input['addressType'] = '3';
        } else {
            $existingAddress = UserAddress::where('user_id', $input['user_id'])->first();
            if (in_array($existingAddress->addressType, ['3', '2', '1'])) {
                $input['addressType'] = '0';
            } else {
                $input['addressType'] = $existingAddress->addressType;
            }
        }

        UserAddress::create($input);


        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'New Address is created.';

        return $data;
    }



    public function updateEmployeeAddressDetails($r)
    {
        $input = $r->input();

        $id = $input['id'] ?? 1;

        $user = UserAddress::where('id', $id)->first();

        if(!$user)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Address not found';

        } else {

            $user->update($input);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Address is updated.';
        }

        return $data;
    }

    public function deleteEmployeeAddressDetails($id = '')
    {
        $addressDetails = UserAddress::where('id', $id)->first();

        if(!$addressDetails)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Address not found';
        }else{
            UserAddress::where('id',$id)->delete();
            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Address is deleted.';
        }

        return $data;
    }

    public function updateAddressType($r)
{
    $addressId = $r->input('addressId');
    $addressType = $r->input('addressType');

    // Update the address type in the database
    $address = UserAddress::find($addressId);
    $address->addressType = $addressType;
    $address->save();

    return response()->json(['success' => true]);
}


    public function addEmployeeEducation($r)
    {
        $input = $r->input();

        if ($_FILES['file']['name']) {
            $payslip = upload($r->file('file'));
            $input['file'] = $payslip['filename'];

            if (!$input['file']) {
                unset($input['file']);
            }
        }

        $input['user_id'] = $input['user_id'];
        UserQualificationEducation::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'New Education is created';

        return $data;
    }



    public function getEmployeeEducation($id = '')
    {
        $data['data'] = UserQualificationEducation::where('id', $id)->first();
        // pr(Storage::path($data['data']->supportDoc));
        $data['msg'] = 'Success Get Education Data';

        return $data;
    }

    public function updateEmployeeEducation($r)
    {
        $input = $r->input();

        if ($_FILES['file']['name']) {
            $payslip = upload($r->file('file'));
            $input['file'] = $payslip['filename'];

            if (!$input['file']) {
                unset($input['file']);
            }
        }

        $user_id = Auth::user()->id;
        $id = $input['id'] ?? 1;

        $user = UserQualificationEducation::where('id', $id)->first();

        if(!$user)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';

        }else{

            UserQualificationEducation::where('id', $id)->update($input);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success Update Education';
        }

        return $data;

    }

    public function deleteEmployeeEducation($id = '')
    {
        $user = UserQualificationEducation::where('id',$id)->first();

        if(!$user)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Education not found';
        }else{
            UserQualificationEducation::where('id',$id)->delete();
            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Education deleted';
        }

        return $data;
    }


    public function addEmployeeOthers($r)
    {
        $input = $r->input();

        if ($_FILES['file']['name']) {
            $payslip = upload($r->file('file'));
            $input['file'] = $payslip['filename'];

            if (!$input['file']) {
                unset($input['file']);
            }
        }

        $input['user_id'] = $input['user_id'];
        UserQualificationOthers::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'New others Education is created';

        return $data;
    }

    public function getEmployeeOthers($id = '')
    {
        $data['data'] = UserQualificationOthers::where('id', $id)->first();
        // pr(Storage::path($data['data']->supportDoc));
        $data['msg'] = 'Success Get Others Qualification';

        return $data;
    }

    public function updateEmployeeOthers($r)
    {
        $input = $r->input();

        if ($_FILES['file']['name']) {
            $payslip = upload($r->file('file'));
            $input['file'] = $payslip['filename'];

            if (!$input['file']) {
                unset($input['file']);
            }
        }

        $user_id = Auth::user()->id;
        $id = $input['id'] ?? 1;

        $user = UserQualificationOthers::where('id', $id)->first();

        if($user)
        {
            UserQualificationOthers::where('id', $id)->update($input);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success Update Others Qualification';

        }

        return $data;

    }

    public function deleteEmployeeOthers($id = '')
    {
        $user = UserQualificationOthers::where('id',$id)->first();

        if(!$user)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Others Qualification not found';
        }else{
            UserQualificationOthers::where('id',$id)->delete();
            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Others Qualification deleted';
        }

        return $data;
    }

    public function getEmployeeAddressforCompanion($id)
    {
     

        $addressDetails = UserAddress::select('useraddress.*', 'location_states.state_name', 'location_country.country_name')
        ->join('location_states', 'useraddress.state', '=', 'location_states.id')
        ->join('location_country', 'useraddress.country', '=', 'location_country.country_id')
        ->where('useraddress.user_id', $id)
        ->whereIn('useraddress.addressType', [1, 3])
        ->limit(1)
        ->first();

        if(!$addressDetails)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Address not found';
        }else{
            $data['data'] = $addressDetails;
            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success Get Address Data';
        }

        return $data;
    }


    public function getEmployeeByJobHistory($id)
    {
        $jobstatus = DB::table('jobhistory as jh')
        ->select('jh.id', 'e.employeeId', 'e.user_id', 'e.employeeName', 'e.employeeEmail', 'e.effectiveFrom', 'e.report_to',
            'jh.employmentDetail', 'jh.remarks', 'jh.statusHistory', 'a1.file' ,'up.fullName')
        ->leftjoin('employment as e', 'jh.user_id', '=', 'e.user_id')
        ->leftjoin('userprofile as up', 'e.report_to', '=', 'up.id')
        ->leftjoin('attachments as a1', 'a1.jobHistoryId', '=', 'jh.id')
        ->where('jh.id', $id)
        ->get();


        if(!$jobstatus)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'JobHistory Status not found';
        }else{
            $data['data'] = $jobstatus;
            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success Get JobHistory Status Data';
        }

        return $data;
    }

    public function getEmployeeByJobHistoryById($id = '')
    {
        $data['data'] =  DB::table('jobhistory as jh')
        ->select('jh.id', 'e.employeeId', 'e.user_id', 'e.employeeName', 'e.employeeEmail', 'e.effectiveFrom', 'e.report_to',
            'jh.employmentDetail', 'jh.remarks', 'jh.statusHistory', 'a1.file' ,'up.fullName')
        ->leftjoin('employment as e', 'jh.user_id', '=', 'e.user_id')
        ->leftjoin('userprofile as up', 'e.report_to', '=', 'up.id')
        ->leftjoin('attachments as a1', 'a1.jobHistoryId', '=', 'jh.id')
        ->where('jh.id', $id)
        ->first();
        $data['msg'] = 'Success Get Job History Data';

        return $data;
    }

}
