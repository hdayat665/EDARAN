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
                    <th width="6%" class="align-middle">Action</th>
                    <th class="text-nowrap">Location Name</th>
                    <th class="text-nowrap">Address</th>
                    <th class="text-nowrap">Location</th>
                </tr>
            </thead>
            <tbody>
                @if ($projectLocations)
                @foreach ($projectLocations as $projectLocation )
                <tr>
                    <td width="6%">
                        <a href="javascript:;"data-bs-toggle="modal" id="editProjectLocationButton" data-id="{{$projectLocation->id}}" class="btn btn-primary"><i class="fa fa-cogs"></i> Edit</a>
                        </a>
                        <a href="javascript:;" id="deleteProjectLocationButton" data-id="{{$projectLocation->id}}" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>
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
