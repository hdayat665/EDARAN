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
    <h1 class="page-header">Settings <small>| News</small></h1>

    <!-- END page-header -->
    <!-- BEGIN panel -->
    <div class="panel panel">

        <!-- BEGIN panel-heading -->

        <div class="panel-heading">
            <div class="col-md-6">
                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">+ New News</a>
            </div>

            <h4 class="panel-title"></h4>


        </div>
        <!-- END panel-heading -->
        <!-- BEGIN panel-body -->
        <div class="panel-body">
            <table id="data-table-default" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th width="9%" data-orderable="false" class="align-middle">Action</th>
                        <th class="text-nowrap">Title</th>
                        <th class="text-nowrap">Content</th>
                        <th class="text-nowrap">Attachment</th>
                        <th class="text-nowrap">Added By</th>
                        <th class="text-nowrap">Added Time</th>
                        <th class="text-nowrap">Modified By</th>
                        <th class="text-nowrap">Modified Time</th>



                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal2" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a> <a href="javascript:;" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>
                        <td>Training Calendar FY2020</td>
                        <td>Training Calendar</td>
                        <td>Trainingcal.pdf</td>
                        <td>Zaid</td>
                        <td>14 Feb 2021 4.30 pm</td>
                        <td>Kamal</td>
                        <td>14 Feb 2021 4.30 pm</td>

                    </tr>
                    <tr>
                        <td><a href="javascript:;" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a> <a href="javascript:;" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>
                        <td>Program Doa Selamat</td>
                        <td>Doa Selamat</td>
                        <td>Doaselamat.pdf</td>
                        <td>Ifwat</td>
                        <td>13 Feb 2021 4.30 pm</td>
                        <td>Rika</td>
                        <td>19 Feb 2021 4.30 pm</td>

                    </tr>
                    <tr>
                        <td><a href="javascript:;" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a> <a href="javascript:;" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>
                        <td>Majlis Perkahwinan Aqil</td>
                        <td>Majlis Perkahwinan Aqil</td>
                        <td>weddingaqil.pdf</td>
                        <td>Amad</td>
                        <td>11 Feb 2021 4.30 pm</td>
                        <td>Boi</td>
                        <td>18 Feb 2021 4.30 pm</td>

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
                <h5 class="modal-title" id="exampleModalLabel">New News</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>

                    <div class="mb-3">
                        <label>Title</label><br><br>
                        <input type="text" class="form-control" id="recipient-name" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label>Source URL</label><br><br>
                        <input type="text" class="form-control" id="recipient-name" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label>Content </label><br><br>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>File Upload </label><br><br>
                        <input id="fileupload" type="file" multiple="multiple" ></input>
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
                <h5 class="modal-title" id="exampleModalLabel">Update News</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>

                    <div class="mb-3">
                        <label>Title</label><br><br>
                        <input type="text" class="form-control" id="recipient-name" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label>Source URL</label><br><br>
                        <input type="text" class="form-control" id="recipient-name" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label>Content </label><br><br>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>File Upload </label><br><br>
                        <input id="fileupload" type="file" multiple="multiple" ></input>
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
<!-- END row -->

@endsection
