<?php

namespace App\Service;

use App\Models\DepartmentTree;
use App\Models\OrganizationChart;
use App\Models\PhoneDirectory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class OrganizationService
{
    public function getPhoneDirectory()
    {
        $data = [];
        $data['data'] = PhoneDirectory::all();
        $data['status'] = true;
        $data['msg'] = 'Success get PhoneDirectory';

        return $data;
    }

    public function getOrganizationChart()
    {
        $data = [];
        $data['data'] = OrganizationChart::all();
        $data['status'] = true;
        $data['msg'] = 'Success get OrganizationChart';

        return $data;
    }

    public function getDepartmentTree()
    {
        $data = [];
        $data['data'] = DepartmentTree::all();
        $data['status'] = true;
        $data['msg'] = 'Success get DepartmentTree';

        return $data;
    }

}
