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
            <table id="tablebranch" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th width="1%">NO</th>
                        <th class="text-nowrap">Unit Name</th>
                        <th class="text-nowrap">Branch Type</th>
                        <th class="text-nowrap">Branch Name</th>
                        <th class="text-nowrap">State</th>
                        <th class="text-nowrap">Added By</th>
                        <th class="text-nowrap">Added Time</th>
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
                        <td style="text-transform: uppercase;">{{$branch->unitName}}</td>
                        <td>{{$branch->branchType}}</td>
                        <td>{{$branch->branchName}}</td>
                        <td style="text-transform: uppercase;">{{$branch->state}}</td>
                        <td>{{$branch->addedBy}}</td>
                        <td>{{$branch->created_at}}</td>
                        <td>{{$branch->modifiedBy}}</td>
                        <td>{{$branch->modified_at}}</td>
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
                            <label class="form-label">Branch Code*</label>
                            <input type="text" class="form-control" name="branchCode" maxlength="100" placeholder="Branch Code" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Branch Name*</label>
                            <input type="text" class="form-control" name="branchName" maxlength="100" placeholder="Branch Name" >
                           
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Branch Type</label>
                            {{-- <input type="text" class="form-control" name="branchType" maxlength="100" placeholder="" style="text-transform:uppercase"> --}}
                            <select class="form-select" name="branchType" id="">
                                <option value="">Select Type</option>
                                <option value="HEADQUARTERS ">HEADQUARTERS </option>
                                <option value="STATE ">STATE </option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Unit Name*</label>
                            <select class="form-select" name="unitId" style="text-transform: uppercase;">
                                <option type="text"value="" label="Select Unit" selected="selected">Select Unit </option>
                                <?php $units = getUnit() ?>
                                @foreach ($units as $unit)
                                <option type="text"value="{{$unit->id}}" >{{$unit->unitName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Address 1*</label>
                            <input type="text" class="form-control" name="address" maxlength="100" placeholder="Address 1" >
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Address 2</label>
                            <input type="text" class="form-control" name="address2" maxlength="100" placeholder="Address 2" >
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Postcode*</label>
                            <input type="number" class="form-control" name="postcode" id="postcode" placeholder="Postcode" aria-describedby="postcode">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">City*</label>
                            <input type="text" class="form-control" name="city" placeholder="City" >
                        </div>
                        <div class="mb-2">
                            <label class="form-label">State*</label>
                            <select class="form-select" name="state" style="text-transform: uppercase;">
                                <option type="text"type="text" value="" label="Select State " selected="selected">SELECT STATE</option>
                                <option type="text"value="Johor" label="Johor">JOHOR</option>
                                <option type="text"value="Kedah" label="Kedah">KEDAH</option>
                                <option type="text"value="Kelantan" label="Kelantan">KELANTAN</option>
                                <option type="text"value="Negeri Sembilan" label="Negeri Sembilan">NEGERI SEMBILAN</option>
                                <option type="text"value="Pahang" label="Pahang">PAHANG</option>
                                <option type="text"value="Penang" label="Penang">PENANG</option>
                                <option type="text"value="Perak" label="Perak">PERAK</option>
                                <option type="text"value="Perlis" label="Perlis">PERLIS</option>
                                <option type="text"value="Sabah" label="Sabah">SABAH</option>
                                <option type="text"value="Sarawak" label="Sarawak">SARAWAK</option>
                                <option type="text"value="Selangor" label="Selangor">SELANGOR</option>
                                <option type="text"value="Terengganu" label="Terengganu">TERENGGANU</option>
                                <option type="text"value="Kuala Lumpur" label="Kuala Lumpur">KUALA LUMPUR</option>
                                <option type="text"value="Labuan" label="Labuan">LABUAN</option>
                                <option type="text"value="Putrajaya" label="Putrajaya">PUTRAJAYA</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Country*</label>
                            <select class="form-select" name="country" style="text-transform: uppercase;">
                                <option type="text"value="MALAYSIA" label="MALAYSIA" selected="selected">MALAYSIA</option>
                            </select>
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
                            <label class="form-label">Branch Code*</label>
                            <input type="text" class="form-control" name="branchCode" id="branchCode" maxlength="100" placeholder="Branch Code" >
                            <input type="hidden" class="form-control" name="id" id="idB" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Branch Name*</label>
                            <input type="text" class="form-control" name="branchName" id="branchName" maxlength="100" placeholder="Branch Name" >
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Branch Type</label>
                            <select class="form-select" name="branchType" id="branchType">
                                <option value="">Select Type</option>
                                <option value="HEADQUARTERS">HEADQUARTERS </option>
                                <option value="STATE">STATE </option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Unit Name*</label>
                            <select class="form-select" name="unitId" id="unitId" style="text-transform: uppercase;">
                                <option type="text"value="" label="Select Unit">Select Unit </option>
                                <?php $units = getUnit() ?>
                                @foreach ($units as $unit)
                                <option type="text"value="{{$unit->id}}" >{{$unit->unitName}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Address 1*</label>
                            <input type="text" class="form-control" name="address" id="address"  maxlength="100" placeholder="" >
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Address 2</label>
                            <input type="text" class="form-control" name="address2" id="address2" maxlength="100" placeholder="" >
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Postcode</label>
                            <input type="text" class="form-control" name="postcode" id="postcodeD" placeholder="" aria-describedby="postcode">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">City*</label>
                            <input type="text" class="form-control" name="city" id="city" placeholder="" >
                        </div>
                        <div class="mb-2">
                            <label class="form-label">State*</label>
                            <select type="text" class="form-select" name="state" id="state" style="text-transform: uppercase;">
                                <option type="text"value="" label="Select State " selected="selected">Select State </option>
                                <option type="text"value="Johor" label="Johor">JOHOR</option>
                                <option type="text"value="Kedah" label="Kedah">KEDAH</option>
                                <option type="text"value="Kelantan" label="Kelantan">KELANTAN</option>
                                <option type="text"value="Negeri Sembilan" label="Negeri Sembilan">NEGERI SEMBILAN</option>
                                <option type="text"value="Pahang" label="Pahang">PAHANG</option>
                                <option type="text"value="Penang" label="Penang">PENANG</option>
                                <option type="text"value="Perak" label="Perak">PERAK</option>
                                <option type="text"value="Perlis" label="Perlis">PERLIS</option>
                                <option type="text"value="Sabah" label="Sabah">SABAH</option>
                                <option type="text"value="Sarawak" label="Sarawak">SARAWAK</option>
                                <option type="text"value="Selangor" label="Selangor">SELANGOR</option>
                                <option type="text"value="Terengganu" label="Terengganu">TERENGGANU</option>
                                <option type="text"value="Kuala Lumpur" label="Kuala Lumpur">KUALA LUMPUR</option>
                                <option type="text"value="Labuan" label="Labuan">LABUAN</option>
                                <option type="text"value="Putrajaya" label="Putrajaya">PUTRAJAYA</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Country*</label>
                            <select class="form-select" name="country" style="text-transform: uppercase;">
                                <option type="text"value="" label="malaysia" selected="selected">Select Country</option>
                            </select>
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button href="javascript:;" class="btn btn-primary" id="updateButton">Update</button>
                </div>
                </form>
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
