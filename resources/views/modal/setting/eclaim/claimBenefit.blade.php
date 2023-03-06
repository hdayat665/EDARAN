<div class="modal fade" id="claimBenefit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Claim Benefit</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tableSaveArea" class="table table-striped table-bordered align-middle">
                    <thead>
                        <tr>
                            <th class="text-nowrap">No</th>
                            <th class="text-nowrap">Area</th>
                            <th class="text-nowrap">Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($claimCategorys)
                            <?php $no = 1; ?>
                            @foreach ($claimCategorys as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->claim_catagory ?? '-' }}</td>
                                    <td>{{ $data->claim_value ?? '-' }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
