<div class="modal fade" id="travelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1200px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Daily Travelling Log</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row p-2">
                    <div class="col-md-6">
                        
                    </div>
                    <div class="col-md-12">
                        <div class="row p-2">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-2 d-flex justify-content-end">
                                <label class="form-label">Date</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" id="date" class="form-control" readonly value=''>
                            </div>
                        </div>
                    </div>
                </div>

                <table id="tableTravelling" class="table table-striped table-bordered align-middle">
                    <thead>
                        <tr>
                            <th class="text-nowrap">Start Time</th>
                            <th class="text-nowrap">End Time</th>
                            <th class="text-nowrap">Start Location</th>
                            <th class="text-nowrap">Destination</th>
                            <th class="text-nowrap">Description</th>
                            <th class="text-nowrap">Type Of Transport </th>
                            <th class="text-nowrap">Mileage( KM )</th>
                            <th class="text-nowrap">Petrol/fares</th>
                            <th class="text-nowrap">Tolls&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                            <th class="text-nowrap">Parking&nbsp;&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody id="tableRowTravelling">

                    </tbody>
                    
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

{{-- FILE ATTACHMENT MODAL --}}

<div class="modal fade" id="travellingAttachment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 600px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Travelling Attachment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="">
                <div class="">
                    <div class="row p-2">
                        <div class="">
                            <table id="" class="table table-striped table-bordered align-middle">
                                <thead>
                                    <tr>   
                                        <th class="text-nowrap">No</th>
                                        <th class="text-nowrap">File Name</th>
                                        <th class="text-nowrap">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $id = 0 ?>
                                    @if ($travelAttachments)
                                        @foreach ($travelAttachments as $attachment)
                                        <?php $id++ ?>
                                        <tr>    
                                            <td>{{$id}}</td>
                                            <td>
                                                @if(!empty($attachment->file_upload))
                                                @php
                                                $filenames = explode(',', $attachment->file_upload);
                                                @endphp
                                                @foreach($filenames as $filename)
                                                <a href="/storage/MtcAttachment/{{ $filename }}" target="_blank">{{ $filename }}</a><br>
                                                @endforeach
                                                    @endif
                                            </td>
                                            <td>{{ $attachment->desc ?? 'N/A' }}</td>
                                        </tr> 
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="viewCa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 1200px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Cash Advance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form id="viewCaForm">
                    <div class="">
                        <input readonly type="hidden" value="{{ isset($GNC['id']) ? $GNC['id'] : '' }}" name="id" class="form-control">
                        <div class="row p-2">
                            <div class="">
                            <table id="claimtable" class="table table-striped table-bordered align-middle">
                                    <thead>
                                        <tr>
                                            
                                            <th class="text-nowrap">No</th>
                                            <th class="text-nowrap">Form ID</th>
                                            <th class="text-nowrap">Type of Cash Advance
                                            </th>
                                            <th class="text-nowrap">Travel Date</th>
                                            <th class="text-nowrap">Applied Amount</th>
                                            <th class="text-nowrap">Used Amount</th>
                                            <th class="text-nowrap">Final Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($cashAdvances as $cashAdvance)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>Form ID {{ $cashAdvance->id }}</td>
                                                <td> {{ getCashAdvanceType($cashAdvance->type) }}</td>
                                                <td> {{ $cashAdvance->travel_date }}</td>
                                                <td>RM {{ $cashAdvance->amount }}</td>
                                                <td>RM {{ $cashAdvance->used_amount ?? 0}} </td>
                                                <td>RM {{ $cashAdvance->final_amount ?? 0 }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>