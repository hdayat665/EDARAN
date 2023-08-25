<div class="tab-pane fade active show" id="default-tab-1">
    <!-- {{-- claim approval --}} -->
    <table id="tableactive" class="table table-striped table-bordered align-middle">
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
                <th class="text-nowrap">Status Date</th>
                <!-- <th class="text-nowrap">Category</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach ($cas as $ca)
                @if ($ca->approver == 'recommend' && ($ca->f1 == '' || $ca->f1 == 'check' || $ca->f2 == 'check' || $ca->f3 == 'check') && $ca->f_status == null)
                    <tr>
                        <td>
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu">
                                <a href="/cashAdvanceFcheckerDetail/{{ $ca->type }}/{{ $ca->id }}" id="" data-id="" class="dropdown-item"><i class="fa fa-eye"
                                        aria-hidden="true"></i>
                                    View
                                </a>
                                <!-- <div class="dropdown-divider"></div>
                                <a href="javascript:;" id="approveButton1" data-id="{{ $ca->id }}" class="dropdown-item"><i class="fa fa-check" aria-hidden="true"></i> Approve</a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:;" id="rejectButton1" data-id="{{ $ca->id }}" class="dropdown-item"><i class="fa fa-ban" aria-hidden="true"></i> Reject</a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:;" id="" data-id="" class="dropdown-item"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a> -->
                            </div>
                        <td>CA-{{ $ca->id }}</td>
                        <td>{{ $ca->userProfile->fullName ?? '-' }}</td>
                        <td>{{ getCashAdvanceType($ca->type) ?? 'N/A' }}</td>
                        <td>{{ date('Y-m-d', strtotime($ca->created_at)) ?? 'N/A' }}</td>
                        <td>{{ $ca->travel_date ?? '-' }}</td>
                        <td>MYR {{ $ca->mode_of_transport->max_total ?? $ca->amount }}</td>
                        @if ($ca->status == 'amend')
                            <td><span class="badge bg-warning" data-toggle="amendc" title="Amend">Amend</span></td>
                        @elseif ($ca->status == 'recommend')
                            <td><span class="badge bg-success" data-toggle="paidc" title="{{ $ca->status_desc }}">Pending</span></td>
                        @elseif ($ca->status == 'bucket')
                            <td><span class="badge bg-success" data-toggle="paidc" title="{{ $ca->status_desc }}">Pending</span></td>
                        @elseif ($ca->status == 'check')
                            <td><span class="badge bg-success" data-toggle="paidc" title="{{ $ca->status_desc }}">Pending</span></td>
                        @elseif ($ca->status == 'approved')
                            <td><span class="badge bg-info" data-toggle="approved" title="{{ $ca->status_desc }}">Approved</span></td>
                        @elseif ($ca->status == 'paid')
                            <td><span class="badge bg-secondary" data-toggle="paidc" title="{{ $ca->status_desc }}">Paid</span></td>
                        @elseif ($ca->status == 'draft')
                            <td><span class="badge bg-warning" data-toggle="drafc" title="Draft">Draft</span></td>
                        @elseif ($ca->status == 'reject')
                            <td><span class="badge bg-danger" data-toggle="rejectedc" title="Rejected">Rejected</span></td>
                        @elseif ($ca->status == 'active')
                            <td><span class="badge bg-lime" data-toggle="activec" title="{{ $ca->status_desc }}">In Queue</span></td>
                        @endif
                        <td>{{ date('Y-m-d', strtotime($ca->updated_at)) ?? 'N/A' }}</td>
                        <!-- <td>{{ '-' }}</td> -->
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
