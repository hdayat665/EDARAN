<div class="tab-pane fade show" id="default-tab-2">
    <table id="buckettable" class="table table-striped table-bordered align-middle">
        <thead>
            <tr>
                
                <th data-orderable="false">Action</th>
                <th class="text-nowrap">Claim Type</th>
                <th class="text-nowrap">Employee Name</th>
                <th class="text-nowrap">Month</th>
                <th class="text-nowrap">Applied Date</th>
                <th class="text-nowrap">Claim Amount</th>
                <th class="text-nowrap">Final Amount</th>
                <th class="text-nowrap">Status Date</th>
                <th class="text-nowrap">Status</th>
            </tr>
        </thead>
        <tbody>
            @if ($claims)
                @foreach ($claims as $claim)
                    @if ($claim->a_approval == 'recommend' && $claim->claim_type == 'MTC')
                        <tr>
                        
                            <td>
                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i class="fa fa-caret-down"></i></a>
                                <div class="dropdown-menu">
                                    <a href="/adminApprovalDetail/{{ $claim->id }}" id="" data-id="" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i> View
                                        MTC</a>
                                    <div class="dropdown-divider"></div>
                                    <!-- <a href="javascript:;" id="approveButton2" data-id="{{ $claim->id }}" class="dropdown-item"><i class="fa fa-check" aria-hidden="true"></i> Approve</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:;" id="rejectModalButton2" data-id="{{ $claim->id }}" class="dropdown-item" data-bs-toggle="modal"><i class="fa fa-ban"
                                            aria-hidden="true"></i>
                                        Reject</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:;" id="amendModalButton2" data-id="{{ $claim->id }}" class="dropdown-item" data-bs-toggle="modal"><i class="fa fa-reply"
                                            aria-hidden="true"></i>
                                        Amend</a>
                                    <div class="dropdown-divider"></div> -->
                                    <a href="javascript:;" id="" data-id="" class="dropdown-item"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
                                </div>
                            </td>
                            <td>{{ $claim->claim_type ?? '-' }}</td>
                            <td>{{ $claim->userProfile->fullName ?? '-' }}</td>
                            <td>{{ $claim->month ?? '-' }}</td>
                            <td>{{ date('Y-m-d', strtotime($claim->created_at)) ?? '-' }}</td>
                            <td>{{ $claim->total_amount ?? '-' }}</td>
                            <td>{{ $claim->total_amount ?? '-' }}</td>
                            <td>{{ date('Y-m-d', strtotime($claim->updated_at)) ?? '-' }}</td>
                            @if ($claim->status == 'amend')
                            <td><span class="badge bg-warning" data-toggle="amendc" title="Amend">Amend</span></td>
                            @elseif ($claim->status == 'recommend')
                                <td><span class="badge bg-success" data-toggle="paidc" title="{{$claim->status_desc}}">Pending</span></td>
                            @elseif ($claim->status == 'bucket')
                                <td><span class="badge bg-success" data-toggle="paidc" title="{{$claim->status_desc}}">Pending</span></td>
                            @elseif ($claim->status == 'approved')
                                <td><span class="badge bg-info" data-toggle="approved" title="{{$claim->status_desc}}">Approved</span></td>
                            @elseif ($claim->status == 'paid' )
                                <td><span class="badge bg-secondary" data-toggle="paidc" title="{{$claim->status_desc}}">Paid</span></td>
                            @elseif ($claim->status == 'draft')
                                <td><span class="badge bg-warning" data-toggle="drafc" title="Draft">Draft</span></td>
                            @elseif ($claim->status == 'reject')
                                <td><span class="badge bg-danger" data-toggle="rejectedc" title="Rejected">Rejected</span></td>
                            @elseif ($claim->status == 'active')
                                <td><span class="badge bg-lime" data-toggle="activec" title="{{$claim->status_desc}}">In Queue</span></td>
                            @endif
                        </tr>
                    @endif
                @endforeach
            @endif
        </tbody>
    </table>
</div>
