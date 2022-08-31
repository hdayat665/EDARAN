@extends('layouts.dashboardTenant')

@section('content')

<div id="content" class="app-content">
    <!-- BEGIN breadcrumb -->
    <!-- BEGIN breadcrumb -->

    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->

    <!-- END page-header -->
    <!-- BEGIN row -->

    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">Settings <small>| Branch </small></h1>

    <!-- END page-header -->
    <!-- BEGIN panel -->
    <div class="panel panel">

        <!-- BEGIN panel-heading -->

        <div class="panel-heading" id="branchJs">
            <div class="col-md-6">
                <a href="javascript:;" data-bs-toggle="modal" id="addButton" class="btn btn-primary">+ New Branch</a>
            </div>

            <h4 class="panel-title"></h4>


        </div>
        <!-- END panel-heading -->
        <!-- BEGIN panel-body -->
        <div class="panel-body">
            <table id="data-table-default" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th width="1%">NO</th>
                        <th class="text-nowrap">Unit Name</th>
                        <th class="text-nowrap">Branch Type</th>
                        <th class="text-nowrap">Branch Name</th>
                        <th class="text-nowrap">State</th>
                        <th class="text-nowrap">Added By</th>
                        <th class="text-nowrap">Modified By</th>
                        <th class="text-nowrap">Modified Time</th>
                        <th width="9%" data-orderable="false" class="align-middle">Action</th>



                    </tr>
                </thead>
                <tbody>
                    <?php $id = 0 ?>
                    @if ($branchs)
                    @foreach ($branchs as $branch)
                    <?php $id++ ?>
                    <tr class="odd gradeX">
                        <td width="1%" class="fw-bold text-dark">{{$id}}</td>
                        <td>{{$branch->unitName}}</td>
                        <td>{{$branch->branchType}}</td>
                        <td>{{$branch->branchName}}</td>
                        <td>{{$branch->state}}</td>
                        <td>{{$branch->addedBy}}</td>
                        <td>{{$branch->modifiedBy}}</td>
                        <td>{{$branch->updated_at}}</td>
                        <td><a href="javascript:;" data-toggle="modal" data-bs-toggle="modal" id="editButton" data-id="{{$branch->id}}" class="btn btn-outline-green" ><i class="fa fa-pencil-alt"></i></a> <a id="deleteButton" data-id="{{$branch->id}}" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

    <!-- END row -->
    <!-- BEGIN row -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Branch</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addForm">

                        <div class="mb-3">
                            <label>Branch Code</label>
                            <input type="text" class="form-control" name="branchCode" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label>Branch Name</label>
                            <input type="text" class="form-control" name="branchName" placeholder="">
                        </div>
                        <div class="mb-2">
                            <label>Branch Type</label>
                            <input type="text" class="form-control" name="branchType" placeholder="">
                        </div>
                        <div class="mb-2">
                            <label>Unit Name</label>
                            <select class="form-select" name="unitId">
                                <option value="0" label="Select State " selected="selected">Select Unit </option>
                                <?php $units = getUnit() ?>
                                @foreach ($units as $unit)
                                <option value="{{$unit->id}}" >{{$unit->unitName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" placeholder="">
                        </div>
                        <div class="mb-2">
                            <label>Address 2</label>
                            <input type="text" class="form-control" name="address2" placeholder="">
                        </div>
                        <div class="mb-2">
                            <label>Postcode </label>
                            <input type="text" class="form-control" name="postcode" placeholder="">
                        </div>
                        <div class="mb-2">
                            <label>City</label>
                            <input type="text" class="form-control" name="city" placeholder="">
                        </div>
                        <div class="mb-2">
                            <label>State</label>
                            <select class="form-select" name="state">
                                <option value="0" label="Select State " selected="selected">Select State </option>
                                <option value="Johor" label="Johor">Johor</option>
                                <option value="Kedah" label="Kedah">Kedah</option>
                                <option value="Kelantan" label="Kelantan">Kelantan</option>
                                <option value="Negeri Sembilan" label="Negeri Sembilan">Negeri Sembilan</option>
                                <option value="Pahang" label="Pahang">Pahang</option>
                                <option value="Penang" label="Penang">Penang</option>
                                <option value="Perak" label="Perak">Perak</option>
                                <option value="Perlis" label="Perlis">Perlis</option>
                                <option value="Sabah" label="Sabah">Sabah</option>
                                <option value="Sarawak" label="Sarawak">Sarawak</option>
                                <option value="Selangor" label="Selangor">Selangor</option>
                                <option value="Terengganu" label="Terengganu">Terengganu</option>
                                <option value="Kuala Lumpur" label="Kuala Lumpur">Kuala Lumpur</option>
                                <option value="Labuan" label="Labuan">Labuan</option>
                                <option value="Putrajaya" label="Putrajaya">Putrajaya</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label>Country</label>
                            <select class="form-select" name="country">
                                <option value="0" label="Malaysia" selected="selected">Malaysia </option>
                                <option value="1" label="Brunei">Brunei</option>
                                <option value="2" label="Singapore">Singapore</option>

                            </select>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveButton">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Branch</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">

                        <div class="mb-3">
                            <label>Branch Code</label>
                            <input type="text" class="form-control" name="branchCode" id="branchCode" placeholder="">
                            <input type="hidden" class="form-control" name="id" id="idB" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label>Branch Name</label>
                            <input type="text" class="form-control" name="branchName" id="branchName" placeholder="">
                        </div>
                        <div class="mb-2">
                            <label>Branch Type</label>
                            <input type="text" class="form-control" name="branchType" id="branchType" placeholder="">
                        </div>
                        <div class="mb-2">
                            <label>Unit Name</label>
                            <select class="form-select" name="unitId" id="unitId">
                                <option value="0" label="Select State ">Select Unit </option>
                                <?php $units = getUnit() ?>
                                @foreach ($units as $unit)
                                <option value="{{$unit->id}}" >{{$unit->unitName}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="mb-2">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" id="address"  placeholder="">
                        </div>
                        <div class="mb-2">
                            <label>Address 2</label>
                            <input type="text" class="form-control" name="address2" id="address2" placeholder="">
                        </div>
                        <div class="mb-2">
                            <label>Postcode </label>
                            <input type="text" class="form-control" name="postcode" id="postcode" placeholder="">
                        </div>
                        <div class="mb-2">
                            <label>City</label>
                            <input type="text" class="form-control" name="city" id="city" placeholder="">
                        </div>
                        <div class="mb-2">
                            <label>State</label>
                            <select class="form-select" name="state" id="state">
                                <option value="0" label="Select State " selected="selected">Select State </option>
                                <option value="Johor" label="Johor">Johor</option>
                                <option value="Kedah" label="Kedah">Kedah</option>
                                <option value="Kelantan" label="Kelantan">Kelantan</option>
                                <option value="Negeri Sembilan" label="Negeri Sembilan">Negeri Sembilan</option>
                                <option value="Pahang" label="Pahang">Pahang</option>
                                <option value="Penang" label="Penang">Penang</option>
                                <option value="Perak" label="Perak">Perak</option>
                                <option value="Perlis" label="Perlis">Perlis</option>
                                <option value="Sabah" label="Sabah">Sabah</option>
                                <option value="Sarawak" label="Sarawak">Sarawak</option>
                                <option value="Selangor" label="Selangor">Selangor</option>
                                <option value="Terengganu" label="Terengganu">Terengganu</option>
                                <option value="Kuala Lumpur" label="Kuala Lumpur">Kuala Lumpur</option>
                                <option value="Labuan" label="Labuan">Labuan</option>
                                <option value="Putrajaya" label="Putrajaya">Putrajaya</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label>Country</label>
                            <select class="form-select" name="country" id="country">
                                <option value="1" label="Malaysia" selected="selected">Malaysia </option>
                                <option value="2" label="Brunei">Brunei</option>
                                <option value="3" label="Singapore">Singapore</option>

                            </select>

                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="updateButton">Save</button>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <!-- BEGIN col-4 -->
        <div class="col-xl-4 col-lg-6">
            <!-- BEGIN panel -->

            <!-- END panel -->
        </div>
        <!-- END col-4 -->
        <!-- BEGIN col-4 -->
        <div class="col-xl-4 col-lg-6">
            <!-- BEGIN panel -->

            <!-- END panel -->
        </div>
        <!-- END col-4 -->
        <!-- BEGIN col-4 -->
        <div class="col-xl-4 col-lg-6">
            <!-- BEGIN panel -->

            <!-- END panel -->
        </div>
        <!-- END col-4 -->
    </div>
    <!-- END row -->

@endsection
