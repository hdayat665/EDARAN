@extends('layouts.dashboardTenant')

@section('content')
<div id="content" class="app-content">
    <h1 class="page-header" id="viewAssignLocation">View Assigned Project Location</h1>
    <div class="panel panel">
        <div class="panel-body">
            <form>
                <div class="row">
                    <div class="col-md-10">
                        <label class="form-label col-form-label col-md-10">Project Member Name: {{$projectMember->employeeName ?? '-'}}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <label class="form-label col-form-label col-md-10">Project Location Name</label>
                    </div>
                </div>
            </form>
            <table id="data-table-viewassigned" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th width="1%" data-orderable="false" class="align-middle">Action</th>
                        <th class="text-nowrap">Project Location</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($locations)
                    <?php $no = 1 ?>
                    @foreach ($locations as $location)
                    <tr>
                        <td width="1%">{{$no++}}</td>
                        <td width="1%"><a id="deleteButton" data-id="{{$location->id}}" data-member-id="{{$projectMember->id}}" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>
                        <td>{{$location->location_name}}</td>
                    </tr>
                    @endforeach
                    @endif

                </tbody>
            </table>
            <div class="row p-2">
                <div class="col align-self-start">
                    <a href="/projectInfoEdit/3#tab4" class="btn btn-light" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
