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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">	<link href="/public/assets/css/vendor.min.css" rel="stylesheet" />	<link href="/public/assets/css/vendor.min.css" rel="stylesheet" />
    <link href="/public/assets/css/default/app.min.css" rel="stylesheet" />
    <!-- ================== END core-css ================== -->

    <!-- ================== BEGIN page-css ================== -->
    <link href="/public/assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
    <link href="/public/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
    <link href="/public/assets/plugins/nvd3/build/nv.d3.css" rel="stylesheet" />
    <link href="/public/assets/plugins/simple-calendar/dist/simple-calendar.css" rel="stylesheet" />
    <!-- ================== END page-css ================== -->
</head>
<body>
    <!-- BEGIN #loader -->
    <div id="loader" class="app-loader">
        <span class="spinner"></span>
    </div>
    <!-- END #loader -->

    <!-- BEGIN #app -->
    <div id="app" class="app app-header-fixed app-sidebar-fixed">
        <!-- BEGIN #header -->
        <div id="header" class="app-header">
            <!-- BEGIN navbar-header -->
            <div class="navbar-header">
                <img src="/public/assets/img/logo/orbit-logo-5.png" class="navbar-logo navbar-brand"  alt="...">
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
                        <a href="/logout/host" class="dropdown-item">Log Out</a>
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
                        <a href="javascript:;" class="menu-link">
                            <div class="menu-icon">
                                <i class="fa fa-clipboard-list text-gray"></i>
                            </div>
                            <div class="menu-text text-gray">Dashboard</div>

                        </div>

                        <!-- End Sidenav Content Orbit -->

                        <!-- Sidenav Content Orbit -->

                        <div class="menu-item has-sub">

                            <div class="menu-icon">
                                <i class="fa fa-commenting text-gray"></i>
                            </div>
                            <div class="menu-text text-gray">HRIS</div>
                            <div class="menu-caret text-gray"></div>
                        </a>
                        <div class="menu-submenu">
                            <div class="menu-item">
                                <a href="#" class="menu-link">
                                    <div class="menu-text text-gray">My Profile </div>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="#" class="menu-link">
                                    <div class="menu-text text-gray">Employee Information</div>
                                </a>
                            </div>

                        </div>
                    </div>

                    <!-- End Sidenav Content Orbit -->
                    <!-- Sidenav Content Orbit -->

                    <div class="menu-item has-sub">
                        <a href="#" class="menu-link">
                            <div class="menu-icon">
                                <i class="fa fa-business-time text-gray"></i>
                            </div>
                            <div class="menu-text text-gray">Timesheets</div>
                            <div class="menu-caret text-gray"></div>
                        </a>
                        <div class="menu-submenu">
                            <div class="menu-item">
                                <a href="ui_general.html" class="menu-link">
                                    <div class="menu-text text-gray">My Timesheets</div>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="#" class="menu-link">
                                    <div class="menu-text text-gray">Timesheets Report</div>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="#" class="menu-link">
                                    <div class="menu-text text-gray">Realtime Activities</div>
                                </a>
                            </div>

                        </div>
                    </div>

                    <!-- End Sidenav Content Orbit -->
                    <!-- Sidenav Content Orbit -->

                    <div class="menu-item has-sub">
                        <a href="#" class="menu-link">
                            <div class="menu-icon">
                                <i class="fa fa-user-edit text-gray"></i>
                            </div>
                            <div class="menu-text text-gray">E-Attendance</div>
                            <div class="menu-caret text-gray"></div>
                        </a>
                        <div class="menu-submenu">
                            <div class="menu-item">
                                <a href="#" class="menu-link">
                                    <div class="menu-text text-gray">My Attendance</div>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="#" class="menu-link">
                                    <div class="menu-text text-gray">Attendance Information</div>
                                </a>
                            </div>

                        </div>
                    </div>

                    <!-- End Sidenav Content Orbit -->
                    <!-- Sidenav Content Orbit -->

                    <div class="menu-item has-sub">
                        <a href="#" class="menu-link">
                            <div class="menu-icon">
                                <i class="fa fa-user-cog text-gray"></i>
                            </div>
                            <div class="menu-text text-gray">E-Leave</div>
                            <div class="menu-caret text-gray"></div>
                        </a>
                        <div class="menu-submenu">
                            <div class="menu-item">
                                <a href="#" class="menu-link">
                                    <div class="menu-text text-gray">My Leave</div>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="#" class="menu-link">
                                    <div class="menu-text text-gray">Leave Approval</div>
                                </a>
                            </div>

                        </div>
                    </div>

                    <!-- End Sidenav Content Orbit -->
                    <!-- Sidenav Content Orbit -->

                    <div class="menu-item has-sub">
                        <a href="#" class="menu-link">
                            <div class="menu-icon">
                                <i class="fa fa-diagram-project text-gray"></i>
                            </div>
                            <div class="menu-text text-gray">Project Registration</div>
                            <div class="menu-caret text-gray"></div>
                        </a>
                        <div class="menu-submenu">
                            <div class="menu-item">
                                <a href="#" class="menu-link">
                                    <div class="menu-text text-gray">Customer</i></div>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="#" class="menu-link">
                                    <div class="menu-text text-gray">Project Information</div>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="#" class="menu-link">
                                    <div class="menu-text text-gray">My Project</div>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="#" class="menu-link">
                                    <div class="menu-text text-gray">Project Request</div>
                                </a>
                            </div>

                        </div>
                    </div>

                    <!-- End Sidenav Content Orbit -->
                    <!-- Sidenav Content Orbit -->

                    <div class="menu-item has-sub">
                        <a href="#" class="menu-link">
                            <div class="menu-icon">
                                <i class="fa fa-user-group text-gray"></i>
                            </div>
                            <div class="menu-text text-gray">Organization</div>

                        </a>

                    </div>

                    <!-- End Sidenav Content Orbit -->
                    <!-- Sidenav Content Orbit -->

                    <div class="menu-item has-sub">
                        <a href="#" class="menu-link">
                            <div class="menu-icon">
                                <i class="fa fa-pen-fancy text-gray"></i>
                            </div>
                            <div class="menu-text text-gray">Reporting</div>
                            <div class="menu-caret text-gray"></div>
                        </a>
                        <div class="menu-submenu">
                            <div class="menu-item">
                                <a href="#" class="menu-link">
                                    <div class="menu-text text-gray">Timesheet</i></div>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="#" class="menu-link">
                                    <div class="menu-text text-gray">E-Attendance</div>
                                </a>
                            </div>

                        </div>
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


        <!-- BEGIN theme-panel -->
        <div class="theme-panel">
            <a href="javascript:;" data-toggle="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
            <div class="theme-panel-content" data-scrollbar="true" data-height="100%">
                <h5>App Settings</h5>

                <!-- BEGIN theme-list -->
                <div class="theme-list">
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-red" data-theme-class="theme-red" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Red">&nbsp;</a></div>
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-pink" data-theme-class="theme-pink" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Pink">&nbsp;</a></div>
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-orange" data-theme-class="theme-orange" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Orange">&nbsp;</a></div>
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-yellow" data-theme-class="theme-yellow" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Yellow">&nbsp;</a></div>
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-lime" data-theme-class="theme-lime" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Lime">&nbsp;</a></div>
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-green" data-theme-class="theme-green" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Green">&nbsp;</a></div>
                    <div class="theme-list-item active"><a href="javascript:;" class="theme-list-link bg-teal" data-theme-class="" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Default">&nbsp;</a></div>
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-cyan" data-theme-class="theme-cyan" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Cyan">&nbsp;</a></div>
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-blue" data-theme-class="theme-blue" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Blue">&nbsp;</a></div>
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-purple" data-theme-class="theme-purple" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Purple">&nbsp;</a></div>
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-indigo" data-theme-class="theme-indigo" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Indigo">&nbsp;</a></div>
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-black" data-theme-class="theme-gray-600" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Black">&nbsp;</a></div>
                </div>
                <!-- END theme-list -->

                <div class="theme-panel-divider"></div>

                <div class="row mt-10px">
                    <div class="col-8 control-label text-dark fw-bold">
                        <div>Dark Mode <span class="badge bg-primary ms-1 py-2px position-relative" style="top: -1px;">NEW</span></div>
                        <div class="lh-14">
                            <small class="text-dark opacity-50">
                                Adjust the appearance to reduce glare and give your eyes a break.
                            </small>
                        </div>
                    </div>
                    <div class="col-4 d-flex">
                        <div class="form-check form-switch ms-auto mb-0">
                            <input type="checkbox" class="form-check-input" name="app-theme-dark-mode" id="appThemeDarkMode" value="1" />
                            <label class="form-check-label" for="appThemeDarkMode">&nbsp;</label>
                        </div>
                    </div>
                </div>

                <div class="theme-panel-divider"></div>

                <!-- BEGIN theme-switch -->
                <div class="row mt-10px align-items-center">
                    <div class="col-8 control-label text-dark fw-bold">Header Fixed</div>
                    <div class="col-4 d-flex">
                        <div class="form-check form-switch ms-auto mb-0">
                            <input type="checkbox" class="form-check-input" name="app-header-fixed" id="appHeaderFixed" value="1" checked />
                            <label class="form-check-label" for="appHeaderFixed">&nbsp;</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-10px align-items-center">
                    <div class="col-8 control-label text-dark fw-bold">Header Inverse</div>
                    <div class="col-4 d-flex">
                        <div class="form-check form-switch ms-auto mb-0">
                            <input type="checkbox" class="form-check-input" name="app-header-inverse" id="appHeaderInverse" value="1" />
                            <label class="form-check-label" for="appHeaderInverse">&nbsp;</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-10px align-items-center">
                    <div class="col-8 control-label text-dark fw-bold">Sidebar Fixed</div>
                    <div class="col-4 d-flex">
                        <div class="form-check form-switch ms-auto mb-0">
                            <input type="checkbox" class="form-check-input" name="app-sidebar-fixed" id="appSidebarFixed" value="1" checked />
                            <label class="form-check-label" for="appSidebarFixed">&nbsp;</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-10px align-items-center">
                    <div class="col-8 control-label text-dark fw-bold">Sidebar Grid</div>
                    <div class="col-4 d-flex">
                        <div class="form-check form-switch ms-auto mb-0">
                            <input type="checkbox" class="form-check-input" name="app-sidebar-grid" id="appSidebarGrid" value="1" />
                            <label class="form-check-label" for="appSidebarGrid">&nbsp;</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-10px align-items-center">
                    <div class="col-md-8 control-label text-dark fw-bold">Gradient Enabled</div>
                    <div class="col-md-4 d-flex">
                        <div class="form-check form-switch ms-auto mb-0">
                            <input type="checkbox" class="form-check-input" name="app-gradient-enabled" id="appGradientEnabled" value="1" />
                            <label class="form-check-label" for="appGradientEnabled">&nbsp;</label>
                        </div>
                    </div>
                </div>
                <!-- END theme-switch -->

                <div class="theme-panel-divider"></div>

                <h5>Admin Design (5)</h5>
                <!-- BEGIN theme-version -->
                <div class="theme-version">
                    <div class="theme-version-item">
                        <a href="../template_html/index_v2.html" class="theme-version-link active">
                            <span style="background-image: url(/public/assets/img/theme/default.jpg);" class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="../template_transparent/index_v2.html" class="theme-version-link">
                            <span style="background-image: url(/public/assets/img/theme/transparent.jpg);" class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="../template_apple/index_v2.html" class="theme-version-link">
                            <span style="background-image: url(/public/assets/img/theme/apple.jpg);" class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="../template_material/index_v2.html" class="theme-version-link">
                            <span style="background-image: url(/public/assets/img/theme/material.jpg);" class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="../template_facebook/index_v2.html" class="theme-version-link">
                            <span style="background-image: url(/public/assets/img/theme/facebook.jpg);" class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="../template_google/index_v2.html" class="theme-version-link">
                            <span style="background-image: url(/public/assets/img/theme/google.jpg);" class="theme-version-cover"></span>
                        </a>
                    </div>
                </div>
                <!-- END theme-version -->

                <div class="theme-panel-divider"></div>

                <h5>Language Version (7)</h5>
                <!-- BEGIN theme-version -->
                <div class="theme-version">
                    <div class="theme-version-item">
                        <a href="../template_html/index.html" class="theme-version-link active">
                            <span style="background-image: url(/public/assets/img/version/html.jpg);" class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="../template_ajax/index.html" class="theme-version-link">
                            <span style="background-image: url(/public/assets/img/version/ajax.jpg);" class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="../template_angularjs/index.html" class="theme-version-link">
                            <span style="background-image: url(/public/assets/img/version/angular1x.jpg);" class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="../template_angularjs13/index.html" class="theme-version-link">
                            <span style="background-image: url(/public/assets/img/version/angular10x.jpg);" class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="javascript:alert('Laravel Version only available in downloaded version.');" class="theme-version-link">
                            <span style="background-image: url(/public/assets/img/version/laravel.jpg);" class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="../template_vuejs/index.html" class="theme-version-link">
                            <span style="background-image: url(/public/assets/img/version/vuejs.jpg);" class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="../template_reactjs/index.html" class="theme-version-link">
                            <span style="background-image: url(/public/assets/img/version/reactjs.jpg);" class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="javascript:alert('.NET Core 3.1 MVC Version only available in downloaded version.');" class="theme-version-link">
                            <span style="background-image: url(/public/assets/img/version/dotnet.jpg);" class="theme-version-cover"></span>
                        </a>
                    </div>
                </div>
                <!-- END theme-version -->

                <div class="theme-panel-divider"></div>

                <h5>Frontend Design (5)</h5>
                <!-- BEGIN theme-version -->
                <div class="theme-version">
                    <div class="theme-version-item">
                        <a href="../../../frontend/template/template_one_page_parallax/index.html" class="theme-version-link">
                            <span style="background-image: url(/public/assets/img/theme/one-page-parallax.jpg);" class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="../../../frontend/template/template_e_commerce/index.html" class="theme-version-link">
                            <span style="background-image: url(/public/assets/img/theme/e-commerce.jpg);" class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="../../../frontend/template/template_blog/index.html" class="theme-version-link">
                            <span style="background-image: url(/public/assets/img/theme/blog.jpg);" class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="../../../frontend/template/template_forum/index.html" class="theme-version-link">
                            <span style="background-image: url(/public/assets/img/theme/forum.jpg);" class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="../../../frontend/template/template_corporate/index.html" class="theme-version-link">
                            <span style="background-image: url(/public/assets/img/theme/corporate.jpg);" class="theme-version-cover"></span>
                        </a>
                    </div>
                </div>
                <!-- END theme-version -->

                <div class="theme-panel-divider"></div>

                <a href="https://seantheme.com/color-admin/documentation/" class="btn btn-dark d-block w-100 rounded-pill mb-10px" target="_blank"><b>Documentation</b></a>
                <a href="javascript:;" class="btn btn-default d-block w-100 rounded-pill" data-toggle="reset-local-storage"><b>Reset Local Storage</b></a>
            </div>
        </div>
        <!-- END theme-panel -->
        <!-- BEGIN scroll-top-btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
        <!-- END scroll-top-btn -->
    </div>
    <!-- END #app -->

    <!-- ================== BEGIN core-js ================== -->
    <script src="/public/assets/js/vendor.min.js"></script>
    <script src="/public/assets/js/app.min.js"></script>
    <!-- ================== END core-js ================== -->

    <!-- ================== BEGIN page-js ================== -->
    <script src="/public/assets/plugins/d3/d3.min.js"></script>
    <script src="/public/assets/plugins/nvd3/build/nv.d3.min.js"></script>
    <script src="/public/assets/plugins/jvectormap-next/jquery-jvectormap.min.js"></script>
    <script src="/public/assets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js"></script>
    <script src="/public/assets/plugins/simple-calendar/dist/jquery.simple-calendar.min.js"></script>
    <script src="/public/assets/plugins/gritter/js/jquery.gritter.js"></script>
    <script src="/public/assets/js/demo/dashboard-v2.js"></script>
    <!-- ================== END page-js ================== -->

    <script type="text/javascript">
        var require = {
            baseUrl: "/public/assets/js/",
            waitSeconds: 15,
            urlArgs: "bust=10"
        };
    </script>
    <script src="/public/assets/js/require.js" data-main="controller"></script>
</body>
</html>
<script>

</script>
