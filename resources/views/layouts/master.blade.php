<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="/public/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/public/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Material Dashboard PRO by Creative Tim
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css">
    <!-- CSS Files -->
    <link href="/public/css/material-dashboard.css?v=2.2.2" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="/public/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
    <div class="wrapper ">
        <!-- Menu -->
        @include('partials.menu')
        <!-- Navbar -->
        <div class="main-panel">
            @include('partials.header')
            {{-- Content --}}
            <div class="content">
                <div class="content">
                    @yield('content')
                </div>
            </div>

            @include('partials.footer')
        </div>
    </div>
    @include('partials.fixedPlugin')
    @include('partials.scripts')

</body>
</html>
