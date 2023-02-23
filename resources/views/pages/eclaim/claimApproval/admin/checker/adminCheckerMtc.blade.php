@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">eClaim <small>| Claim Approval | Admin Checker | View Monthly Claim </small></h1>
        <div class="panel panel" id="adminCheckerMtcJs">
            <div class="panel-body">
            <div class="row p-2">
                <div class="col-md-7">
                    <div class="form-control">
                        <div class="row p-2">
                            <h4>Claim Information</h4>
                        </div>

                        <div class="row p-2">
                            <div class="col-md-2">
                                <label class="form-label col-form-label">Claim ID :</label>
                            </div>
                            <div class="col-md-4">
                                <input type="hidden" value="{{ $checkers }}" id="adminChecker">
                                <input readonly type="text" value="{{ $general->id ?? '-' }}" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label col-form-label">Claim Type :</label>

                            </div>
                            <div class="col-md-4">
                                <input readonly type="text" value="{{ $general->claim_type ?? '-' }}" class="form-control">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-2">
                                <label class="form-label col-form-label">Status :</label>
                            </div>
                            <div class="col-md-4">
                                <input readonly type="text" class="form-control" value="{{ $general->status ?? '-' }}">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label col-form-label">Total Amount :</label>

                            </div>
                            <div class="col-md-4">
                                <input readonly type="text" value="{{ $general->total_amount ?? '-' }}" class="form-control">
                            </div>
                        </div>
                        <div class="row p-2">
                            <table id="traveltable" class="table table-striped table-bordered align-middle">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>Checker</th>
                                        <th class="text-nowrap">Applied Date</th>
                                        <th class="text-nowrap">Claim Category</th>
                                        <th class="text-nowrap">Amount</th>
                                        <th class="text-nowrap">Description</th>
                                        <th class="text-nowrap">Attachment</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($personals)
                                        @foreach ($personals as $personal)
                                            <tr>
                                                <td><a data-bs-toggle="modal" data-id="{{ $personal->id }}" id="btn-view" class="btn btn-primary btn-sm">View</a></td>
                                                <td>
                                                    <input type="checkbox"{{ $personal->a1 == 'check' ? 'checked' : '' }} disabled class="form-check-input" name="" id="adddropdown" /> &nbsp;
                                                    <input type="checkbox" {{ $personal->a2 == 'check' ? 'checked' : '' }} disabled class="form-check-input" name="" id="adddropdown" /> &nbsp;
                                                    <input type="checkbox" {{ $personal->a3 == 'check' ? 'checked' : '' }} disabled class="form-check-input" name="" id="adddropdown" />
                                                </td>
                                                <td>{{ date('Y-m-d', strtotime($personal->created_at)) ?? '-' }}</td>
                                                <td>{{ $personal->claim_catagory_name ?? '-' }}</td>
                                                <td>{{ $personal->amount ?? '-' }}</td>
                                                <td>{{ $personal->claim_desc ?? '-' }}</td>
                                                <td><a href="/storage/{{ $personal->file_upload ?? '-' }}">{{ $personal->file_upload ?? '-' }}</a></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="row p-2">
                            <table id="claimtable" class="table table-striped table-bordered align-middle">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>Checker</th>
                                        <th class="text-nowrap">Travel Date</th>
                                        <th class="text-nowrap">Project Name</th>
                                        <th class="text-nowrap">Claim Category</th>
                                        <th class="text-nowrap">Amount</th>
                                        <th class="text-nowrap">Description</th>
                                        <th class="text-nowrap">Attachment</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($travels)
                                        @foreach ($travels as $travel)
                                            <tr>
                                                <td>
                                                    @if ($travel->parking)
                                                        <a data-bs-toggle="modal" data-id="{{ $travel->id }}" id="btn-view-claim" class="btn btn-primary btn-sm travel">View </a>
                                                    @else
                                                        <a data-bs-toggle="modal" data-id="{{ $travel->id }}" id="btn-view-subsistence" class="btn btn-primary btn-sm travel">View
                                                            </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <input type="checkbox"{{ $travel->a1 == 'check' ? 'checked' : '' }} disabled class="form-check-input" name="" id="adddropdown" /> &nbsp;
                                                    <input type="checkbox" {{ $travel->a2 == 'check' ? 'checked' : '' }} disabled class="form-check-input" name="" id="adddropdown" /> &nbsp;
                                                    <input type="checkbox" {{ $travel->a3 == 'check' ? 'checked' : '' }} disabled class="form-check-input" name="" id="adddropdown" />
                                                </td>
                                                <td>{{ $travel->travel_date ?? '-' }}</td>
                                                <td>{{ getProjectById($travel->project_id)->project_name ?? '-' }}</td>
                                                <td>{{ $travel->type_claim ?? '-' }}</td>
                                                <td>{{ $travel->total ?? '-' }}</td>
                                                <td>{{ $travel->desc ?? '-' }}</td>
                                                <td><a href="/storage/{{ $travel->file_upload ?? '-' }}">{{ $travel->file_upload ?? '-' }}</a></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">

                    <div class="form-control">
                        <div class="row p-2">
                            <h4>Claim History</h4>
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
                </div>
            </div>
            <div class="row p-2">
                <div class="col align-self-start">
                    <a href="/adminCheckerView" class="btn btn-light" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <div class="col d-flex justify-content-end">


                @if (($personal->a1 == 'check' && $personal->a2 == 'check') || ($personal->a1 == 'check' && $personal->a3 == 'check') || ($personal->a2 == 'check' && $personal->a3 == 'check'))
                    @if ($checkers == 'a1')
                        <a class="btn btn-lime" id="approveButton" data-id="{{ $general->id }}" style="color: black" type="submit">Approve</a>
                    @elseif ($checkers == 'a2' || $checkers == 'a3')
                        @if ($personal->a1 == 'check' && $personal->a2 == 'check' && $personal->a3 == 'check')
                            <div style="display: none;">
                        @endif
                        <a class="btn btn-secondary" style="color: black" type="submit">Cancel</a> &nbsp;
                        <a href="javascript:;" class="btn btn-warning" style="color: black" data-bs-toggle="modal" data-bs-target="#modalamend">Amend</a> &nbsp;
                        <a href="javascript:;" class="btn btn-danger" style="color: black" data-bs-toggle="modal" data-bs-target="#modalreject">Reject</a> &nbsp;
                        @if ($personal->a1 == 'check' && $personal->a2 == 'check' && $personal->a3 == 'check')
                            </div>
                        @endif
                    @endif
                @endif

                   
                </div>
            </div>
        </div>
    </div>
    @include('modal.eclaimApproval.adminCheckerMtcModal')
@endsection
