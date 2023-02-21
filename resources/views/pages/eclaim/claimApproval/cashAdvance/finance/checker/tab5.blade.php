<div class="tab-pane fade show" id="default-tab-5">
    <!-- {{-- claim approval --}} -->
    <table id="tableclosed" class="table table-striped table-bordered align-middle">
        <thead>
            <tr>
                <th data-orderable="false">Action</th>
                <th class="text-nowrap">Cash Advance ID</th>
                <th class="text-nowrap">Employee Name</th>
                <th class="text-nowrap">Type of Cash Advance</th>
                <th class="text-nowrap">Request Date</th>
                <th class="text-nowrap">Travel Date</th>
                <th class="text-nowrap"> Amount</th>
                <th class="text-nowrap">Status</th>
                <th class="text-nowrap">Cleared Date</th>
                <th class="text-nowrap">Claim PV No</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cas as $ca)
                @if ($ca->f1 == 'close')
                    <tr>
                        <td>
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu">
                                <a href="/cashAdvanceFcheckerDetail/{{ $ca->type }}/{{ $ca->id }}" id="" data-id="" class="dropdown-item"><i class="fa fa-eye"
                                        aria-hidden="true"></i>
                                    View PO
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:;" id="approveButton5" data-id="{{ $ca->id }}" class="dropdown-item"><i class="fa fa-check" aria-hidden="true"></i> Approve</a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:;" id="rejectButton5" data-id="{{ $ca->id }}" class="dropdown-item"><i class="fa fa-ban" aria-hidden="true"></i> Reject</a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:;" id="" data-id="" class="dropdown-item"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
                            </div>
                        <td>{{ $ca->id }}</td>
                        <td>{{ $ca->userProfile->fullName ?? '-' }}</td>
                        <td>{{ getCashAdvanceType($ca->type) ?? '-' }}</td>
                        <td>{{ $ca->created_at ?? '-' }}</td>
                        <td>{{ $ca->travel_date ?? '-' }}</td>
                        <td>{{ $ca->amount ?? '-' }}</td>
                        <td>{{ $ca->status ?? '-' }}</td>
                        <td>{{ $ca->updated_at ?? '-' }}</td>
                        <td>{{ $ca->pv_number ?? '-' }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>