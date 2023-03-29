<div class="tab-pane fade show" id="default-tab-7">
    <!-- {{-- claim approval --}} -->
    <table id="tablepaid" class="table table-striped table-bordered align-middle">
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
                <th class="text-nowrap">Advance PV No</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($cas as $ca)
                @if ($ca->pv_number != '' && !in_array($ca->status, ['paid', 'clsoe']))
                    <tr>
                        <td>
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu">
                                <a href="/cashAdvanceFcheckerDetail/{{ $ca->type }}/{{ $ca->id }}" id="" data-id="" class="dropdown-item"><i class="fa fa-eye"
                                        aria-hidden="true"></i> View</a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:;" id="checkModalButton" data-id="{{ $ca->id }}" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#chequeModal"><i
                                        class="fa fa-reply" aria-hidden="true"></i>
                                    Generate Cheque</a>
                            </div>
                        <td>CA-{{ $ca->id }}</td>
                        <td>{{ $ca->userProfile->fullName ?? '-' }}</td>
                        <td>{{ getCashAdvanceType($ca->type) ?? 'N/A' }}</td>
                        <td>{{ date('Y-m-d', strtotime($ca->created_at)) ?? 'N/A' }}</td>
                        <td>{{ $ca->travel_date ?? '-' }}</td>
                        <td>MYR {{  $ca->mode_of_transport->max_total ?? $ca->amount }}</td>
                        <td>{{ $ca->status ?? '-' }}</td>
                        <td>{{ date('Y-m-d', strtotime($ca->updated_at)) ?? 'N/A' }}</td>
                        <td>{{ $ca->pv_number ?? '-' }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
