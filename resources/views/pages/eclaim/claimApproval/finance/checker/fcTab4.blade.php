<div class="tab-pane fade show" id="default-tab-4">
    <table id="paidtable" class="table table-striped table-bordered align-middle">
        <thead>
            <tr>
                <th data-orderable="false"></th>
                <th data-orderable="false">Action</th>
                <th class="text-nowrap">Claim Type</th>
                <th class="text-nowrap">Employee Name</th>
                <th class="text-nowrap">Month</th>
                <th class="text-nowrap">Applied Date</th>
                <th class="text-nowrap">Total Amount</th>
                <th class="text-nowrap">Status Date</th>
                <th class="text-nowrap">Claim PV No</th>
                <th class="text-nowrap">Cheque No</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($claims as $claim)
                @if ($claim->status == 'paid' && $claim->cheque_number != '')
                    <tr>
                        <td style="text-align: center"><input class="form-check-input" type="checkbox" />
                        <td>
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu">
                                @if ($claim->claim_type == 'MTC')
                                    <a href="/financeCheckerDetail/{{ $claim->id }}" id="" data-id="" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i> View
                                        MTC</a>
                                @else
                                    <a href="/financeCheckerDetail/{{ $claim->id }}" id="" data-id="" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i> View
                                        GNC</a>
                                @endif
                                <!-- <div class="dropdown-divider"></div>
                                <a href="javascript:;" id="approveButton4" data-id="{{ $claim->id }}" class="dropdown-item"><i class="fa fa-check" aria-hidden="true"></i> Approve</a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:;" id="rejectButton4" data-id="{{ $claim->id }}" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalreject"><i class="fa fa-ban"
                                        aria-hidden="true"></i>
                                    Reject</a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:;" id="amendButton4" data-id="{{ $claim->id }}" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalamend"><i class="fa fa-reply"
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
                        <td>{{ date('Y-m-d', strtotime($claim->updated_at)) ?? '-' }}</td>
                        <td>{{ $claim->pv_number ?? '-' }}</td>
                        <td>{{ $claim->cheque_number ?? '-' }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
