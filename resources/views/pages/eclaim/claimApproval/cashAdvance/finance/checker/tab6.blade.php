<div class="tab-pane fade show" id="default-tab-6">
    <!-- {{-- claim approval --}} -->
    <table id="tableprocess" class="table table-striped table-bordered align-middle">
        <thead>
            <tr>
                <th data-orderable="false">No</th>
                <th class="text-nowrap">Cash Advance ID</th>
                <th class="text-nowrap">Employee Name</th>
                <th class="text-nowrap">Type of Cash Advance</th>
                <th data-orderable="false">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            @foreach ($cas as $ca)
                @if ($ca->f_approver == 'recommend' && $ca->pv_number == '')
                    <tr>
                        <td>{{ $no++ }}</td>
                        
                        <td>CA-{{ $ca->id }}</td>
                        <td>{{ $ca->userProfile->fullName ?? '-' }}</td>
                        <td>{{ getCashAdvanceType($ca->type) ?? '-' }}</td>
                        <td>
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu">
                                <a href="/cashAdvanceFcheckerDetail/{{ $ca->type }}/{{ $ca->id }}" id="" data-id="" class="dropdown-item"><i class="fa fa-eye"
                                        aria-hidden="true"></i> View</a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:;" id="generatePv" data-id="{{ $ca->id }}" class="dropdown-item"><i class="fa fa-check" aria-hidden="true"></i> Generate PV </a>
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
