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
            if (Auth::user()->role_custom_id) {
                $permissions = getPermissionByUserId();
            }
            $role_permission = [];
            foreach ($permissions as $permission) {
                $role_permission[] = $permission->permission_code;
            }
            
            if (!$role_permission) {
                $role_permission = [];
            }
            $uid = Auth::user()->id;
            
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
                                    @php
                                        $employmentData = getEmplomentByUserId();
                                        $timesheets = getTimesheetDataToApprove();
                                    @endphp

                                    <div class="menu-text text-gray">Timesheets Approval</div>

                                    {{-- @if (isset($timesheets) && $employmentData->tsapprover == Auth::user()->id) --}}
                                    @if (isset($timesheets))
                                        <span class="badge bg-danger badge-number"
                                            id="numberNotify">{{ $timesheets->count() }}</span>
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
                        <?php $target = ['appeal_approval']; ?>
                        @if (array_intersect($role_permission, $target))
                            <div class="menu-item">
                                <a href="/appealtimesheet" class="menu-link">
                                    <div class="menu-icon">
                                        <i class="fa fa-receipt text-gray"></i>
                                    </div>
                                    @php
                                        $employmentData = getEmplomentByUserId();
                                        $appealTs = getTimesheetAppealData();
                                    @endphp
                                    <div class="menu-text text-gray">Appeal Approval </div>
                                    {{-- @if (isset($appealTs) && $employmentData->tsapprover == Auth::user()->id) --}}
                                    @if (isset($appealTs))
                                        <span class="badge bg-danger badge-number"
                                            id="numberNotify">{{ $appealTs->count() }}</span>
                                    @endif
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
                                    @php
                                        $leaveApprovals = ['recommender', 'approver'];
                                        $totalCount1 = 0;
                                        
                                        foreach ($leaveApprovals as $leaveApproval) {
                                            $count = getEleaveData($leaveApproval)->count();
                                            $totalCount1 += $count;
                                        }
                                        
                                        $totalCounts = $totalCount1;
                                    @endphp
                                    <span class="badge bg-danger badge-number" id="numberNotify">
                                        {{ $totalCounts ?? 0 }}</span>
                                </a>
                                <div class="menu-submenu">
                                    <?php $target = ['leave_recommender']; ?>
                                    @if (array_intersect($role_permission, $target))
                                        <div class="menu-item">
                                            <a href="/leaveRecommender" class="menu-link">
                                                <div class="menu-icon">
                                                    <i class="fa fa-user-pen text-gray"></i>
                                                </div>
                                                @php
                                                    $eleaveRecommender = getEleaveData('recommender');
                                                @endphp
                                                <div class="menu-text text-gray">Recommender</div>
                                                @if (isset($eleaveRecommender))
                                                    <span class="badge bg-danger badge-number"
                                                        id="numberNotify">{{ $eleaveRecommender->count() }}</span>
                                                @endif
                                            </a>
                                        </div>
                                    @endif
                                    <?php $target = ['leave_approver']; ?>
                                    @if (array_intersect($role_permission, $target))
                                        <div class="menu-item">
                                            <a href="/leaveApprover" class="menu-link">
                                                <div class="menu-icon">
                                                    <i class="fa fa-users-gear text-gray"></i>
                                                </div>
                                                @php
                                                    $eleaveRecommender = getEleaveData('approver');
                                                @endphp
                                                <div class="menu-text text-gray">Approver</div>
                                                @if (isset($eleaveRecommender))
                                                    <span class="badge bg-danger badge-number"
                                                        id="numberNotify">{{ $eleaveRecommender->count() }}</span>
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
                        <!-- <div class="menu-item">
                            <a href="/projectLocTable" class="menu-link">
                                <div class="menu-icon">
                                    <i class="fa fa-location-pin text-gray"></i>
                                </div>
                                <div class="menu-text text-gray">Project Location</i></div>
                            </a>
                        </div> -->
                        <?php $target = ['project_info']; ?>
                        @if (array_intersect($role_permission, $target))
                            <div class="menu-item">
                                <a href="/projectInfo" class="menu-link">
                                    <div class="menu-icon">
                                        <i class="fa fa-book text-gray"></i>
                                    </div>
                                    @php
                                        $projectApproverData = getProjectApproverData();
                                    @endphp
                                    <div class="menu-text text-gray">Project Information</div>
                                    @if (isset($projectApproverData))
                                        <span class="badge bg-danger badge-number"
                                            id="numberNotify">{{ $projectApproverData->count() }}</span>
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
                        <?php $target = ['claim_approval']; ?>
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
                                    @php
                                        
                                        $ruleDepartments1 = ['DepartRecommender', 'DepartApprover'];
                                        $totalCount1 = 0;
                                        
                                        foreach ($ruleDepartments1 as $department) {
                                            $count = getGeneralClaimMenuNotifyForDepartment($department)->count();
                                            $totalCount1 += $count;
                                        }
                                        
                                        $domain = getDomainListByTypeNCategory('monthlyClaim', 'admin');
                                        $ruleDepartments2 = [];
                                        if ($domain->approver == $uid) {
                                            $ruleDepartments2[] = 'AdminApprover';
                                        }
                                        
                                        if ($domain->recommender == $uid) {
                                            $ruleDepartments2[] = 'AdminRec';
                                        }
                                        
                                        if ($domain->checker1 == $uid || $domain->checker2 == $uid || $domain->checker3 == $uid) {
                                            $ruleDepartments2[] = 'AdminChecker';
                                        }
                                        
                                        $domain = getDomainListByTypeNCategory('monthlyClaim', 'finance');
                                        
                                        if ($domain->recommender == $uid) {
                                            $ruleDepartments2[] = 'FinanceRec';
                                        }
                                        
                                        if ($domain->approver == $uid) {
                                            $ruleDepartments2[] = 'FinanceApprover';
                                        }
                                        
                                        if ($domain->checker1 == $uid || $domain->checker2 == $uid || $domain->checker3 == $uid) {
                                            $ruleDepartments2[] = 'FinanceCheckerMTC';
                                            $ruleDepartments2[] = 'FinanceCheckerGNC';
                                        }
                                        // print_r($ruleDepartments2);
                                        // $ruleDepartments2 = ['AdminRec', 'AdminApprover', 'AdminChecker', 'FinanceRec', 'FinanceApprover', 'FinanceCheckerMTC', 'FinanceCheckerGNC'];
                                        $totalCount2 = 0;
                                        
                                        foreach ($ruleDepartments2 as $department) {
                                            $count = getClaimData($department)->count();
                                            $totalCount2 += $count;
                                        }
                                        
                                        $totalCounts = $totalCount1 + $totalCount2;
                                        
                                    @endphp
                                    <span class="badge bg-danger badge-number" id="numberNotify">
                                        {{ $totalCounts ?? 0 }}</span>
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
                                                @php
                                                    $ruleDepartments = ['DepartRecommender', 'DepartApprover'];
                                                    $totalCount = 0;
                                                    foreach ($ruleDepartments as $department) {
                                                        $count = getGeneralClaimMenuNotifyForDepartment($department)->count();
                                                        $totalCount += $count;
                                                    }
                                                @endphp
                                                <span class="badge bg-danger badge-number" id="numberNotify">
                                                    {{ $totalCount ?? 0 }}</span>
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
                                                @php
                                                    $ruleDepartments = [];
                                                    $domain = getDomainListByTypeNCategory('monthlyClaim', 'finance');
                                                    if ($domain->recommender == $uid) {
                                                        $ruleDepartments[] = 'FinanceRec';
                                                    }
                                                    
                                                    if ($domain->approver == $uid) {
                                                        $ruleDepartments[] = 'FinanceApprover';
                                                    }
                                                    
                                                    if ($domain->checker1 == $uid || $domain->checker2 == $uid || $domain->checker3 == $uid) {
                                                        $ruleDepartments[] = 'FinanceCheckerGNC';
                                                        $ruleDepartments[] = 'FinanceCheckerMTC';
                                                    }
                                                    // $ruleDepartments = ['FinanceRec', 'FinanceApprover', 'FinanceCheckerMTC', 'FinanceCheckerGNC'];
                                                    $totalCount = 0;
                                                    foreach ($ruleDepartments as $department) {
                                                        $count = getClaimData($department)->count();
                                                        $totalCount += $count;
                                                    }
                                                @endphp
                                                <span class="badge bg-danger badge-number" id="numberNotify">
                                                    {{ $totalCount ?? 0 }}</span>
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
                                                                <span class="badge bg-danger badge-number"
                                                                    id="numberNotify">{{ $domain->recommender == $uid ? getClaimData('FinanceRec')->count() : 0 }}</span>
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
                                                                <span class="badge bg-danger badge-number"
                                                                    id="numberNotify">{{ $domain->approver == $uid ? getClaimData('FinanceApprover')->count() : 0 }}</span>
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
                                                                <span class="badge bg-danger badge-number"
                                                                    id="numberNotify">
                                                                    @if ($domain)
                                                                        @if ($domain->checker1 == $uid || $domain->checker2 == $uid || $domain->checker3 == $uid)
                                                                            {{ getClaimData('FinanceCheckerMTC')->count() + getClaimData('FinanceCheckerGNC')->count() }}
                                                                        @else
                                                                            0
                                                                        @endif
                                                                    @else
                                                                        0
                                                                    @endif
                                                                </span>
                                                            @endif
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                    <?php $target = ['level_2']; ?>

                                    @if (array_intersect($role_permission, $target))
                                        <div class="menu-item has-sub">

                                            <a href="#" class="menu-link">
                                                <div class="menu-icon">
                                                    <i class="fa fa-user-gear text-gray"></i>
                                                </div>
                                                <div class="menu-text text-gray">Admin</i></div>
                                                <div class="menu-caret text-gray">
                                                </div>
                                                @php
                                                    $ruleDepartments = [];
                                                    $domain = getDomainListByTypeNCategory('monthlyClaim', 'admin');
                                                    if ($domain->recommender == $uid) {
                                                        $ruleDepartments[] = 'AdminRec';
                                                    }
                                                    
                                                    if ($domain->approver == $uid) {
                                                        $ruleDepartments[] = 'AdminApprover';
                                                    }
                                                    
                                                    if ($domain->checker1 == $uid || $domain->checker2 == $uid || $domain->checker3 == $uid) {
                                                        $ruleDepartments[] = 'AdminChecker';
                                                    }
                                                    
                                                    // $ruleDepartments = ['AdminRec', 'AdminApprover', 'AdminChecker'];
                                                    $totalCount = 0;
                                                    foreach ($ruleDepartments as $department) {
                                                        $count = getClaimData($department)->count();
                                                        $totalCount += $count;
                                                    }
                                                    
                                                @endphp
                                                <span class="badge bg-danger badge-number" id="numberNotify">
                                                    {{ $totalCount ?? 0 }}</span>
                                            </a>

                                            <div class="menu-submenu">
                                                <?php $target = ['level2_recommender']; ?>
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
                                                                <span class="badge bg-danger badge-number"
                                                                    id="numberNotify">{{ $domain->recommender == $uid ? getClaimData('AdminRec')->count() : 0 }}</span>
                                                            @endif
                                                        </a>
                                                    </div>
                                                @endif
                                                <?php $target = ['level2_approver']; ?>
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
                                                                <span class="badge bg-danger badge-number"
                                                                    id="numberNotify">{{ $domain->approver == $uid ? getClaimData('AdminApprover')->count() : 0 }}</span>
                                                            @endif
                                                        </a>
                                                    </div>
                                                @endif
                                                <?php $target = ['level2_checker']; ?>
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
                                                            {{-- @if (isset($config->status)) --}}
                                                            <span class="badge bg-danger badge-number"
                                                                id="numberNotify">{{ $domain->checker1 == $uid || $domain->checker2 == $uid || $domain->checker3 == $uid ? getClaimData('AdminChecker')->count() : 0 }}</span>
                                                            {{-- @endif --}}
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                        <?php $target = ['cash_advance_approval']; ?>
                        @if (array_intersect($role_permission, $target))
                            <div class="menu-item has-sub">

                                <a href="javascript:;" class="menu-link">
                                    <div class="menu-icon">
                                        <i class="fa fa-envelope-open-text text-gray"></i>
                                    </div>
                                    <div class="menu-text text-gray">CA Approval</div>
                                    <div class="menu-caret text-gray">
                                    </div>
                                    @php
                                        $domain = getDomainListByTypeNCategory('cashAdvance');
                                        $ruleDepartments = [];
                                        
                                        if ($domain->recommender == $uid) {
                                            $ruleDepartments[] = 'financeRec';
                                        }
                                        
                                        if ($domain->approver == $uid) {
                                            $ruleDepartments[] = 'financeApprover';
                                        }
                                        
                                        if ($domain->checker1 == $uid || $domain->checker2 == $uid || $domain->checker3 == $uid) {
                                            $ruleDepartments[] = 'financeChecker';
                                        }
                                        
                                        // $ruleDepartments = ['financeRec', 'financeApprover', 'financeChecker'];
                                        $employmentData = getEmplomentByUserId();
                                        if ($employmentData->caapprover == Auth::user()->id) {
                                            $ruleDepartments[100] = 'departApprover';
                                        }
                                        $totalCount = 0;
                                        foreach ($ruleDepartments as $department) {
                                            $count = getCaClaimData($department)->count();
                                            $totalCount += $count;
                                        }
                                    @endphp
                                    <span class="badge bg-danger badge-number" id="numberNotify">
                                        {{ $totalCount ?? 0 }}</span>
                                </a>

                                <div class="menu-submenu">
                                    <?php $target = ['department_approver']; ?>
                                    @if (array_intersect($role_permission, $target))
                                        <div class="menu-item has-sub">
                                            <?php $target = ['department_approver']; ?>
                                            @if (array_intersect($role_permission, $target))
                                                <a href="javascript:;" class="menu-link">
                                                    <div class="menu-icon">
                                                        <i class="fa fa-user text-gray"></i>
                                                    </div>
                                                    <div class="menu-text text-gray">Department</i>
                                                    </div>
                                                    <div class="menu-caret text-gray">
                                                    </div>
                                                    @php
                                                        $ruleDepartments = ['departApprover'];
                                                        $totalCount = 0;
                                                        foreach ($ruleDepartments as $department) {
                                                            $count = getCaClaimData($department)->count();
                                                            $totalCount += $count;
                                                        }
                                                    @endphp
                                                    <span class="badge bg-danger badge-number" id="numberNotify">
                                                        {{ $totalCount ?? 0 }}</span>
                                                </a>
                                                <?php $target = ['department_approver']; ?>
                                                @if (array_intersect($role_permission, $target))
                                                    <div class="menu-submenu">
                                                        <div class="menu-item">
                                                            <a href="/cashAdvanceApproverView" class="menu-link">
                                                                <div class="menu-icon">
                                                                    <i class="fa fa-list-check text-gray"></i>
                                                                </div>
                                                                @php
                                                                    $employmentData = getEmplomentByUserId();
                                                                    $caClaim = getCaClaimData('departApprover');
                                                                @endphp
                                                                <div class="menu-text text-gray">Approver</div>
                                                                @if (isset($caClaim) && $employmentData->caapprover == Auth::user()->id)
                                                                    <span class="badge bg-danger badge-number"
                                                                        id="numberNotify">{{ $caClaim->count() }}</span>
                                                                @else
                                                                    <span class="badge bg-danger badge-number"
                                                                        id="numberNotify">0</span>
                                                                @endif
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
                                                @php
                                                    $ruleDepartments = [];
                                                    
                                                    if ($domain->recommender == $uid) {
                                                        $ruleDepartments[] = 'financeRec';
                                                    }
                                                    
                                                    if ($domain->approver == $uid) {
                                                        $ruleDepartments[] = 'financeApprover';
                                                    }
                                                    
                                                    if ($domain->checker1 == $uid || $domain->checker2 == $uid || $domain->checker3 == $uid) {
                                                        $ruleDepartments[] = 'financeChecker';
                                                    }
                                                    
                                                    $totalCount = 0;
                                                    foreach ($ruleDepartments as $department) {
                                                        $count = getCaClaimData($department)->count();
                                                        $totalCount += $count;
                                                    }
                                                @endphp
                                                <span class="badge bg-danger badge-number" id="numberNotify">
                                                    {{ $totalCount ?? 0 }}</span>
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
                                                                <span class="badge bg-danger badge-number"
                                                                    id="numberNotify">{{ $domain->recommender == $uid ? $caClaim->count() : 0 }}</span>
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
                                                                <span class="badge bg-danger badge-number"
                                                                    id="numberNotify">{{ $domain->approver == $uid ? $caClaim->count() : 0 }}</span>
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
                                                                <span class="badge bg-danger badge-number"
                                                                    id="numberNotify">{{ $domain->checker1 == $uid || $domain->checker2 == $uid || $domain->checker3 == $uid ? $caClaim->count() : 0 }}</span>
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
                                    @php
                                        $appealData = getAppealData('approval');
                                    @endphp
                                    @if (isset($appealData))
                                        <span class="badge bg-danger badge-number"
                                            id="numberNotify">{{ count($appealData) }}</span>
                                    @endif
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
            <!-- End Sidenav Content Orbit -->
            <!-- Sidenav Content Orbit -->
            <?php $target = ['general_info_tab']; ?>
            @if (array_intersect($role_permission, $target))
                <div class="menu-item has-sub">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon">
                            <i class="fa fa-circle-info text-gray"></i>
                        </div>
                        <div class="menu-text text-gray">General Information</div>
                        <div class="menu-caret text-gray"></div>
                    </a>

                    <div class="menu-submenu">
                        <?php $target = ['phone_directory']; ?>
                        @if (array_intersect($role_permission, $target))
                            <div class="menu-item">
                                <a href="/phoneDirectory" class="menu-link">
                                    <div class="menu-icon">
                                        <i class="fa fa-rectangle-list text-gray"></i>
                                    </div>
                                    <div class="menu-text text-gray">Phone Directory</i></div>
                                </a>
                            </div>
                        @endif
                        <?php $target = ['organization_chart']; ?>
                        @if (array_intersect($role_permission, $target))
                            <div class="menu-item">
                                <a href="/organizationChart" class="menu-link">
                                    <div class="menu-icon">
                                        <i class="fa fa-rectangle-list text-gray"></i>
                                    </div>
                                    <div class="menu-text text-gray">Organization Chart</div>
                                </a>
                            </div>
                        @endif
                        <?php $target = ['policy_sop']; ?>
                        @if (array_intersect($role_permission, $target))
                            <div class="menu-item">
                                <a href="/policysop" class="menu-link">
                                    <div class="menu-icon">
                                        <i class="fa fa-rectangle-list text-gray"></i>
                                    </div>
                                    <div class="menu-text text-gray">Policy & SOP</div>
                                </a>
                            </div>
                        @endif
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
            @endif
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
                                    <div class="menu-text text-gray">eLeave</div>
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
                                    <div class="menu-text text-gray">eClaim</div>
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
            {{-- {{ print_r(Auth::user()->role_id) }} --}}
            @if (array_intersect($role_permission, $target))
                <div class="menu-item has-sub">
                    <a href="/setting" class="menu-link">
                        <div class="menu-icon">
                            <i class="fa fa-gear text-gray"></i>
                        </div>
                        <div class="menu-text text-gray">Setting</div>
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
<div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile"
        class="stretched-link"></a></div>
