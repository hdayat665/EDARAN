<div class="tab-pane fade" id="card-pill-2">
    <div class="category-filter">
        <select id="Statuscash" class="form-control" style=" width: 200px; margin-left: auto; margin-right: 0;">
            <option value="">Show All</option>
            <option value="Draft">Draft</option>
            <option value="Active">Active</option>
            <option value="Rejected">Rejected</option>
            <option value="Amend">Amend</option>
            <option value="Paid">Paid</option>
        </select>
    </div>
    <table id="cashadvancetable" class="table table-striped table-bordered align-middle">
        <thead>
            <tr>
                
                <th class="text-nowrap">Cash Advance ID</th>
                <th class="text-nowrap">Type of Cash Advance</th>
                <th class="text-nowrap">Request Date</th>
                <th class="text-nowrap">Travel Date</th> 
                <th class="text-nowrap">Amount</th>
                <th class="text-nowrap">Status</th>
                <th class="text-nowrap">Status Date</th>
                <th class="text-nowrap">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($cashClaims)
                @foreach ($cashClaims as $cashClaim)
                    <tr class="odd gradeX">
                        
                        <td>CA-{{ $cashClaim->id }}</td>
                        <td>{{ getCashAdvanceType($cashClaim->type) }}</td>
                        <td>{{ date_format(date_create($cashClaim->created_at), 'd/m/Y') }}</td>
                        <td>{{ $cashClaim->travel_date ? $cashClaim->travel_date : 'N/A' }}</td>
                        <td> RM {{ number_format($cashClaim->mode_of_transport->max_total ?? $cashClaim->amount ?? 0, 2) }}</td>
                        @if ($cashClaim->status == 'draft')
                            <td><span class="badge bg-warning" data-toggle="drafca" title="Draft">Draft</span></td>
                        @elseif ($cashClaim->status == 'active')
                            <td><span class="badge bg-lime" data-toggle="activeca" title="Active">Active</span></td>
                        @elseif ($cashClaim->status == 'reject')
                            <td><span class="badge bg-danger" data-toggle="rejectedca" title="Rejected">Rejected</span></td>
                        @elseif ($cashClaim->status == 'amend')
                            <td><span class="badge bg-success" data-toggle="amendca" title="Amend">Amend</span></td>
                        @elseif ($cashClaim->status == 'close')
                            <td><span class="badge bg-secondary" data-toggle="paidca" title="Paid">Paid</span></td>
                        @elseif ($cashClaim->status == 'recommend')
                            <td><span class="badge bg-info" data-toggle="paidca" title="Pending">Pending</span></td>
                        @elseif ($cashClaim->status == 'cancelled')
                            <td><span class="badge bg-danger" data-toggle="paidca" title="Pending">cancelled</span></td>
                        @endif
                        <td>{{ date_format(date_create($cashClaim->updated_at), 'd/m/Y') }}</td>
                        <td>
                            <div class="btn-group me-1 mb-1">
                                <a href="javascript:;" class="btn btn-primary btn-sm">Action</a>
                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm"><i class="fa fa-caret-down"></i></a>

                                @if ($cashClaim->status == 'draft')
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- <a href="/viewCashAdvance/{{ $cashClaim->id }}" class="dropdown-item">Update Claim</a> -->
                                    </div>
                                @elseif ($cashClaim->status == 'active')
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="/viewCashAdvance/{{ $cashClaim->id }}" class="dropdown-item">View Claim</a>
                                        <!-- <a href="/editCashAdvance/{{ $cashClaim->id }}" class="dropdown-item">Update Claim</a> -->
                                        <div class="dropdown-divider"></div>
                                        <a href="javascript:;" id="cancelCashButton" data-id="{{ $cashClaim->id }}" class="dropdown-item">Cancel Claim</a>
                                    </div>
                                @elseif ($cashClaim->status == 'amend')
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="/viewCashAdvance/{{ $cashClaim->id }}" class="dropdown-item">View Claim</a>
                                        <!-- <a href="/editCashAdvance/{{ $cashClaim->id }}" class="dropdown-item">Update Claim</a> -->
                                    </div>
                                @elseif ($cashClaim->status == 'cancelled')
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="/viewCashAdvance/{{ $cashClaim->id }}" class="dropdown-item">View Claim</a>
                                        <!-- <a href="/editCashAdvance/{{ $cashClaim->id }}" class="dropdown-item">Update Claim</a> -->
                                    </div>
                                @elseif ($cashClaim->status == 'paid' || $cashClaim->status == 'reject')
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="/viewCashAdvance/{{ $cashClaim->id }}" class="dropdown-item">View Claim</a>
                                    </div>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
