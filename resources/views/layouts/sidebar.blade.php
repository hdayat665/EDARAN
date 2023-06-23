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
                        <div class="menu-text text-gray">HRMIS</div>
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
                        <div class="menu-text text-gray">Timesheet</div>
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
                                    <div class="menu-text text-gray">My Timesheet</div>
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
                                    {{-- check if this is approver ts  --}}
                                    {{-- @php
                                        $employmentData = getEmplomentByUserId();
                                        $timesheets = getTimesheetDataToApprove();
                                    @endphp --}}
                                    <div class="menu-text text-gray">Timesheets Approval</div>
                                    @if (isset($timesheets) && $employmentData->tsapprover == Auth::user()->id)
                                        <span class="badge bg-danger badge-number" id="numberNotify">{{ $timesheets->count() }}</span>
                                    @endif
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
                        <div class="menu-item">
                            <a href="/appealtimesheet" class="menu-link">
                                <div class="menu-icon">
                                    <i class="fa fa-receipt text-gray"></i>
                                </div>
                                {{-- @php
                                    $employmentData = getEmplomentByUserId();
                                    $appealTs = getTimesheetAppealData();
                                @endphp --}}
                                <div class="menu-text text-gray">Appeal Approval </div>
                                @if (isset($appealTs) && $employmentData->tsapprover == Auth::user()->id)
                                    <span class="badge bg-danger badge-number" id="numberNotify">{{ $appealTs->count() }}</span>
                                @endif
                            </a>
                        </div>
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
                        <div class="menu-text text-gray">eAttendance</div>
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
                        <div class="menu-text text-gray">eLeave</div>
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
                                                {{-- @php
                                                    $eleaveRecommender = getEleaveData('recommender');
                                                @endphp --}}
                                                <div class="menu-text text-gray">Recommender</div>
                                                @if (isset($eleaveRecommender))
                                                    <span class="badge bg-danger badge-number" id="numberNotify">{{ $eleaveRecommender->count() }}</span>
                                                @endif
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
                                                {{-- @php
                                                    $eleaveRecommender = getEleaveData('approver');
                                                @endphp --}}
                                                <div class="menu-text text-gray">Approver</div>
                                                @if (isset($eleaveRecommender))
                                                    <span class="badge bg-danger badge-number" id="numberNotify">{{ $eleaveRecommender->count() }}</span>
                                                @endif
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
                        <div class="menu-text text-gray">Project Management</div>
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
                                    {{-- @php
                                        $projectApproverData = getProjectApproverData();
                                    @endphp --}}
                                    <div class="menu-text text-gray">Project Information</div>
                                    @if (isset($projectApproverData))
                                        <span class="badge bg-danger badge-number" id="numberNotify">{{ $projectApproverData->count() }}</span>
                                    @endif
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
                        <div class="menu-text text-gray">eClaim</div>
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
                                                            <div class="menu-text text-gray">
                                                                Recommender
                                                            </div>
                                                            @php
                                                                $config = getApprovalConfig(2, 'monthly');
                                                            @endphp
                                                            @if (isset($config->status))
                                                                <span class="badge bg-danger badge-number"
                                                                    id="numberNotify">{{ getGeneralClaimMenuNotifyForDepartment('DepartRecommender')->count() }}</span>
                                                            @endif
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
                                                            @php
                                                                $config = getApprovalConfig(1, 'monthly');
                                                            @endphp
                                                            @if (isset($config->status))
                                                                <span class="badge bg-danger badge-number"
                                                                    id="numberNotify">{{ getGeneralClaimMenuNotifyForDepartment('DepartApprover')->count() }}</span>
                                                            @endif
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
                                                            @php
                                                                $config = getApprovalConfig(7, 'monthly');
                                                            @endphp
                                                            @if (isset($config->status))
                                                                <span class="badge bg-danger badge-number" id="numberNotify">{{ getClaimData('FinanceRec')->count() }}</span>
                                                            @endif
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
                                                            @php
                                                                $config = getApprovalConfig(8, 'monthly');
                                                            @endphp
                                                            @if (isset($config->status))
                                                                <span class="badge bg-danger badge-number" id="numberNotify">{{ getClaimData('FinanceApprover')->count() }}</span>
                                                            @endif
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
                                                            @php
                                                                $config = getApprovalConfig(6, 'monthly');
                                                            @endphp
                                                            @if (isset($config->status))
                                                                <span class="badge bg-danger badge-number" id="numberNotify">{{ getClaimData('FinanceChecker')->count() }}</span>
                                                            @endif
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
                                                            @php
                                                                $config = getApprovalConfig(4, 'monthly');
                                                            @endphp
                                                            @if (isset($config->status))
                                                                <span class="badge bg-danger badge-number" id="numberNotify">{{ getClaimData('AdminRec')->count() }}</span>
                                                            @endif
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
                                                            @php
                                                                $config = getApprovalConfig(5, 'monthly');
                                                            @endphp
                                                            @if (isset($config->status))
                                                                <span class="badge bg-danger badge-number" id="numberNotify">{{ getClaimData('AdminApprover')->count() }}</span>
                                                            @endif
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
                                                            @php
                                                                $config = getApprovalConfig(3, 'monthly');
                                                            @endphp
                                                            @if (isset($config->status))
                                                                <span class="badge bg-danger badge-number" id="numberNotify">{{ getClaimData('AdminChecker')->count() }}</span>
                                                            @endif
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
                                    <div class="menu-text text-gray">CA Approval</div>
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

                                                                @php
                                                                    $caClaim = getCaClaimData('departApprover');
                                                                @endphp
                                                                <div class="menu-text text-gray">Approver</div>
                                                                {{-- @if (isset($caClaim) && $employmentData->caapprover == Auth::user()->id)
                                                                    <span class="badge bg-danger badge-number" id="numberNotify">{{ $caClaim->count() }}</span>
                                                                @endif --}}
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
                                                            @php
                                                                $caClaim = getCaClaimData('financeRec');
                                                            @endphp
                                                            <div class="menu-text text-gray">Recommender</div>
                                                            @if (isset($caClaim))
                                                                <span class="badge bg-danger badge-number" id="numberNotify">{{ $caClaim->count() }}</span>
                                                            @endif
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
                                                            @php
                                                                $caClaim = getCaClaimData('financeApprover');
                                                            @endphp
                                                            <div class="menu-text text-gray">Approver </div>
                                                            @if (isset($caClaim))
                                                                <span class="badge bg-danger badge-number" id="numberNotify">{{ $caClaim->count() }}</span>
                                                            @endif
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
                                                            @php
                                                                $caClaim = getCaClaimData('financeChecker');
                                                                foreach ($caClaim as $ca) {
                                                                    if ($ca->approver == 'recommend' && ($ca->f1 == '' || $ca->f1 == 'check' || $ca->f2 == 'check' || $ca->f3 == 'check') && $ca->f_status == null) {
                                                                        $caData[] = $ca;
                                                                    }
                                                                }
                                                            @endphp
                                                            <div class="menu-text text-gray">Checker</div>
                                                            @if (isset($caData))
                                                                <span class="badge bg-danger badge-number" id="numberNotify">{{ count($caData) }}</span>
                                                            @endif
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
                    <div class="menu-text text-gray">General Information</div>
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
