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

        <div class="panel-heading">
            <div class="col-md-6">
                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">+ New Branch</a>
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
                    <tr class="odd gradeX">
                        <td width="1%" class="fw-bold text-dark">1</td>
                        <td>Unit Name</td>
                        <td>Branch Type</td>
                        <td>Branch Name</td>
                        <td> Putrajaya </td>
                        <td>Farid</td>
                        <td>Elon Musk</td>
                        <td>14 Feb 2021 4.30 pm</td>
                        <td><a href="javascript:;" data-toggle="modal" data-bs-toggle="modal" data-bs-target="#exampleModal2" class="btn btn-outline-green" ><i class="fa fa-pencil-alt"></i></a> <a href="javascript:;" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>

                    </tr>
                    <tr class="even gradeC">
                        <td width="1%" class="fw-bold text-dark">2</td>
                        <td>Unit Name</td>
                        <td>Branch Type</td>
                        <td>Branch Name</td>
                        <td> Putrajaya </td>
                        <td>Farid</td>
                        <td>Elon Musk</td>
                        <td>14 Feb 2021 4.30 pm</td>
                        <td><a href="javascript:;" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a> <a href="javascript:;" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>

                    </tr>
                    <tr class="even gradeC">
                        <td width="1%" class="fw-bold text-dark">3</td>
                        <td>Unit Name</td>
                        <td>Branch Type</td>
                        <td>Branch Name</td>
                        <td> Putrajaya </td>
                        <td>Farid</td>
                        <td>Elon Musk</td>
                        <td>14 Feb 2021 4.30 pm</td>
                        <td><a href="javascript:;" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a> <a href="javascript:;" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>

                    </tr>




                </tbody>
            </table>
        </div>
    </div>
</div>

    <!-- END row -->
    <!-- BEGIN row -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Branch</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="mb-3">
                            <label>Branch Code</label>
                            <input type="text" class="form-control" id="recipient-name" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label>Branch Name</label>
                            <input type="text" class="form-control" id="recipient-name" placeholder="">
                        </div>
                        <div class="mb-2">
                            <label>Branch Type</label>
                            <input type="text" class="form-control" id="recipient-name" placeholder="">
                        </div>
                        <div class="mb-2">
                            <label>Unit Name</label>
                            <select class="form-select">
                                <option value="0" label="Select State " selected="selected">Select Unit </option>
                                <option value="1" label="Application Unit">Application Unit</option>
                                <option value="2" label="Maintenance Unit">Maintenance Unit</option>
                                <option value="3" label="Offshore Unit">Offshore Unit</option>

                            </select>
                        </div>
                        <div class="mb-2">
                            <label>Address</label>
                            <input type="text" class="form-control" id="recipient-name" placeholder="">
                        </div>
                        <div class="mb-2">
                            <label>Address 2</label>
                            <input type="text" class="form-control" id="recipient-name" placeholder="">
                        </div>
                        <div class="mb-2">
                            <label>Postcode </label>
                            <input type="text" class="form-control" id="recipient-name" placeholder="">
                        </div>
                        <div class="mb-2">
                            <label>City</label>
                            <input type="text" class="form-control" id="recipient-name" placeholder="">
                        </div>
                        <div class="mb-2">
                            <label>State</label>
                            <select class="form-select">
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
                            <select class="form-select">
                                <option value="0" label="Malaysia" selected="selected">Malaysia </option>
                                <option value="1" label="Brunei">Brunei</option>
                                <option value="2" label="Singapore">Singapore</option>

                            </select>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Branch</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="mb-3">
                            <label>Branch Code</label>
                            <input type="text" class="form-control" id="recipient-name" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label>Branch Name</label>
                            <input type="text" class="form-control" id="recipient-name" placeholder="">
                        </div>
                        <div class="mb-2">
                            <label>Branch Type</label>
                            <input type="text" class="form-control" id="recipient-name" placeholder="">
                        </div>
                        <div class="mb-2">
                            <label>Unit Name</label>
                            <select class="form-select">
                                <option value="0" label="Select State " selected="selected">Select Unit </option>
                                <option value="1" label="Application Unit">Application Unit</option>
                                <option value="2" label="Maintenance Unit">Maintenance Unit</option>
                                <option value="3" label="Offshore Unit">Offshore Unit</option>

                            </select>
                        </div>
                        <div class="mb-2">
                            <label>Address</label>
                            <input type="text" class="form-control" id="recipient-name" placeholder="">
                        </div>
                        <div class="mb-2">
                            <label>Address 2</label>
                            <input type="text" class="form-control" id="recipient-name" placeholder="">
                        </div>
                        <div class="mb-2">
                            <label>Postcode </label>
                            <input type="text" class="form-control" id="recipient-name" placeholder="">
                        </div>
                        <div class="mb-2">
                            <label>City</label>
                            <input type="text" class="form-control" id="recipient-name" placeholder="">
                        </div>
                        <div class="mb-2">
                            <label>State</label>
                            <select class="form-select">
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
                            <select class="form-select">
                                <option value="0" label="Malaysia" selected="selected">Malaysia </option>
                                <option value="1" label="Brunei">Brunei</option>
                                <option value="2" label="Singapore">Singapore</option>

                            </select>

                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
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
