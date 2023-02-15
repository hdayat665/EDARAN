<div class="tab-pane fade show" id="default-tab-3">
    {{-- claim approval --}}
    <table id="pvtable" class="table table-striped table-bordered align-middle">
        <thead>
            <tr>
                <th data-orderable="false">Action</th>
                <th class="text-nowrap">Claim ID</th>
                <th class="text-nowrap">Employee Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($claims as $claim)
                {{-- @if ($claim->f_approval == 'recommend') --}}
                <tr>
                    <td>
                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i class="fa fa-caret-down"></i></a>
                        <div class="dropdown-menu">
                            <a href="javascript:;" id="" data-id="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalpv"><i class="fa fa-bill" aria-hidden="true"></i>
                                Generate PV</a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:;" id="" data-id="" class="dropdown-item"><i class="fa fa-times" aria-hidden="true"></i> Close</a>
                        </div>
                    </td>
                    <td>{{ $claim->id }}</td>
                    <td>{{ $claim->userProfile->fullName ?? '-' }}</td>
                </tr>
                {{-- @endif --}}
            @endforeach

        </tbody>
    </table>
</div>
