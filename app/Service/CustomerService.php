<?php

namespace App\Service;

use App\Models\Attachments;
use App\Models\Employee;
use App\Models\State;
use App\Models\Country;
use App\Models\Location;
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
        $data = Customer::select('customer.*', 'location_states.state_name',
        'location_country.country_name'
        )
        ->leftjoin('location_states', 'customer.state', '=', 'location_states.id')
        ->leftjoin('location_country', 'customer.country', '=', 'location_country.country_id')
        ->where('customer.tenant_id', '=', $tenant_id)

        ->orderByDesc('customer.id')
        ->get();

        if(!$data)
        {
            $data = [];
        }

        return $data;
    }

    public function customerCountry()
    {
        $data = Country::all();

        return $data;
    }

    public function customerState()
    {
        $data = State::all();

        return $data;
    }

    public function customerCity()
    {
        $data = Location::all();

        return $data;
    }

    public function customerPostcode()
    {
        $data = Location::all();

        return $data;
    }

    public function getStatebyCountry($id = '')
    {
        $data = Country::join('location_states', 'location_states.country_id', '=', 'location_country.country_id')
            ->where('location_states.country_id', $id)
            ->get();

        return $data;
    }

    public function getCitybyState($id = '')
    {
        $data = State::join('location_cities', 'location_states.id', '=', 'location_cities.state_id')
            ->where('location_cities.state_id', $id)
            ->groupBy('location_cities.name')
            ->get();

        return $data;
    }

    public function getPostcodeByCity($id = '')
    {

        $data = Location::select('*')
            ->where('name', $id)
            ->get();

        return $data;
    }

    public function createCustomer($r)
    {
        $input = $r->input();
        $etData = customer::where([['customer_name', $input['customer_name']], ['tenant_id', Auth::user()->tenant_id]])->first();
        if ($etData) {
            $data['msg'] = 'Customer already exists.';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }

        $input['tenant_id'] = Auth::user()->tenant_id;
        $input['addedBy'] = Employee::where('user_id', Auth::user()->id)->select('employeeName')->first()->employeeName;
        $input['status'] = 1;
        $address2 = $input['address2'] ?? null;
        // $data = Employee::where('user_id', $id)->select('employeeName')->first()->employeeName;

        $getid = Location::select('id')
            ->where('country_id', '=', $input['country'])
            ->where('state_id', '=', $input['state'])
            ->where('name', '=', $input['city'])
            ->where('postcode', '=', $input['postcode'])
            ->first();

        Customer::create($input);
        $data['americass'] = americas();
        $data['asias'] = asias();
        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Customer is Created.';

        return $data;
    }

    public function updateCustomer($r, $id)
    {
        $input = $r->input();

        $etData = customer::where([['customer_name', $input['customer_name']], ['tenant_id', Auth::user()->tenant_id]])->first();
        // if ($etData) {
        //     $data['msg'] = 'Customer already exists.';
        //     $data['status'] = config('app.response.error.status');
        //     $data['type'] = config('app.response.error.type');
        //     $data['title'] = config('app.response.error.title');

        //     return $data;
        // }
        $input['update_by'] = Auth::user()->id;
        $address2 = $input['address2'] ?? null;
        $getid = Location::select('id')
            ->where('country_id', '=', $input['country'])
            ->where('state_id', '=', $input['state'])
            ->where('name', '=', $input['city'])
            ->where('postcode', '=', $input['postcode'])
            ->first();

        Customer::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Customer is Updated.';
        // $data['americass'] = americas();
        // $data['asias'] = asias();
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
            $data['msg'] = 'Success Delete Customer';
        }

        return $data;
    }

    public function updateStatus($id, $status)
    {
        $customer['status'] = $status;
        $customer['update_by'] = Auth::user()->id;

        Customer::where('id', $id)->update($customer);

        if ($customer['status'] == 1) {
            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Customer is Activated.';
        } elseif ($customer['status'] == 2) {
            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Customer is Deactivated.';
        } else {
            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Unknown Status';
        }
        return $data;
    }
}
