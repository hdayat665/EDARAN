<?php
namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Service\CustomerService;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    public function customerView()
    {
        $data = [];

        $ps = new CustomerService;

        $data['customers'] = $ps->customerView();

        return view('pages.project.customer.customerTable', $data);
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
