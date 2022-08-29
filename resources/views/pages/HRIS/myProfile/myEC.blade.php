
<div class="tab-pane fade" id="default-tab-3">
    <h4 class="mt-10px">Emergency Contact</h4>
    <br>
    <form id="formEmergency">
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="emergency-firstname" class="form-label">First Name*</label>
                <input type="text" id="emergency-firstname" name="firstName" value="{{ $emergency->firstName ?? '' }}" class="form-control" aria-describedby="emergency-firstname">
            </div>
            <div class="col-sm-6">
                <label for="emergency-lastname" class="form-label">Last Name*</label>
                <input type="text" id="emergency-lastname" name="lastName" value="{{ $emergency->lastName ?? '' }}" class="form-control" aria-describedby="emergency-lastname">
            </div>
        </div>
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="emergency-contactnumber" class="form-label">Contact Number*</label>
                <input type="text" id="emergency-contactnumber" name="contactNo" value="{{ $emergency->contactNo ?? '' }}" class="form-control" aria-describedby="emergency-contactnumber">
            </div>
            <div class="col-sm-6">
                <label for="emergency-relationship" class="form-label">Relationship*</label>
                <input type="text" id="emergency-relationship" name="relationship" value="{{ $emergency->relationship ?? '' }}" class="form-control" aria-describedby="emergency-relationship">
            </div>
        </div>
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="emergency-address1" class="form-label">Address 1*</label>
                <input type="text" id="emergency-address1" name="address1" value="{{ $emergency->address1 ?? '' }}" class="form-control" aria-describedby="emergency-address1">
            </div>
            <div class="col-sm-6">
                <label for="emergency-address1" class="form-label">Address 2</label>
                <input type="text" id="emergency-address2" name="address2" value="{{ $emergency->address2 ?? '' }}" class="form-control" aria-describedby="emergency-address2">
            </div>

        </div>
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="emergency-postcode" class="form-label">Postcode*</label>
                <input type="text" id="emergency-postcode" name="postcode" value="{{ $emergency->postcode ?? '' }}" class="form-control" aria-describedby="emergency-postcode">
            </div>
            <div class="col-sm-6">
                <label for="emergency-city" class="form-label">City*</label>
                <select class="form-select" name="city" value="{{ $emergency->city ?? '' }}">
                    <option value="0" label="Please Choose " selected="selected"></option>
                </select>
            </div>
        </div>
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="emergency-state" class="form-label">State*</label>
                <select class="form-select" name="state" value="{{ $emergency->state ?? '' }}">>
                    <option value="0" label="Please Choose " selected="selected"></option>
                </select>
            </div>
            <div class="col-sm-6">
                <label for="emergency-country" class="form-label">Country</label>
                <select class="form-select" name="country" value="{{ $emergency->country ?? '' }}">>
                    <option value="0" label="Please Choose " selected="selected"></option>
                </select>
            </div>
        </div>
    </form>
    <p class="text-end mb-0 mt-3">
        <a href="javascript:;" class="btn btn-white me-5px">Previous</a>
        <a href="javascript:;" id="saveEmergency" class="btn btn-primary">Save</a>
    </p>
</div>
