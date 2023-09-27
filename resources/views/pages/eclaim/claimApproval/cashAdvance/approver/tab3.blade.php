<div class="tab-pane fade show" id="default-tab-3">
    <table id="rejected" class="table table-striped table-bordered align-middle">
        <thead>
            <tr>
                <th data-orderable="false">No</th>
                <th class="text-nowrap">Claim ID</th>
                <th class="text-nowrap">Requested By</th>
                <th class="text-nowrap">Type of Cash Advance</th>
                <th class="text-nowrap">Request Date</th>
                <th class="text-nowrap">Travel Date</th>
                <th class="text-nowrap"> Amount (RM)</th>
                <th class="text-nowrap">Status Date</th>
                <th class="text-nowrap">Status</th>
                <th class="text-nowrap">Remarks</th>
                <th data-orderable="false">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1 ?>
            @foreach ($cas as $ca)
                @if ($ca->approver == 'reject')
                    <tr>
                        <td>{{ $no++ }} </td>   
                         
                        <td>CA-{{ $ca->id }}</td>
                        <td>{{ $ca->userProfil4e->fullName ?? '-' }}</td>
                        <td>{{ getCashAdvanceType($ca->type) ?? '-' }}</td>
                        <td>{{ date('Y-m-d', strtotime($ca->created_at)) ?? 'N/A' }}</td>
                        <td>{{ $ca->travel_date ?? 'N/A' }}</td>
                        <td>MYR {{  $ca->mode_of_transport->max_total ?? $ca->amount }}</td>
                        <td>{{ date('Y-m-d', strtotime($ca->updated_at)) ?? '-' }}</td>
                        @if ($ca->status == 'amend')
                            <td><span class="badge bg-warning" data-toggle="amendc" title="Amend">Amend</span></td>
                        @elseif ($ca->status == 'recommend')
                            <td><span class="badge bg-success" data-toggle="paidc" title="{{$ca->status_desc}}">Pending</span></td>
                        @elseif ($ca->status == 'bucket')
                            <td><span class="badge bg-success" data-toggle="paidc" title="{{$ca->status_desc}}">Pending</span></td>
                        @elseif ($ca->status == 'check')
                            <td><span class="badge bg-success" data-toggle="paidc" title="{{$ca->status_desc}}">Pending</span></td>
                        @elseif ($ca->status == 'approved')
                            <td><span class="badge bg-info" data-toggle="approved" title="{{$ca->status_desc}}">Approved</span></td>
                        @elseif ($ca->status == 'paid' )
                            <td><span class="badge bg-secondary" data-toggle="paidc" title="{{$ca->status_desc}}">Paid</span></td>
                        @elseif ($ca->status == 'draft')
                            <td><span class="badge bg-warning" data-toggle="drafc" title="Draft">Draft</span></td>
                        @elseif ($ca->status == 'reject')
                            <td><span class="badge bg-danger" data-toggle="rejectedc" title="Rejected">Rejected</span></td>
                        @elseif ($ca->status == 'active')
                            <td><span class="badge bg-lime" data-toggle="activec" title="{{$ca->status_desc}}">In Queue</span></td>
                        @endif
                        <td>{{ $ca->remark ?? '-' }}</td>
                        <td>
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu">
                                <a href="/cashAdvanceApproverDetail/{{ $ca->type }}/{{ $ca->id }}" id="" data-id="" class="dropdown-item"><i class="fa fa-eye"
                                        aria-hidden="true"></i>
                                    View PO
                                </a>
                                <div class="dropdown-divider"></div>
                                <!-- <a href="javascript:;" id="approveButton3" data-id="{{ $ca->id }}" class="dropdown-item"><i class="fa fa-check" aria-hidden="true"></i> Approve</a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:;" id="rejectButton3" data-id="{{ $ca->id }}" class="dropdown-item"><i class="fa fa-ban" aria-hidden="true"></i> Reject</a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:;" id="" data-id="" class="dropdown-item"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a> -->
                            </div>
                        </td>  
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
