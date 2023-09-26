@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">eClaim <small>| My Claim | Apply General Claim</small></h1>
        <div class="panel panel" id="generalClaimJs"> 
            <!-- <form id="addForm"> -->
                <div class="panel-body">
                    <div class="row p-2">
                        <div class="col-md-6">
                            <form id="createForm">
                            <div class="form-control">
                                <div class="row p-2">
                                    <!-- <div class="col-md-3">
                                        <label class="form-label">Claim ID</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input readonly type="text" class="form-control">
                                    </div> -->
                                    <div class="col-md-3">
                                        <label class="form-label">Claim Type</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input readonly type="text" name="claim_type" value="GNC" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Status</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input readonly type="text" value="Draft"class="form-control">
                                    </div>
                                </div>
                                <!-- <div class="row p-2">
                                    <div class="col-md-3">
                                        <label class="form-label">Status</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input readonly type="text" value="Draft"class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Total Amount</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input readonly type="text" class="form-control">
                                    </div>
                                </div> -->
                                <div class="row p-2">
                                    <br>
                                </div>
                                <div class="form-control">
                                    <div class="row p-2">
                                        <div class="col-md-3">
                                            <label class="form-label">Year</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select class="form-select" id="year" name="year">
                                                <option class="form-label" value="" selected>PLEASE CHOOSE</option>
                                                <option class="form-label" value="2022">2022</option>
                                                <option class="form-label" value="2023">2023</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-3">
                                            <label class="form-label">Month</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select class="form-select" id="month" name="month">
                                                <option class="form-label" value="" selected>PLEASE CHOOSE</option>
                                                <option class="form-label" value="January">January</option>
                                                <option class="form-label" value="February">February</option>
                                                <option class="form-label" value="March">March</option>
                                                <option class="form-label" value="April">April</option>
                                                <option class="form-label" value="May">May</option>
                                                <option class="form-label" value="Jun">Jun</option>
                                                <option class="form-label" value="July">July</option>
                                                <option class="form-label" value="August">August</option>
                                                <option class="form-label" value="September">September</option>
                                                <option class="form-label" value="October">October</option>
                                                <option class="form-label" value="November">November</option>
                                                <option class="form-label" value="December">December</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-3">
                                            <label class="form-label">Applied Date</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="input-group" id="">
                                                <input readonly type="text" style="pointer-events: none;" name="applied_date" class="form-control" value="" id="applieddate" />
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-3">
                                            <label class="form-label">Claim Category</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select class="form-select" id="claimcategory" name="claim_category">
                                                <option class="form-label" value="" selected>PLEASE CHOOSE</option>
                                                {{ $categorys = getClaimCategory() }}
                                                @foreach ($categorys as $category)
                                                    <option value="{{ $category->id }}">{{ $category->claim_catagory }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- akan tarik data dari  labelling name dlam setting add claim --}}
                                    <div class="row p-2" id="labelcategory" style="display: none"> 
                                        <div class="col-md-3">
                                            <label class="form-label" id="label"></label>
                                        </div>
                                        <div class="col-md-9">
                                            <select class="form-select" id="contentLabel" name="claim_category_detail">
                                                <option class="form-label" value="Please Select" selected>PLEASE CHOOSE</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-3">
                                            <label class="form-label">Amount</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="number" class="form-control" name="amount" id="amount" placeholder="0.00">
                                        </div>
                                    </div>

                                    <div class="row p-2">
                                        <div class="col-md-3">
                                            <label class="form-label">Description</label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea class="form-control" rows="3" id="description" name="desc"></textarea>
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-3">
                                            <label class="form-label">Supporting Document</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="file" class="form-control-file" name="file_upload[]" id="supportdocument" multiple>
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="modal-footer"> 
                                        <button type="button" id='resetBtn' class="btn btn-secondary">Reset</button>
                                        <button type="submit" id="createGnc" class="btn btn-primary">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-md-6">
                            <div class="form-control">
                                <table id="applyclaimtable" class="table table-striped table-bordered align-middle" style="overflow-x: auto; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th class="text-nowrap">Applied Date</th>
                                            <th class="text-nowrap">Claim Category</th>
                                            <th class="text-nowrap">Amount</th>
                                            <th class="text-nowrap">Description</th>
                                            <th class="text-nowrap">Attachment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="display: none"></td>
                                            <td style="display: none"></td>
                                            <td style="display: none"></td>
                                            <td style="display: none"></td>
                                            <td style="display: none"></td>
                                            <td style="display: none"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col align-self-start">
                        <a href="/myClaimView" class="btn btn-light" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                    <!-- <div class="col d-flex justify-content-end">
                        <button class="btn btn-light" id="saveButton" style="color: black" type="submit"><i class="fa fa-save"></i> Save Draft</button>
                        <button class="btn btn-light" id="submitButton" style="color: black" type="submit"><i class="fa fa-save"></i> Submit</button>
                    </div> -->
                </div>
            <!-- </form> -->
        </div>
    </div>
    
    <!-- <script>
        function addTableRow() {
            // var year = document.getElementById("year");
            // var month = document.getElementById("month");
            var label = document.getElementById("label");
            var contentlabel = document.getElementById("contentLabel");
            var applieddate = document.getElementById("applieddate");
            var claimcategory = document.getElementById("claimcategory");
            var amount = document.getElementById("amount");
            var description = document.getElementById("description");
            var supportdocument = document.getElementById("supportdocument");
            var table = document.getElementById("applyclaimtable");
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
            var count = 1;

            if (claimcategory.value) {
                function getClaimCategoryById(id) {
                    return $.ajax({
                        url: "/getClaimCategoryById/" + claimcategory.value,
                    });
                }

                var user = getClaimCategoryById(id);

                user.done(function(data) {
                    // console.log(data.claim_catagory);
                    row.insertCell(0).innerHTML = "<a class='btn btn-primary btn-sm' onclick='deleteRow(this);' id='btnDelete'>Delete</a>";
                    row.insertCell(1).innerHTML = "<input type='text' name='applied_date[]' readonly class='form-control' value='" + applieddate.value + "' >";
                    row.insertCell(2).innerHTML = "<input type='text' name='claim_category' readonly class='form-control' value='" + data.claim_catagory + " ' >";
                    row.insertCell(3).innerHTML = "<input type='text' name='amount[]' readonly class='form-control' value='" + amount.value + "' >";
                    row.insertCell(4).innerHTML = "<input type='text' name='desc[]' readonly class='form-control' value='" + description.value + "' >";
                    row.insertCell(5).innerHTML = "<input type='file' name='file_upload[]' class='form-control' >" +
                        // "<input type='hidden' name='year[]' class='form-control' value='" + year.value + "' >" +
                        // "<input type='hidden' name='month[]' class='form-control' value='" + month.value + "' >" +
                        "<input type='hidden' name='label[]' class='form-control' value='" + label.value + "' >" +
                        "<input type='hidden' name='claim_category_detail[]' class='form-control' value='" + contentlabel.value + "' >";

                })
            }


        }

        function deleteRow(row) {
            var i = row.parentNode.parentNode.rowIndex;
            document.getElementById('applyclaimtable').deleteRow(i);
        }
    </script> -->
@endsection
