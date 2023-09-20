@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">Setting <small>| Claim Date</small></h1>
        <div class="panel panel" id="eclaimDateJs">
            <div class="panel-body">
                <form id="submitForm">
                    <div class="">
                        <div class="row">
                            <h3>Claim Date Setting</h3>
                        </div>
                        <div class="row p-2">
                            <div class="col">
                                <div class="row p-2">
                                    <label for="submitClaim" class="col-sm-6 col-form-label">Submit Claim to Admin
                                        on Every :
                                        <i class="fa fa-question-circle" style="color:rgba(0, 81, 255, 0.904)" data-toggle="tooltipsubmitclaim"
                                            title="Setup the claim batch date that should be moved to Admin approver">
                                        </i>
                                    </label>
                                    <div class="col-sm-3">
                                        <select class="form-select" id="" name="submit_claim_day_admin">
                                            <option class="form-label" value="">Please Select</option>
                                            <?php $days = getDaysInMonth(); ?>
                                            @foreach ($days as $day)
                                            <option class="form-control"
                                            @if ($data)
                                                {{ $data->submit_claim_day_admin == $day ? 'selected' : '' }}
                                            @endif
                                            value="{{ $day }}">{{ $day }} hb</option>
                                            @endforeach
                                        </select>
                                        </div>
                                </div>
                                <br>
                                <div class="row p-2">
                                    <label for="expiredate" class="col-sm-6 col-form-label">Open Claim Duration <i class="fa fa-question-circle" style="color:rgba(0, 81, 255, 0.904)"
                                            data-toggle="tooltipexpiredate" title="User can decide duration to open claim
                            "></i></label>
                            <div class="col-sm-3">
                                <select class="form-select" id="" name="open_claim_duration">
                                    <option class="form-label" value="">Please Select</option>
                                    <?php $noMonths = getNumberMonth(); ?>
                                    @foreach ($noMonths as $noMonth)
                                    <option class="form-control"
                                    @if ($data)
                                        {{ $data->open_claim_duration == $noMonth ? 'selected' : '' }}
                                    @endif
                                    value="{{ $noMonth }}">{{ $noMonth }} Month</option>
                                    @endforeach
                                </select>
                                </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row p-2">
                                    <label for="claimfinance" class="col-sm-6 col-form-label">Submit Claim to
                                        Finance on Every: <i class="fa fa-question-circle" style="color:rgba(0, 81, 255, 0.904)" data-toggle="tooltipsubmitclaim"
                                            title="Setup the claim batch date that should be
                            moved to Finance approver
                            "></i></label>
                            <div class="col-sm-3">
                                <select class="form-select" id="" name="submit_claim_day_finance">
                                    <option class="form-label" value="">Please Select</option>
                                    <?php $days = getDaysInMonth(); ?>
                                    @foreach ($days as $day)
                                    <option class="form-control"
                                    @if ($data)
                                        {{ $data->submit_claim_day_finance == $day ? 'selected' : '' }}
                                    @endif
                                    value="{{ $day }}">{{ $day }} hb</option>
                                    @endforeach
                                </select>
                                </div>
                                </div>
                                <br>
                                <div class="row p-2">
                                    <label for="claimsubmit" class="col-sm-6 col-form-label">Table List Display:
                                        <i class="fa fa-question-circle" style="color:rgba(0, 81, 255, 0.904)" data-toggle="tooltipclaimsubmit"
                                            title="Number of row will be display on user claim page"></i></label>
                                        <div class="col-sm-3">
                                        <select class="form-select" id="" name="table_row_display">
                                            <option class="form-label" value="">Please Select</option>
                                            <?php $rows = getDisplayRow(); ?>
                                            @foreach ($rows as $row)
                                            <option class="form-control"
                                            @if ($data)
                                                {{ $data->table_row_display == $row ? 'selected' : '' }}
                                            @endif
                                            value="{{ $row }}">{{ $row }} row</option>
                                            @endforeach
                                        </select>
                                        </div>
                                </div>
                            </div>
                            
                        </div>
                        <!-- /////////////////////////////////////// -->
                        <div class="row p-2">
                            <div class="col">
                                <div class="row p-2">
                                    <label for="submitClaim" class="col-sm-6 col-form-label">Number Of Appeal Limit
                                        
                                    </label>
                                    <div class="col-sm-3">
                                        <select class="form-select" id="" name="appeal_limit">
                                            <option class="form-label" value="">Please Select</option>
                                            <?php $rows = getAppealLimit(); ?>
                                            @foreach ($rows as $row)
                                            <option class="form-control"
                                            @if ($data)
                                                {{ $data->appeal_limit == $row ? 'selected' : '' }}
                                            @endif
                                            value="{{ $row }}">{{ $row }} Times</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row p-2">
                                    <label for="expiredate" class="col-sm-6 col-form-label">Laundry Allowable ( Period of stays) </label>
                                        <div class="col-sm-3">
                                            <select class="form-select" id="" name="laundry">
                                                <option class="form-label" value="">Please Select</option>
                                                <?php $rows = getLaundry(); ?>
                                                @foreach ($rows as $row)
                                                <option class="form-control"
                                                @if ($data)
                                                    {{ $data->laundry == $row ? 'selected' : '' }}
                                                @endif
                                                value="{{ $row }}">{{ $row }} Days</option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="row p-2">
                                    <label for="claimfinance" class="col-sm-6 col-form-label">Duration Appeal Limit</label>
                            <div class="col-sm-3">
                                    <select class="form-select" id="" name="duration_appeal">
                                        <option class="form-label" value="">Please Select</option>
                                        <?php $rows = getDurationAppeal(); ?>
                                        @foreach ($rows as $row)
                                        <option class="form-control"
                                        @if ($data)
                                            {{ $data->duration_appeal == $row ? 'selected' : '' }}
                                        @endif
                                        value="{{ $row }}">{{ $row }} Months</option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col align-self-start">
                            <a href="/setting" class="btn btn-light" style="color: black" type="submit" name="" id=""><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <button class="btn btn-light" id="submitButton" type="submit" style="color: black" name="" id=""><i class="fa fa-save"></i> Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
