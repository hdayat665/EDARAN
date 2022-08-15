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

</head>

<body class="off-canvas-sidebar">
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
        <div class="container">
            <div class="navbar-wrapper">
                <a class="navbar-brand" href="javascript:;">Login Page</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item  {{$forgotPass ?? null}} ">
                        <a href="/forgotPassView" class="nav-link">
                            <i class="material-icons">key_off</i>
                            Forgot Password?
                        </a>
                    </li>
                    <li class="nav-item  {{$forgotDomain ?? null}} ">
                        <a href="/forgotDomainView" class="nav-link">
                            <i class="material-icons">domain</i>
                            Forgot Domain?
                        </a>
                    </li>
                    <li class="nav-item {{$domain ?? null}}">
                        <a href="/domainView" class="nav-link">
                            <i class="material-icons">dashboard</i>
                            Login Domain
                        </a>
                    </li>
                    <li class="nav-item {{$register ?? null}} ">
                        <a href="/registerView" class="nav-link">
                            <i class="material-icons">person_add</i>
                            Register Domain
                        </a>
                    </li>
                    <li class="nav-item  {{$tenant ?? null}} ">
                        <a href="/" class="nav-link">
                            <i class="material-icons">fingerprint</i>
                            Login Tenant
                        </a>
                    </li>
                    <li class="nav-item  {{$admin ?? null}} ">
                        <a href="/loginAdmin" class="nav-link">
                            <i class="material-icons">fingerprint</i>
                            Login Admin
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper wrapper-full-page">
        <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('/public/img/login.jpg'); background-size: cover; background-position: top center;">
            @yield('content')
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="/public/js/core/jquery.min.js"></script>
    <script src="/public/js/core/popper.min.js"></script>
    <script src="/public/js/core/bootstrap-material-design.min.js"></script>
    <script src="/public/js/plugins/perfect-scrollbar.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chartist JS -->
    <script src="/public/js/plugins/chartist.min.js"></script>
    <script src="/public/js/plugins/bootstrap-selectpicker.js"></script>

    <!--  Notifications Plugin    -->
    <script src="/public/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="/public/js/material-dashboard.js?v=2.2.2" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
    <script type="text/javascript">
        var require = {
            baseUrl: "/public/assets/js/",
            waitSeconds: 15,
            urlArgs: "bust=10"
        };
    </script>
    <script src="/public/assets/js/require.js" data-main="controller"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->

    <script>
        $(document).ready(function() {
            $().ready(function() {
                $sidebar = $('.sidebar');

                $sidebar_img_container = $sidebar.find('.sidebar-background');

                $full_page = $('.full-page');

                $sidebar_responsive = $('body > .navbar-collapse');

                window_width = $(window).width();

                fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                    if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                        $('.fixed-plugin .dropdown').addClass('open');
                    }

                }

                $('.fixed-plugin a').click(function(event) {
                    // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                    if ($(this).hasClass('switch-trigger')) {
                        if (event.stopPropagation) {
                            event.stopPropagation();
                        } else if (window.event) {
                            window.event.cancelBubble = true;
                        }
                    }
                });

                $('.fixed-plugin .active-color span').click(function() {
                    $full_page_background = $('.full-page-background');

                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data-color', new_color);
                    }

                    if ($full_page.length != 0) {
                        $full_page.attr('filter-color', new_color);
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.attr('data-color', new_color);
                    }
                });

                $('.fixed-plugin .background-color .badge').click(function() {
                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('background-color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data-background-color', new_color);
                    }
                });

                $('.fixed-plugin .img-holder').click(function() {
                    $full_page_background = $('.full-page-background');

                    $(this).parent('li').siblings().removeClass('active');
                    $(this).parent('li').addClass('active');


                    var new_image = $(this).find("img").attr('src');

                    if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        $sidebar_img_container.fadeOut('fast', function() {
                            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                            $sidebar_img_container.fadeIn('fast');
                        });
                    }

                    if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                        $full_page_background.fadeOut('fast', function() {
                            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                            $full_page_background.fadeIn('fast');
                        });
                    }

                    if ($('.switch-sidebar-image input:checked').length == 0) {
                        var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                    }
                });

                $('.switch-sidebar-image input').change(function() {
                    $full_page_background = $('.full-page-background');

                    $input = $(this);

                    if ($input.is(':checked')) {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar_img_container.fadeIn('fast');
                            $sidebar.attr('data-image', '#');
                        }

                        if ($full_page_background.length != 0) {
                            $full_page_background.fadeIn('fast');
                            $full_page.attr('data-image', '#');
                        }

                        background_image = true;
                    } else {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar.removeAttr('data-image');
                            $sidebar_img_container.fadeOut('fast');
                        }

                        if ($full_page_background.length != 0) {
                            $full_page.removeAttr('data-image', '#');
                            $full_page_background.fadeOut('fast');
                        }

                        background_image = false;
                    }
                });

                $('.switch-sidebar-mini input').change(function() {
                    $body = $('body');

                    $input = $(this);

                    if (md.misc.sidebar_mini_active == true) {
                        $('body').removeClass('sidebar-mini');
                        md.misc.sidebar_mini_active = false;

                        if ($(".sidebar").length != 0) {
                            var ps = new PerfectScrollbar('.sidebar');
                        }
                        if ($(".sidebar-wrapper").length != 0) {
                            var ps1 = new PerfectScrollbar('.sidebar-wrapper');
                        }
                        if ($(".main-panel").length != 0) {
                            var ps2 = new PerfectScrollbar('.main-panel');
                        }
                        if ($(".main").length != 0) {
                            var ps3 = new PerfectScrollbar('main');
                        }

                    } else {

                        if ($(".sidebar").length != 0) {
                            var ps = new PerfectScrollbar('.sidebar');
                            ps.destroy();
                        }
                        if ($(".sidebar-wrapper").length != 0) {
                            var ps1 = new PerfectScrollbar('.sidebar-wrapper');
                            ps1.destroy();
                        }
                        if ($(".main-panel").length != 0) {
                            var ps2 = new PerfectScrollbar('.main-panel');
                            ps2.destroy();
                        }
                        if ($(".main").length != 0) {
                            var ps3 = new PerfectScrollbar('main');
                            ps3.destroy();
                        }


                        setTimeout(function() {
                            $('body').addClass('sidebar-mini');

                            md.misc.sidebar_mini_active = true;
                        }, 300);
                    }

                    // we simulate the window Resize so the charts will get updated in realtime.
                    var simulateWindowResize = setInterval(function() {
                        window.dispatchEvent(new Event('resize'));
                    }, 180);

                    // we stop the simulation of Window Resize after the animations are completed
                    setTimeout(function() {
                        clearInterval(simulateWindowResize);
                    }, 1000);

                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            md.checkFullPageBackgroundImage();
            setTimeout(function() {
                // after 1000 ms we add the class animated to the login/register card
                $('.card').removeClass('card-hidden');
            }, 700);
        });
    </script>
</body>

</html>
