@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">Settings | Add Entitlement Group</h1>
        <form id="addForm">
            <div class="panel panel" id="entitleJs">
                <div class="panel-body">
                    <div class="row p-2">
                        <h3>Add Entitlement Group</h3>
                    </div>
                    <div class="form-control">
                        <div class="row p-2">
                            <div class="col mb-6">
                                <div class="row">
                                    <label for="entitlementgroupname" class="col-sm col-form-label">Entitlement Group
                                        Name*</label>
                                    <div class="col">
                                        <input type="text" class="form-control" name="group_name"
                                            id="entitlement_groupname" placeholder="Entitlement Group Name">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label for="jobgrade" class="col-sm col-form-label">Job Grade*</label>
                                    <div class="col">
                                        <select class="form-select" name="job_grade" id=""
                                            aria-label="Disabled select example" id="">
                                            <option value="">Please Select</option>
                                            <?php $jobGrades = getJobGrade(); ?>
                                            @foreach ($jobGrades as $jobGrade)
                                                <option value="{{ $jobGrade->id }}">{{ $jobGrade->jobGradeName }}</option>
                                            @endforeach

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
                                            <input class="form-check-input" value="F" type="radio"
                                                name="local_travel" id="flexRadioF" checked>
                                            <label class="form-check-label" for="flexRadioF">
                                                F- First Class
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" value="C" type="radio"
                                                name="local_travel" id="flexRadioC">
                                            <label class="form-check-label" for="flexRadioC">
                                                C- Business Class
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" value="Y" type="radio"
                                                name="local_travel" id="flexRadioY">
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
                                            <input class="form-check-input" value="F" type="radio"
                                                name="oversea_travel" id="flexRadioOF">
                                            <label class="form-check-label" for="flexRadioOF">
                                                F- First Class
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" value="C" type="radio"
                                                name="oversea_travel" id="flexRadioOC" checked>
                                            <label class="form-check-label" for="flexRadioOC">
                                                C- Business Class
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" value="Y" type="radio"
                                                name="oversea_travel" id="flexRadioOY">
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
                                        <select class="form-select" name="local_hotel_allowance" id="localhotela"
                                            aria-label="Disabled select example">
                                            <option selected value="0">None</option>
                                            <option value="1">Actual</option>
                                            <option value="2">Input Value</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3" id="localhoteli" style="display: none">
                                        <input type="text" class="form-control" id=""
                                            name="local_hotel_value" value="">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label for="lodgingallowance" class="col-sm-3 col-form-label">Lodging
                                        Allowance</label>
                                    <div class="col-sm-3">
                                        <select class="form-select" name="lodging_allowance" id="lodginghotela"
                                            aria-label="Disabled select example">
                                            <option selected value="0">None</option>
                                            <option value="1">Actual</option>
                                            <option value="2">Input Value</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3" id="lodginghoteli" style="display: none">
                                        <input type="text" class="form-control" id="local_hotela1"
                                            name="lodging_allowance_value" value="">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label for="carmileage" class="col-sm-3 col-form-label">Car Mileage Claim*
                                        <i class="fa fa-question-circle" style="color:rgba(0, 81, 255, 0.904)"
                                            data-toggle="tooltip1"
                                            title="Mileage claim  for own car only & with prior approval&#010; from supervisor.&#010; if leave blank KM field, it will assume as no limit.&#010; Click the &quot;+&quot; button to add the subsequent KM and rate.&#010;Click the &quot;-&quot; button to remove the subsequent KM and rate"></i></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="car_mileagecharge"
                                            name="car_price[]">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="car_mileagekm" name="car_km[]">
                                    </div>
                                    <div class="col">
                                        <h5 class="form-control" id="km1" aria-readonly="true">KM</h5>
                                    </div>
                                    <div class="col">
                                        <button id="plusbtn" type="button"><i class="fa fa-plus"></i>
                                        </button>
                                        <button id="minusbtn" type="button" style="display: none;"><i
                                                class="fa fa-minus"></i> </button>
                                    </div>
                                </div> <br>
                                <div class="row">
                                    <label for="carmileage1" class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-3">
                                        <input style="display: none;" type="text" class="form-control"
                                            id="mileagecharge1" name="car_price[]">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" style="display: none;" class="form-control"
                                            id="mileagekm1" name="car_km[]">
                                    </div>
                                    <div class="col">
                                        <h5 class="form-control" id="km2" style="display: none;"
                                            aria-readonly="true">KM</h5>
                                    </div>
                                    <div class="col">
                                        <button id="plusbtn1" type="button" style="display: none;"><i
                                                class="fa fa-plus"></i> </button>
                                        <button id="minusbtn1" type="button" style="display: none;"><i
                                                class="fa fa-minus"></i> </button>
                                    </div>
                                </div>
                                <div class="row"> <label for="staticEmail" class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-3">
                                        <input type="text" style="display: none;" name="car_price[]"
                                            class="form-control" id="mileagecharge2">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" style="display: none;" name="car_km[]"
                                            class="form-control" id="mileagekm2">
                                    </div>
                                    <div class="col">
                                        <h5 class="form-control" id="km3" style="display: none;"
                                            aria-readonly="true">KM</h5>
                                    </div>
                                    <div class="col">
                                        <button id="plusbtn2" type="button" style="display: none;"><i
                                                class="fa fa-plus"></i> </button>
                                        <button id="minusbtn2" type="button" style="display: none;"><i
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
                                        <input type="text" class="form-control" name="motor_price[]"
                                            id="mileagemcharge" value="0.40">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="motor_km[]" id="mileagemkm"
                                            value="700">
                                    </div>
                                    <div class="col">
                                        <h5 class="form-control" id="mkm1" aria-readonly="true">KM</h5>
                                    </div>
                                    <div class="col">
                                        <button id="plusmbtn" type="button"><i class="fa fa-plus"
                                                aria-hidden="true"></i> </button>
                                        <button id="minusmbtn" style="display: none;" type="button"><i
                                                class="fa fa-minus"></i> </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-3">
                                        <input type="text" name="motor_price[]" style="display: none;"
                                            class="form-control" id="mileagemcharge1">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" name="motor_km[]" style="display: none;"
                                            class="form-control" id="mileagemkm1">
                                    </div>
                                    <div class="col">
                                        <h5 class="form-control" id="mkm2" style="display: none;"
                                            aria-readonly="true">KM</h5>
                                    </div>
                                    <div class="col">
                                        <button id="plusmbtn1" type="button" style="display: none;"><i
                                                class="fa fa-plus"></i> </button>
                                        <button id="minusmbtn1" type="button" style="display: none;"><i
                                                class="fa fa-minus"></i> </button>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-3">
                                        <input type="text" name="motor_price[]" style="display: none;"
                                            class="form-control" id="mileagemcharge2">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" name="motor_km[]" style="display: none;"
                                            class="form-control" id="mileagemkm2">
                                    </div>
                                    <div class="col">
                                        <h5 class="form-control" id="mkm3" style="display: none;"
                                            aria-readonly="true">KM</h5>
                                    </div>
                                    <div class="col">
                                        <button id="plusmbtn2" type="button" style="display: none;"><i
                                                class="fa fa-plus"></i> </button>
                                        <button id="minusmbtn2" type="button" style="display: none;"><i
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
                                        <input type="text" name="breakfast" class="form-control" name=""
                                            id="">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" name="lunch" class="form-control" id=""
                                            name="">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" name="dinner" class="form-control" id=""
                                            name="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                @if ($subsistances)
                                    @foreach ($subsistances as $data)
                                        <tr>
                                            <td>
                                                <a href="javascript:;" id="viewSubsAddButton"
                                                    class="btn btn-outline-blue" data-id="{{ $data->id }}"><i
                                                        class="fa fa-edit"></i></a>
                                            </td>
                                            <td>{{ $data->area_name }}</td>
                                            <td>{{ $data->value }}</td>
                                        </tr>
                                    @endforeach
                                @endif
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
                                @if ($claimCategorys)
                                    @foreach ($claimCategorys as $item)
                                        <tr>
                                            <td>
                                                <a href="javascript:;" id="viewClaimAddButton"
                                                    class="btn btn-outline-blue" data-id="{{ $item->id }}"><i
                                                        class="fa fa-edit"></i></a>
                                            </td>
                                            <td>{{ $item->claim_catagory }}</td>
                                            <td>{{ $item->claim_value }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <div class="row p-2">
                <div class="modal-footer">
                    <div class="col align-self-start">
                        <a href="/setting/eclaimEntitleGroupView" class="btn btn-light" style="color: black"
                            type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <button class="btn btn-light" style="color: black" id="saveButton" type="submit"><i
                                class="fa fa-save"></i>
                            Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @include('modal.setting.eclaim.editSubsEntitleGroup')
    @include('modal.setting.eclaim.editClaimBenefitEntitleGroup')
@endsection
