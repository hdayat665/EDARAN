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
    <h1 class="page-header">Settings <small>| Companies </small></h1>
    <div class="panel panel">

        <!-- BEGIN panel-heading -->

        <div class="panel-heading">
            <div class="col-md-6">
                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">+ New Company</a>
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
                        <th class="text-nowrap">Company Code</th>
                        <th class="text-nowrap">Company Name</th>
                        <th class="text-nowrap">Added By</th>
                        <th class="text-nowrap">Added Time</th>
                        <th class="text-nowrap">Modified By</th>
                        <th class="text-nowrap">Modified Time</th>
                        <th width="9%" data-orderable="false" class="align-middle">Action</th>


                    </tr>
                </thead>
                <tbody>
                    <tr class="odd gradeX">
                        <td width="1%" class="fw-bold text-dark">1</td>
                        <td>Edaran</td>
                        <td>Edaran Communications Sdn Bhd</td>
                        <td> Farid </td>
                        <td>2 Feb 2022 2.30 pm</td>
                        <td>Elon Musk</td>
                        <td>14 Feb 2021 4.30 pm</td>
                        <td><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal2" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a> <a href="javascript:;" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>

                    </tr>
                    <tr class="even gradeC">
                        <td width="1%" class="fw-bold text-dark">2</td>
                        <td>MIDC</td>
                        <td>MIDC Technology Sdn Bhd</td>
                        <td> Farid </td>
                        <td>3 Feb 2022 2.30 pm</td>
                        <td>Bill Gates</td>
                        <td>12 Feb 2021 4.30 pm</td>
                        <td><a href="javascript:;" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a> <a href="javascript:;" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>

                    </tr>
                    <tr class="even gradeC">
                        <td width="1%" class="fw-bold text-dark">3</td>
                        <td>Shinba</td>
                        <td>Shinba-Edaran Sdn Bhd</td>
                        <td> Farid </td>
                        <td>5 Feb 2022 2.30 pm</td>
                        <td>Maisarah</td>
                        <td>10 Feb 2022 2.30 pm</td>
                        <td><a href="javascript:;" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a> <a href="javascript:;" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>

                    </tr>




                </tbody>
            </table>
        </div>
    </div>
</div>


    <!-- END row -->
    <!-- BEGIN row -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Company</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="mb-3">
                            <label>Company Code* </label><br><br>
                            <input type="text" class="form-control" id="recipient-name" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label>Company Name* </label><br><br>
                            <input type="text" class="form-control" id="recipient-name" placeholder="">
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
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Company</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="mb-3">
                            <label>Company Code* </label><br><br>
                            <input type="text" class="form-control" id="recipient-name" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label>Company Name* </label><br><br>
                            <input type="text" class="form-control" id="recipient-name" placeholder="">
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


    @endsection
