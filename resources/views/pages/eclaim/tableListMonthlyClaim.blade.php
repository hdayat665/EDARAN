<div class="form-control">
    <div class="row p-2">
        <div class="col-md-6">
            <h4>Travelling Table List</h4>
        </div>
        <div class="col-md-6">
            <div class="row p-2">
                <div class="col-md-6">
                    <div class="col d-flex justify-content-end">
                        <label class="form-label">Total</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col d-flex justify-content-end">
                        <input type="text" class="form-control" readonly value='RM {{ $summaryTravelling[0]->total_travelling ?? 0 }}'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">

        <div class="">
            <table id="" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th class="text-nowrap">Travel Date</th>
                        <th class="text-nowrap">Mileage</th>
                        <th class="text-nowrap">Petrol/Fares</th>
                        <th class="text-nowrap">Tolls</th>
                        <th class="text-nowrap">Parking</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($travelClaims)
                        @foreach ($travelClaims as $travel)
                        <tr>    
                            <td>
                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                                <div class="dropdown-menu">
                                <a href="javascript:;" id="travelBtn" data-date="{{ $travel->travel_date }}" data-id="{{ $travel->general_id }}" class="dropdown-item"> Update</a>
                            </td>
                            <td>{{ $travel->travel_date ?? '' }}</td>
                            <td>{{ $travel->total_km ?? '0' }} KM</td>
                            <td>RM {{ $travel->total_petrol ?? '0' }}</td>
                            <td>RM {{ $travel->total_toll ?? '0' }}</td>
                            <td>RM {{ $travel->total_parking ?? '0' }}</td>
                        </tr> 
                        @endforeach
                    @endif
                </tbody>
                
            </table>
        </div> 
    </div>
    <div class="row p-2">
        <div class="col-md-6">
            <div class="form-control">
                <div class="col-md-12">
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Travelling</label>
                        </div>
                        <div class="col-md-6">
                            <input type="hidden" class="form-control" id="totalCar" readonly value='{{ $ansCar ?? 0 }} '>
                            <input type="hidden" class="form-control" id="totalMotor" readonly value='{{ $ansMotor?? 0 }} '>
                            <input type="text" class="form-control" readonly value='{{ number_format($summaryTravelling[0]->total_km ?? 0, 2) }} KM'>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-4">
                            
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="TotalMileageCarMotor" readonly value=''>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-6">
                
            </div>
            <div class="col-md-6">
                <input type="file" class="form-control-file" name="" id="" multiple>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-md-6">
            <div class="form-control">
                <div class="col-md-12">
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Petrol/Fare</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" readonly value='RM {{ $summaryTravelling[0]->total_petrol ?? 0 }}'>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-md-6">
            <div class="form-control">
                <div class="col-md-12">
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Toll</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" readonly value='RM {{ $summaryTravelling[0]->total_toll ?? 0  }}'>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-md-6">
            <div class="form-control">
                <div class="col-md-12">
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Parking</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" readonly value='RM {{ $summaryTravelling[0]->total_parking ?? 0 }}'>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row p-2">

</div>
<div class="form-control">
    <div class="row p-2">
        <div class="col-md-6">
            <h4>Subsistence Allowance & Accommodation Table List</h4>
        </div>
        <div class="col-md-6">
            <div class="row p-2">
                <div class="col-md-6">
                    <div class="col d-flex justify-content-end">
                        <label class="form-label">Total</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col d-flex justify-content-end">
                        <input type="text" class="form-control" readonly value='RM {{ $summarySubs[0]->total_all ?? 0 }}'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="">
            <table id="" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th class="text-nowrap">Start Date</th>
                        <th class="text-nowrap">End Date</th>
                        <th class="text-nowrap">Subsistence Allowance</th>
                        <th class="text-nowrap">Accommodation</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($subsClaims)
                        @foreach ($subsClaims as $subs)
                        <tr>    
                            <td>
                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                                <div class="dropdown-menu">
                                <a href="javascript:;" id="subsBtn" data-id="{{ $subs->id }}" class="dropdown-item"> Update</a>
                                <div class="dropdown-divider"></div>
                                <a data-bs-toggle="modal" id="deleteButtonTravel" data-id="{{ $subs->id }}" class="dropdown-item">Delete</a>
                            </td>
                            <td>{{ date('Y-m-d', strtotime($subs->start_date)) ?? '' }}</td>
                            <td>{{ date('Y-m-d', strtotime($subs->end_date)) ?? '' }}</td>
                            <td>{{ $subs->total_subs ?? '0' }}</td>
                            <td>{{ $subs->total_acc ?? '0' }}</td>
                        </tr> 
                        @endforeach
                    @endif
                </tbody>
                
            </table>
        </div> 
    </div>
    <div class="row p-2">
        <div class="col-md-6">
            <div class="form-control">
                <div class="col-md-12">
                    <div class="row p-2">
                        <div class="col-md-5">
                            <label class="form-label">Less Cash Advance </label>
                        </div>
                        <div class="col-md-6">
                            <input type="number" class="form-control" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-6">
                
            </div>
            <div class="col-md-6">
                <input type="file" class="form-control-file" name="" id="" multiple>
            </div>
        </div>
    </div>
</div>
<div class="row p-2">
</div>
<div class="form-control">
    <div class="row p-2">
        <div class="col-md-6">
            <h4>Others Table List</h4>
        </div>
        <div class="col-md-6">
            <div class="row p-2">
                <div class="col-md-6">
                    <div class="col d-flex justify-content-end">
                        <label class="form-label">Total</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col d-flex justify-content-end">
                        <input type="text" class="form-control" readonly value='RM {{ $summaryOthers[0]->total_amount ?? 0}}'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="">
            <table id="" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th class="text-nowrap">Claim Category</th>
                        <th class="text-nowrap">Project Code</th>
                        <th class="text-nowrap">Project Name</th>
                        <th class="text-nowrap">Description</th>
                        <th class="text-nowrap">Amount</th>
                        <th class="text-nowrap">Attachment</th>
                    </tr>
                </thead>
                <tbody>
                @if ($personalClaims)
                        @foreach ($personalClaims as $personal)
                        <tr>    
                            <td>
                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                                <div class="dropdown-menu">
                                <a href="javascript:;" id="othersBtn" data-id="{{ $personal->id }}" class="dropdown-item"> Edit</a>
                                <div class="dropdown-divider"></div>
                                <a id="deleteButtonPersonal" data-id="{{ $personal->id }}" class="dropdown-item"> Delete</a>
                            </td>
                            <td>{{ getClaimCategoryById($personal->claim_category)->claim_catagory ?? '-' }}</td>
                            <td>-</td>
                            <td>-</td>
                            <td>{{ $personal->claim_desc ?? '-' }}</td>
                            <td>RM {{ $personal->amount ?? '-' }}</td>
                            <td>
                                @if(!empty($personal->file_upload))
                                @php
                                $filenames = explode(',', $personal->file_upload);
                                @endphp
                                @foreach($filenames as $filename)
                                <a href="/storage/PersonalFile/{{ $filename }}" target="_blank">{{ $filename }}</a><br>
                                @endforeach
                                    @endif
                            </td>
                        </tr> 
                    @endforeach
                @endif
                </tbody>
            </table>
        </div> 
    </div>
    
</div>

@include('modal.eclaim.viewTravelling')
<!-- OLD TABLE -->
<!-- 
<div class="form-control">
    
    <div class="row p-2">
        <h4>Others Claim Table List:</h4>
    </div>
    <div class="row">
        <div class="">
            <table id="claimtable1" class="table table-striped table-bordered align-middle">
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
                    @if ($personalClaims)
                        @foreach ($personalClaims as $personal)
                            <tr>    
                                <td><a data-bs-toggle="modal" id="deleteButtonPersonal" data-id="{{ $personal->id }}" class="btn btn-primary btn-sm">Delete</a></td>
                                <td>{{ $personal->applied_date ? date('Y-m-d', strtotime($personal->applied_date)) : '-' }}</td>
                                <td>{{ getClaimCategoryById($personal->claim_category)->claim_catagory ?? '-' }}</td>
                                <td>{{ $personal->amount ?? '-' }}</td>
                                <td>{{ $personal->claim_desc ?? '-' }}</td>
                                <td>
                                    @if(!empty($personal->file_upload))
                                    @php
                                    $filenames = explode(',', $personal->file_upload);
                                    @endphp
                                    @foreach($filenames as $filename)
                                    <a href="/storage/PersonalFile/{{ $filename }}" target="_blank">{{ $filename }}</a><br>
                                    @endforeach
                                        @endif
                                </td>
                            </tr> 
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div> 
    </div>
    <br>
    <div class="row p-2">
        <h4>Travelling, Subsistence & Accommodation Table List:</h4>
    </div>
    <div class="row">
        <div class="">
            <table id="traveltable" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th class="text-nowrap">Travel Date</th>
                        <th class="text-nowrap">Project Name</th>
                        <th class="text-nowrap">Claim Category</th>
                        <th class="text-nowrap">Amount</th>
                        <th class="text-nowrap">Description</th>
                        <th class="text-nowrap">Attachment</th>
                    </tr> 
                </thead>
                <tbody>
                    @if ($travelClaims)
                        @foreach ($travelClaims as $travel)
                            <tr>
                                <td><a data-bs-toggle="modal" id="deleteButtonTravel" data-id="{{ $travel->id }}" class="btn btn-primary btn-sm">Delete</a></td>
                                <td>{{ $travel->travel_date ?? date('Y-m-d', strtotime($travel->start_date)) }}</td>
                                <td>{{ getProjectById($travel->project_id)->project_name ?? '-' }}</td>
                                <td>{{ $travel->type_claim ?? '-' }}</td>
                                <td>{{ $travel->amount ?? '-' }}</td>
                                <td>{{ $travel->desc ?? '-' }}</td>
                                <td>
                                    @if(!empty($travel->file_upload))
                                    @php
                                    $filenames = explode(',', $travel->file_upload);
                                    @endphp
                                    @foreach($filenames as $filename)
                                    <a href="/storage/TravelFile/{{ $filename }}" target="_blank">{{ $filename }}</a><br>
                                    @endforeach
                                    @endif
                                </td>

                            </tr> 
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div> -->
