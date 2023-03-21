<div class="tab-pane fade" id="tab3">
    <h3 class="mt-10px"></i>Project Location</h3>
    <div class="panel-heading-btn">
        <br>
        <a href="javascript:;" data-bs-toggle="modal" id="addProjectLocationButton" class="btn btn-primary">+ Add Project Location</a>
    </div>
    <br>
    <div class="panel-body">
        <table id="projectLocationTable" class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th width="5%" class="align-middle">No.</th>
                    <th width="6%" class="align-middle">Action</th>
                    <th class="text-nowrap">Location Name</th>
                    <th class="text-nowrap">Address</th>
                    <th class="text-nowrap">Location</th>
                </tr>
            </thead>
            <tbody>
                @if ($projectLocations)
                @foreach ($projectLocations as $key => $projectLocation )
                <tr>
                    <td width="1%">{{ $key + 1 }}</td>
                    <td width="6%">
                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                        <div class="dropdown-menu">
                        <a href="javascript:;"data-bs-toggle="modal" id="editProjectLocationButton" data-id="{{$projectLocation->id}}" class="dropdown-item">Edit</a>                        
                        <div class="dropdown-divider"></div>
                        <a href="javascript:;" id="deleteProjectLocationButton" data-id="{{$projectLocation->id}}" class="dropdown-item"> Delete </a>
                    </td>
                    <td>{{$projectLocation->location_name}}</td>
                    <td>{{$projectLocation->address}}</td>
                    <td><a href="https://www.google.com/maps/{{$projectLocation->location_google}}">https://www.google.com/maps/{{$projectLocation->location_google}}</a></td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
            <a class="btn btn-white me-5px btnPrevious">Previous</a>
            <a class="btn btn-white me-5px btnNext">Next</a>
    </div>
</div>

@include('modal.project.addProjectLocation')
@include('modal.project.editProjectLocation')
