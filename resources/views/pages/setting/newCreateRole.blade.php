@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header" id="newRoleJs">System Role <small>| Create New System Role</small></h1>

        <div class="row">
            <!-- <div class="col-md-12 panel panel"> -->
            <div class="panel-heading mt-15px">
                <h1 class="panel-title" style="font-size: 15px;">1. Role Details</h1>
            </div>
            <!-- </div> -->
        </div>
        <div class="row">
            <form id="updateForm">
                <div class="col-lg-12 panel panel">
                    <div class="panel-body">
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

                    <div class="row">
                        @php
                            $markMenu = [];
                            $markMenuCodes = [];
                            
                            $all_level = getMenuPermission();
                            
                            $levels_1 = [
                                [
                                    'menu_id' => 158,
                                    'title' => 'Dashboard',
                                ],
                                [
                                    'menu_id' => 1,
                                    'title' => 'hrims',
                                ],
                                [
                                    'menu_id' => 8,
                                    'title' => 'eAttendance',
                                ],
                                [
                                    'menu_id' => 121,
                                    'title' => 'general info',
                                ],
                                [
                                    'menu_id' => 11,
                                    'title' => 'leave',
                                ],
                                [
                                    'menu_id' => 4,
                                    'title' => 'tsr',
                                ],
                                [
                                    'menu_id' => 16,
                                    'title' => 'project',
                                ],
                                [
                                    'menu_id' => 60,
                                    'title' => 'setting',
                                ],
                                [
                                    'menu_id' => 44,
                                    'title' => 'report',
                                ],
                                [
                                    'menu_id' => 21,
                                    'title' => 'claim',
                                ],
                            ];
                            
                            $customOrder = [158, 8, 121, 1, 11, 4, 16, 21, 44, 60];
                            
                            // Get an array of level 1 ids
                            $level1Ids = collect($levels_1)->pluck('menu_id');
                            
                            // Query $all_level to get names and codes for each level 1 item
                            $level1Items = $all_level
                                ->whereIn('menu_id', $level1Ids)
                                ->whereNull('level_2')
                                ->sortBy(function ($item) use ($customOrder) {
                                    return array_search($item->menu_id, $customOrder);
                                });
                            
                            // Group $all_level items by their level_2 menu_id
                            $level2Grouped = collect($all_level)
                                ->groupBy('level_2')
                                ->filter(function ($group, $key) {
                                    return $key !== null && $key !== '';
                                });
                            
                            // Group $all_level items by their level_3 menu_id
                            $level3Grouped = collect($all_level)
                                ->groupBy('level_3')
                                ->filter(function ($group, $key) {
                                    return $key !== null && $key !== '';
                                });
                            
                            // Group $all_level items by their level_3 menu_id
                            $level4Grouped = collect($all_level)
                                ->groupBy('level_4')
                                ->filter(function ($group, $key) {
                                    return $key !== null && $key !== '';
                                });
                        @endphp
                        @foreach ($level1Items as $level_1)
                            @php
                                $classHeader = 'col-xl-4 col-md-6';
                                if (in_array($level_1->menu_id, [4, 16, 1, 11])) {
                                    $classHeader = 'col-xl-6 col-md-6 ' . $level_1->menu_id;
                                }
                                
                                if (in_array($level_1->menu_id, [1])) {
                                    $classHeader = 'col-xl-6 col-md-6 ' . $level_1->menu_id;
                                }
                                
                                if (in_array($level_1->menu_id, [44, 60, 21])) {
                                    $classHeader = 'col-xl-12 col-md-6 ' . $level_1->menu_id;
                                }
                            @endphp
                            <div class="{{ $classHeader }}">
                                <div class="panel panel">
                                    <div class="panel-body" style="min-height: 18rem">
                                        <div class="mb-6">
                                            <div class="row g-3 align-items-center">
                                                <div class="col-auto">
                                                    <input class="form-check-input" {{ in_array($level_1->code, $markMenuCodes) ? 'checked' : '' }} type="checkbox" value="{{ $level_1->code ?? '-' }}"
                                                        id="" name="permissions[]">
                                                </div>
                                                <div class="col-auto">
                                                    <p class="col-form-label" style="font-size: 15px;">{{ $level_1->name ?? '-' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            @foreach ($level2Grouped->get($level_1['menu_id'], []) as $att_level2)
                                                @php
                                                    $settingClass = '';
                                                    if (in_array($att_level2->menu_id, [125, 138, 141, 150, 22, 23, 36])) {
                                                        $settingClass = 'col-sm-3';
                                                    }
                                                    
                                                    if (in_array($att_level2->menu_id, [45, 49, 53, 52, 56, 59])) {
                                                        $settingClass = 'col-sm-2';
                                                    }
                                                    
                                                    if (in_array($att_level2->menu_id, [2, 3])) {
                                                        $settingClass = 'col-sm-6';
                                                    }
                                                @endphp
                                                <div class="{{ $settingClass }}">

                                                    <div class="mb-6 child-element">
                                                        <div class="row g-3 align-items-center">
                                                            <div class="col-auto">
                                                                <input class="form-check-input" {{ in_array($att_level2->code, $markMenuCodes) ? 'checked' : '' }} type="checkbox"
                                                                    value="{{ $att_level2->code ?? '-' }}" id="" name="permissions[]">
                                                            </div>
                                                            <div class="col-auto">
                                                                <p class="col-form-label">{{ ucwords(strtolower($att_level2->name)) ?? '-' }}
                                                                    &nbsp;
                                                                    @if ($att_level2->add)
                                                                        <input class="form-check-input rounded-circle fa fa-plus"
                                                                            {{ in_array($att_level2->code . '_create', $markMenuCodes) ? 'checked' : '' }} value="{{ $att_level2->code . '_create' }}"
                                                                            name="permissions[]" type="checkbox">
                                                                    @endif

                                                                    @if ($att_level2->edit)
                                                                        <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox"
                                                                            {{ in_array($att_level2->code . '_edit', $markMenuCodes) ? 'checked' : '' }} value="{{ $att_level2->code . '_edit' }}"
                                                                            name="permissions[]">
                                                                    @endif

                                                                    @if ($att_level2->delete)
                                                                        <input class="form-check-input rounded-circle fa fa-trash" type="checkbox"
                                                                            {{ in_array($att_level2->code . '_delete', $markMenuCodes) ? 'checked' : '' }} value="{{ $att_level2->code . '_delete' }}"
                                                                            name="permissions[]">
                                                                    @endif

                                                                    @if ($att_level2->view)
                                                                        <input class="form-check-input rounded-circle fa fa-eye" type="checkbox"
                                                                            {{ in_array($att_level2->code . '_view', $markMenuCodes) ? 'checked' : '' }} value="{{ $att_level2->code . '_view' }}"
                                                                            name="permissions[]">
                                                                    @endif
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @foreach ($level3Grouped->get($att_level2->menu_id, []) as $att_level3)
                                                        <div class="mb-6 child-element2">
                                                            <div class="row g-3 align-items-center">
                                                                <div class="col-auto">
                                                                    <input class="form-check-input" {{ in_array($att_level3->code, $markMenuCodes) ? 'checked' : '' }} type="checkbox"
                                                                        value="{{ $att_level3->code ?? '-' }}" id="" name="permissions[]">
                                                                </div>
                                                                <div class="col-auto">
                                                                    <p class="col-form-label">{{ ucwords(strtolower($att_level3->name)) ?? '-' }}
                                                                        &nbsp;
                                                                        @if ($att_level3->add)
                                                                            <input class="form-check-input rounded-circle fa fa-plus"
                                                                                {{ in_array($att_level3->code . '_create', $markMenuCodes) ? 'checked' : '' }}
                                                                                value="{{ $att_level3->code . '_create' }}" name="permissions[]" type="checkbox">
                                                                        @endif

                                                                        @if ($att_level3->edit)
                                                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox"
                                                                                {{ in_array($att_level3->code . '_edit', $markMenuCodes) ? 'checked' : '' }} value="{{ $att_level3->code . '_edit' }}"
                                                                                name="permissions[]">
                                                                        @endif

                                                                        @if ($att_level3->delete)
                                                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox"
                                                                                {{ in_array($att_level3->code . '_delete', $markMenuCodes) ? 'checked' : '' }}
                                                                                value="{{ $att_level3->code . '_delete' }}" name="permissions[]">
                                                                        @endif

                                                                        @if ($att_level3->view)
                                                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox"
                                                                                {{ in_array($att_level3->code . '_view', $markMenuCodes) ? 'checked' : '' }} value="{{ $att_level3->code . '_view' }}"
                                                                                name="permissions[]">
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Display level 4 items -->
                                                        @foreach ($level4Grouped->get($att_level3->menu_id, []) as $att_level4)
                                                            <div class="mb-6 child-element3">
                                                                <div class="row g-3 align-items-center">
                                                                    <div class="col-auto">
                                                                        <input class="form-check-input" {{ in_array($att_level4->code, $markMenuCodes) ? 'checked' : '' }} type="checkbox"
                                                                            value="{{ $att_level4->code ?? '-' }}" id="" name="permissions[]">
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <p class="col-form-label">{{ ucwords(strtolower($att_level4->name)) ?? '-' }}
                                                                            &nbsp;
                                                                            @if ($att_level4->add)
                                                                                <input class="form-check-input rounded-circle fa fa-plus"
                                                                                    {{ in_array($att_level4->code . '_create', $markMenuCodes) ? 'checked' : '' }}
                                                                                    value="{{ $att_level4->code . '_create' }}" name="permissions[]" type="checkbox">
                                                                            @endif

                                                                            @if ($att_level4->edit)
                                                                                <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox"
                                                                                    {{ in_array($att_level4->code . '_edit', $markMenuCodes) ? 'checked' : '' }}
                                                                                    value="{{ $att_level4->code . '_edit' }}" name="permissions[]">
                                                                            @endif

                                                                            @if ($att_level4->delete)
                                                                                <input class="form-check-input rounded-circle fa fa-trash" type="checkbox"
                                                                                    {{ in_array($att_level4->code . '_delete', $markMenuCodes) ? 'checked' : '' }}
                                                                                    value="{{ $att_level4->code . '_delete' }}" name="permissions[]">
                                                                            @endif

                                                                            @if ($att_level4->view)
                                                                                <input class="form-check-input rounded-circle fa fa-eye" type="checkbox"
                                                                                    {{ in_array($att_level4->code . '_view', $markMenuCodes) ? 'checked' : '' }}
                                                                                    value="{{ $att_level4->code . '_view' }}" name="permissions[]">
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 ">
                        <button class="btn btn-primary" id="saveButton" data-id="{{ request()->segment(2) }}" style="float: right">Save</button>
                    </div>
                </div>
            </form>
        </div>

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
    </div>
@endsection
