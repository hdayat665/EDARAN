<div class="tab-pane fade active show" id="default-tab-1">
    <h3 class="mt-10px"></i> Employee Profile</h3>
    <br>
    <form id="profileForm" data-parsley-validate="true">
        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">Employee ID*</label>
            <div class="col-md-5">
                <input type="text" name="employee_id" id="empId" class="form-control mb-4px" placeholder="EMPLOYEE ID"/>

            </div>
            <label class="form-label col-form-label col-md-1">Username*</label>
            <div class="col-md-5">
                <input type="text" name="username" id="uId" class="form-control mb-5px" placeholder="USERNAME"  />

            </div>
        </div>

        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">First Name*</label>
            <div class="col-md-5">
                <input type="text" id="firstName" name="firstName" class="form-control mb-4px" placeholder="FIRST NAME" />

            </div>
            <label class="form-label col-form-label col-md-1">Last Name*</label>
            <div class="col-md-5">
                <input type="text" id="lastName" name="lastName" class="form-control mb-5px" placeholder="LAST NAME" />
            </div>
        </div>

        <div class="row mb-5px">
            <label class="form-label col-form-label col-md-1">Full Name*</label>
            <div class="col-md-5">
                <input type="text" name="fullName" id="fullName" class="form-control mb-4px" placeholder="FULL NAME" readonly/>
            </div>

            <div class="col-md-3">

            <div class="form-check form-switch align-right">
                <input class="form-check-input partCheck" id="nonNetizen" value="door3" type="checkbox" name="nonNetizen" />
             <label class="form-label" for="citizen">Non-Citizen</label>
               </div>
            </div>
            <label class="form-label col-form-label col-md-1">Identification Number*</label>

            <div class="col-md-2 idnumber">
                <input type="number" name="idNo" id="idnumber" class="form-control mb-1px" placeholder="000000000000" />
            </div>
        </div>
        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">Passport Number</label>
            <div class="col-md-2">
                <input type="text" name="passport" id="passport" class="form-control mb-4px" placeholder="PASSPORT NUMBER"/>
            </div>
            <label class="form-label col-form-label col-md-1">Expiry Date*</label>
            <div class="col-md-2">
                <input type="text" name="expiryDate" id="datepicker-expiryDate" class="form-control"  placeholder="YYYY/MM/DD" style="pointer-events: none" readonly/>
            </div>
            <label class="form-label col-form-label col-md-1">Issuing Country*</label>
            <div class="col-md-5">
                <select class="form-select" name="issuingCountry" id="issuingCountry2" style="pointer-events: none" readonly>
                    <?php
                    $americass = americas();
                    $asias = asias();
                    ?>
                    <optgroup id="country-optgroup-Americas" label="Americas">
                        @foreach ($americass as $key => $america)
                        <option value="{{$key}}" >{{$america}}</option>
                        @endforeach
                    </optgroup>
                    <optgroup id="country-optgroup-Asia" label="Asia">
                        <option value="MY" label="MALAYSIA" Selected></option>
                        @foreach ($asias as $key => $asia)
                        <option value="{{$key}}">{{$asia}}</option>
                        @endforeach
                    </optgroup>
                </select>
            </div>
        </div>

        <div class="row mb-15px">

            <label class="form-label col-form-label col-md-1">Date of Birth*</label>
            <div class="col-md-2">
                <input type="text" name="DOB" class="form-control" id="datepicker-birth" placeholder="YYYY/MM/DD" style="pointer-events: none" readonly />
            </div>
            <label class="form-label col-form-label col-md-1">Gender*</label>
            <div class="col-md-2">
                <select class="form-select" name="gender" id="gender" style="pointer-events: none" readonly>
                    <?php $gender = gender() ?>
                    <option value="" label="PLEASE CHOOSE" selected></option>
                    @foreach ($gender as $key => $status)
                    <option value="{{$key}}">{{$status}} </option>
                    @endforeach
                </select>

            </div>
            <label class="form-label col-form-label col-md-1">Marital Status*</label>
            <div class="col-md-5">
                <select class="form-select" name="maritialStatus">
                    <?php $MaritalStatus = getMaritalStatus() ?>
                    <option value="" label="PLEASE CHOOSE"></option>
                    @foreach ($MaritalStatus as $key => $status)
                    <option value="{{$key}}">{{$status}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">Religion*</label>
            <div class="col-md-5">
                <select class="form-select" name="religion" >
                    <?php $religion = religion() ?>
                    <option value="" label="PLEASE CHOOSE"></option>
                    @foreach ($religion as $key => $status)
                    <option value="{{$key}}">{{$status}}</option>
                    @endforeach
                </select>

            </div>
            <label class="form-label col-form-label col-md-1">Race</label>
            <div class="col-md-5">
                <select class="form-select" name="race">
                    <?php $race = race() ?>
                    <option value="" label="PLEASE CHOOSE"></option>
                    @foreach ($race as $key => $status)
                    <option value="{{$key}}">{{$status}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <br>
        <h3 class="mt-10px"></i> Contact Details</h3>
        <br>
        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">Home Number</label>
            <div class="col-md-5">
                <input type="text" name="homeNo" class="form-control mb-10px" placeholder="000000000" />

            </div>
            <label class="form-label col-form-label col-md-1">Extension Number</label>
            <div class="col-md-5">
                <input type="text" name="extensionNo" class="form-control mb-5px" placeholder="0000" />

            </div>
        </div>

        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">Phone Number*</label>
            <div class="col-md-5">
                <input type="text" name="phoneNo" id="phoneNo" class="form-control mb-4px" placeholder="00000000000" />

            </div>
            <label class="form-label col-form-label col-md-1">Personal Email</label>
            <div class="col-md-5">
                <input type="email" name="personalEmail" id="personalEmail" class="form-control mb-4px" placeholder="email@gmail.com"  />

            </div>
        </div>

        <p class="text-end mb-0">


            <button type="submit" id="submitProfile" class="btn btn-primary">Save</button>

        </p>
        </form>

</div>


