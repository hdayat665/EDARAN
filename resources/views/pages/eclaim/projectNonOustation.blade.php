<div class="PNO" style="display:none">
    <div class="row p-2">
        <div class="col-md-4">
            <label class="form-label">Cash Advance ID</label>
        </div>
        <div class="col-md-8">
            <input readonly type="text" class="form-control">
        </div>
    </div>
    <div class="row p-2">
        <div class="col-md-4">
            <label class="form-label">Travel Date</label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" id="datefilter2" value="" name="travel_date2">
        </div>
    </div>
    <div class="row p-2">
        <div class="col-md-4">
            <label class="form-label">Project</label>
        </div>
        <div class="col-md-8">
            <select class="form-select" id="project2" readonly name="project_id2">
                <?php $projects = project(); ?>
                <option class="form-label" value="">Please Select</option>
                @foreach ($projects as $project)
                    <option class="form-label" value="{{ $project->id }}">{{ $project->project_name }}</option>
                @endforeach

            </select>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-md-4">
            <label class="form-label">Destination</label>
        </div>
        <div class="col-md-8">
            <select class="form-select" id="locationShow2" name="project_location_id2" readonly></select>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-md-4">
            <label class="form-label">Purpose</label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="purpose2">
        </div>
    </div>
    {{-- <div class="row p-2">
        <div class="modal-footer">
            <button type="button" class="btn btn-primary">Save</button>
        </div>
    </div> --}}
</div>
