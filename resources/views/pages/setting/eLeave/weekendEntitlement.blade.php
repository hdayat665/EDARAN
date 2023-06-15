@extends('layouts.dashboardTenant')

@section('content')

    {{-- content-start --}}

    <div id="content" class="app-content">
        <!-- END breadcrumb -->
        <!-- BEGIN page-header -->
        <h1 class="page-header">Setting | Weekend Entitlements</h1>
        <div class="row">
            <div class="col-xl-15" id="weekendEntitlementJs">
                <!-- BEGIN nav-tabs -->

                <div class="tab-content panel m-0 rounded-0 p-3">
                    <div class="tab-pane fade active show" id="default-tab-1">
                        <h3 class="mt-10px"></i> Weekend Entitlement List </h3>
                        <!-- BEGIN panel-heading -->

                        {{-- <div class="panel-heading-btn">
                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addcountry" class="btn btn-primary">+ Add Country</a>
                        </div> --}}

                        <form id="updateWeekend">
                            <div class="panel-body">
                                <table  id="tableweekend"  class="table table-striped table-bordered align-middle">
                                    <thead>
                                        <tr>
                                        <th width="1%" class="text-nowrap">No.</th>
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
                                            <td>{{$wk->state}}</td>
                                            <td style="text-align: center;">
                                                <input type="hidden" name="checkbox[{{$id}}][monday]" value="">
                                                <input type="checkbox" id="monday_{{$id}}" name="checkbox[{{$id}}][monday]" value="1" @if($wk->monday === 1) checked @endif>
                                            </td>
                                            <td style="text-align: center;">
                                                <input type="hidden" name="checkbox[{{$id}}][tuesday]" value="">
                                                <input type="checkbox" id="tuesday_{{$id}}" name="checkbox[{{$id}}][tuesday]" value="2" @if($wk->tuesday === 2) checked @endif>
                                            </td>
                                            <td style="text-align: center;">
                                                <input type="hidden" name="checkbox[{{$id}}][wednesday]" value="">
                                                <input type="checkbox" id="wednesday_{{$id}}" name="checkbox[{{$id}}][wednesday]" value="3" @if($wk->wednesday === 3) checked @endif>
                                            </td>
                                            <td style="text-align: center;">
                                                <input type="hidden" name="checkbox[{{$id}}][thursday]" value="">
                                                <input type="checkbox" id="thursday_{{$id}}" name="checkbox[{{$id}}][thursday]" value="4" @if($wk->thursday === 4) checked @endif>
                                            </td>
                                            <td style="text-align: center;">
                                                <input type="hidden" name="checkbox[{{$id}}][friday]" value="">
                                                <input type="checkbox" id="friday_{{$id}}" name="checkbox[{{$id}}][friday]" value="5" @if($wk->friday === 5) checked @endif>
                                            </td>
                                            <td style="text-align: center;">
                                                <input type="hidden" name="checkbox[{{$id}}][saturday]" value="">
                                                <input type="checkbox" id="saturday_{{$id}}" name="checkbox[{{$id}}][saturday]" value="6" @if($wk->saturday === 6) checked @endif>
                                            </td>
                                            <td style="text-align: center;">
                                                <input type="hidden" name="checkbox[{{$id}}][sunday]" value="">
                                                <input type="checkbox" id="sunday_{{$id}}" name="checkbox[{{$id}}][sunday]" value="0" @if($wk->sunday === 0) checked @endif>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div> <!-- end panel-body -->

                            <div class="row p-2">
                                <div class="modal-footer">
                                    <a class="btn btn-white" >Reset</a>
                                    <button type="submit" id="saveWeekend" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end tab-pane fade active show-->
                </div> <!--end tab-content panel m-0 rounded-0 p-3-->
            </div> <!-- end col-xl-15-->
        </div> <!--end row-->
    </div> <!--end app-content -->

    @include('modal.eleave.weekend.weekendModel')


@endsection

