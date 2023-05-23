@extends('layouts.dashboardTenant')

@section('content')
<div id="content" class="app-content">
    <h1 class="page-header">Project Management <small>| My Project</small></h1>
    <div class="panel panel" id="myProjectJs">
        <div class="panel-heading">
            <div class="panel-body">
                <div class="modal-content">
                    <h5 class="modal-title" id="exampleModalLabel">View Assigned Project Location</h5><br>
                    <table id="data-table-default1" class="table table-striped table-bordered align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th width="1%" class="text-nowrap">No.</th>
                                <th class="text-nowrap">Location Name</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if ($locations)
                        <?php $no = 1 ?>
                        @foreach ($locations as $location)
                        <tr>
                            <td width="1%">{{$no++}}</td>
                            <td>{{$location->location_name}}</td>
                        </tr>
                        @endforeach
                        @endif   
                        </tbody>
                    </table>
                </div>
                    <a href="/myProject" class="btn btn-light" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
    </div>
</div>
@endsection