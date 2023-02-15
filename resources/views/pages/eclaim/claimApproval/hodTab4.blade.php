<div class="tab-pane fade show" id="default-tab-4">
    <table id="approvedtable" class="table table-striped table-bordered align-middle">
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
                <th class="text-nowrap">Remarks</th>
            </tr>
        </thead>
        <tbody>
            @if ($claims)
                @foreach ($claims as $claim)
                    @if ($claim->status == 'recommend')
                        <tr>
                            <td><input type="checkbox" id="" name="" value=""></td>
                            <td>
                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i class="fa fa-caret-down"></i></a>
                                <div class="dropdown-menu">
                                    @if ($claim->claim_type == 'MTC')
                                        <a href="/hodDetailClaimView/{{ $claim->id }}" id="" data-id="" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i> View
                                            MTC</a>
                                    @else
                                        <a href="/hodDetailClaimView/{{ $claim->id }}" id="" data-id="" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i> View
                                            GNC</a>
                                    @endif
                                    <div class="dropdown-divider"></div>
                                    <a id="approveButton2" data-id="{{ $claim->id }}" class="dropdown-item"><i class="fa fa-check" aria-hidden="true"></i> Approve</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:;" id="rejectModalButton2" data-id="{{ $claim->id }}" class="dropdown-item"><i class="fa fa-ban" aria-hidden="true"></i>
                                        Reject</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:;" id="amendModalButton2" data-id="{{ $claim->id }}" class="dropdown-item"><i class="fa fa-reply" aria-hidden="true"></i>
                                        Amend</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:;" id="" data-id="{{ $claim->id }}" class="dropdown-item"><i class="fa fa-times" aria-hidden="true"></i> Close</a>
                                </div>
                            </td>
                            <td>{{ $claim->created_at ?? '-' }}</td>
                            <td>{{ $claim->userProfile->fullName ?? '-' }}</td>
                            <td>{{ $claim->month ?? '-' }}</td>
                            <td>{{ $claim->id ?? '-' }}</td>
                            <td>{{ $claim->claim_type ?? '-' }}</td>
                            <td>{{ $claim->total_amount ?? '-' }}</td>
                            <td>{{ $claim->status ?? '-' }}</td>
                            <td>{{ $claim->updated_at ?? '-' }}</td>
                            <td>{{ $claim->remark ?? '-' }}</td>
                        </tr>
                    @endif
                @endforeach
            @endif
        </tbody>
    </table>
</div>
