@extends('layouts.dashboardTenant')
@section('content')
    <style>
        .child-element {
            margin-left: 20px;
            /* Adjust the indentation or spacing as desired */
        }

        .child-element2 {
            margin-left: 35px;
            /* Adjust the indentation or spacing as desired */
        }

        .child-element3 {
            margin-left: 50px;
            /* Adjust the indentation or spacing as desired */
        }

        .child-element4 {
            margin-left: 65px;
            /* Adjust the indentation or spacing as desired */
        }

        .child-element5 {
            margin-left: 80px;
            /* Adjust the indentation or spacing as desired */
        }

        .rounded-circle {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            border: 1px solid #F5F5F5;
            background-color: #DCDCDC;
        }

        .rounded-circle:checked {
            background-color: #7FFF00;
            border: 1px solid #7FFF00;
        }

        .rounded-circle:checked[type=checkbox] {
            background-image: none;
            /* Remove the background image for rounded-circle checkboxes */
        }

        .fa.fa-eye {
            color: #A9A9A9;
            /* Change the color to your desired color */
            font-size: 13px;
            /* Change the font size to your desired size */
        }

        .fa.fa-plus {
            color: #A9A9A9;
            /* Change the color to your desired color */
            font-size: 13px;
            /* Change the font size to your desired size */
        }

        .fa.fa-pencil {
            color: #A9A9A9;
            /* Change the color to your desired color */
            font-size: 13px;
            /* Change the font size to your desired size */
        }

        .fa.fa-trash {
            color: #A9A9A9;
            /* Change the color to your desired color */
            font-size: 13px;
            /* Change the font size to your desired size */
        }

        .fa.fa-check {
            color: #A9A9A9;
            /* Change the color to your desired color */
            font-size: 13px;
            /* Change the font size to your desired size */
        }

        .fa.fa-close {
            color: #A9A9A9;
            /* Change the color to your desired color */
            font-size: 13px;
            /* Change the font size to your desired size */
        }
    </style>
    <div id="content" class="app-content">
        <h1 class="page-header" id="newRoleJs">System Role <small>| Update System Role</small></h1>

        <div class="row">
            <!-- <div class="col-md-12 panel panel"> -->
            <div class="panel-heading mt-15px">
                <h1 class="panel-title" style="font-size: 15px;">1. Role Details</h1>
            </div>
            <!-- </div> -->
        </div>

        <div class="row">
            <div class="col-lg-12 panel panel">
                <div class="panel-body">
                    <form id="">
                        <div class="row p-2">
                            <div class="col-sm-2">
                                <label class="form-label col-form-label col-md-5">Role Name*</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control mb-5px" name="roleName" placeholder="ROLE NAME" value="{{ $role->roleName ?? '-' }}" />
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-2">
                                <label class="form-label col-form-label col-md-5">Description*</label>
                            </div>
                            <div class="col-sm-6">
                                <textarea type="text" class="form-control mb-5px" rows="4" name="desc" maxlength="255" placeholder="DESCRIPTION">{{ $role->desc ?? '-' }}</textarea>
                            </div>
                        </div>

                        <div class="mb-6">
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <input class="form-check-input excludeFromAllAccess" type="checkbox" value="" id="">
                                </div>
                                <div class="col-auto">
                                    <p class="col-form-label">Default - Assign to new users by default</p>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="panel-heading mt-15px">
                <h1 class="panel-title" style="font-size: 15px;">2. Access Details</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 panel panel">
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <input class="form-check-input" type="checkbox" value="" id="allAccessCheckbox">
                    </div>
                    <div class="col-auto">
                        <p class="col-form-label" style="font-size: 15px;">ALL ACCESS</p>
                    </div>
                </div>
            </div>

            @php
                $menu = getMenuPermission();
                
                $sections = [
                    [
                        'menu_id' => 1,
                        'title' => 'Dashboard',
                    ],
                    [
                        'menu_id' => 8,
                        'title' => 'eAttendance',
                    ],
                    [
                        'menu_id' => 4,
                        'title' => 'tsr',
                    ],
                    [
                        'menu_id' => 11,
                        'title' => 'leave',
                    ],
                    [
                        'menu_id' => 16,
                        'title' => 'project',
                    ],
                    [
                        'menu_id' => 21,
                        'title' => 'claim',
                    ],
                    [
                        'menu_id' => 44,
                        'title' => 'report',
                    ],
                    [
                        'menu_id' => 60,
                        'title' => 'setting',
                    ],
                ];
            @endphp
            <!-- ================== Row 1 ================== -->
            <div class="row">
                @foreach ($sections as $section)
                    <div class="col-xl-3 col-md-6">
                        <div class="panel panel">
                            <!-- =============== {{ $section['title'] }} =============== -->
                            <div class="panel-body">
                                @foreach ($menu as $att)
                                    @if ($att->menu_id == $section['menu_id'] && $att->level_1)
                                        <div class="mb-6">
                                            <div class="row g-3 align-items-center">
                                                <div class="col-auto">
                                                    <input class="form-check-input" type="checkbox" value="{{ $att->code ?? '-' }}" id="">
                                                </div>
                                                <div class="col-auto">
                                                    <p class="col-form-label" style="font-size: 15px;">{{ $att->name ?? '-' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($att->level_2 == $section['menu_id'])
                                        <div class="mb-6 child-element">
                                            <div class="row g-3 align-items-center">
                                                <div class="col-auto">
                                                    <input class="form-check-input" type="checkbox" value="{{ $att->code ?? '-' }}" id="">
                                                </div>
                                                <div class="col-auto">
                                                    <p class="col-form-label">{{ $att->name ?? '-' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    {{-- claim --}}
                                    @if (in_array($section['menu_id'], [21, 44]))
                                        @if (in_array($att->level_3, [23, 36, 46, 50, 54, 56]))
                                            <div class="mb-6 child-element2">
                                                <div class="row g-3 align-items-center">
                                                    <div class="col-auto">
                                                        <input class="form-check-input" type="checkbox" value="" id="">
                                                    </div>
                                                    <div class="col-auto">
                                                        <p class="col-form-label">{{ $att->name ?? '-' }} <br>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if (in_array($att->level_4, [24, 27, 31]))
                                            <div class="mb-6 child-element3">
                                                <div class="row g-3 align-items-center">
                                                    <div class="col-auto">
                                                        <input class="form-check-input" type="checkbox" value="" id="">
                                                    </div>
                                                    <div class="col-auto">
                                                        <p class="col-form-label">{{ $att->name ?? '-' }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endif

                                    {{-- claim --}}
                                    @if (in_array($section['menu_id'], [44]))
                                        @if (in_array($att->level_3, [46, 50, 54, 56]))
                                            <div class="mb-6 child-element2">
                                                <div class="row g-3 align-items-center">
                                                    <div class="col-auto">
                                                        <input class="form-check-input" type="checkbox" value="" id="">
                                                    </div>
                                                    <div class="col-auto">
                                                        <p class="col-form-label">{{ $att->name ?? '-' }} <br>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        @endsection
