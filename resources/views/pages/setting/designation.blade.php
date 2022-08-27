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
    <h1 class="page-header">Settings <small>| Designation </small></h1>

    <!-- END page-header -->
    <!-- BEGIN panel -->
    <div class="panel panel">

        <!-- BEGIN panel-heading -->

        <div class="panel-heading">
            <div class="col-md-6">
                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">+ New Designation</a>
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
                        <th class="text-nowrap">Designation Code</th>
                        <th class="text-nowrap">Designation Name</th>
                        <th class="text-nowrap">Job Description</th>
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
                        <td>M001</td>
                        <td>Manager</td>
                        <td class="show-less">An Account Manager is responsible for making sure client and customer <span id="dots">...</span><span id="more"> needs are being met and understood by each department in the company. Their duties include handling any client complaints, working to find solutions to any client issues and managing other departments to ensure clients are experiencing a positive client-company relationship. </span></p> <button onclick="myFunction()" id="myBtn">Read more</button></td>
                        <td>Faris</td>
                        <td>14 Feb 2021 4.30 pm</td>
                        <td>Elon Musk</td>
                        <td>14 Feb 2021 4.30 pm</td>
                        <td><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal2" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a> <a href="javascript:;" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>

                    </tr>
                    <tr class="even gradeC">
                        <td width="1%" class="fw-bold text-dark">2</td>
                        <td>M002</td>
                        <td>Administrative</td>
                        <td class="show-less">An Administrative Assistant, or Administrative Aide, is responsible<span id="dots2">...</span><span id="more2"> for supporting an administrative professional to help them stay organized and complete tasks that allow them to focus on more advanced responsibilities. Their duties organizing meetings for Administrators, greeting office visitors and composing documents on behalf of Administrators. </span></p> <button onclick="myFunction2()" id="myBtn2">Read more</button></td>
                        <td>Faris</td>
                        <td>14 Feb 2021 4.30 pm</td>
                        <td>Elon Musk</td>
                        <td>14 Feb 2021 4.30 pm</td>
                        <td><a href="javascript:;" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a> <a href="javascript:;" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>

                    </tr>
                    <tr class="even gradeC">
                        <td width="1%" class="fw-bold text-dark">3</td>
                        <td>SD001</td>
                        <td>Software Developer</td>
                        <td class="show-less">A Software Developer, or Computer Software Developer, is responsible <span id="dots3">...</span><span id="more3"> for using their knowledge of programming languages to design software programs. Their duties include meeting with clients to determine their software needs, coding and testing software to ensure functionality and updating software programs to refine components like cybersecurity measures and data storage capacities. </span></p> <button onclick="myFunction3()" id="myBtn3">Read more</button></td>
                        <td>Faris</td>
                        <td>14 Feb 2021 4.30 pm</td>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Designation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>

                    <div class="mb-3">
                        <label>Designation Code* </label><br><br>
                        <input type="text" class="form-control" id="recipient-name" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label>Designation Name* </label><br><br>
                        <input type="text" class="form-control" id="recipient-name" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label>Job Description* </label><br><br>
                        <textarea class="form-control" rows="5"></textarea>
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
                <h5 class="modal-title" id="exampleModalLabel">Update Designation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>

                    <div class="mb-3">
                        <label>Designation Code* </label><br><br>
                        <input type="text" class="form-control" id="recipient-name" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label>Designation Name* </label><br><br>
                        <input type="text" class="form-control" id="recipient-name" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label>Job Description* </label><br><br>
                        <textarea class="form-control" rows="5"></textarea>
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
