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
function upload($request, $type = '')
    {
      $uploadedFile = $request->file($type);
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
