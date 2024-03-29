<div class="form-control break">
    <div class="row p-2">
        <div class="col-md-6">
            <h4>Travelling Table List</h4>
        </div>
        <div class="col md-3 d-flex justify-content-end">
            <label class="form-label">Total</label>
        </div>
        <div class="col md-3 d-flex justify-content-end">
            
            <input type="text" class="form-control" readonly value='RM {{ number_format($totalTravellings ?? 0, 2) }}'>
        </div>
    </div>
    <div class="row p-2">
        <div class="col d-flex justify-content-end">
            <!-- <div class="col-md-6">
                <div class="row p-2">
                    <div class="col d-flex justify-content-end">
                        <a id="btnTAttachment" class="btn btn-primary"></i> Supporting Documents</a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <div class="row p-2">
        <div class="col md-12">
            <table id="travelling" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th class="text-nowrap">No</th>
                        <th class="text-nowrap">Travel Date</th>
                        <th class="text-nowrap">Mileage</th>
                        <th class="text-nowrap">Petrol/Fares</th>
                        <th class="text-nowrap">Tolls</th>
                        <th class="text-nowrap">Parking</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id = 0 ?>
                    @if ($travelClaims)
                        @foreach ($travelClaims as $travel)
                        <?php $id++ ?>
                        <tr>    
                            <td>{{$id}}</td>
                            <td>{{ $travel->travel_date ?? '' }}</td>
                            <td>{{ number_format($travel->total_km ?? 0, 1) }} KM</td>
                            <td>RM {{ $travel->total_petrol ?? '0' }}</td>
                            <td>RM {{ $travel->total_toll ?? '0' }}</td>
                            <td>RM {{ $travel->total_parking ?? '0' }}</td>
                            <td>
                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                                <div class="dropdown-menu">
                                <a href="javascript:;" id="travelBtn" data-date="{{ $travel->travel_date }}" data-id="{{ $travel->general_id }}" class="dropdown-item"> View</a>
                            </td>
                        </tr> 
                        @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td>Total:</td>
                        <td id="totalMileage"></td>
                        <td>RM {{ $summaryTravelling[0]->total_petrol ?? 0 }}</td>
                        <td>RM {{ $summaryTravelling[0]->total_toll ?? 0  }}</td>
                        <td>RM {{ $summaryTravelling[0]->total_parking ?? 0 }}</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
            <div class="row p-2" style="display: none">
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
            <!-- <div class="col-md-6">
                <input type="button" id="btnAttachment" class="btn btn-primary" value="Travelling Attachment">
            </div> -->
        </div>
    </div>
        </div>
    </div>

    {{-- <div class="row p-2">
        <div class="col-md-6">
            <div class="form-control">
                <div class="col-md-12">
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Travelling</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" readonly value='KM'>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" readonly value='RM '>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">
                <label for="file" class=""> Supporting Document</label> --}}
                {{-- <input type="file" class="form-control-file" name="" id="" multiple> --}}
            {{-- </div>
        </div>
    </div> --}}
    {{-- <div class="row p-2">
        <div class="col-md-6">
            <div class="form-control">
                <div class="col-md-12">
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Petrol/Fare</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" readonly value='RM'>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

</div>
<div class="row p-2">

</div>
<div class="form-control">
    <div class="row p-2">
        <div class="col-md-6">
            <h4>Subsistence Allowance & Accommodation Table List</h4>
        </div>
        <div class="col md-3 d-flex justify-content-end">
            <label class="form-label">Total</label>
        </div>
        <div class="col md-3 d-flex justify-content-end">
            <input type="text" class="form-control" readonly value='RM {{ $summarySubs[0]->total_all ?? 0 }}'>
        </div>
    </div>
    
    <div class="row p-2">
        <div class="">
        <table id="subsTableUpdate" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th class="text-nowrap">Start Date</th>
                        <th class="text-nowrap">End Date</th>
                        <th class="text-nowrap">Subsistence <br>Allowance</th>
                        <th class="text-nowrap">Accommodation</th>
                        <th class="text-nowrap">Laundry</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $id = 0 ?>
                    @if ($subsClaims)
                        @foreach ($subsClaims as $subs)
                        <?php $id++ ?>
                        <tr>    
                            <td>{{$id}}</td>
                            <td>{{ date('Y-m-d', strtotime($subs->start_date)) ?? '' }}</td>
                            <td>{{ date('Y-m-d', strtotime($subs->end_date)) ?? '' }}</td>
                            <td>RM{{ $subs->total_subs ?? '0' }}</td>
                            <td>RM{{ $subs->total_acc ?? '0' }}</td>
                            <td>RM{{ $subs->laundry_amount ?? '0' }}</td>
                            <td>
                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                                <div class="dropdown-menu">
                                <a href="javascript:;" id="subsBtn" data-id="{{ $subs->id }}" class="dropdown-item"> View</a>
                            </td>
                        </tr> 
                        @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-nowrap" colspan="2" style="visibility: hidden;"></th>
                        <td>Total</td>
                        <td>RM {{ $summarySubs[0]->total_subs ?? 0  }}</td>
                        <td>RM {{ $summarySubs[0]->total_acc ?? 0 }}</td>
                        <td>RM {{ $summarySubs[0]->total_laundry ?? 0 }}</td>
                        <td></td>
                    </tr>
                </tfoot>
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
                            <input type="text" class="form-control" readonly value='RM {{ number_format($cashAdvance ?? 0, 2) }}'>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-6">
            <div class="col-md-6">
                
            </div>
            <div class="col-md-6">
                <input type="button" id="btnAttachmentSubs" class="btn btn-primary" value="Subsistence Attachment">
            </div>
        </div> -->
    </div>
</div>
<div class="row p-2">
    <div class="form-control">
        <div class="row p-2">
            <div class="col-md-6">
                <h4>Others Table List</h4>
            </div>
            <div class="col md-3 d-flex justify-content-end">
                <label class="form-label">Total</label>
            </div>
            <div class="col md-3 d-flex justify-content-end">
                <input type="text" class="form-control" readonly value='RM {{ $summaryOthers[0]->total_amount ?? 0}}'>
            </div>
        </div>

        <div class="row p-2">
            <div class="col md-6">
                <table id="otherTableUpdate" class="table table-striped table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="text-nowrap">Claim Category</th>
                            <th class="text-nowrap">Project Code</th>
                            <th class="text-nowrap">Project Name</th>
                            <th class="text-nowrap">Description</th>
                            <th class="text-nowrap">Amount</th>
                            <th class="text-nowrap">Attachment</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php $id = 0 ?>
                    @if ($personalClaims)
                            @foreach ($personalClaims as $personal)
                            <?php $id++ ?>
                            <tr>    
                                <td>{{$id}}</td>
                                <td>{{ getClaimCategoryById($personal->claim_category)->claim_catagory ?? '-' }}</td>
                                <td>{{ getProjectById($personal->project_id)->project_code ?? '-' }}</td>
                                <td>{{ getProjectById($personal->project_id)->project_name ?? '-' }}</td>
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
                    <tfoot>
                        <tr>
                            <th class="text-nowrap" colspan="4" style="visibility: hidden;"></th>
                            <th class="text-nowrap">Total</th>
                            <th class="text-nowrap">RM {{ $summaryOthers[0]->total_amount ?? 0 }}</th>
                            <th class="text-nowrap" colspan="1" style="visibility: hidden;"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    @include('modal.eclaim.mcvTravelling')
    @include('modal.eclaim.mcvSubsistence')
    @include('modal.eclaim.mcvOthers')
</div>

