@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <form id="editForm">
            <h1 class="page-header">Settings | Update Entitlement Group</h1>
            <div class="panel panel" id="entitleJs">
                <div class="panel-body">
                    <div class="row p-2">
                        <h3>Update Entitlement Group</h3>
                    </div>
                    <div class="form-control">
                        <div class="row p-2">
                            <div class="col mb-6">
                                <div class="row">
                                    <label for="entitlementgroupname" class="col-sm col-form-label">Entitlement Group
                                        Name*</label>
                                    <div class="col">
                                        <input type="text" class="form-control" name="group_name"
                                            value="{{ $entitys['group_name'] }}" id="entitlement_groupname"
                                            placeholder="Entitlement Group Name">
                                        <input type="hidden" id="idEG" value="{{ $entitys['id'] }}">
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
                                                <option {{ $entitys['job_grade'] == $jobGrade->id ? 'selected' : '' }}
                                                    value="{{ $jobGrade->id }}">{{ $jobGrade->jobGradeName }}</option>
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
                                            <input class="form-check-input"
                                                {{ $entitys['local_travel'] == 'F' ? 'checked' : '' }} type="radio"
                                                name="local_travel" id="flexRadioF" value="F" checked>
                                            <label class="form-check-label" for="flexRadioF">
                                                F- First Class
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"
                                                {{ $entitys['local_travel'] == 'C' ? 'checked' : '' }} value="C"
                                                name="local_travel" id="flexRadioC">
                                            <label class="form-check-label" for="flexRadioC">
                                                C- Business Class
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input"
                                                type="radio"{{ $entitys['local_travel'] == 'Y' ? 'checked' : '' }}
                                                value="Y" name="local_travel" id="flexRadioY">
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
                                            <input class="form-check-input" type="radio" value="F"
                                                {{ $entitys['oversea_travel'] == 'F' ? 'checked' : '' }}
                                                name="oversea_travel" id="flexRadioOF">
                                            <label class="form-check-label" for="flexRadioOF">
                                                F- First Class
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="C"
                                                {{ $entitys['oversea_travel'] == 'C' ? 'checked' : '' }}
                                                name="oversea_travel" id="flexRadioOC" checked>
                                            <label class="form-check-label" for="flexRadioOC">
                                                C- Business Class
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="Y"
                                                {{ $entitys['oversea_travel'] == 'Y' ? 'checked' : '' }}
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
                                        <select class="form-select" name="local_hotel_allowance" id="ulocalhotela"
                                            aria-label="Disabled select example">
                                            <option value="0">None</option>
                                            <option {{ $entitys['local_hotel_allowance'] == '1' ? 'selected' : '' }}
                                                value="1">Actual</option>
                                            <option {{ $entitys['local_hotel_allowance'] == '2' ? 'selected' : '' }}
                                                value="2">Input Value</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3"
                                        {{ $entitys['local_hotel_allowance'] == 1 ? 'style=display:none' : '' }}
                                        id="ulocalhoteli">
                                        <input type="text" value="{{ $entitys['local_hotel_value'] }}"
                                            class="form-control" id="ulocalhotelval" name="local_hotel_value"
                                            value="{{ $entitys['local_hotel_value'] }}">
                                    </div>
                                </div>
                                <br>
                                <div class="row"> <label for="lodgingallowance"
                                        class="col-sm-3 col-form-label">Lodging
                                        Allowance</label>
                                    <div class="col-sm-3">
                                        <select class="form-select" name="lodging_allowance" id="ulodginghotela"
                                            aria-label="Disabled select example">
                                            <option value="0">None</option>
                                            <option {{ $entitys['lodging_allowance'] == '1' ? 'selected' : '' }}
                                                value="1">Actual</option>
                                            <option {{ $entitys['lodging_allowance'] == '2' ? 'selected' : '' }}
                                                value="2">Input Value</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3"
                                        {{ $entitys['lodging_allowance'] == 1 ? 'style=display:none' : '' }}
                                        id="ulodginghoteli">
                                        <input type="text" class="form-control" id="lodging_allowance_val"
                                            value="{{ $entitys['lodging_allowance_value'] }}"
                                            name="lodging_allowance_value" value="">
                                    </div>
                                </div>
                                <br>
                                @if ($transports)
                                    <div class="row">
                                        @foreach ($transports as $item)
                                            @if ($item['type'] == 'car')
                                                <label for="carmileage" class="col-sm-3 col-form-label">Car Mileage
                                                    Claim*
                                                    <i class="fa fa-question-circle" style="color:rgba(0, 81, 255, 0.904)"
                                                        data-toggle="tooltip1"
                                                        title="{{ config('app.entitle-group.car') }}">
                                                    </i></label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="car_mileagecharge"
                                                        name="car_price[]" value="{{ $item['price'] }}">
                                                    <input type="hidden" name="car_id[]" value="{{ $item['id'] }}">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="car_mileagekm"
                                                        name="car_km[]" value="{{ $item['km'] }}">
                                                </div>
                                                <div class="col">
                                                    <h5 class="form-control" id="km1" aria-readonly="true">KM
                                                    </h5>
                                                </div>
                                                {{-- <div class="col">
                                                    <button id="plusbtn" type="button"><i class="fa fa-plus"></i>
                                                    </button>
                                                    <button id="minusbtn" type="button" style="display: none;"><i
                                                            class="fa fa-minus"></i> </button>
                                                </div> --}}
                                                <br>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="row">
                                        @foreach ($transports as $item)
                                            @if ($item['type'] == 'motor')
                                                <label for="staticEmail" class="col-sm-3 col-form-label">Motorcycle
                                                    Mileage <i class="fa fa-question-circle"
                                                        style="color:rgba(0, 81, 255, 0.904)" data-toggle="tooltip2"
                                                        title="{{ config('app.entitle-group.motor') }}"></i>
                                                    claim* </label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" name="motor_price[]"
                                                        id="mileagemcharge" value="{{ $item['price'] }}">
                                                    <input type="hidden" name="motor_id[]" value="{{ $item['id'] }}">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" name="motor_km[]"
                                                        id="mileagemkm" value="{{ $item['km'] }}">
                                                </div>
                                                <div class="col">
                                                    <h5 class="form-control" id="mkm1" aria-readonly="true">KM
                                                    </h5>
                                                </div>
                                                {{-- <div class="col">
                                            <button id="plusmbtn" type="button"><i class="fa fa-plus"
                                                    aria-hidden="true"></i> </button>
                                            <button id="minusmbtn" style="display: none;" type="button"><i
                                                    class="fa fa-minus"></i> </button>
                                        </div> --}}
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                                {{-- <div class="row">
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
                                <br> --}}

                                {{-- <div class="row">
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
                                </div> --}}
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
                                        <input type="text" class="form-control" id=""
                                            value="{{ $entitys['breakfast'] }}" name="breakfast">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="" name="dinner"
                                            value="{{ $entitys['dinner'] }}">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="lunch" id=""
                                            value="{{ $entitys['lunch'] }}">
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
                                <button class="btn btn-light" style="color: black" type="submit" id="editButton"><i
                                        class="fa fa-save"></i>
                                    Update</button>
                            </div>
                        </div>
                    </div>
        </form>
    </div>

    @include('modal.setting.eclaim.editSubsEntitleGroup')
    @include('modal.setting.eclaim.editClaimBenefitEntitleGroup')

@endsection
