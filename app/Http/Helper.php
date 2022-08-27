<?php

if (! function_exists('pr')) {
    function pr($data) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        die;
    }
}

if (! function_exists('getCountryRegisterDomain')) {
    function getCountryRegisterDomain() {
        $data = ["Malaysia", 'Brunei', "Singapore"];
        return $data;
    }
}

if (! function_exists('upload')) {
function upload($uploadedFile, $type = '')
    {
      $filename = time().$uploadedFile->getClientOriginalName();

      Storage::disk('local')->putFileAs(
        'files/',
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

if (! function_exists('responseH')) {
function responseH($user)
    {
        $token  = $user->createToken( str()->random(40) )->plainTextToken;

        return response()->json([
            // 'user'=>$user,
            'token' => 'Bearer '.$token,
            // 'token_type' => 'Bearer'
        ]);
    }
}

if (!function_exists('getMaritalStatus')) {
    function getMaritalStatus()
    {
        $data = [
            '1' => 'Single',
            '2' => 'Married',
            '3' => 'Divorced',
            '4' => 'Widowed',
            '5' => 'Seperated',
        ];

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
    function educationLevel()
    {
        $data = [
            '1' => 'primary school',
            '2' => 'lower secondary school',
            '3' => 'upper secondary school',
            '4' => 'pre-university',
            '5' => 'matriculation/foundation',
            '6' => 'higher education',
        ];

        return $data;
    }
}

if (!function_exists('educationType')) {
    function educationType()
    {
        $data = [
            '1' => 'primary school (year 6-12)',
            '2' => 'lower secondary school (form 1-3)',
            '3)' => 'upper secondary school (form 4 & 5)',
            '4' => 'pre-university (STMP / STAM)',
            '5' => 'matriculation/foundation ',
            '6' => 'higher education Diploma/ Bachelor Degree/ Master Degree/ Doctoral Degree',
        ];

        return $data;
    }
}
