@extends('layouts.dashboardTenant')

@section('content')

    {{-- content-start --}}

    <div id="content" class="app-content">
        <!-- END breadcrumb -->
        <!-- BEGIN page-header -->
        <h1 class="page-header">Setting | Weekend Entitlements</h1>
        <div class="row">
            <div class="col-xl-15" id="annualLeaveJs">
                <!-- BEGIN nav-tabs -->

                <div class="tab-content panel m-0 rounded-0 p-3">
                    <div class="tab-pane fade active show" id="default-tab-1">
                        <h3 class="mt-10px"></i> Weekend Entitlement List </h3>
                        <!-- BEGIN panel-heading -->

                        <div class="panel-heading-btn">
                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addcountry" class="btn btn-primary">+ Add Country</a>
                        </div>

                        <div class="panel-body">
                            <table  id="tableannual"  class="table table-striped table-bordered align-middle">
                                <thead>
                                    <tr>
                                    <th class="text-nowrap">No.</th>
                                    <th class="text-nowrap">State</th>
                                    <th class="text-nowrap">Sunday</th>
                                    <th class="text-nowrap">Monday</th>
                                    <th class="text-nowrap">Tuesday</th>
                                    <th class="text-nowrap">Wednesday</th>
                                    <th class="text-nowrap">Thursday</th>
                                    <th class="text-nowrap">Friday</th>
                                    <th class="text-nowrap">Saturday</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Selangor</td>
                                        <!-- <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td> -->
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Kelantan</td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Kedah</td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Pulau Pinang</td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Perak</td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> <!-- end panel-body -->
                    </div> <!-- end tab-pane fade active show-->

                    <div class="modal fade" id="addcountry" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Country</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="addForm">
                                        <div class="mb-3">
                                            <label class="form-label">Add Country*</label>
                                            <input type="text" class="form-control" name="addcountry" placeholder="Add Country" >
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button href="javascript:;" class="btn btn-primary" id="saveButton">Save</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>




                </div> <!--end tab-content panel m-0 rounded-0 p-3-->
            </div> <!-- end col-xl-15-->
        </div> <!--end row-->
    </div> <!--end app-content -->


@endsection

