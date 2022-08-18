<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="utf-8" />
    <title>OrbitHRM | Dashboard 1</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <link rel="shortcut icon" href="/public/assets/img/logo/orbit-sm.png" >
    <!-- ================== BEGIN core-css ================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">	<link href="/public/assets/css/vendor.min.css" rel="stylesheet" />
    <link href="/public/assets/css/vendor.min.css" rel="stylesheet" />
    <link href="/public/assets/css/default/app.min.css" rel="stylesheet" />
    <!-- ================== END core-css ================== -->

    <!-- ================== BEGIN page-css ================== -->
    <link href="/public/assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
    <link href="/public/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="/public/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
    <!-- ================== END page-css ================== -->
</head>
<body>
    <!-- BEGIN #loader -->
    <div id="loader" class="app-loader">
        <span class="spinner"></span>
    </div>
    <!-- END #loader -->

    <!-- BEGIN #app -->
    <div id="app" class="app app-header-fixed app-sidebar-fixed ">
        <!-- BEGIN #header -->
        <div id="header" class="app-header">
            <!-- BEGIN navbar-header -->
            <div class="navbar">
                <a href=""><span class="navbar-logo">
                    <img src="/public/assets/img/logo/orbit-logo-5.png" class="navbar-logo navbar-brand"  alt="...">

                </span></a>
                <button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- END navbar-header -->
            <!-- BEGIN header-nav -->
            <div class="navbar-nav">

                <div class="navbar-item dropdown">
                    <a href="#" data-bs-toggle="dropdown" class="navbar-link dropdown-toggle icon">
                        <i class="fa fa-bell"></i>
                        <span class="badge">5</span>
                    </a>
                    <div class="dropdown-menu media-list dropdown-menu-end">
                        <div class="dropdown-header">NOTIFICATIONS (5)</div>
                        <a href="javascript:;" class="dropdown-item media">
                            <div class="media-left">
                                <i class="fa fa-bug media-object bg-gray-500"></i>
                            </div>
                            <div class="media-body">
                                <h6 class="media-heading">Server Error Reports <i class="fa fa-exclamation-circle text-danger"></i></h6>
                                <div class="text-muted fs-10px">3 minutes ago</div>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item media">
                            <div class="media-left">
                                <img src="/public/assets/img/user/user-1.jpg" class="media-object" alt="" />
                                <i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
                            </div>
                            <div class="media-body">
                                <h6 class="media-heading">John Smith</h6>
                                <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                <div class="text-muted fs-10px">25 minutes ago</div>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item media">
                            <div class="media-left">
                                <img src="/public/assets/img/user/user-2.jpg" class="media-object" alt="" />
                                <i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
                            </div>
                            <div class="media-body">
                                <h6 class="media-heading">Olivia</h6>
                                <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                <div class="text-muted fs-10px">35 minutes ago</div>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item media">
                            <div class="media-left">
                                <i class="fa fa-plus media-object bg-gray-500"></i>
                            </div>
                            <div class="media-body">
                                <h6 class="media-heading"> New User Registered</h6>
                                <div class="text-muted fs-10px">1 hour ago</div>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item media">
                            <div class="media-left">
                                <i class="fa fa-envelope media-object bg-gray-500"></i>
                                <i class="fab fa-google text-warning media-object-icon fs-14px"></i>
                            </div>
                            <div class="media-body">
                                <h6 class="media-heading"> New Email From John</h6>
                                <div class="text-muted fs-10px">2 hour ago</div>
                            </div>
                        </a>
                        <div class="dropdown-footer text-center">
                            <a href="javascript:;" class="text-decoration-none">View more</a>
                        </div>
                    </div>
                </div>

                <div class="navbar-item navbar-user dropdown">
                    <a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                        <img src="/public/assets/img/user/user-13.jpg" alt="" />
                        <span>
                            <span class="d-none d-md-inline">Adam Schwartz</span>
                            <b class="caret"></b>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end me-1">
                        <a href="javascript:;" class="dropdown-item">Edit Profile</a>
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center">
                            Inbox
                            <span class="badge bg-danger rounded-pill ms-auto pb-4px">2</span>
                        </a>
                        <a href="javascript:;" class="dropdown-item">Calendar</a>
                        <a href="javascript:;" class="dropdown-item">Setting</a>
                        <div class="dropdown-divider"></div>
                        <a href="/logout/tenant" class="dropdown-item">Log Out</a>
                    </div>
                </div>
            </div>
            <!-- END header-nav -->
        </div>
        <!-- END #header -->

        <!-- BEGIN #sidebar -->
        <div id="sidebar" class="app-sidebar bg-gradient-gray">
            <!-- BEGIN scrollbar -->
            <div class="app-sidebar-content bg-white" data-scrollbar="true" data-height="100%">
                <!-- BEGIN menu -->
                <div class="menu">
                    <!-- Sidenav Content Orbit -->

                    <div class="menu-item has-sub mt-3">
                        <a href="#" class="menu-link">
                            <div class="menu-icon">
                                <i class="fa fa-clipboard-list text-gray"></i>
                            </div>
                            <div class="menu-text text-gray">Dashboard</div>

                        </div>

                        <div class="menu-item has-sub">
                            <!-- <a href="#" class="menu-link"> -->
                                <div class="menu-icon">
                                    <i class="fa fa-user-circle text-gray"></i>
                                </div>
                                <div class="menu-text text-gray">Tenants</div>

                            </a>

                        </div>

                        <!-- End Sidenav Content Orbit -->

                        <!-- Sidenav Content Orbit -->

                        <div class="menu-item has-sub">
                            <a href="#" class="menu-link">
                                <div class="menu-icon">
                                    <i class="fa fa-user-edit text-gray"></i>
                                </div>
                                <div class="menu-text text-gray">Editions</div>

                            </a>

                        </div>

                        <!-- End Sidenav Content Orbit -->
                        <!-- Sidenav Content Orbit -->

                        <div class="menu-item has-sub">
                            <a href="#" class="menu-link">
                                <div class="menu-icon">
                                    <i class="fa fa-gear text-gray"></i>
                                </div>
                                <div class="menu-text text-gray">Settings</div>

                            </a>

                        </div>

                        <!-- End Sidenav Content Orbit -->


                        <!-- BEGIN minify-button -->
                        <!-- <div class="menu-item d-flex text-gray">
                            <a href="javascript:;" class="app-sidebar-minify-btn ms-auto text-gray" data-toggle="app-sidebar-minify"><i class="fa fa-angle-double-left"></i></a>
                        </div> -->
                        <!-- END minify-button -->
                    </div>
                    <!-- END menu -->
                </div>
                <!-- END scrollbar -->
            </div>
            <div class="app-sidebar-bg"></div>
            <div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a></div>
            <!-- END #sidebar -->
            @yield('content')

            <!-- END #app -->

            <!-- ================== BEGIN core-js ================== -->
            <script src="/public/assets/js/vendor.min.js"></script>
            <script src="/public/assets/js/app.min.js"></script>
            <!-- ================== END core-js ================== -->

            <!-- ================== BEGIN page-js ================== -->
            <script src="/public/assets/plugins/gritter/js/jquery.gritter.js"></script>
            <script src="/public/assets/plugins/flot/source/jquery.canvaswrapper.js"></script>
            <script src="/public/assets/plugins/flot/source/jquery.colorhelpers.js"></script>
            <script src="/public/assets/plugins/flot/source/jquery.flot.js"></script>
            <script src="/public/assets/plugins/flot/source/jquery.flot.saturated.js"></script>
            <script src="/public/assets/plugins/flot/source/jquery.flot.browser.js"></script>
            <script src="/public/assets/plugins/flot/source/jquery.flot.drawSeries.js"></script>
            <script src="/public/assets/plugins/flot/source/jquery.flot.uiConstants.js"></script>
            <script src="/public/assets/plugins/flot/source/jquery.flot.time.js"></script>
            <script src="/public/assets/plugins/flot/source/jquery.flot.resize.js"></script>
            <script src="/public/assets/plugins/flot/source/jquery.flot.pie.js"></script>
            <script src="/public/assets/plugins/flot/source/jquery.flot.crosshair.js"></script>
            <script src="/public/assets/plugins/flot/source/jquery.flot.categories.js"></script>
            <script src="/public/assets/plugins/flot/source/jquery.flot.navigate.js"></script>
            <script src="/public/assets/plugins/flot/source/jquery.flot.touchNavigate.js"></script>
            <script src="/public/assets/plugins/flot/source/jquery.flot.hover.js"></script>
            <script src="/public/assets/plugins/flot/source/jquery.flot.touch.js"></script>
            <script src="/public/assets/plugins/flot/source/jquery.flot.selection.js"></script>
            <script src="/public/assets/plugins/flot/source/jquery.flot.symbol.js"></script>
            <script src="/public/assets/plugins/flot/source/jquery.flot.legend.js"></script>
            <script src="/public/assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
            <script src="/public/assets/plugins/jvectormap-next/jquery-jvectormap.min.js"></script>
            <script src="/public/assets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js"></script>
            <script src="/public/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
            <script src="/public/assets/js/demo/dashboard.js"></script>
            <!-- ================== END page-js ================== -->

            <script type="text/javascript">
                var require = {
                    baseUrl: "/public/js/",
                    waitSeconds: 15,
                    urlArgs: "bust=10"
                };
            </script>
            <script src="/public/js/require.js" data-main="controller"></script>
        </body>
        </html>
