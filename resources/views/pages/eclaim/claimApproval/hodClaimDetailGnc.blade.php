@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">eClaim <small>| Claim Approval | Head of Department | View General Claim </small></h1>
        <div class="panel panel" id="hodClaimDetailJs">
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
                                            <th class="text-nowrap">Applied Date</th>
                                            <th class="text-nowrap">Claim Category</th>
                                            <th class="text-nowrap">Amount</th>
                                            <th class="text-nowrap">Description</th>
                                            <th class="text-nowrap">Attachment</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($gncs)
                                            @foreach ($gncs as $gnc)
                                                <tr>
                                                    <td><a data-bs-toggle="modal" data-id="{{ $gnc->id }}" id="gnc_detail" class="btn btn-primary btn-sm">View</a></td>
                                                    <td>{{ $gnc->created_at ?? '-' }}</td>
                                                    <td>{{ $gnc->claim_category ?? '-' }}</td>
                                                    <td>{{ $gnc->amount ?? '-' }}</td>
                                                    <td>{{ $gnc->desc ?? '-' }}</td>
                                                    <td>{{ $gnc->file_upload ?? '-' }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="row p-2">

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
                        <a href="/claimapproval/supervisor" class="btn btn-light" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <a class="btn btn-secondary" data-id="{{ $general->id }}" style="color: black" type="submit"> Cancel</a> &nbsp;
                        <a href="javascript:;" class="btn btn-warning" style="color: black" data-bs-toggle="modal" data-bs-target="#modalamend">Amend</a> &nbsp;
                        <a href="javascript:;" class="btn btn-danger" style="color: black" data-bs-toggle="modal" data-bs-target="#modalreject"> Reject</a> &nbsp;
                        <a class="btn btn-lime" id="approveButton" data-id="{{ $general->id }}" style="color: black" type="submit"> Approve</a>
                    </div>
                </div>
            </div>

        </div>
        {{-- @include('modal.eclaimApproval.hodDetailMtcModal') --}}
        @include('modal.eclaimApproval.hodDetailGncModal')
    @endsection
