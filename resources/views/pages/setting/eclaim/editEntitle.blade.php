@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <!-- BEGIN breadcrumb -->
        <!-- BEGIN breadcrumb -->
        <!-- END breadcrumb -->
        <!-- BEGIN page-header -->
        <h1 class="page-header">Settings | Update Entitlement Group</h1>
        <div class="panel panel">
            <div class="panel-body">
                <div class="row p-2">
                    <h3>Update Entitlement Group</h3>
                </div>
                <form>
                    <div class="form-control">
                        <div class="row p-2">
                            <div class="col mb-6">
                                <div class="row">
                                    <label for="entitlementgroupname" class="col-sm col-form-label">Entitlement Group
                                        Name*</label>
                                    <div class="col">
                                        <input type="text" class="form-control" name="entitlementgroupname"
                                            id="entitlement_groupname" placeholder="Entitlement Group Name">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label for="jobgrade" class="col-sm col-form-label">Job Grade*</label>
                                    <div class="col">
                                        <select class="form-select" name="" id=""
                                            aria-label="Disabled select example" id="">
                                            <option selected>Please Select</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <h6>Local Travelling*</h6>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Local" id="flexRadioF"
                                                checked>
                                            <label class="form-check-label" for="flexRadioF">
                                                F- First Class
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Local" id="flexRadioC">
                                            <label class="form-check-label" for="flexRadioC">
                                                C- Business Class
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Local" id="flexRadioY">
                                            <label class="form-check-label" for="flexRadioY">
                                                Y - First Class
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <h6>Overseas Travelling*</h6>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Overseas" id="flexRadioOF">
                                            <label class="form-check-label" for="flexRadioOF">
                                                F- First Class
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Overseas" id="flexRadioOC"
                                                checked>
                                            <label class="form-check-label" for="flexRadioOC">
                                                C- Business Class
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Overseas" id="flexRadioOY">
                                            <label class="form-check-label" for="flexRadioOY">
                                                Y - First Class
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-6">
                                <div class="row">
                                    <label for="localhotela" class="col-sm-3 col-form-label">Local Hotel
                                        Allowance</label>
                                    <div class="col-sm-3">
                                        <select class="form-select" name="localhotela" id="ulocalhotela"
                                            aria-label="Disabled select example">
                                            <option selected value="0">None</option>
                                            <option value="1">Actual</option>
                                            <option value="2">Input Value</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3" style="display: none" id="ulocalhoteli">
                                        <input type="text" class="form-control" id="" name=""
                                            value="">
                                    </div>
                                </div>
                                <br>
                                <div class="row"> <label for="lodgingallowance" class="col-sm-3 col-form-label">Lodging
                                        Allowance</label>
                                    <div class="col-sm-3">
                                        <select class="form-select" name="" id="ulodgingallowance"
                                            aria-label="Disabled select example">
                                            <option selected value="0">None</option>
                                            <option value="1">Actual</option>
                                            <option value="2">Input Value</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3" style="display: none" id="ulodginghoteli">
                                        <input type="text" class="form-control" id="" name=""
                                            value="">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label for="carmileage" class="col-sm-3 col-form-label">Car Mileage Claim*
                                        <i class="fa fa-question-circle" style="color:rgba(0, 81, 255, 0.904)"
                                            data-toggle="tooltip1"
                                            title="Mileage claim  for own car only & with prior approval&#010; from supervisor.&#010; if leave blank KM field, it will assume as no limit.&#010; Click the &quot;+&quot; button to add the subsequent KM and rate.&#010;Click the &quot;-&quot; button to remove the subsequent KM and rate"></i></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="carmileagecharge"
                                            id="car_mileagecharge" value="0.7">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="car_mileagekm"
                                            name="carmileagekm" value="700">
                                    </div>
                                    <div class="col">
                                        <h5 class="form-control" id="ukm1" aria-readonly="true">KM</h5>
                                    </div>
                                    <div class="col">
                                        <button id="uplusbtn" type="button"><i class="fa fa-plus"></i>
                                        </button>
                                        <button id="uminusbtn" type="button" style="display: none;"><i
                                                class="fa fa-minus"></i> </button>
                                    </div>
                                </div> <br>
                                <div class="row">
                                    <label for="carmileage1" class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-3">
                                        <input style="display: none;" type="text" class="form-control"
                                            id="umileagecharge1">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" style="display: none;" class="form-control"
                                            id="umileagekm1">
                                    </div>
                                    <div class="col">
                                        <h5 class="form-control" id="ukm2" style="display: none;"
                                            aria-readonly="true">KM</h5>
                                    </div>
                                    <div class="col">
                                        <button id="uplusbtn1" type="button" style="display: none;"><i
                                                class="fa fa-plus"></i> </button>
                                        <button id="uminusbtn1" type="button" style="display: none;"><i
                                                class="fa fa-minus"></i> </button>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    {{-- <label for="inputEmail3" class="col-sm col-form-label">Car Mileage Claim*</label> --}}
                                    <label for="staticEmail" class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-3">
                                        <input type="text" style="display: none;" class="form-control"
                                            id="umileagecharge2">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" style="display: none;" class="form-control"
                                            id="umileagekm2">
                                    </div>
                                    <div class="col">
                                        <h5 class="form-control" id="ukm3" style="display: none;"
                                            aria-readonly="true">KM</h5>
                                    </div>
                                    <div class="col">
                                        <button id="uplusbtn2" type="button" style="display: none;"><i
                                                class="fa fa-plus"></i> </button>
                                        <button id="uminusbtn2" type="button" style="display: none;"><i
                                                class="fa fa-minus"></i> </button>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Motorcycle
                                        Mileage <i class="fa fa-question-circle" style="color:rgba(0, 81, 255, 0.904)"
                                            data-toggle="tooltip2"
                                            title="Mileage claim  for own motorcycle only & with prior approval&#010; from supervisor.&#010; if leave blank KM field, it will assume as no limit.&#010; Click the &quot;+&quot; button to add the subsequent KM and rate.&#010;Click the &quot;-&quot; button to remove the subsequent KM and rate"></i>
                                        claim* </label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="umileagemcharge" value="0.40">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="umileagemkm" value="700">
                                    </div>
                                    <div class="col">
                                        <h5 class="form-control" id="umkm1" aria-readonly="true">KM</h5>
                                    </div>
                                    <div class="col">
                                        <button id="uplusmbtn" type="button"><i class="fa fa-plus"
                                                aria-hidden="true"></i> </button>
                                        <button id="uminusmbtn" style="display: none;" type="button"><i
                                                class="fa fa-minus"></i> </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-3">
                                        <input type="text" style="display: none;" class="form-control"
                                            id="umileagemcharge1">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" style="display: none;" class="form-control"
                                            id="umileagemkm1">
                                    </div>
                                    <div class="col">
                                        <h5 class="form-control" id="umkm2" style="display: none;"
                                            aria-readonly="true">KM</h5>
                                    </div>
                                    <div class="col">
                                        <button id="uplusmbtn1" type="button" style="display: none;"><i
                                                class="fa fa-plus"></i> </button>
                                        <button id="uminusmbtn1" type="button" style="display: none;"><i
                                                class="fa fa-minus"></i> </button>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-3">
                                        <input type="text" style="display: none;" class="form-control"
                                            id="umileagemcharge2">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" style="display: none;" class="form-control"
                                            id="umileagemkm2">
                                    </div>
                                    <div class="col">
                                        <h5 class="form-control" id="umkm3" style="display: none;"
                                            aria-readonly="true">KM</h5>
                                    </div>
                                    <div class="col">
                                        <button id="uplusmbtn2" type="button" style="display: none;"><i
                                                class="fa fa-plus"></i> </button>
                                        <button id="uminusmbtn2" type="button" style="display: none;"><i
                                                class="fa fa-minus"></i> </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="carmileage" class="col-sm-3 col-form-label">Food
                                            Allowance</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="carmileage" class="col-sm-3 col-form-label">Breakfast
                                        </label>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="carmileage" class="col-sm-3 col-form-label">Lunch </label>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="carmileage" class="col-sm-3 col-form-label">Dinner
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"> </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="" id="">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="" name="">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="" name="">
                                    </div>
                                </div>
                            </div>
                </form>
            </div>
            </form>
        </div>
        <br>
        <div class="row">
            <div class="col mb-6">
                <div class="form-control">
                    <h5>Subsistence Allowance</h5>
                    <table id="tablesavesubsistence" class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                <th data-orderable="false">Action</th>
                                <th class="text-nowrap">Area</th>
                                <th class="text-nowrap">Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="javascript:;" data-toggle="modal" data-bs-toggle="modal"
                                        data-bs-target="#updatesubsistence" class="btn btn-outline-blue"><i
                                            class="fa fa-edit"></i></a>
                                </td>
                                <td>MALAYSIA</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="javascript:;" data-toggle="modal" data-bs-toggle="modal"
                                        data-bs-target="#updatesubsistence" class="btn btn-outline-blue"><i
                                            class="fa fa-edit"></i></a>
                                </td>
                                <td>MIDDLE EAST</td>
                                <td>unlimited</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="javascript:;" data-toggle="modal" data-bs-toggle="modal"
                                        data-bs-target="#updatesubsistence" class="btn btn-outline-blue"><i
                                            class="fa fa-edit"></i></a>
                                </td>
                                <td>SINGAPORE/BRUNEI</td>
                                <td>80</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col mb-6">
                <div class="form-control">
                    <h5>Claim Benefits</h5>
                    <table id="tableSaveArea" class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                <th data-orderable="false">Action</th>
                                <th class="text-nowrap">Area</th>
                                <th class="text-nowrap">Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="javascript:;" data-toggle="modal" data-bs-toggle="modal"
                                        data-bs-target="#updateclaimbenefit" class="btn btn-outline-blue"><i
                                            class="fa fa-edit"></i></a>
                                </td>
                                <td>ENTERTAINMENT</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="javascript:;" data-toggle="modal" data-bs-toggle="modal"
                                        data-bs-target="#updateclaimbenefit" class="btn btn-outline-blue"><i
                                            class="fa fa-edit"></i></a>
                                </td>
                                <td>PHONE BILL</td>
                                <td>unlimited</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="javascript:;" data-toggle="modal" data-bs-toggle="modal"
                                        data-bs-target="#updateclaimbenefit" class="btn btn-outline-blue"><i
                                            class="fa fa-edit"></i></a>
                                </td>
                                <td>OTHERS</td>
                                <td>80</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>
        <div class="row p-2">
            <div class="modal-footer">
                <div class="col align-self-start">
                    <a href="/setting/entitlement" class="btn btn-light" style="color: black" type="submit"><i
                            class="fa fa-arrow-left"></i> Back</a>
                </div>
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-light" style="color: black" type="submit"><i class="fa fa-save"></i>
                        Update</button>
                </div>
            </div>
        </div>
    </div> <!-- Modal subsistence -->
    <div class="modal fade" id="updatesubsistence" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Subsistence Allowance</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row mb-3">
                            <label for="subsistence allowance" class="col-sm-2 col-form-label">Subsistence
                                Allowance</label><br>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="unlimited subsistence" class="col-sm-2 col-form-label">Value</label><br>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="valuesubsistence1" placeholder="value">
                                <input type="checkbox" class="unlimited" value="unlimited"> unlimited
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="savesubsistence" class="btn btn-primary">Update
                        Changes</button>
                </div>
            </div>
        </div>
    </div>
    {{-- modal claim --}}
    <div class="modal fade" id="updateclaimbenefit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Claims Benefit</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Area</label><br>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Value</label><br>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="valueclaim1" placeholder="value">
                                <input type="checkbox" class="unlimited1" value="unlimited">unlimited
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="savesubsistence" class="btn btn-primary">Update
                        Changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
