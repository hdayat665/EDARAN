@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">eClaim <small>| Finance Checker | View Cash Advance | Others ( Non-Outstation )</small></h1>
        <div class="panel panel" id="fcheckerDetailJs">
            <div class="panel-body">
                <div class="row p-2">
                    <div class="col-md-7">
                        <div class="form-control">
                            <div class="row p-2">
                                <h4>Cash Advance Information</h4>
                            </div>

                            <div class="row p-2">
                                <div class="col-md-3">
                                    <label class="form-label col-form-label">Type of Cash Advance :</label>
                                </div>
                                <div class="col-md-9">
                                    <input readonly type="text" class="form-control" value="{{ getCashAdvanceType($ca->type) ?? '-' }}">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-3">
                                    <label class="form-label col-form-label">Cash Advance ID:</label>

                                </div>
                                <div class="col-md-9">
                                    <input readonly type="text" class="form-control" value="CA-{{ $ca->id ?? '-' }}">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-3">
                                    <label class="form-label col-form-label">Claim Type :</label>
                                </div>
                                <div class="col-md-9">
                                    <input readonly type="text" class="form-control" value="Cash Advances">
                                </div>
                            </div>

                            <div class="row p-2">
                                <div class="col-md-3">
                                    <label class="form-label col-form-label">Date of Cash Required :</label>

                                </div>
                                <div class="col-md-9">
                                    <input readonly type="text" class="form-control" value="{{ $ca->date_require_cash ?? '-' }}">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-3">
                                    <label class="form-label col-form-label">Purpose :</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea type="text" readonly class="form-control" rows="3" maxlength="255">{{ $ca->purpose ?? '-' }}</textarea>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-3">
                                    <label class="form-label col-form-label">Amount :</label>

                                </div>
                                <div class="col-md-9">
                                    <input readonly type="text" class="form-control" value="{{ $ca->amount ?? '-' }}">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-3">
                                    <label class="form-label col-form-label">Supporting Document :</label>
                                </div>
                                <div class="col-md-9">
                                    <input readonly type="text" class="form-control" value="{{ $ca->file_upload ?? '-' }}">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-3">
                                    <label class="form-label col-form-label">Checker :</label>
                                </div>
                                <div class="col-md-9">
                                    <table class="table table-striped table-bordered align-middle">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Checker</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><button type="button" class="btn btn-lime" id="checked" data-id="{{ $ca->id }}" data-stage="{{ $check }}">Check</button></td>
                                                <td>
                                                    <input type="checkbox" {{ $ca->f1 == 'check' ? 'checked' : '' }} class="form-check-input" disabled /> &nbsp;
                                                    <input type="checkbox" {{ $ca->f2 == 'check' ? 'checked' : '' }} class="form-check-input" disabled /> &nbsp;
                                                    <input type="checkbox" {{ $ca->f3 == 'check' ? 'checked' : '' }} class="form-check-input" disabled />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-5">

                        <div class="form-control">
                            <div class="row p-2">
                                <h4>Cash Advance History</h4>
                                <div class="card-body">
                                    <div class="container">
                                        <ul class="timeline-with-icons">
                                            <li class="timeline-item mb-5 ">
                                                <div class="card bg-white">
                                                    <div class="row p-2">
                                                        <div class="col-md-2">
                                                            <i class="fas fa-circle-plus text-primary fa-xl fa-fw"></i>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <p class="fw-bold">Siti Sarah Submitted claim</p>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <p class="text-muted mb-2 fw-bold">01/03/2022</p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p class="text-muted">10:24 AM</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> -->

                </div>
            </div>
            <div class="row p-2">
                <div class="col align-self-start">
                    <a href="#" onclick="window.history.back();" class="btn btn-light" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <div class="col d-flex justify-content-end">
                    @if ( $ca->f_status != 'recommend')
                        @if ($ca->pv_number != '')
                            <!-- The pv_number is not null, so hide all buttons -->
                        @else
                            <!-- The pv_number is null, so show the buttons as before -->
                            @if ($ca->f1 == 'check' && $ca->f2 == 'check' && $ca->f3 == 'check')
                                <!-- All checkboxes are checked, so hide the Amend and Reject buttons -->
                            @else
                                <!-- At least one checkbox is not checked, so show the Amend and Reject buttons -->
                                <a class="btn btn-secondary" style="color: black" type="submit"> Cancel</a> &nbsp;
                                <a href="javascript:;" class="btn btn-warning" style="color: black" data-bs-toggle="modal" data-bs-target="#modalamend">Amend</a> &nbsp;
                                <a href="javascript:;" class="btn btn-danger" style="color: black" data-bs-toggle="modal" data-bs-target="#modalreject"> Reject</a> &nbsp;
                            @endif

                            @if ($checkers == 'f1')
                                <a class="btn btn-lime" id="approveButton1" data-id="{{ $ca->id }}" style="color: black" type="submit"> Approve</a>
                            @endif
                            <!-- @if (($ca->f1 == 'check' && $ca->f2 == 'check') || ($ca->f1 == 'check' && $ca->f3 == 'check') || ($ca->f2 == 'check' && $ca->f3 == 'check'))
                                @if ($checkers == 'f1')
                                    <a class="btn btn-lime" id="approveButton1" data-id="{{ $ca->id }}" style="color: black" type="submit"> Approve</a>
                                @endif
                            @endif -->
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('modal.eclaimApproval.cashAdvance.onoFchecker')
@endsection
