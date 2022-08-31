<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="utf-8" />
    <title>OrbitHRM | Login </title>
    <link rel="shortcut icon" href="{{env('ASSETS_URL')}}/img/logo/orbit-sm.png" >

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- ================== BEGIN core-css ================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">	<link href="{{env('ASSETS_URL')}}/css/vendor.min.css" rel="stylesheet" />
    <link href="{{env('ASSETS_URL')}}/css/default/app.min.css" rel="stylesheet" />
    <style>
        .error{
            /* margin-top:2.4rem !important; */
            color: red !important;
            text-align: left !important;
        }
    </style>
    <!-- ================== END core-css ================== -->
</head>
<body class='pace-top'>
    <div id="loader" class="app-loader">
        <span class="spinner"></span>
    </div>


    @yield('content')

    <!-- ================== BEGIN core-js ================== -->
    {{-- <script src="{{env('ASSETS_URL')}}/js/app.min.js"></script>
    <script src="{{env('ASSETS_URL')}}/js/vendor.min.js"></script> --}}

    <!-- ================== END core-js ================== -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/latest/js.cookie.min.js" integrity="sha512-iewyUmLNmAZBOOtFnG+GlGeGudYzwDjE1SX3l9SWpGUs0qJTzdeVgGFeBeU7/BIyOZdDy6DpILikEBBvixqO9Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/latest/js.cookie.js" integrity="sha512-Xs74m0wxSrwMFibw3X6ttPnIO4E+J311Tae0hXyi29lK4hNRNQ+ySm9iI5dt1zPcr7DxtWu8OuRTgFy6s9Eijw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.min.js" integrity="sha512-8Y8eGK92dzouwpROIppwr+0kPauu0qqtnzZZNEF8Pat5tuRNJxJXCkbQfJ0HlUG3y1HB3z18CSKmUo7i2zcPpg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">

        var require = {
            baseUrl: "{{env('ASSETS_URL')}}/js/",
            waitSeconds: 15,
            urlArgs: "bust=10"
        };
    </script>
    <script src="{{env('ASSETS_URL')}}/js/require.js" data-main="controller"></script>
<div id="loginVendorApp"></div>
    <!-- END #app -->


</body>
</html>
