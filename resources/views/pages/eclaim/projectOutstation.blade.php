<div class="PO" style="display:none">
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
            <input type="text" class="form-control" id="datefilter1"  name="travel_date3">
            
        </div>
    </div>
    <div class="row p-2">
        <div class="col-md-4">
            <label class="form-label">Project</label>
        </div>
        <div class="col-md-8">
            <select class="form-select" id="project" readonly name="project_id">
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
            <select class="form-select" id="locationShow" name="project_location_id" readonly></select>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-md-4">
            <label class="form-label">Purpose</label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="purpose3">
        </div>
    </div>
    {{-- <div class="row p-2">
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary">Reset</button>
            <button type="button" class="btn btn-primary">Add</button>
        </div>
    </div> --}}
</div>
