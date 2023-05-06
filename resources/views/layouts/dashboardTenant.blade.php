<!DOCTYPE html>
<html lang="en">
<style>
    #chart-wrapper {
        display: flex;
        position: relative;
        width: 50%;
        margin: 0 auto;
        align-items: center;
    }

    .fc-h-event .fc-event-title {
        display: inline-block;
        vertical-align: top;
        left: 0;
        right: 0;
        max-width: 100%;
        overflow: hidden;
        white-space: pre-line;
    }

    .my-calendar .fc-disabled-day {
        background-color: rgba(156, 18, 18, 0.815) !important;
        color: rgb(201, 0, 0) !important;
    }

    .bg-blue {
        background-color: blue;
    }
</style>

<head>
    <meta charset="utf-8" />
    <title>OrbitHRM</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link rel="shortcut icon" href="/assets/img/logo/orbit-sm.png">
    <!-- ================== BEGIN core-css ================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">
    <link href="/assets/css/vendor.min.css" rel="stylesheet" />
    <link href="/assets/css/vendor.min.css" rel="stylesheet" />
    <link href="/assets/css/default/app.min.css" rel="stylesheet" />
    <!-- ================== END core-css ================== -->
    <!-- ================== BEGIN page-css ================== -->
    <link href="/assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
    <link href="/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
    <link href="/assets/plugins/nvd3/build/nv.d3.css" rel="stylesheet" />
    <link href="/assets/plugins/simple-calendar/dist/simple-calendar.css" rel="stylesheet" />
    <link href="/assets/plugins/jstree/dist/themes/default/style.min.css" rel="stylesheet" />
    <link href="/assets/plugins/@fullcalendar/common/main.min.css" rel="stylesheet" />
    <link href="/assets/plugins/@fullcalendar/daygrid/main.min.css" rel="stylesheet" />
    <link href="/assets/plugins/@fullcalendar/timegrid/main.min.css" rel="stylesheet" />
    <link href="/assets/plugins/@fullcalendar/list/main.min.css" rel="stylesheet" />
    <link href="/assets/plugins/@fullcalendar/bootstrap/main.min.css" rel="stylesheet" />
    <link href="/assets/plugins/timepicker/css/mdtimepicker.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dayjs"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css">
    <style>
        .error {
            /* margin-top:2.4rem !important; */
            color: red !important;
            text-align: left !important;
            height: auto !important;
        }

        .swal2-icon.swal2-info {
            font-size: 20px !important
        }

        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(65, 65, 65, 0.247);
            z-index: 9998;
        }

        #loading-message {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
        }
    </style>
    <!-- ================== END page-css ================== -->
</head>

<body>
    <!-- BEGIN #loader -->
    <div id="loader" class="app-loader">
        <span class="spinner"></span>
    </div>

    <div id="overlay" style="display: none"></div>
    <div id="loading-message" style="display: none">
        <i class="fas fa-spinner fa-spin"></i>
        {{-- <p>Loading...</p> --}}
    </div>
    <!-- END #loader -->
    <!-- BEGIN #app -->
    <div id="app" class="app app-header-fixed app-sidebar-fixed">
        <!-- BEGIN #header -->
        <div id="header" class="app-header">
            <!-- BEGIN navbar-header -->
            <div class="navbar-header">
                <img src="/assets/img/logo/orbit-logo-5.png" class="navbar-logo navbar-brand" alt="...">
                <button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- END navbar-header -->
            <!-- BEGIN header-nav -->
            <div class="navbar-nav">
                <div class="navbar-item navbar-user dropdown">
                    <?php if(Auth::check()): ?>
                    <a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                        @php
                            $profilePicUrl = asset('storage/profilePic/' . Auth::user()->id . '.jpg');
                        @endphp @if (Auth::user()->id && file_exists(public_path('storage/profilePic/' . Auth::user()->id . '.jpg')))
                            <img src="{{ $profilePicUrl }}" width="100%" class="rounded d-block" alt="Profile Picture">
                        @else
                            <img src="{{ asset('../assets/img/user/user-13.jpg') }}" width="100%" class="rounded d-block" alt="Profile Picture">
                        @endif
                        <span>
                            <span class="d-none d-md-inline">
                                <?php echo Auth::user()->username; ?>
                                <!-- Display username here -->
                            </span>
                            <b class="caret"></b>
                        </span>
                    </a>
                    <?php endif; ?> <div class="dropdown-menu dropdown-menu-end me-1">
                        <a href="myProfile" class="dropdown-item">Edit Profile</a>
                        {{-- <a href="javascript:;" class="dropdown-item d-flex align-items-center">
                            Inbox
                            <span class="badge bg-danger rounded-pill ms-auto pb-4px">2</span>
                        </a> --}}
                        <a href="myTimesheet" class="dropdown-item">Calendar</a>
                        {{-- <a href="javascript:;" class="dropdown-item">Setting</a> --}}
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
                        <a href="/dashboardTenant" class="menu-link">
                            <div class="menu-icon">
                                <i class="fa fa-clipboard-list text-gray"></i>
                            </div>
                            <div class="menu-text text-gray">Dashboard</div>
                        </a>
                    </div>
                    <?php
                    $permissions = getPermissionByRoleId(Auth::user()->role_id);
                    $role_permission = [];
                    foreach ($permissions as $permission) {
                        $role_permission[] = $permission->permission_code;
                    }
                    if (!$role_permission) {
                        $role_permission = [];
                    }
                    ?>
                    <?php $target = ['hris_tab']; ?>
                    @if (array_intersect($role_permission, $target))
                        <div class="menu-item has-sub">
                            <a href="javascript:;" class="menu-link">
                                <div class="menu-icon">
                                    <i class="fa fa-commenting text-gray"></i>
                                </div>
                                <div class="menu-text text-gray">HRIS</div>
                                <div class="menu-caret text-gray"></div>
                            </a>
                            <div class="menu-submenu">
                                <?php $target = ['my_profile']; ?>
                                @if (array_intersect($role_permission, $target))
                                    <div class="menu-item">
                                        <a href="/myProfile" class="menu-link">
                                            <div class="menu-icon">
                                                <i class="fa fa-address-card text-gray"></i>
                                            </div>
                                            <div class="menu-text text-gray">My Profile </div>
                                        </a>
                                    </div>
                                @endif
                                <?php $target = ['employee_info']; ?>
                                @if (array_intersect($role_permission, $target))
                                    <div class="menu-item">
                                        <a href="/employeeInfoView" class="menu-link">
                                            <div class="menu-icon">
                                                <i class="fa fa-indent text-gray"></i>
                                            </div>
                                            <div class="menu-text text-gray">Employee Information </div>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                    <!-- End Sidenav Content Orbit -->
                    <!-- Sidenav Content Orbit -->
                    <?php $target = ['tsr_tab']; ?>
                    @if (array_intersect($role_permission, $target))
                        <div class="menu-item has-sub">
                            <a href="javascript:;" class="menu-link">
                                <div class="menu-icon">
                                    <i class="fa fa-business-time text-gray"></i>
                                </div>
                                <div class="menu-text text-gray">Timesheets</div>
                                <div class="menu-caret text-gray"></div>
                            </a>

                            <div class="menu-submenu">
                                <?php $target = ['my_timesheet']; ?>
                                @if (array_intersect($role_permission, $target))
                                    <div class="menu-item">
                                        <a href="/myTimesheet" class="menu-link">
                                            <div class="menu-icon">
                                                <i class="fa fa-calendar-check text-gray"></i>
                                            </div>
                                            <div class="menu-text text-gray">My Timesheets</div>
                                        </a>
                                    </div>
                                @endif
                                <?php $target = ['timesheet_approval']; ?>
                                @if (array_intersect($role_permission, $target))
                                    <div class="menu-item">
                                        <a href="/timesheetApproval" class="menu-link">
                                            <div class="menu-icon">
                                                <i class="fa fa-receipt text-gray"></i>
                                            </div>
                                            <div class="menu-text text-gray">Timesheets Approval</div>
                                        </a>
                                    </div>
                                @endif
                                <?php $target = ['real_time_activities']; ?>
                                @if (array_intersect($role_permission, $target))
                                    <div class="menu-item">
                                        <a href="/realtimeEventTimesheet" class="menu-link">
                                            <div class="menu-icon">
                                                <i class="fa fa-receipt text-gray"></i>
                                            </div>
                                            <div class="menu-text text-gray">Realtime Activities</div>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div> 
                    @endif
                    <!-- End Sidenav Content Orbit -->
                    <!-- Sidenav Content Orbit -->
                    <?php $target = ['attendance_tab']; ?>
                    @if (array_intersect($role_permission, $target))
                        <div class="menu-item has-sub">
                            <a href="javascript:;" class="menu-link">
                                <div class="menu-icon">
                                    <i class="fa fa-user-edit text-gray"></i>
                                </div>
                                <div class="menu-text text-gray">E-Attendance</div>
                                <div class="menu-caret text-gray"></div>
                            </a>
                            <div class="menu-submenu">
                                <?php $target = ['my_attendance']; ?>
                                @if (array_intersect($role_permission, $target))
                                    <div class="menu-item">
                                        <a href="#" class="menu-link">
                                            <div class="menu-icon">
                                                <i class="fa fa-bell text-gray"></i>
                                            </div>
                                            <div class="menu-text text-gray">My Attendance</div>
                                        </a>
                                    </div>
                                @endif
                                <?php $target = ['attendance_info']; ?>
                                @if (array_intersect($role_permission, $target))
                                    <div class="menu-item">
                                        <a href="#" class="menu-link">
                                            <div class="menu-icon">
                                                <i class="fa fa-list-check text-gray"></i>
                                            </div>
                                            <div class="menu-text text-gray">Attendance Information</div>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                    <!-- End Sidenav Content Orbit -->
                    <!-- Sidenav Content Orbit -->
                    <?php $target = ['leave_tab']; ?>
                    @if (array_intersect($role_permission, $target))
                        <div class="menu-item has-sub">
                            <a href="javascript:;" class="menu-link">
                                <div class="menu-icon">
                                    <i class="fa fa-user-cog text-gray"></i>
                                </div>
                                <div class="menu-text text-gray">E-Leave</div>
                                <div class="menu-caret text-gray"></div>
                            </a>
                            <div class="menu-submenu">
                                <?php $target = ['my_leave']; ?>
                                @if (array_intersect($role_permission, $target))
                                    <div class="menu-item has-sub">
                                        <a href="/myleave" class="menu-link">
                                            <div class="menu-icon">
                                                <i class="fa fa-clipboard text-gray"></i>
                                            </div>
                                            <div class="menu-text text-gray">My Leave</i></div>
                                            <!-- <div class="menu-caret text-gray"></div> -->
                                        </a>
                                    </div>
                                @endif
                                <?php $target = ['leave_menu']; ?>
                                @if (array_intersect($role_permission, $target))
                                    <div class="menu-item has-sub">

                                        <a href="#" class="menu-link">
                                            <div class="menu-icon">
                                                <i class="fa fa-list-check text-gray"></i>
                                            </div>
                                            <div class="menu-text text-gray">Leave Approval</div>
                                            <div class="menu-caret text-gray"></div>
                                        </a>
                                        <div class="menu-submenu">
                                            <?php $target = ['leave_recommender']; ?>
                                            @if (array_intersect($role_permission, $target))
                                                <div class="menu-item">
                                                    <a href="/leaveAppr" class="menu-link">
                                                        <div class="menu-icon">
                                                            <i class="fa fa-user-pen text-gray"></i>
                                                        </div>
                                                        <div class="menu-text text-gray">Recommender</div>
                                                    </a>
                                                </div>
                                            @endif
                                            <?php $target = ['leave_approver']; ?>
                                            @if (array_intersect($role_permission, $target))
                                                <div class="menu-item">
                                                    <a href="/leaveApprhod" class="menu-link">
                                                        <div class="menu-icon">
                                                            <i class="fa fa-users-gear text-gray"></i>
                                                        </div>
                                                        <div class="menu-text text-gray">Approver</div>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                    <!-- End Sidenav Content Orbit -->
                    <!-- Sidenav Content Orbit -->
                    <?php $target = ['project_tab']; ?>
                    @if (array_intersect($role_permission, $target))
                        <div class="menu-item has-sub">
                            <a href="javascript:;" class="menu-link">
                                <div class="menu-icon">
                                    <i class="fa fa-diagram-project text-gray"></i>
                                </div>
                                <div class="menu-text text-gray">Project Registration</div>
                                <div class="menu-caret text-gray"></div>
                            </a>
                            <div class="menu-submenu">
                                <?php $target = ['customer']; ?>
                                @if (array_intersect($role_permission, $target))
                                    <div class="menu-item">
                                        <a href="/customer" class="menu-link">
                                            <div class="menu-icon">
                                                <i class="fa fa-share-nodes text-gray"></i>
                                            </div>
                                            <div class="menu-text text-gray">Customer</i></div>
                                        </a>
                                    </div>
                                @endif
                                <?php $target = ['project_info']; ?>
                                @if (array_intersect($role_permission, $target))
                                    <div class="menu-item">
                                        <a href="/projectInfo" class="menu-link">
                                            <div class="menu-icon">
                                                <i class="fa fa-book text-gray"></i>
                                            </div>
                                            <div class="menu-text text-gray">Project Information</div>
                                        </a>
                                    </div>
                                @endif
                                <?php $target = ['my_project']; ?>
                                @if (array_intersect($role_permission, $target))
                                    <div class="menu-item">
                                        <a href="/myProject" class="menu-link">
                                            <div class="menu-icon">
                                                <i class="fa fa-clipboard-list text-gray"></i>
                                            </div>
                                            <div class="menu-text text-gray">My Project</div>
                                        </a>

                                    </div>
                                @endif
                                <?php $target = ['project_request']; ?>
                                @if (array_intersect($role_permission, $target))
                                    <div class="menu-item">
                                        <a href="/projectRequest" class="menu-link">
                                            <div class="menu-icon">
                                                <i class="fa fa-code-pull-request text-gray"></i>
                                            </div>
                                            <div class="menu-text text-gray">Project Request</div>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                    <!-- End Sidenav Content Orbit -->
                    <!-- Sidenav Content Orbit -->
                    <?php $target = ['claim_tab']; ?>
                    @if (array_intersect($role_permission, $target))
                        <div class="menu-item has-sub">
                            <a href="javascript:;" class="menu-link">
                                <div class="menu-icon">
                                    <i class="fa fa-file-lines text-gray"></i>
                                </div>
                                <div class="menu-text text-gray">E-Claim</div>
                                <div class="menu-caret text-gray"></div>
                            </a>

                            <div class="menu-submenu">
                                <?php $target = ['my_claim']; ?>
                                @if (array_intersect($role_permission, $target))
                                    <div class="menu-item">
                                        <a href="/myClaimView" class="menu-link">
                                            <div class="menu-icon">
                                                <i class="fa fa-envelope-open-text text-gray"></i>
                                            </div>
                                            <div class="menu-text text-gray">My Claim</div>
                                        </a>
                                    </div>
                                @endif
                                <?php $target = ['claim_menu']; ?>
                                @if (array_intersect($role_permission, $target))
                                    <div class="menu-item has-sub">

                                        <a href="javascript:;" class="menu-link">
                                            <div class="menu-icon">
                                                <i class="fa fa-list-check text-gray"></i>
                                            </div>
                                            <div class="menu-text text-gray">Claim Approval</i>
                                            </div>
                                            <div class="menu-caret text-gray">
                                            </div>
                                        </a>

                                        <div class="menu-submenu">
                                            <?php $target = ['eclaim_department_menu']; ?>
                                            @if (array_intersect($role_permission, $target))
                                                <div class="menu-item has-sub">

                                                    <a href="#" class="menu-link">
                                                        <div class="menu-icon">
                                                            <i class="fa fa-user text-gray"></i>
                                                        </div>
                                                        <div class="menu-text text-gray">Department</i>
                                                        </div>
                                                        <div class="menu-caret text-gray">
                                                        </div>
                                                    </a>

                                                    <div class="menu-submenu">
                                                        <?php $target = ['eclaim_department_recommender']; ?>
                                                        @if (array_intersect($role_permission, $target))
                                                            <div class="menu-item">
                                                                <a href="/claimApprovalView/2" class="menu-link">
                                                                    <div class="menu-icon">
                                                                        <i class="fa fa-list-check text-gray"></i>
                                                                    </div>
                                                                    <div class="menu-text text-gray">Recommender
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        @endif
                                                        <?php $target = ['eclaim_department_approver']; ?>
                                                        @if (array_intersect($role_permission, $target))
                                                            <div class="menu-item">
                                                                <a href="/claimApprovalView/1" class="menu-link">
                                                                    <div class="menu-icon">
                                                                        <i class="fa fa-list-check text-gray"></i>
                                                                    </div>
                                                                    <div class="menu-text text-gray">Approver
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endif
                                            <?php $target = ['eclaim_finance_menu']; ?>
                                            @if (array_intersect($role_permission, $target))
                                                <div class="menu-item has-sub">

                                                    <a href="#" class="menu-link">
                                                        <div class="menu-icon">
                                                            <i class="fa fa-user-tie text-gray"></i>
                                                        </div>
                                                        <div class="menu-text text-gray">Finance
                                                        </div>
                                                        <div class="menu-caret text-gray">
                                                        </div>
                                                    </a>

                                                    <div class="menu-submenu">
                                                        <?php $target = ['eclaim_finance_recommender']; ?>
                                                        @if (array_intersect($role_permission, $target))
                                                            <div class="menu-item">
                                                                <a href="/financeRecView" class="menu-link">
                                                                    <div class="menu-icon">
                                                                        <i class="fa fa-list-check text-gray"></i>
                                                                    </div>
                                                                    <div class="menu-text text-gray">Recommender
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        @endif
                                                        <?php $target = ['eclaim_finance_approver']; ?>
                                                        @if (array_intersect($role_permission, $target))
                                                            <div class="menu-item">
                                                                <a href="/financeApprovalView" class="menu-link">
                                                                    <div class="menu-icon">
                                                                        <i class="fa fa-list-check text-gray"></i>
                                                                    </div>
                                                                    <div class="menu-text text-gray">Approver
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        @endif
                                                        <?php $target = ['eclaim_finance_checker']; ?>
                                                        @if (array_intersect($role_permission, $target))
                                                            <div class="menu-item">
                                                                <a href="/financeCheckerView" class="menu-link">
                                                                    <div class="menu-icon">
                                                                        <i class="fa fa-list-check text-gray"></i>
                                                                    </div>
                                                                    <div class="menu-text text-gray">Checker
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endif
                                            <?php $target = ['eclaim_admin_menu']; ?>
                                            @if (array_intersect($role_permission, $target))
                                                <div class="menu-item has-sub">

                                                    <a href="#" class="menu-link">
                                                        <div class="menu-icon">
                                                            <i class="fa fa-user-gear text-gray"></i>
                                                        </div>
                                                        <div class="menu-text text-gray">Admin</i></div>
                                                        <div class="menu-caret text-gray">
                                                        </div>
                                                    </a>

                                                    <div class="menu-submenu">
                                                        <?php $target = ['eclaim_admin_recommender']; ?>
                                                        @if (array_intersect($role_permission, $target))
                                                            <div class="menu-item">
                                                                <a href="/adminRecView" class="menu-link">
                                                                    <div class="menu-icon">
                                                                        <i class="fa fa-list-check text-gray"></i>
                                                                    </div>
                                                                    <div class="menu-text text-gray">Recommender
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        @endif
                                                        <?php $target = ['eclaim_admin_approver']; ?>
                                                        @if (array_intersect($role_permission, $target))
                                                            <div class="menu-item">
                                                                <a href="/adminApprovalView" class="menu-link">
                                                                    <div class="menu-icon">
                                                                        <i class="fa fa-list-check text-gray"></i>
                                                                    </div>
                                                                    <div class="menu-text text-gray">Approver
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        @endif
                                                        <?php $target = ['eclaim_admin_checker']; ?>
                                                        @if (array_intersect($role_permission, $target))
                                                            <div class="menu-item">
                                                                <a href="/adminCheckerView" class="menu-link">
                                                                    <div class="menu-icon">
                                                                        <i class="fa fa-list-check text-gray"></i>
                                                                    </div>
                                                                    <div class="menu-text text-gray">Checker
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                                <?php $target = ['cash_menu']; ?>
                                @if (array_intersect($role_permission, $target))
                                    <div class="menu-item has-sub">

                                        <a href="javascript:;" class="menu-link">
                                            <div class="menu-icon">
                                                <i class="fa fa-envelope-open-text text-gray"></i>
                                            </div>
                                            <div class="menu-text text-gray">Cash Advance</div>
                                            <div class="menu-caret text-gray">
                                            </div>
                                        </a>

                                        <div class="menu-submenu">
                                            <?php $target = ['cash_menu']; ?>
                                            @if (array_intersect($role_permission, $target))
                                                <div class="menu-item has-sub">
                                                    <?php $target = ['cash_deparment_menu']; ?>
                                                    @if (array_intersect($role_permission, $target))
                                                        <a href="javascript:;" class="menu-link">
                                                            <div class="menu-icon">
                                                                <i class="fa fa-user text-gray"></i>
                                                            </div>
                                                            <div class="menu-text text-gray">Department</i>
                                                            </div>
                                                            <div class="menu-caret text-gray">
                                                            </div>
                                                        </a>
                                                        <?php $target = ['cash_deparment_approver']; ?>
                                                        @if (array_intersect($role_permission, $target))
                                                            <div class="menu-submenu">
                                                                <div class="menu-item">
                                                                    <a href="/cashAdvanceApproverView" class="menu-link">
                                                                        <div class="menu-icon">
                                                                            <i class="fa fa-list-check text-gray"></i>
                                                                        </div>
                                                                        <div class="menu-text text-gray">Approver
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endif
                                                </div>
                                            @endif
                                            <?php $target = ['cash_finance_menu']; ?>
                                            @if (array_intersect($role_permission, $target))
                                                <div class="menu-item has-sub">

                                                    <a href="#" class="menu-link">
                                                        <div class="menu-icon">
                                                            <i class="fa fa-user-tie text-gray"></i>
                                                        </div>
                                                        <div class="menu-text text-gray">Finance
                                                        </div>
                                                        <div class="menu-caret text-gray">
                                                        </div>
                                                    </a>

                                                    <div class="menu-submenu">
                                                        <?php $target = ['cash_finance_recommender']; ?>
                                                        @if (array_intersect($role_permission, $target))
                                                            <div class="menu-item">
                                                                <a href="/cashAdvanceFrecommenderView" class="menu-link">
                                                                    <div class="menu-icon">
                                                                        <i class="fa fa-list-check text-gray"></i>
                                                                    </div>
                                                                    <div class="menu-text text-gray">Recommender
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        @endif
                                                        <?php $target = ['cash_finance_approver']; ?>
                                                        @if (array_intersect($role_permission, $target))
                                                            <div class="menu-item">
                                                                <a href="/cashAdvanceFapproverView" class="menu-link">
                                                                    <div class="menu-icon">
                                                                        <i class="fa fa-list-check text-gray"></i>
                                                                    </div>
                                                                    <div class="menu-text text-gray">Approver
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        @endif
                                                        <?php $target = ['cash_finance_checker']; ?>
                                                        @if (array_intersect($role_permission, $target))
                                                            <div class="menu-item">
                                                                <a href="/cashAdvanceFcheckerView" class="menu-link">
                                                                    <div class="menu-icon">
                                                                        <i class="fa fa-list-check text-gray"></i>
                                                                    </div>
                                                                    <div class="menu-text text-gray">Checker
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                                <?php $target = ['appeal_approval']; ?>
                                @if (array_intersect($role_permission, $target))
                                    <div class="menu-item">
                                        <a href="/appealMtcView" class="menu-link">
                                            <div class="menu-icon">
                                                <i class="fa fa-envelope-open-text text-gray"></i>
                                            </div>
                                            <div class="menu-text text-gray">Appeal Approval</div>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                    <!-- End Sidenav Content Orbit -->
                    <!-- Sidenav Content Orbit -->
                    <div class="menu-item has-sub">
                        <a href="javascript:;" class="menu-link">
                            <div class="menu-icon">
                                <i class="fa fa-user-group text-gray"></i>
                            </div>
                            <div class="menu-text text-gray">Organization</div>
                            <div class="menu-caret text-gray"></div>
                        </a>
                        <div class="menu-submenu">
                            <div class="menu-item">
                                <a href="/phoneDirectory" class="menu-link">
                                    <div class="menu-icon">
                                        <i class="fa fa-rectangle-list text-gray"></i>
                                    </div>
                                    <div class="menu-text text-gray">Phone Directory</i></div>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="/organizationChart" class="menu-link">
                                    <div class="menu-icon">
                                        <i class="fa fa-rectangle-list text-gray"></i>
                                    </div>
                                    <div class="menu-text text-gray">Organization Chart</div>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="/policysop" class="menu-link">
                                    <div class="menu-icon">
                                        <i class="fa fa-rectangle-list text-gray"></i>
                                    </div>
                                    <div class="menu-text text-gray">Policy & SOP</div>
                                </a>
                            </div>
                            {{-- <div class="menu-item">
                                    <a href="/departmentTree" class="menu-link">
                                    <div class="menu-icon">
								        <i class="fa fa-folder-tree text-gray"></i>
							        </div>
                                        <div class="menu-text text-gray">Department Tree</div>
                                    </a>
                                </div> --}}
                        </div>
                    </div>
                    <!-- End Sidenav Content Orbit -->
                    <!-- Sidenav Content Orbit -->
                    <?php $target = ['report_tab']; ?>
                    @if (array_intersect($role_permission, $target))
                        <div class="menu-item has-sub">
                            <a href="javascript:;" class="menu-link">
                                <div class="menu-icon">
                                    <i class="fa fa-pen-fancy text-gray"></i>
                                </div>
                                <div class="menu-text text-gray">Reporting</div>
                                <div class="menu-caret text-gray"></div>
                            </a>
                            <div class="menu-submenu">
                                <?php $target = ['timesheet_menu']; ?>
                                @if (array_intersect($role_permission, $target))
                                    <div class="menu-item has-sub">

                                        <a href="#" class="menu-link">
                                            <div class="menu-icon">
                                                <i class="fa fa-file-signature text-gray"></i>
                                            </div>
                                            <div class="menu-text text-gray">Timesheet</i></div>
                                            <div class="menu-caret text-gray"></div>
                                        </a>

                                        <div class="menu-submenu">
                                            <?php $target = ['status_report']; ?>
                                            @if (array_intersect($role_permission, $target))
                                                <div class="menu-item">
                                                    <a href="/statusReport" class="menu-link">
                                                        <div class="menu-icon">
                                                            <i class="fa fa-address-card text-gray"></i>
                                                        </div>
                                                        <div class="menu-text text-gray">Status Report</div>
                                                    </a>
                                                </div>
                                            @endif
                                            <?php $target = ['employee_report']; ?>
                                            @if (array_intersect($role_permission, $target))
                                                <div class="menu-item">
                                                    <a href="/employeeReport" class="menu-link">
                                                        <div class="menu-icon">
                                                            <i class="fa fa-user-clock text-gray"></i>
                                                        </div>
                                                        <div class="menu-text text-gray">Employee Report</div>
                                                    </a>
                                                </div>
                                            @endif
                                            <?php $target = ['overtime_report']; ?>
                                            @if (array_intersect($role_permission, $target))
                                                <div class="menu-item">
                                                    <a href="/overtimeReport" class="menu-link">
                                                        <div class="menu-icon">
                                                            <i class="fa fa-user-gear text-gray"></i>
                                                        </div>
                                                        <div class="menu-text text-gray">Overtime Report</div>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                                <?php $target = ['eattendance_menu']; ?>
                                @if (array_intersect($role_permission, $target))
                                    <div class="menu-item has-sub">

                                        <a href="#" class="menu-link">
                                            <div class="menu-icon">
                                                <i class="fa fa-user-check text-gray"></i>
                                            </div>
                                            <div class="menu-text text-gray">E-Attendance</div>
                                            <div class="menu-caret text-gray"></div>
                                        </a>
                                        <div class="menu-submenu">
                                            <?php $target = ['daily_report']; ?>
                                            @if (array_intersect($role_permission, $target))
                                                <div class="menu-item">
                                                    <a href="#" class="menu-link">
                                                        <div class="menu-icon">
                                                            <i class="fa fa-user-pen text-gray"></i>
                                                        </div>
                                                        <div class="menu-text text-gray">Daily Report</div>
                                                    </a>
                                                </div>
                                            @endif
                                            <?php $target = ['status_report']; ?>
                                            @if (array_intersect($role_permission, $target))
                                                <div class="menu-item">
                                                    <a href="#" class="menu-link">
                                                        <div class="menu-icon">
                                                            <i class="fa fa-users-gear text-gray"></i>
                                                        </div>
                                                        <div class="menu-text text-gray">Status Report</div>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                                <?php $target = ['report_leave']; ?>
                                @if (array_intersect($role_permission, $target))
                                    <div class="menu-item">
                                        <a href="/leaveReport" class="menu-link">
                                            <div class="menu-icon">
                                                <i class="fa fa-user-minus text-gray"></i>
                                            </div>
                                            <div class="menu-text text-gray">E-Leave</div>
                                        </a>
                                    </div>
                                @endif
                                <?php $target = ['project_report_menu']; ?>
                                @if (array_intersect($role_permission, $target))
                                    <div class="menu-item has-sub">

                                        <a href="#" class="menu-link">
                                            <div class="menu-icon">
                                                <i class="fa fa-keyboard text-gray"></i>
                                            </div>
                                            <div class="menu-text text-gray">Project</div>
                                            <div class="menu-caret text-gray"></div>
                                        </a>
                                        <div class="menu-submenu">
                                            <?php $target = ['project_listing']; ?>
                                            @if (array_intersect($role_permission, $target))
                                                <div class="menu-item">
                                                    <a href="/projectListing" class="menu-link">
                                                        <div class="menu-icon">
                                                            <i class="fa fa-book text-gray"></i>
                                                        </div>
                                                        <div class="menu-text text-gray">Project Listing</div>
                                                    </a>
                                                </div>
                                            @endif
                                            <?php $target = ['project_report']; ?>
                                            @if (array_intersect($role_permission, $target))
                                                <div class="menu-item">
                                                    <a href="/projectFilter" class="menu-link">
                                                        <div class="menu-icon">
                                                            <i class="fa fa-book-open text-gray"></i>
                                                        </div>
                                                        <div class="menu-text text-gray">Project Report</div>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                                <?php $target = ['claim_report_menu']; ?>
                                @if (array_intersect($role_permission, $target))
                                    <div class="menu-item has-sub">

                                        <a href="#" class="menu-link">
                                            <div class="menu-icon">
                                                <i class="fa fa-money-check text-gray"></i>
                                            </div>
                                            <div class="menu-text text-gray">Claim</div>
                                            <div class="menu-caret text-gray"></div>
                                        </a>
                                        <div class="menu-submenu">
                                            <?php $target = ['claim_report']; ?>
                                            @if (array_intersect($role_permission, $target))
                                                <div class="menu-item">
                                                    <a href="/eclaimListing" class="menu-link">
                                                        <div class="menu-icon">
                                                            <i class="fa fa-money-bill-wave text-gray"></i>
                                                        </div>
                                                        <div class="menu-text text-gray">Claim</div>
                                                    </a>
                                                </div>
                                            @endif
                                            <?php $target = ['cash_report']; ?>
                                            @if (array_intersect($role_permission, $target))
                                                <div class="menu-item">
                                                    <a href="/cashadvanceListing" class="menu-link">
                                                        <div class="menu-icon">
                                                            <i class="fa fa-money-bill-1-wave text-gray"></i>
                                                        </div>
                                                        <div class="menu-text text-gray">Cash Advance</div>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                @endif
                                <?php $target = ['report_cor']; ?>
                                @if (array_intersect($role_permission, $target))
                                    <div class="menu-item">
                                        <a href="/corlisting" class="menu-link">
                                            <div class="menu-icon">
                                                <i class="fa fa-user-minus text-gray"></i>
                                            </div>
                                            <div class="menu-text text-gray">Charge Out Rate</div>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                    <!-- End Sidenav Content Orbit -->
                    <!-- Sidenav Content Orbit -->
                    <?php $target = ['setting_tab']; ?>
                    @if (array_intersect($role_permission, $target))
                        <div class="menu-item has-sub">
                            <a href="/setting" class="menu-link">
                                <div class="menu-icon">
                                    <i class="fa fa-gear text-gray"></i>
                                </div>
                                <div class="menu-text text-gray">Settings</div>
                            </a>
                        </div>
                    @endif
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
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a> <!-- END #app -->
        <!-- ================== BEGIN core-js ================== -->
        <script src="/assets/js/vendor.min.js"></script>
        <script src="/assets/js/app.min.js"></script>
        <!-- ================== END core-js ================== -->
        <!-- ================== BEGIN page-js ================== -->
        <script src="/assets/plugins/d3/d3.min.js"></script>
        <script src="/assets/plugins/nvd3/build/nv.d3.min.js"></script>
        <script src="/assets/plugins/jvectormap-next/jquery-jvectormap.min.js"></script>
        <script src="/assets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js"></script>
        <script src="/assets/plugins/simple-calendar/dist/jquery.simple-calendar.min.js"></script>
        <script src="/assets/plugins/gritter/js/jquery.gritter.js"></script>
        <script src="/assets/js/demo/dashboard-v2.js"></script>
        <script src="/assets/plugins/moment/min/moment.min.js"></script>
        <script src="/assets/plugins/@fullcalendar/core/main.global.js"></script>
        <script src="/assets/plugins/@fullcalendar/daygrid/main.global.js"></script>
        <script src="/assets/plugins/@fullcalendar/timegrid/main.global.js"></script>
        <script src="/assets/plugins/@fullcalendar/interaction/main.global.js"></script>
        <script src="/assets/plugins/@fullcalendar/list/main.global.js"></script>
        <script src="/assets/plugins/@fullcalendar/bootstrap/main.global.js"></script> <!-- required files -->
        <link href="/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />
        <script src="/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
        <!-- required files -->
        <link href="/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
        <script src="/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
        <!-- required files -->
        <link href="/assets/plugins/select-picker/dist/picker.min.css" rel="stylesheet" />
        <script src="/assets/plugins/select-picker/dist/picker.min.js"></script>
        <!-- ================== END page-js ================== -->
</body>

</html>
<script src="/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<link href="/assets/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" />
<script src="/assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="/assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="/assets/plugins/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="/assets/plugins/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="/assets/plugins/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="/assets/plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="/assets/plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="/assets/plugins/pdfmake/build/pdfmake.min.js"></script>
<script src="/assets/plugins/pdfmake/build/vfs_fonts.js"></script>
<script src="/assets/plugins/jszip/dist/jszip.min.js"></script>
<script src="/assets/js/demo/table-manage-buttons.demo.js"></script>
<script src="/assets/plugins/@highlightjs/cdn-assets/highlight.min.js"></script>
<script src="/assets/js/demo/render.highlight.js"></script>
<link href="/assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<link href="/assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
<link href="/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
<script src="/assets/plugins/moment/min/moment.min.js"></script>
<script src="/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<link href="/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
<script src="/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
<!-- required files -->
<link href="/assets/plugins/blueimp-gallery/css/blueimp-gallery.min.css" rel="stylesheet" />
<link href="/assets/plugins/blueimp-file-upload/css/jquery.fileupload.css" rel="stylesheet" />
<link href="/assets/plugins/blueimp-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" />
<script src="/assets/plugins/blueimp-file-upload/js/vendor/jquery.ui.widget.js"></script>
<script src="/assets/plugins/blueimp-tmpl/js/tmpl.js"></script>
<script src="/assets/plugins/blueimp-load-image/js/load-image.all.min.js"></script>
<script src="/assets/plugins/blueimp-canvas-to-blob/js/canvas-to-blob.js"></script>
<script src="/assets/plugins/blueimp-gallery/js/jquery.blueimp-gallery.min.js"></script>
<script src="/assets/plugins/blueimp-file-upload/js/jquery.iframe-transport.js"></script>
<script src="/assets/plugins/blueimp-file-upload/js/jquery.fileupload.js"></script>
<script src="/assets/plugins/blueimp-file-upload/js/jquery.fileupload-process.js"></script>
<script src="/assets/plugins/blueimp-file-upload/js/jquery.fileupload-image.js"></script>
<script src="/assets/plugins/blueimp-file-upload/js/jquery.fileupload-audio.js"></script>
<script src="/assets/plugins/blueimp-file-upload/js/jquery.fileupload-video.js"></script>
<script src="/assets/plugins/blueimp-file-upload/js/jquery.fileupload-validate.js"></script>
<script src="/assets/plugins/blueimp-file-upload/js/jquery.fileupload-ui.js"></script>
<script src="/assets/js/demo/form-multiple-upload.demo.js"></script>
<script src="/assets/plugins/jstree/dist/jstree.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
<script src="/assets/js/orgchart.js"></script>
<link href="/assets/plugins/nvd3/build/nv.d3.css" rel="stylesheet" />
<script src="/assets/plugins/d3/d3.min.js"></script>
<script src="/assets/plugins/nvd3/build/nv.d3.min.js"></script>
<script src="/assets/plugins/chart.js/dist/chart.min.js"></script>
<script src="/assets/plugins/timepicker/js/mdtimepicker.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js"></script>
<script>
    $('#tablenews-dashboard').DataTable({
        scrollX: true,
        dom: '<"top"i>rt<"bottom"p><"clear">',
        scrollY: 150,
        responsive: false,
        paging: false
    });
</script>
<script>
    $('#timesheetapproval-dashboard').DataTable({
        scrollX: true,
        dom: '<"top"i>rt<"bottom"p><"clear">',
        scrollY: 150,
        responsive: false,
        paging: false
    });
</script>
<script>
    $('#data-table-default-clocks').DataTable({
        scrollX: true,
        dom: '<"top"i>rt<"bottom"p><"clear">',
        scrollY: 150,
        responsive: false,
        paging: false
    });
</script>
<script type="text/javascript">
    var require = {
        baseUrl: "/assets/js/",
        waitSeconds: 15,
        urlArgs: "bust=10"
    };
</script>
<script>
    var hash = location.hash.replace(/^#/, ""); // ^ means starting, meaning only match the first hash
    if (hash) {
        $('.nav-tabs a[href="#' + hash + '"]').tab("show");
    }
    $(".nav-tabs a").on("shown.bs.tab", function(e) {
        window.location.hash = e.target.hash;
    });
</script>
<script>
    $(function() {
        // Get current URL path and assign 'active' class to corresponding menu item
        var pathname = window.location.pathname.trim();
        if (pathname !== '') {
            $('.menu-link').each(function() {
                if ($(this).attr('href').trim() === pathname) {
                    $(this).parents('.menu-item').addClass('active');
                    $(this).addClass('active');
                    $(this).css({
                        "background": "linear-gradient(to left,#ececec 0, #ececec 66%, #ececec 100%)",
                        "border-radius": "50px",
                    });
                }
            });
        }
    });
</script>
<script src="/assets/js/require.js" data-main="controller"></script>
<script>
    Chart.defaults.color = 'rgba(' + app.color.componentColorRgb + ', .65)';
    Chart.defaults.font.family = app.font.family;
    Chart.defaults.font.weight = 500;
    Chart.defaults.scale.grid.color = 'rgba(' + app.color.componentColorRgb + ', .15)';
    Chart.defaults.scale.ticks.backdropColor = 'rgba(' + app.color.componentColorRgb + ', 0)';
    var ctx5 = document.getElementById('pie-chart').getContext('2d');
    window.myPie = new Chart(ctx5, {
        type: 'pie',
        data: {
            labels: ['Annual Leave', 'Emergency Leave', 'Sick Leave', 'Unpaid Leave', 'Maternity Leave'],
            datasets: [{
                data: [300, 50, 100, 40, 120],
                backgroundColor: ['rgba(52, 143, 226)', 'rgb(73, 182, 214)', 'rgba(255, 99, 71, 0.5)',
                    'rgb(255, 91, 87)', 'rgb(0, 172, 172)'
                ],
                borderColor: [app.color.red, app.color.orange, app.color.gray500, app.color.gray300, app
                    .color.gray900
                ],
                borderWidth: 1,
                label: 'My dataset'
            }],
        },
        options: {
            responsive: true
        }
    });
</script>
<script>
    Chart.defaults.color = 'rgba(' + app.color.componentColorRgb + ', .65)';
    Chart.defaults.font.family = app.font.family;
    Chart.defaults.font.weight = 500;
    Chart.defaults.scale.grid.color = 'rgba(' + app.color.componentColorRgb + ', .15)';
    Chart.defaults.scale.ticks.backdropColor = 'rgba(' + app.color.componentColorRgb + ', 0)';
    var randomScalingFactor = function() {
        return Math.round(Math.random() * 100)
    };
    var ctx2 = document.getElementById('bar-chart').getContext('2d');
    var barChart = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Check-In',
                borderWidth: 1,
                borderColor: 'rgb(64, 193, 193)',
                backgroundColor: 'rgb(64, 193, 193)',
                data: [12, 42, 42, 43, 35, 25, 42]
            }, {
                label: 'Check-Out',
                borderWidth: 1,
                borderColor: 'rgb(248, 181, 83)',
                backgroundColor: 'rgb(248, 181, 83)',
                data: [10, 12, 15, 13, 20, 22, 21]
            }, {
                label: 'Idle',
                borderWidth: 1,
                borderColor: 'rgb(194, 200, 206)',
                backgroundColor: 'rgb(194, 200, 206)',
                data: [2, 4, 5, 4, 7, 7, 7]
            }]
        }
    });
</script>
