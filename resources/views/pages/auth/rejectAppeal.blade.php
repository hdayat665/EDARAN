@extends('layouts.login')

@section('content')
<div class="row bg-white " id="appealRejectmailJS" style="min-height:98vh ;">
    <div class="col-sm-6" style="display: flex; justify-content: center; align-items: center; height: 100vh; background-image: url(/assets/img/orbit/bh.png);background-repeat: no-repeat; background-size: cover;">
        <div class="mx-auto" style="width: 60rem;">
        <div class="text-center">
                <img src="/assets/img/orbit/orbithrm-logo1.png"  width="250rem" alt="Orbit" class="img-fluid">
            </div>
            <div class="text-center">
                <img src="/assets/img/orbit/meeting.png" width="500rem" alt="Orbit" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="col-sm-6" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div class="mx-auto" style="width: 30rem;">
            <div class="text-center">
                <img src="/assets/img/orbit/orbithrm-logo.png"  width="500rem" alt="Orbit" class="img-fluid">
            </div>        
            <h5 class="text-primary text-center">
                Streamline and automate HR processes with OrbitHRM
            </h5>
            @if ($appeal->status == "Rejected")
            <div class="card-body bg-white">
                Log Appeal has been Rejected. click <a href="/">here</a> to redirect to login page
            </div>
            @elseif ($appeal->status == "Locked")
            
            @endif

           @if($appeal->status != "Rejected")
           <div class="card-body bg-white">
            <div id="">
                <form id="reasonReject">
                    <div class="row p-2">
                        <div class="col">
                            <label class="form-label col-md-6">Log ID</label>
                            <input type="hidden" id="randomN" name="generaterandom" value="{{ $appeal->generaterandom ?? '' }}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="" name="" value="{{ $appeal->logid ?? '' }}" readonly />
                        </div>
                    </div>
                   
                    <div class="row p-2">
                        <div class="col">
                            <label class="form-label col-md-6">Reason of Rejection</label>
                        </div>
                        <div class="col">
                            <textarea class="form-control" id=""  name="reasonreject" rows="3" maxlength="225"></textarea>
                        </div>
                    </div>
                    <div class="row p-2 ">
                        <div class="modal-footer">
                            <button href="javascript:;" id="rejectAppealB" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
           @endif
    </div>
</div>


@endsection

