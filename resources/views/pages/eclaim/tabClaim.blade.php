<div class="tab-pane fade active show" id="card-pill-1">
    <div class="category-filter">
        <select id="Statusclaim" class="form-control" style=" width: 200px; margin-left: auto; margin-right: 0;">
            <option value="">Show All</option>
            <option value="Draft">Draft</option>
            <option value="Active">Active</option>
            <option value="Rejected">Rejected</option>
            <option value="Amend">Amend</option>
            <option value="paid">Paid</option>
        </select>
    </div>
    <table id="claimtable" class="table table-striped table-bordered align-middle">
        <thead>
            <tr>
                
                <th class="text-nowrap">Year</th>
                <th class="text-nowrap">Month</th>
                
                <th class="text-nowrap">Type</th>
                <th class="text-nowrap">Total Amount</th>
                <th class="text-nowrap">Status</th>
                <th class="text-nowrap">Status Date</th>
                <th class="text-nowrap">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($claims)
                @foreach ($claims as $claim)
                    <tr class="even gradeC">
                       
                        <td>{{ $claim->year }}</td>
                        <td>{{ $claim->month }}</td>
                        <td>{{ $claim->claim_type }}</td>
                        @if ($claim->status === 'draft')
                            <td> N/A</td>
                        @else
                            <td> RM {{ number_format($claim->total_amount ?? 0, 2) }}</td>
                        @endif

                        @if ($claim->status == 'amend')
                            <td><span class="badge bg-success" data-toggle="amendc" title="Amend">Amend</span></td>
                        @elseif ($claim->status == 'recommend')
                            <td><span class="badge bg-warning" data-toggle="paidc" title="Paid">Pending</span></td>
                        @elseif ($claim->status == 'paid' )
                            <td><span class="badge bg-secondary" data-toggle="paidc" title="Paid">Paid</span></td>
                        @elseif ($claim->status == 'draft')
                            <td><span class="badge bg-warning" data-toggle="drafc" title="Draft">Draft</span></td>
                        @elseif ($claim->status == 'reject')
                            <td><span class="badge bg-danger" data-toggle="rejectedc" title="Rejected">Rejected</span></td>
                        @elseif ($claim->status == 'active')
                            <td><span class="badge bg-lime" data-toggle="activec" title="Active">Active</span></td>
                        @endif
                        <td>{{ date('Y-m-d', strtotime($claim->updated_at)) }}</td>
                        <td>
                            <div class="btn-group me-1 mb-1">
                                @if ($claim->claim_type == 'GNC')
                                    @if ($claim->status == 'amend' || $claim->status == 'draft')
                                        <a href="javascript:;" class="btn btn-primary btn-sm">Action</a>
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm"><i class="fa fa-caret-down"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="/viewGeneralClaim/{{ $claim->id }}" class="dropdown-item">View General
                                                Claim</a>
                                            <a href="/editGeneralClaimView/{{ $claim->id }}" class="dropdown-item">Update Claim</a>
                                        </div>
                                    @elseif ($claim->status == 'active')
                                        <a href="javascript:;" class="btn btn-primary btn-sm">Action</a>
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm"><i class="fa fa-caret-down"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="/viewGeneralClaim/{{ $claim->id }}" class="dropdown-item">View General
                                                Claim</a>
                                                <div class="dropdown-divider"></div>
                                            <a data-id="{{ $claim->id }}" class="dropdown-item cancelButton">Cancel Claim</a>
                                        </div>
                                    @elseif ($claim->status == 'paid' || $claim->status == 'reject')
                                        <a href="javascript:;" class="btn btn-primary btn-sm">Action</a>
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm"><i class="fa fa-caret-down"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="/viewGeneralClaim/{{ $claim->id }}" class="dropdown-item">View General
                                                Claim</a>
                                        </div>
                                        
                                    @endif
                                    
                                @else
                                    @if ($claim->status == 'draft') 
                                        <a href="javascript:;" class="btn btn-primary btn-sm">Action</a>
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm"><i class="fa fa-caret-down"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="/monthClaimEditView/edit/month/{{ $claim->id }}" class="dropdown-item">Update Claim</a>
                                            <div class="dropdown-divider"></div>
                                            <!-- <a data-id="{{ $claim->id }}" class="dropdown-item buttonCancel">Cancel Claim</a> -->
                                        </div>
                                    @elseif ($claim->status == 'rejected')
                                        <a href="javascript:;" class="btn btn-primary btn-sm">Action</a>
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm"><i class="fa fa-caret-down"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- <a href="/eclaim/viewmyclaim" class="dropdown-item">View Claim</a> -->
                                        </div>
                                        
                                    @elseif ($claim->status == 'active')
                                        <a href="javascript:;" class="btn btn-primary btn-sm">Action</a>
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm"><i class="fa fa-caret-down"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- <a href="/eclaim/viewmyclaim" class="dropdown-item">View Claim</a> -->
                                            <!-- <a href="javascript:;" class="dropdown-item">Update Claim</a> -->
                                            <a href="/monthlyClaimView/{{ $claim->id }}" id="" data-id="" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i> View
                                                MTC</a>
                                            <div class="dropdown-divider"></div>
                                            <a data-id="{{ $claim->id }}" class="dropdown-item buttonCancel">Cancel Claim</a>
                                        </div>
                                    @elseif ($claim->status == 'recommend')
                                        <a href="javascript:;" class="btn btn-primary btn-sm">Action</a>
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm"><i class="fa fa-caret-down"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- <a href="/eclaim/viewmyclaim" class="dropdown-item">View Claim</a> -->
                                            <!-- <a href="javascript:;" class="dropdown-item">Update Claim</a> -->
                                            <a href="/monthlyClaimView/{{ $claim->id }}" id="" data-id="" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i> View
                                                MTC</a>
                                            
                                        </div>
                                    @elseif ($claim->status == 'paid')
                                        <a href="javascript:;" class="btn btn-primary btn-sm">Action</a>
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm"><i class="fa fa-caret-down"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="/viewMtcClaim/{{ $claim->id }}" id="" data-id="" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i> View
                                                MTC</a>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
