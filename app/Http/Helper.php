<?php

use App\Models\ActivityLogs;
use App\Models\Branch;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\EmploymentType;
use App\Models\JobGrade;
use App\Models\Project;
use App\Models\ProjectLocation;
use App\Models\TimesheetEvent;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

if (!function_exists('pr')) {
    function pr($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        die;
    }
}

if (!function_exists('getCountryRegisterDomain')) {
    function getCountryRegisterDomain()
    {
        $data = ["Malaysia", 'Brunei', "Singapore"];
        return $data;
    }
}

if (!function_exists('upload')) {
    function upload($uploadedFile, $type = '')
    {
        $filename = time() . $uploadedFile->getClientOriginalName();

        Storage::disk('local')->putFileAs(
            'public/',
            $uploadedFile,
            $filename
        );

        $data['filename'] = $filename;

        return $data;
    }
}

if (!function_exists('dateFormat')) {
    function dateFormat($date = '')
    {
        $data = date_format(date_create($date), 'Y-m-d');

        return $data;
    }
}

if (!function_exists('dateFormatInput')) {
    function dateFormatInput($date = '')
    {
        $data = date_format(date_create($date), 'Y-m-d h:m:s');

        return $data;
    }
}

if (!function_exists('responseH')) {
    function responseH($user)
    {
        $token  = $user->createToken(str()->random(40))->plainTextToken;

        return response()->json([
            // 'user'=>$user,
            'token' => 'Bearer ' . $token,
            // 'token_type' => 'Bearer'
        ]);
    }
}

if (!function_exists('getMaritalStatus')) {
    function getMaritalStatus($id = '')
    {
        $data = [
            '0' => '-',
            '1' => 'Single',
            '2' => 'Married',
            '3' => 'Divorced',
            '4' => 'Widowed',
            '5' => 'Seperated',
        ];

        if ($id) {
            $data = $data[$id];
        }

        return $data;
    }
}

if (!function_exists('gender')) {
    function gender()
    {
        $data = [
            '1' => 'Male',
            '2' => 'Female',
        ];

        return $data;
    }
}

if (!function_exists('educationLevel')) {
    function educationLevel($id = '')
    {
        $data = [
            '0' => '-',
            '1' => 'primary school',
            '2' => 'lower secondary school',
            '3' => 'upper secondary school',
            '4' => 'pre-university',
            '5' => 'matriculation/foundation',
            '6' => 'higher education',
        ];

        if ($id) {
            $data = $data[$id];
        }

        return $data;
    }
}

if (!function_exists('educationType')) {
    function educationType($id = '')
    {
        $data = [
            '0' => '-',
            '1' => 'primary school (year 6-12)',
            '2' => 'lower secondary school (form 1-3)',
            '3' => 'upper secondary school (form 4 & 5)',
            '4' => 'pre-university (STMP / STAM)',
            '5' => 'matriculation/foundation ',
            '6' => 'higher education Diploma/ Bachelor Degree/ Master Degree/ Doctoral Degree',
        ];

        if ($id) {
            $data = $data[$id];
        }

        return $data;
    }
}

if (!function_exists('relationship')) {
    function relationship($id = '')
    {
        $data = [
            '0' => '-',
            '1' => 'Grand Father',
            '2' => 'Grand Mother',
            '3' => 'Grand Father-In-Law',
            '4' => 'Grand Mother-In-Law',
            '5' => 'Father',
            '6' => 'Mother',
            '7' => 'Father-In-Law',
            '8' => 'Mother-In-Law',
            '9' => 'Guardian',
        ];

        if ($id) {
            $data = $data[$id];
        }

        return $data;
    }
}

if (!function_exists('city')) {
    function city()
    {
        $data = [
            '1' => 'city1',
            '2' => 'city2',
        ];

        return $data;
    }
}

if (!function_exists('state1')) {
    function state1()
    {
        $data = [
            '1' => 'state1',
            '2' => 'state2',
        ];

        return $data;
    }
}

if (!function_exists('americas')) {
    function americas()
    {
        $data = [
            'AI' => "Anguilla",
            'AG' => "Antigua and Barbuda",
            'AR' => "Argentina",
            'AW' => "Aruba",
            'BS' => "Bahamas",
            'BB' => "Barbados",
            'BZ' => "Belize",
            'BM' => "Bermuda",
            'BO' => "Bolivia",
            'BR' => "Brazil",
            'VG' => "British Virgin Islands",
            'CA' => "Canada",
            'KY' => "Cayman Islands",
            'CL' => "Chile",
            'CO' => "Colombia",
            'CR' => "Costa Rica",
            'CU' => "Cuba",
            'DM' => "Dominica",
            'DO' => "Dominican Republic",
            'EC' => "Ecuador",
            'SV' => "El Salvador",
            'FK' => "Falkland Islands",
            'GF' => "French Guiana",
            'GL' => "Greenland",
            'GD' => "Grenada",
            'GP' => "Guadeloupe",
            'GT' => "Guatemala",
            'GY' => "Guyana",
            'HT' => "Haiti",
            'HN' => "Honduras",
            'JM' => "Jamaica",
            'MQ' => "Martinique",
            'MX' => "Mexico",
            'MS' => "Montserrat",
            'AN' => "Netherlands Antilles",
            'NI' => "Nicaragua",
            'PA' => "Panama",
            'PY' => "Paraguay",
            'PE' => "Peru",
            'PR' => "Puerto Rico",
            'BL' => "Saint Barthélemy",
            'KN' => "Saint Kitts and Nevis",
            'LC' => "Saint Lucia",
            'MF' => "Saint Martin",
            'PM' => "Saint Pierre and Miquelon",
            'VC' => "Saint Vincent and the Grenadines",
            'SR' => "Suriname",
            'TT' => "Trinidad and Tobago",
            'TC' => "Turks and Caicos Islands",
            'VI' => "U.S. Virgin Islands",
            'US' => "United States",
            'UY' => "Uruguay",
            'VE' => "Venezuela"
        ];

        return $data;
    }
}

if (!function_exists('asias')) {
    function asias()
    {
        $data = [
            'AF' => "Afghanistan",
            'AM' => "Armenia",
            'AZ' => "Azerbaijan",
            'BH' => "Bahrain",
            'BD' => "Bangladesh",
            'BT' => "Bhutan",
            'BN' => "Brunei",
            'KH' => "Cambodia",
            'CN' => "China",
            'GE' => "Georgia",
            'HK' => "Hong Kong SAR China",
            'IN' => "India",
            'ID' => "Indonesia",
            'IR' => "Iran",
            'IQ' => "Iraq",
            'IL' => "Israel",
            'JP' => "Japan",
            'JO' => "Jordan",
            'KZ' => "Kazakhstan",
            'KW' => "Kuwait",
            'KG' => "Kyrgyzstan",
            'LA' => "Laos",
            'LB' => "Lebanon",
            'MO' => "Macau SAR China",
            'MY' => "Malaysia",
            'MV' => "Maldives",
            'MN' => "Mongolia",
            'MM' => "Myanmar [Burma]",
            'NP' => "Nepal",
            'NT' => "Neutral Zone",
            'KP' => "North Korea",
            'OM' => "Oman",
            'PK' => "Pakistan",
            'PS' => "Palestinian Territories",
            'YD' => "People's Democratic Republic of Yemen",
            'PH' => "Philippines",
            'QA' => "Qatar",
            'SA' => "Saudi Arabia",
            'SG' => "Singapore",
            'KR' => "South Korea",
            'LK' => "Sri Lanka",
            'SY' => "Syria",
            'TW' => "Taiwan",
            'TJ' => "Tajikistan",
            'TH' => "Thailand",
            'TL' => "Timor-Leste",
            'TR' => "Turkey",
            'TM' => "Turkmenistan",
            'AE' => "United Arab Emirates",
            'UZ' => "Uzbekistan",
            'VN' => "Vietnam",
            'YE' => "Yemen"
        ];

        return $data;
    }
}


if (!function_exists('getCompany')) {
    function getCompany()
    {
        $data = Company::where('tenant_id', Auth::user()->tenant_id)->get();

        if (blank($data)) {
            $data = [];
        }

        return $data;
    }
}


if (!function_exists('getDepartment')) {
    function getDepartment($id = '')
    {
        if ($id) {
            $data = Department::find($id);
        } else {
            $data = Department::where('tenant_id', Auth::user()->tenant_id)->get();
        }

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getUnit')) {
    function getUnit()
    {
        $data = Unit::where('tenant_id', Auth::user()->tenant_id)->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getBranch')) {
    function getBranch()
    {
        $data = Branch::where('tenant_id', Auth::user()->tenant_id)->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getJobGrade')) {
    function getJobGrade()
    {
        $data = JobGrade::where('tenant_id', Auth::user()->tenant_id)->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getDesignation')) {
    function getDesignation()
    {
        $data = Designation::where('tenant_id', Auth::user()->tenant_id)->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getEmploymentType')) {
    function getEmploymentType()
    {
        $data = EmploymentType::where('tenant_id', Auth::user()->tenant_id)->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getCustomer')) {
    function getCustomer()
    {
        $data = Customer::where('tenant_id', Auth::user()->tenant_id)->get();

        return $data;
    }
}

if (!function_exists('getStatusProject')) {
    function getStatusProject()
    {
        $data = [
            'Ongoing' => 'Ongoing',
            'Warranty' => 'Warranty',
            'Closed' => 'Closed',
        ];

        return $data;
    }
}

if (!function_exists('getContractType')) {
    function getContractType()
    {
        $data = [
            'EXT' => 'EXT',
            'ORI' => 'ORI',
            'VO' => 'VO',
        ];

        return $data;
    }
}

if (!function_exists('getFinancialYear')) {
    function getFinancialYear()
    {
        $data = [
            '2025' => '2025',
            '2024' => '2024',
            '2023' => '2023',
            '2022' => '2022',
            '2021' => '2021',
            '2020' => '2020',
        ];

        return $data;
    }
}



if (!function_exists('getEvent')) {
    function getEvent()
    {
        $data = [
            '1' => 'event1',
            '2' => 'event2',
        ];

        return $data;
    }
}

if (!function_exists('getVehicle')) {
    function getVehicle()
    {
        $data = [
            '1' => 'Car',
            '2' => 'Motorcycle',
        ];

        return $data;
    }
}


if (!function_exists('religion')) {
    function religion()
    {
        $data = [
            'Islam' => 'Islam',
            'Buddhist' => 'Buddhist',
            'Christian' => 'Christian',
            'Hindu' => 'Hindu',
            'Others' => 'Others',
        ];

        return $data;
    }
}

if (!function_exists('race')) {
    function race()
    {
        $data = [
            'Malay' => 'Malay',
            'Chinese' => 'Chinese',
            'Indian' => 'Indian',
            'Others' => 'Others',
        ];

        return $data;
    }
}

if (!function_exists('state')) {
    function state()
    {
        $data = [
            'Johor' => 'Johor',
            'Kedah' => 'Kedah',
            'Kelantan' => 'Kelantan',
            'Negeri Sembilan' => 'Negeri Sembilan',
            'Pahang' => 'Pahang',
            'Penang' => 'Penang',
            'Perak' => 'Perak',
            'Perlis' => 'Perlis',
            'Sabah' => 'Sabah',
            'Sarawak' => 'Sarawak',
            'Selangor' => 'Selangor',
            'Terengganu' => 'Terengganu',
            'Kuala Lumpur' => 'Kuala Lumpur',
            'Labuan' => 'Labuan',
            'Putrajaya' => 'Putrajaya'
        ];

        return $data;
    }
}

if (!function_exists('customer')) {
    function customer()
    {
        $data = Customer::where('tenant_id', Auth::user()->tenant_id)->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('projectLocation')) {
    function projectLocation()
    {
        $data = ProjectLocation::where('tenant_id', Auth::user()->tenant_id)->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getEmployee')) {
    function getEmployee()
    {
        $data = Employee::where('tenant_id', Auth::user()->tenant_id)->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('accManager')) {
    function accManager()
    {
        $data = DB::table('project as a')
            ->leftJoin('employment as b', 'a.acc_manager', '=', 'b.id')
            ->select('b.id', 'b.employeeName as name')
            ->groupBy('acc_manager')
            // ->whereNotIn('a.id', $projectId)
            ->where('a.tenant_id', Auth::user()->tenant_id)
            ->get();
        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('prjManager')) {
    function prjManager()
    {
        $data = DB::table('project as a')
            ->leftJoin('employment as b', 'a.project_manager', '=', 'b.id')
            ->select('b.id', 'b.employeeName as name')
            ->groupBy('project_manager')
            // ->whereNotIn('a.id', $projectId)
            ->where('a.tenant_id', Auth::user()->tenant_id)
            ->get();
        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('project')) {
    function project($user_id = '')
    {
        $cond[1] = ['tenant_id', Auth::user()->tenant_id];

        if ($user_id) {
            $cond[2] = ['user_id', '=', $user_id];
        }
        $data = Project::where($cond)->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('project_member')) {
    function project_member($user_id = '')
    {
        $cond[1] = ['a.tenant_id', Auth::user()->tenant_id];

        if ($user_id) {
            $cond[2] = ['a.user_id', '=', $user_id];
        }

        $data = DB::table('employment as a')
            ->leftJoin('project_member as b', 'a.id', '=', 'b.employee_id')
            ->leftJoin('project as c', 'b.project_id', '=', 'c.id')
            ->select('c.id', 'c.project_name', 'c.project_code')
            ->where($cond)
            ->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('activityName')) {
    function activityName($departmentId = '')
    {
        $cond[1] = ['tenant_id', Auth::user()->tenant_id];
        // $cond[1] = ['tenant_id', ];
        $cond[2] = ['department', $departmentId];
        // $cond[3] = ['project_id', null];
        $data = ActivityLogs::where($cond)->get();
        if (!$data) {
            $data = [];
        }

        return $data;
    }
}

if (!function_exists('getEventTimesheet')) {
    function getEventTimesheet()
    {
        $data = TimesheetEvent::where('tenant_id', Auth::user()->tenant_id)->get();

        return $data;
    }
}

if (!function_exists('month')) {
    function month()
    {
        $data = [
            '1' => 'January',
            '2' => 'February',
            '3' => 'March',
            '4' => 'May',
            '5' => 'Jun',
            '6' => 'July',
            '7' => 'August',
        ];

        return $data;
    }
}

if (!function_exists('year')) {
    function year()
    {
        $data = [
            '2018' => '2018',
            '2019' => '2019',
            '2020' => '2020',
            '2021' => '2021',
            '2022' => '2022',
        ];

        return $data;
    }
}
