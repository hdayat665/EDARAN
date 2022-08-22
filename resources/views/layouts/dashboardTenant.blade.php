<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="utf-8" />
    <title>OrbitHRM | Dashboard 1</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <link rel="shortcut icon" href="{{env('ASSETS_URL')}}/img/logo/orbit-sm.png" >
    <!-- ================== BEGIN core-css ================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">	<link href="{{env('ASSETS_URL')}}/css/vendor.min.css" rel="stylesheet" />	<link href="{{env('ASSETS_URL')}}/css/vendor.min.css" rel="stylesheet" />
    <link href="{{env('ASSETS_URL')}}/css/default/app.min.css" rel="stylesheet" />
    <!-- ================== END core-css ================== -->

    <!-- ================== BEGIN page-css ================== -->
    <link href="{{env('ASSETS_URL')}}/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
    <link href="{{env('ASSETS_URL')}}/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
    <link href="{{env('ASSETS_URL')}}/plugins/nvd3/build/nv.d3.css" rel="stylesheet" />
    <link href="{{env('ASSETS_URL')}}/plugins/simple-calendar/dist/simple-calendar.css" rel="stylesheet" />
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
                <img src="{{env('ASSETS_URL')}}/img/logo/orbit-logo-5.png" class="navbar-logo navbar-brand"  alt="...">
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
                                <img src="{{env('ASSETS_URL')}}/img/user/user-1.jpg" class="media-object" alt="" />
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
                                <img src="{{env('ASSETS_URL')}}/img/user/user-2.jpg" class="media-object" alt="" />
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
                        <img src="{{env('ASSETS_URL')}}/img/user/user-13.jpg" alt="" />
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
                        <a href="javascript:;" class="dropdown-item">Log Out</a>
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
                                <a href="/employeeInfoView" class="menu-link">
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
        <!-- BEGIN #content -->

        <!-- END #app -->

        <!-- ================== BEGIN core-js ================== -->
        <script src="{{env('ASSETS_URL')}}/js/vendor.min.js"></script>
        <script src="{{env('ASSETS_URL')}}/js/app.min.js"></script>
        <!-- ================== END core-js ================== -->

        <!-- ================== BEGIN page-js ================== -->
        <script src="{{env('ASSETS_URL')}}/plugins/d3/d3.min.js"></script>
        <script src="{{env('ASSETS_URL')}}/plugins/nvd3/build/nv.d3.min.js"></script>
        <script src="{{env('ASSETS_URL')}}/plugins/jvectormap-next/jquery-jvectormap.min.js"></script>
        <script src="{{env('ASSETS_URL')}}/plugins/jvectormap-next/jquery-jvectormap-world-mill.js"></script>
        <script src="{{env('ASSETS_URL')}}/plugins/simple-calendar/dist/jquery.simple-calendar.min.js"></script>
        <script src="{{env('ASSETS_URL')}}/plugins/gritter/js/jquery.gritter.js"></script>
        <script src="{{env('ASSETS_URL')}}/js/demo/dashboard-v2.js"></script>
        <!-- ================== END page-js ================== -->
    </body>
    </html>
    <script src="{{env('ASSETS_URL')}}/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{env('ASSETS_URL')}}/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{env('ASSETS_URL')}}/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{env('ASSETS_URL')}}/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="{{env('ASSETS_URL')}}/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{env('ASSETS_URL')}}/plugins/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="{{env('ASSETS_URL')}}/plugins/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="{{env('ASSETS_URL')}}/plugins/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{env('ASSETS_URL')}}/plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{env('ASSETS_URL')}}/plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{env('ASSETS_URL')}}/plugins/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{env('ASSETS_URL')}}/plugins/pdfmake/build/vfs_fonts.js"></script>
    <script src="{{env('ASSETS_URL')}}/plugins/jszip/dist/jszip.min.js"></script>
    <script src="{{env('ASSETS_URL')}}/js/demo/table-manage-buttons.demo.js"></script>
    <script src="{{env('ASSETS_URL')}}/plugins/@highlightjs/cdn-assets/highlight.min.js"></script>
    <script src="{{env('ASSETS_URL')}}/js/demo/render.highlight.js"></script>
    <link href="{{env('ASSETS_URL')}}/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{env('ASSETS_URL')}}/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
    <script src="{{env('ASSETS_URL')}}/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{env('ASSETS_URL')}}/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{env('ASSETS_URL')}}/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{env('ASSETS_URL')}}/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <link href="{{env('ASSETS_URL')}}/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
    <script src="{{env('ASSETS_URL')}}/plugins/moment/min/moment.min.js"></script>
    <script src="{{env('ASSETS_URL')}}/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <link href="{{env('ASSETS_URL')}}/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
    <script src="{{env('ASSETS_URL')}}/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
    <!-- required files -->
    <link href="{{env('ASSETS_URL')}}/plugins/blueimp-gallery/css/blueimp-gallery.min.css" rel="stylesheet" />
    <link href="{{env('ASSETS_URL')}}/plugins/blueimp-file-upload/css/jquery.fileupload.css" rel="stylesheet" />
    <link href="{{env('ASSETS_URL')}}/plugins/blueimp-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" />

    <script src="{{env('ASSETS_URL')}}/plugins/blueimp-file-upload/js/vendor/jquery.ui.widget.js"></script>
    <script src="{{env('ASSETS_URL')}}/plugins/blueimp-tmpl/js/tmpl.js"></script>
    <script src="{{env('ASSETS_URL')}}/plugins/blueimp-load-image/js/load-image.all.min.js"></script>
    <script src="{{env('ASSETS_URL')}}/plugins/blueimp-canvas-to-blob/js/canvas-to-blob.js"></script>
    <script src="{{env('ASSETS_URL')}}/plugins/blueimp-gallery/js/jquery.blueimp-gallery.min.js"></script>
    <script src="{{env('ASSETS_URL')}}/plugins/blueimp-file-upload/js/jquery.iframe-transport.js"></script>
    <script src="{{env('ASSETS_URL')}}/plugins/blueimp-file-upload/js/jquery.fileupload.js"></script>
    <script src="{{env('ASSETS_URL')}}/plugins/blueimp-file-upload/js/jquery.fileupload-process.js"></script>
    <script src="{{env('ASSETS_URL')}}/plugins/blueimp-file-upload/js/jquery.fileupload-image.js"></script>
    <script src="{{env('ASSETS_URL')}}/plugins/blueimp-file-upload/js/jquery.fileupload-audio.js"></script>
    <script src="{{env('ASSETS_URL')}}/plugins/blueimp-file-upload/js/jquery.fileupload-video.js"></script>
    <script src="{{env('ASSETS_URL')}}/plugins/blueimp-file-upload/js/jquery.fileupload-validate.js"></script>
    <script src="{{env('ASSETS_URL')}}/plugins/blueimp-file-upload/js/jquery.fileupload-ui.js"></script>
    <script src="{{env('ASSETS_URL')}}/js/demo/form-multiple-upload.demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>


    <script type="text/javascript">
        var require = {
            baseUrl: "{{env('ASSETS_URL')}}/js/",
            waitSeconds: 15,
            urlArgs: "bust=10"
        };
    </script>
    <script src="{{env('ASSETS_URL')}}/js/require.js" data-main="controller"></script>
