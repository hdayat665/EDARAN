<div class="tab-pane fade active show" id="default-tab-1">
    {{-- claim approval --}}
    <table id="activetable" class="table table-striped table-bordered align-middle">
        <thead>
            <tr>
                
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
        {{-- check if config approval status enable or disable for role before approver  --}}
            @php
                $roles = ['SUPERVISOR - RECOMMENDER', 'HOD / CEO - APPROVER', 'ADMIN - CHECKER', 'ADMIN - RECOMMENDER', 'ADMIN - APPROVER'];
                $condByPass = '$claim->id != ""';
                $configData = null;
                foreach ($roles as $role) {
                    $configData = getApprovalConfigClaim($role);
                    if ($configData->status) {
                        if ($role == 'SUPERVISOR - RECOMMENDER') {
                            $condByPass = '$claim->supervisor == "recommend"';
                        } elseif ($role == 'HOD / CEO - APPROVER') {
                            $condByPass = '$claim->hod == "recommend"';
                        } elseif ($role == 'ADMIN - CHECKER') {
                            $condByPass = '$claim->a1 == "recommend"';
                        } elseif ($role == 'ADMIN - RECOMMENDER') {
                            $condByPass = '$claim->a_recommender == "recommend"';
                        } elseif ($role == 'ADMIN - APPROVER') {
                            $condByPass = '$claim->a_approval == "recommend"';
                        }
                        break;
                    }
                }
            @endphp

        {{-- {{ dd($configData->status) }} --}}
            @foreach ($claims as $claim)
                @if ($claim->claim_type == 'MTC' && isset($config->status) && $claim->a_approval == 'recommend' && $claim->f1 == '' && eval("return $condByPass;"))
                    <tr>
                        <td>
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle">
                                <i class="fa fa-cogs"></i> Action <i class="fa fa-caret-down"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a href="/financeCheckerDetail/{{ $claim->id }}" id="" data-id="" class="dropdown-item">
                                    <i class="fa fa-eye" aria-hidden="true"></i> View MTC
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:;" id="" data-id="" class="dropdown-item">
                                    <i class="fa fa-times" aria-hidden="true"></i> Cancel
                                </a>
                            </div>
                        </td>
                        <td>{{ date('Y-m-d', strtotime($claim->created_at)) ?? '-' }}</td>
                        <td>{{ $claim->userProfile->fullName ?? '-' }}</td>
                        <td>{{ $claim->month ?? '-' }}</td>
                        <td>{{ $claim->id ?? '-' }}</td>
                        <td>{{ $claim->claim_type ?? '-' }}</td>
                        <td>{{ $claim->total_amount ?? '-' }}</td>
                        <td>{{ $claim->status ?? '-' }}</td>
                        <td>{{ date('Y-m-d', strtotime($claim->updated_at)) ?? '-' }}</td>
                    </tr>
                @elseif ($claim->claim_type == 'GNC' && $claim->hod == 'recommend' && $claim->f1 == '')
                    <tr>
                        <td>
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle">
                                <i class="fa fa-cogs"></i> Action <i class="fa fa-caret-down"></i>
                            </a>
                            <div class="dropdown-menu">
                            <a href="/financeCheckerDetail/{{ $claim->id }}" id="" data-id="" class="dropdown-item">
                                    <i class="fa fa-eye" aria-hidden="true"></i> View GNC
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:;" id="" data-id="" class="dropdown-item">
                                    <i class="fa fa-times" aria-hidden="true"></i> Cancel
                                </a>
                            </div>
                        </td>
                        <td>{{ date('Y-m-d', strtotime($claim->created_at)) ?? '-' }}</td>
                        <td>{{ $claim->userProfile->fullName ?? '-' }}</td>
                        <td>{{ $claim->month ?? '-' }}</td>
                        <td>{{ $claim->id ?? '-' }}</td>
                        <td>{{ $claim->claim_type ?? '-' }}</td>
                        <td>{{ $claim->total_amount ?? '-' }}</td>
                        <td>{{ $claim->status ?? '-' }}</td>
                        <td>{{ date('Y-m-d', strtotime($claim->updated_at)) ?? '-' }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody> 

    </table>
</div>
