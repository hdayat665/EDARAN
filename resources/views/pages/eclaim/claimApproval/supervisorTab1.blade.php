<div class="tab-pane fade active show" id="default-tab-1">
    <form id="approveAllForm">
        <table id="activeTable" class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th data-orderable="false"></th>
                    <th data-orderable="false">Action</th>
                    <th class="text-nowrap">Applied Date</th>
                    <th class="text-nowrap">Employee Name</th>
                    <th class="text-nowrap">Month</th>
                    <th class="text-nowrap">Claim ID</th>
                    <th class="text-nowrap">Claim Type</th>
                    <th class="text-nowrap">Total Amount</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap">Status Date</th>
                </tr>
            </thead>
            <tbody>
                @if ($claims)

                    {{-- check if config approval status enable or disable for role before approver  --}}
                    @php
                        $configData = getApprovalConfigClaim('SUPERVISOR - RECOMMENDER');
                        $condByPass = ' $claim->id != "" && $claim->status == "active"';
                        if ($configData->status) {
                            $condByPass = ' $claim->supervisor == "recommend"';
                        }
                        // dd($config);
                    @endphp

                    @foreach ($claims as $claim)
                        {{-- check if config approval status enable or disable if enable supervisor can approve else supervisor cannot approve means byPass  --}}
                        @if (isset($config->status))
                            @if ($claim->hod == '' && eval("return $condByPass;"))
                                <tr>
                                    <td width="1%" class="fw-bold text-dark" style="text-align: center"><input class="form-check-input" value="{{ $claim->id }}" name="id[]" type="checkbox"
                                            id="checkbox1" /></td>

                                    <td>
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i class="fa fa-caret-down"></i></a>
                                        <div class="dropdown-menu">
                                            @if ($claim->claim_type == 'MTC')
                                                <a href="/supervisorDetailClaimView/{{ $claim->id }}" id="" data-id="" class="dropdown-item"><i class="fa fa-eye"
                                                        aria-hidden="true"></i>
                                                    View
                                                    MTC</a>
                                            @else
                                                <a href="/hodDetailClaimView/{{ $claim->id }}" id="" data-id="" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i> View
                                                    GNC</a>
                                            @endif

                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:;" id="approveButton" data-id="{{ $claim->id }}" class="dropdown-item"><i class="fa fa-check" aria-hidden="true"></i> Approve</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:;" id="rejectModalButton" data-id="{{ $claim->id }}" class="dropdown-item"><i class="fa fa-ban" aria-hidden="true"></i>
                                                Reject</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:;" id="amendModalButton" data-id="{{ $claim->id }}" class="dropdown-item"><i class="fa fa-reply" aria-hidden="true"></i>
                                                Amend</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:;" id="" data-id="{{ $claim->id }}" class="dropdown-item"><i class="fa fa-times" aria-hidden="true"></i> Close</a>
                                        </div>
                                    </td>
                                    <td>{{ date('Y-m-d', strtotime($claim->created_at)) ?? '-' }}</td>
                                    <td>{{ $claim->userProfile->fullName ?? '-' }}</td>
                                    <td>{{ $claim->month ?? '-' }}</td>
                                    <td>{{ $claim->id ?? '-' }}</td>
                                    <td>{{ $claim->claim_type ?? '-' }}</td>
                                    <td>{{ $claim->total_amount ?? '-' }}</td>
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
                                    <td>{{ date('Y-m-d', strtotime($claim->updated_at)) ?? '-' }}</td>
                                </tr>
                            @endif
                        @endif
                    @endforeach
                @endif
            </tbody>
            <!-- <tfoot style="display:table-row-group" id="filteractive">
                <tr>
                    <th data-orderable="false"></th>
                    <th></th>
                    <th class="text-nowrap">Applied Date</th>
                    <th class="text-nowrap">Employee Name</th>
                    <th class="text-nowrap">Month</th>
                    <th class="text-nowrap">Claim ID</th>
                    <th class="text-nowrap">Claim Type</th>
                    <th class="text-nowrap">Total Amount</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap">Status Date</th>
                </tr>
            </tfoot> -->
        </table>
    </form>
</div>
