@extends('layouts.dashboardTenant')

@section('content')
<div id="content" class="app-content">
    <h1 class="page-header" id="editProjectJs">Project Registration | Update Project - ( {{$project->project_code. ' - ' .$project->project_name}} )</h1>
    <div class="row">
        <div class="col-xl-15">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="#tab1" data-bs-toggle="tab" class="nav-link active">
                        <span class="d-sm-none">Tab 1</span>
                        <span class="d-sm-block d-none">Project Information</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#tab2" data-bs-toggle="tab" class="nav-link">
                        <span class="d-sm-none">Tab 2</span>
                        <span class="d-sm-block d-none">Previous Project Manager</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#tab3" data-bs-toggle="tab" class="nav-link">
                        <span class="d-sm-none">Tab 3</span>
                        <span class="d-sm-block d-none">Project Location</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#tab4" data-bs-toggle="tab" class="nav-link">
                        <span class="d-sm-none">Tab 4\5</span>
                        <span class="d-sm-block d-none">Project Member</span>
                    </a>
                </li>

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
