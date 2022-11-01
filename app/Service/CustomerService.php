<?php

namespace App\Service;

use App\Models\Attachments;
use App\Models\Employee;
use App\Models\JobHistory;
use App\Models\Customer;
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

class CustomerService
{
    public function customerView()
    {
        $tenant_id = Auth::user()->tenant_id;
        $data = Customer::where('tenant_id', $tenant_id)->get();
        if(!$data)
        {
            $data = [];
        }

        return $data;
    }

    public function createCustomer($r)
    {
        $input = $r->input();
        $input['tenant_id'] = Auth::user()->tenant_id;
        $input['addedBy'] = Auth::user()->username;

        Customer::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success create customer';

        return $data;
    }

    public function updateCustomer($r, $id)
    {
        $input = $r->input();
        $input['update_by'] = Auth::user()->id;

        Customer::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update Customer';

        return $data;
    }

    public function getCustomerById($id)
    {
        $data = Customer::find($id);

        return $data;
    }

    public function deleteCustomer($id)
    {
        $data = Customer::find($id);

        if (!$data) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Data not found';
        } else {
            $data->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success delete Customer';
        }

        return $data;
    }

    public function updateStatus($id, $status)
    {
        $customer['status'] = $status;
        $customer['update_by'] = Auth::user()->id;

        Customer::where('id', $id)->update($customer);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update Status';

        return $data;
    }
}
