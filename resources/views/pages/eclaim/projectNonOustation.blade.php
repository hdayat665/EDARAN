<div class="PNO" style="display:none">
    <!-- <div class="row p-2">
        <div class="col-md-4">
            <label class="form-label">Cash Advance ID</label>
        </div>
        <div class="col-md-8">
            <input readonly type="text" class="form-control">
        </div>
    </div> -->
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
                <option class="form-label" value="" selected>
                    Please Select</option>
                <?php $projects = myProjectOnly(); ?>
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
            <select class="form-select" id="locationShow2" name="project_location_id2" readonly>
                <option class="form-label" value="">Please Choose</option>
                <option class="form-label" value="other">Others</option>
            </select>
        </div>
    </div>
    <div class="row p-2" id="otherlocation2" style="display:none">
        <div class="col-md-4">
            <label class="form-label">Other Location</label>
        </div>
        <div class="col-md-8">
            <input type="text" name="otherlocation2" class="form-control">
        </div>
    </div>
    <div class="row p-2">
        <div class="col-md-4">
            <label class="form-label">Purpose</label>
        </div>
        <div class="col-md-8">
            <textarea type="text" class="form-control" name="purpose2" rows="3" maxlength="255"> </textarea>
        </div>
    </div>
    {{-- <div class="row p-2">
        <div class="modal-footer">
            <button type="button" class="btn btn-primary">Save</button>
        </div>
    </div> --}}
</div>
