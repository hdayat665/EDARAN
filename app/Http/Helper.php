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
