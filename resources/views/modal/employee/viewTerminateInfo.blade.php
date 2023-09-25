<div class="modal fade" id="viewTerminateInfo" tabindex="-1" aria-labelledby="viewTerminate" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <input type="hidden" id="idc" name="id" class="form-control" aria-describedby="lastname">

                    <p class="h6 p-2">Employee Infomation</p>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    Employee ID :
                                    <input type="text" readonly id="employeeId" name="" class="form-control" >

                                </div>
                                <div class="mb-3">
                                    Terminate Name :
                                    <input type="text" readonly id="employeeName" name="" class="form-control" >

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    Employee Email :
                                    <input type="text" readonly id="employeeEmail" name="" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    Report to :
                                    <input type="text" readonly id="report_to" name="" class="form-control" >
                                </div>
                            </div>
                            <hr class="border border-black border-bottom">

                            <p class="h6 p-2">Exit Form</p>
                            <div class="row p-2">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        Exit Date* :
                                        <input type="text" readonly id="effectiveFrom" name="" class="form-control" >
                                    </div>
                                    </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        Exit Type* :
                                        <input type="text" readonly id="employmentDetail" name="" class="form-control" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                Remarks :
                                <textarea  rows="4" cols="50" readonly id="remarks" name="" class="form-control" ></textarea>
                            </div>
                            <div class="col-sm-12 mt-3">
                                {{-- [Web Pilot Test] HRIS - Exit Employee - Error data retrieved --}}
                                {{-- Attachments* : <br/> --}}
                                {{-- Click <span id="attachment"></span> to see attachments. --}}
                                {{-- <span id="attachment"></span> --}}
                                {{-- @if ($details)
                                @foreach ($details as $detail)
                                @if(!empty($detail->file_upload))
                                            @php
                                            $filenames = explode(',', $detail->file_upload);
                                            @endphp
                                            @foreach($filenames as $filename)
                                            <a href="/storage/GeneralFile/{{ $filename }}" target="_blank">{{ $filename }}</a><br>
                                            @endforeach
                                @endif
                                @endforeach
                                @endif --}}
                                <div class="mb-3">
                                    Attachments* : <br/>
                                    Click <a id="attachment"></a> to see attachment.
                                </div>

                            </div>
                        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
