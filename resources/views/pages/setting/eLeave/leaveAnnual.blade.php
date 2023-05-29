@extends('layouts.dashboardTenant')

@section('content')

    {{-- content-start --}}

    <div id="content" class="app-content">
        <!-- END breadcrumb -->
        <!-- BEGIN page-header -->
        <h1 class="page-header">Setting | Leave Entitlements</h1>
        <div class="row">
            <div class="col-xl-15" id="anualLeaveJs">
                <!-- BEGIN nav-tabs -->
                <ul class="nav nav-tabs" id="anualLeaveJs">
                    <li class="nav-item">
                        <a href="#default-tab-1" data-bs-toggle="tab" class="nav-link active">
                            <span class="d-sm-none">Tab 1</span>
                            <span class="d-sm-block d-none">Annual Leave List</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#default-tab-2" data-bs-toggle="tab" class="nav-link">
                            <span class="d-sm-none">Tab 2</span>
                            <span class="d-sm-block d-none">Sick Leave</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#default-tab-3" data-bs-toggle="tab" class="nav-link">
                            <span class="d-sm-none">Tab 3</span>
                            <span class="d-sm-block d-none">Carried Forward</span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content panel m-0 rounded-0 p-3">
                    <div class="tab-pane fade active show" id="default-tab-1">
                        <form id="updateAnualLeave">
                            <h3 class="mt-10px"></i> Annual Leave List </h3>
                            <div class="panel-body">
                                <table  id="tableannual"  class="table table-striped table-bordered align-middle">
                                    <thead>
                                        <tr>
                                        <th class="text-nowrap">No.</th>
                                        <th class="text-nowrap">Job Grade</th>
                                        <th class="text-nowrap">Permanent (0-2 years)</th>
                                        <th class="text-nowrap">Permanent (2-3 years)</th>
                                        <th class="text-nowrap">Permanent (More than 5 years)</th>
                                        <th class="text-nowrap">Contract</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $id = 0 ?>
                                            @if ($anualLeave)
                                            @foreach ($anualLeave as $al)
                                        <?php $id++ ?>

                                        <tr class="odd gradeX">
                                            <td>{{ $id }}</td>
                                            <td>{{$al->jobGradeName}}</td>
                                            <td><input style="text-align:center" type="text" id="permenant1_{{$id}}" name="permenant[{{$id}}][permenant_01]" value="{{$al->permenant_01}}"></td>
                                            <td><input style="text-align:center" type="text" id="permenant2_{{$id}}" name="permenant[{{$id}}][permenant_02]" value="{{$al->permenant_02}}"></td>
                                            <td><input style="text-align:center" type="text" id="permenant3_{{$id}}"  name="permenant[{{$id}}][permenant_03]" value="{{$al->permenant_03}}"></td>
                                            <td><input style="text-align:center" type="text" id="contract_{{$id}}" name="permenant[{{$id}}][contract]" value="{{$al->contract}}"></td>
                                        </tr>

                                        @endforeach
                                        @endif
                                    </tbody>

                                </table>
                            </div> <!-- end panel-body -->
                            <div class="row p-2">
                                <div class="modal-footer">
                                    <a class="btn btn-white" >Reset</a>
                                    <button type="submit" id="saveAnualLeave" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end tab-pane fade active show-->


                    <div class="tab-pane fade" id="default-tab-2">
                        <form id="updateSickLeave">
                            <h3 class="mt-10px"></i> Sick Leave </h3>
                            <div class="panel-body">
                                <table  id="tablesick"  class="table table-striped table-bordered align-middle table-sm">
                                    <thead>
                                        <tr>
                                        <th class="text-nowrap">No.</th>
                                        <th class="text-nowrap">Type Sick</th>
                                        <th class="text-nowrap">Permanent (0-2 years)</th>
                                        <th class="text-nowrap">Permanent (2-3 years)</th>
                                        <th class="text-nowrap">Permanent (More than 5 years)</th>
                                        <th class="text-nowrap">Contract (0-2 years)</th>
                                        <th class="text-nowrap">Contract (2-3 years)</th>
                                        <th class="text-nowrap">Contract (More than 5 years)</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $id = 0 ?>
                                            @if ($sickleave)
                                            @foreach ($sickleave as $sl)
                                        <?php $id++ ?>

                                        <tr class="odd gradeX">
                                            <td>{{ $id }}</td>
                                            <td>{{$sl->leave_types}}</td>
                                            <td><input style="text-align:center" type="text" id="sickpermenant1_{{$id}}" name="sickpermenant[{{$id}}][permenant_01]" value="{{$sl->permenant_01}}"></td>
                                            <td><input style="text-align:center" type="text" id="sickpermenant2_{{$id}}" name="sickpermenant[{{$id}}][permenant_02]" value="{{$sl->permenant_02}}"></td>
                                            <td><input style="text-align:center" type="text" id="sickpermenant3_{{$id}}" name="sickpermenant[{{$id}}][permenant_03]" value="{{$sl->permenant_03}}"></td>
                                            <td><input style="text-align:center" type="text" id="sickpermenant4_{{$id}}" name="sickpermenant[{{$id}}][contract_01]" value="{{$sl->contract_01}}"></td>
                                            <td><input style="text-align:center" type="text" id="sickpermenant5_{{$id}}" name="sickpermenant[{{$id}}][contract_02]" value="{{$sl->contract_02}}"></td>
                                            <td><input style="text-align:center" type="text" id="sickpermenant6_{{$id}}" name="sickpermenant[{{$id}}][contract_03]" value="{{$sl->contract_03}}"></td>
                                        </tr>

                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>  <!-- end panel-body-->
                            <div class="row p-2">
                                <div class="modal-footer">
                                    <a class="btn btn-white" >Reset</a>
                                    <button type="submit" id="saveSickLeave" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end tab-pane fade-->

                    <div class="tab-pane fade" id="default-tab-3">
                        <form id="updateCarryForward">
                            <h3>Carried Forward Leave</h3>
                            <div class="panel-body">
                                <table  id="tablecarryforward"  class="table table-striped table-bordered align-middle">
                                    <thead>
                                        <tr>
                                        <th class="text-nowrap">No.</th>
                                        <th class="text-nowrap">Carry Forward</th>
                                        <th class="text-nowrap">Max Duration (Days)</th>
                                        <th class="text-nowrap">Lapsed Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $id = 0 ?>
                                            @if ($carryforward)
                                            @foreach ($carryforward as $cf)
                                        <?php $id++ ?>

                                        <tr class="odd gradeX">
                                            <td>{{ $id }}</td>
                                            <td>{{$cf->type_carryforward}}</td>
                                            <td><input style="text-align:center" type="text" id="carryforward1_{{$id}}" name="carryforward[{{$id}}][max_duration]" value="{{$cf->max_duration}}"></td>
                                            <td><input style="text-align:center" type="text" id="datecarryforward_{{$id}}" name="carryforward[{{$id}}][lapsed_date]" value="{{$cf->lapsed_date}}"></td>
                                        </tr>

                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div> <!--end panel-body-->
                            <div class="row p-2">
                                <div class="modal-footer">
                                    <a class="btn btn-white" >Reset</a>
                                    <button type="submit" id="saveCarryForword" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end tab-pane fade-->
                </div> <!--end tab-content panel m-0 rounded-0 p-3-->
            </div> <!-- end col-xl-15-->
        </div> <!--end row-->
    </div> <!--end app-content -->


@endsection

