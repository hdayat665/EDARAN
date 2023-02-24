<div class="tab-pane fade active show" id="default-tab-1">
    <!-- {{-- claim approval --}} -->
    <table id="active" class="table table-striped table-bordered align-middle">
        <thead>
            <tr>
                <th data-orderable="false"></th>
                <th data-orderable="false">Action</th>
                <th class="text-nowrap">Claim ID</th>
                <th class="text-nowrap">Requested By</th>
                <th class="text-nowrap">Type of Cash Advance</th>
                <th class="text-nowrap">Request Date</th>
                <th class="text-nowrap">Travel Date</th>
                <th class="text-nowrap"> Amount (RM)</th>
                <th class="text-nowrap">Status Date</th>
                <th class="text-nowrap">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cas as $ca)
                @if ($ca->status == 'active' && $ca->approver == '')
                    <tr>
                        <td style="text-align: center"><input class="form-check-input" type="checkbox" />
                        <td>
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu">
                                <a href="/cashAdvanceFapproverDetail/{{ $ca->type }}/{{ $ca->id }}" id="" data-id="" class="dropdown-item"><i class="fa fa-eye"
                                        aria-hidden="true"></i>
                                    View
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:;" id="approveButton1" data-id="{{ $ca->id }}" class="dropdown-item"><i class="fa fa-check" aria-hidden="true"></i> Approve</a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:;" id="rejectButton1" data-id="{{ $ca->id }}" class="dropdown-item"><i class="fa fa-ban" aria-hidden="true"></i> Reject</a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:;" id="" data-id="" class="dropdown-item"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
                            </div>
                        <td>{{ $ca->id }}</td>
                        <td>{{ $ca->userProfile->fullName ?? '-' }}</td>
                        <td>{{ getCashAdvanceType($ca->type) ?? 'N/A' }}</td>
                        <td>{{ date('Y-m-d', strtotime($ca->created_at)) ?? 'N/A' }}</td>
                        <td>{{ $ca->travel_date ?? 'N/A' }}</td>
                        <td>MYR {{  $ca->mode_of_transport->accommadation_total ?? $ca->amount }}</td>
                        <td>{{ date('Y-m-d', strtotime($ca->updated_at)) ?? '-' }}</td>
                        <td>{{ $ca->status ?? '-' }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
