@extends('layouts.dashboardTenant')

@section('content')

    <style>
     .mdtimepicker {
        top: 50% !important;
        transform: translateY(-50%);
        background-color: transparent !important;
        }

    .custom-dropdown-menu {
        position: static !important;
        height: auto !important;
        max-height: none !important;
        overflow: visible !important;
    }
    </style>

    {{-- content-start --}}

    <div id="content" class="app-content">
        <h1 class="page-header">Setting <small>| Working Hour</small></h1>
        <div class="row">
            <div class="col-xl-15" id="weekendEntitlementJs">
                <div class="tab-content panel m-0 rounded-0 p-3">
                    <div class="tab-pane fade active show" id="default-tab-1">
                        <form id="updateWeekend">
                            <div class="panel-body">
                                <div class="panel-heading-btn">
                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addcountry" class="btn btn-primary">+ New State</a>
                                </div>
                                <br>
                                <br>
                                <table  id="tableweekend"  class="table table-striped table-bordered align-middle">
                                    <thead>
                                        <tr>
                                        <th width="1%" class="text-nowrap">No.</th>
                                        <th width="1%" class="text-nowrap" data-orderable="false">Action</th>
                                        <th class="text-nowrap">State</th>
                                        <th class="text-nowrap">Monday</th>
                                        <th class="text-nowrap">Tuesday</th>
                                        <th class="text-nowrap">Wednesday</th>
                                        <th class="text-nowrap">Thursday</th>
                                        <th class="text-nowrap">Friday</th>
                                        <th class="text-nowrap">Saturday</th>
                                        <th class="text-nowrap">Sunday</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id = 0 ?>
                                            @if ($weekend)
                                            @foreach ($weekend as $wk)
                                        <?php $id++ ?>
                                        <tr class="odd gradeX">
                                            <td>{{ $id }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <div>
                                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i class="fa fa-caret-down"></i></a>
                                                    </div>
                                                    <div class="dropdown-menu custom-dropdown-menu tableAction">
                                                        <a href="javascript:;" id="editButton" data-state_id="{{ $wk->state_id }}" class="dropdown-item" data-bs-toggle="modal" id="myModal1"
                                                            data-bs-target="#addleave"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                                                        {{-- <div class="dropdown-divider"></div>
                                                        <a href="javascript:;" id="deleteButton" data-id="{{ $wk->id }}" class="dropdown-item"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> --}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="text-align:center">{{ strtoupper($wk->state_name) }}</td>
                                            <td style="text-align:center">
                                                @if ($wk->monday_start && $wk->monday_end && $wk->monday_total)
                                                    {{$wk->monday_start}} - {{$wk->monday_end}}
                                                @else
                                                    Weekend
                                                @endif
                                            </td>
                                            <td style="text-align:center">
                                                @if ($wk->tuesday_start && $wk->tuesday_end &&  $wk->tuesday_total)
                                                    {{$wk->tuesday_start}} - {{$wk->tuesday_end}}
                                                @else
                                                    Weekend
                                                @endif
                                            </td>
                                            <td style="text-align:center">
                                                @if ($wk->webnesday_start && $wk->webnesday_end && $wk->webnesday_total)
                                                    {{$wk->webnesday_start}} - {{$wk->webnesday_end}}
                                                @else
                                                    Weekend
                                                @endif
                                            </td>
                                            <td style="text-align:center">
                                                @if ($wk->thursday_start && $wk->thursday_end && $wk->thursday_total)
                                                    {{$wk->thursday_start}} - {{$wk->thursday_end}}
                                                @else
                                                    Weekend
                                                @endif
                                            </td>
                                            <td style="text-align:center">
                                                @if ($wk->friday_start && $wk->friday_end && $wk->friday_total)
                                                    {{$wk->friday_start}} - {{$wk->friday_end}}
                                                @else
                                                    Weekend
                                                @endif
                                            </td>
                                            <td style="text-align:center">
                                                @if ($wk->saturday_start && $wk->saturday_end && $wk->saturday_total)
                                                    {{$wk->saturday_start}} - {{$wk->saturday_end}}
                                                @else
                                                    Weekend
                                                @endif
                                            </td>
                                            <td style="text-align:center">
                                                @if ($wk->sunday_start && $wk->sunday_end && $wk->sunday_total)
                                                    {{$wk->sunday_start}} - {{$wk->sunday_end}}
                                                @else
                                                    Weekend
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div> <!-- end panel-body -->

                            {{-- <div class="row p-2">
                                <div class="modal-footer">
                                    <a class="btn btn-white" >Reset</a>
                                    <button type="submit" id="saveWeekend" class="btn btn-primary">Save</button>
                                </div>
                            </div> --}}
                        </form>
                    </div> <!-- end tab-pane fade active show-->
                    <div class="row p-2">
                <div class="col align-self-start">
                    <a href="/setting" class="btn btn-light" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>

                </div> <!--end tab-content panel m-0 rounded-0 p-3-->
            </div> <!-- end col-xl-15-->
        </div> <!--end row-->
    </div> <!--end app-content -->

    @include('modal.eleave.weekend.weekendModel')


@endsection

