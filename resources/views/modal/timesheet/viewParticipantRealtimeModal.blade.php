<div class="modal fade" id="modalparticipant" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                @foreach ($events as $event)
    <h5 class="modal-title" id="">{{ $event->event_name }}</h5>
@endforeach
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="">
                    <div class="row p-2">
                        <table id="tableviewparticipant" class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">No</th>
                                    <th class="text-nowrap">Participants</th>
                                </tr>
                            </thead>
                            <tbody id="tableRowParticipant">

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
