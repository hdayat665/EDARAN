@extends('layouts.dashboardTenant')

@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header" id="editProjectJs">Project Registration | Update Project - (
            {{ $project->project_code . ' - ' . $project->project_name }} )</h1>
        <div class="row">
            <div class="col-xl-15">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="nav-item">
                        <a href="#tab1" id="nav_pro_info" data-bs-toggle="tab" class="nav-link active">
                            <span class="d-sm-none">Tab 1</span>
                            <span class="d-sm-block d-none">Project Information</span>
                        </a>
                    </li>
                    @php
                        $pmc = ['pmc', 'project_manager'];
                    @endphp

                    @if (array_intersect($role_permission, $pmc))
                        <li class="nav-item">
                            <a href="#tab2" id="nav_pre_pro" data-bs-toggle="tab" class="nav-link">
                                <span class="d-sm-none">Tab 2</span>
                                <span class="d-sm-block d-none">Previous Project Manager</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tab3" id="nav_pro_loc" data-bs-toggle="tab" class="nav-link">
                                <span class="d-sm-none">Tab 3</span>
                                <span class="d-sm-block d-none">Project Location</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tab4" id="nav_pro_mem" data-bs-toggle="tab" class="nav-link">
                                <span class="d-sm-none">Tab 4</span>
                                <span class="d-sm-block d-none">Project Member</span>
                            </a>
                        </li>
                    @endif

                    @if (in_array('pmap', $role_permission))
                        <input type="hidden" value="pmap" id="pmap">
                    @endif

                    @if (in_array('pmc', $role_permission))
                        <input type="hidden" value="pmc" id="pmc">
                    @endif

                    @if (in_array('account_manager', $role_permission))
                        <input type="hidden" value="ac" id="ac">
                    @endif

                    @if (in_array('project_manager', $role_permission))
                        <input type="hidden" value="pm" id="pm">
                    @endif

                </ul>
                <div class="tab-content panel m-0 rounded-0 p-3">
                    @include('pages.project.projectInfoUpdate')

                    @include('pages.project.previousProjectManager')

                    @include('pages.project.projectLocation')

                    @include('pages.project.previousMember')
                </div>
            </div>
        </div>
    </div>
@endsection
