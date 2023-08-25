<?php
namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Service\CustomerService;
use Illuminate\Http\Request;

use App\Service\myClaimService;
use App\Service\SettingService;
use Illuminate\Support\Facades\Auth;


class CustomerController extends Controller
{
    public function customerView()
    {
        $data = [];

        $ps = new CustomerService;

        $data['customers'] = $ps->customerView();
        $data['country'] = $ps->customerCountry();
        $data['state'] = $ps->customerState();
        $data['city'] = $ps->customerCity();
        $data['postcode'] = $ps->customerPostcode();

        return view('pages.project.customerTable', $data);
    }

    public function getStatebyCountry($id = '')
    {
        $ss = new CustomerService;

        $result = $ss->getStatebyCountry($id);


        return $result;
    }

    public function getCitybyState($id = '')
    {
        $ss = new CustomerService;

        $result = $ss->getCitybyState($id);


        return $result;
    }

    public function getPostcodeByCity($id = '')
    {
        $ss = new CustomerService;

        $result = $ss->getPostcodeByCity($id);

        return $result;
    }

    public function createCustomer(Request $r)
    {
        $ps = new CustomerService;

        $result = $ps->createCustomer($r);

        return response()->json($result);
    }

    public function updateCustomer(Request $r, $id)
    {
        $ss = new CustomerService;

        $result = $ss->updateCustomer($r, $id);

        return response()->json($result);
    }

    public function getCustomerById($id)
    {
        $ss = new CustomerService;

        $result = $ss->getCustomerById($id);

        return response()->json($result);
    }

    public function deleteCustomer($id)
    {
        $ss = new CustomerService;

        $result = $ss->deleteCustomer($id);

        return response()->json($result);
    }

    public function updateStatus($id, $status)
    {
        $ss = new CustomerService;

        $result = $ss->updateStatus($id, $status);

        return response()->json($result);
    }
}
