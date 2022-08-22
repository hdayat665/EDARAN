<div class="tab-pane fade" id="default-tab-2">
    <h3 class="mt-10px"></i> Permanent Address</h3>
    <br>
    <form id="addressForm">
        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">Adress 1*</label>
            <div class="col-md-5">
                <input type="text" name="address1" class="form-control mb-10px" placeholder="Address 1" required/>
                <input type="hidden" name="user_id" id="user_id" class="form-control mb-10px"" />

            </div><label class="form-label col-form-label col-md-1">Adress 2</label>
            <div class="col-md-5">
                <input type="text" name="address2" class="form-control mb-5px" placeholder="Adress" />

            </div>
        </div>

        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">Postcode*</label>
            <div class="col-md-5">
                <input type="text" name="postcode" class="form-control mb-10px" placeholder="Postcode" required />

            </div><label class="form-label col-form-label col-md-1">City*</label>
            <div class="col-md-5">
                <input type="text" name="city" class="form-control mb-5px" placeholder="City" required/>

            </div>
        </div>

        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">State*</label>
            <div class="col-md-5">
                <select class="form-select" name="state" required>
                    <option label="Select State " selected="selected"></option>
                    <option value="Johor" label="Johor">Johor</option>
                    <option value="Kedah" label="Kedah">Kedah</option>
                    <option value="Kelantan" label="Kelantan">Kelantan</option>
                    <option value="Negeri Sembilan" label="Negeri Sembilan">Negeri Sembilan</option>
                    <option value="Pahang" label="Pahang">Pahang</option>
                    <option value="Penang" label="Penang">Penang</option>
                    <option value="Perak" label="Perak">Perak</option>
                    <option value="Perlis" label="Perlis">Perlis</option>
                    <option value="Sabah" label="Sabah">Sabah</option>
                    <option value="Sarawak" label="Sarawak">Sarawak</option>
                    <option value="Selangor" label="Selangor">Selangor</option>
                    <option value="Terengganu" label="Terengganu">Terengganu</option>
                    <option value="Kuala Lumpur" label="Kuala Lumpur">Kuala Lumpur</option>
                    <option value="Labuan" label="Labuan">Labuan</option>
                    <option value="Putrajaya" label="Putrajaya">Putrajaya</option>
                </select>
            </div>
            <label class="form-label col-form-label col-md-1">Country*</label>
            <div class="col-md-5">
                <select class="form-select" name="country" required>
                    <option value="Malaysia" label="Malaysia" selected="selected">Malaysia </option>
                </select>
            </div>
        </div>
        <br>
        <h3 class="mt-10px"></i> Correspondence Address</h3><br>
        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">Adress 1*</label>
            <div class="col-md-5">
                <input type="text" name="address1c" class="form-control mb-10px" placeholder="Adress 1" />

            </div><label class="form-label col-form-label col-md-1">Adress 2</label>
            <div class="col-md-5">
                <input type="text" name="address2c" class="form-control mb-5px" placeholder="Adress" />

            </div>
        </div>

        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">Postcode*</label>
            <div class="col-md-5">
                <input type="text" name="postcodec" class="form-control mb-10px" placeholder="Postcode" required/>

            </div><label class="form-label col-form-label col-md-1">City*</label>
            <div class="col-md-5">
                <input type="text" name="cityc" class="form-control mb-5px" placeholder="City" required/>

            </div>
        </div>
        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">State*</label>
            <div class="col-md-5">
                <select class="form-select" name="statec" required>
                    <option label="Select State " selected="selected"></option>
                    <option value="Johor" label="Johor">Johor</option>
                    <option value="Kedah" label="Kedah">Kedah</option>
                    <option value="Kelantan" label="Kelantan">Kelantan</option>
                    <option value="Negeri Sembilan" label="Negeri Sembilan">Negeri Sembilan</option>
                    <option value="Pahang" label="Pahang">Pahang</option>
                    <option value="Penang" label="Penang">Penang</option>
                    <option value="Perak" label="Perak">Perak</option>
                    <option value="Perlis" label="Perlis">Perlis</option>
                    <option value="Sabah" label="Sabah">Sabah</option>
                    <option value="Sarawak" label="Sarawak">Sarawak</option>
                    <option value="Selangor" label="Selangor">Selangor</option>
                    <option value="Terengganu" label="Terengganu">Terengganu</option>
                    <option value="Kuala Lumpur" label="Kuala Lumpur">Kuala Lumpur</option>
                    <option value="Labuan" label="Labuan">Labuan</option>
                    <option value="Putrajaya" label="Putrajaya">Putrajaya</option>
                </select>
            </div>
            <label class="form-label col-form-label col-md-1">Country*</label>
            <div class="col-md-5">
                <select class="form-select" name="country">
                    <option value="Malaysia" label="Malaysia" selected="selected">Malaysia </option>
                </select>
            </div>
        </div>
        <p class="text-end mb-0">
            <a href="javascript:;" class="btn btn-white me-5px">Previous</a>
            <a href="javascript:;" class="btn btn-primary">Next</a>
            <button type="submit" id="submitAddress" class="btn btn-success">Save</button>
        </p>
    </form>

</div>
