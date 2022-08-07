<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Overview - Material Admin Pro</title>
    @include('partials.styles')
</head>
<body class="nav-fixed bg-light">
    @include('partials.header')
    <!-- Layout content-->
    <div id="layoutDrawer">
        @include('partials.menu')

        <div id="layoutDrawer_content">
            <main>
                @yield('content')
            </main>

            @include('partials.footer')
        </div>
    </div>
    @include('partials.scripts')

</body>
</html>
