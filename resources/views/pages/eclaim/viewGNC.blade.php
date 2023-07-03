@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">eClaim <small>| My Claim | View General Claim </small></h1>
        <div class="panel panel" id="viewGNSJs">
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
                                    <input type="text" value="GNC {{ $GNC->claim_id }}" class="form-control"readonly>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label col-form-label">Claim Type :</label>
                                </div>
                                <div class="col-md-4">
                                    <input readonly type="text" class="form-control" value="{{ $GNC->claim_type }}">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-2">
                                    <label class="form-label col-form-label">Status :</label>
                                </div>
                                <div class="col-md-4">
                                    <input readonly type="text" class="form-control" value="{{ $GNC->status }}">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label col-form-label">Total Amount :</label>
                                </div>
                                <div class="col-md-4">
                                    <input readonly type="text" class="form-control" value="MYR {{ $GNC->total_amount }}">
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
                                        @if ($details)
                                            @foreach ($details as $detail)
                                                <tr>
                                                    <td><a data-bs-toggle="modal" id="buttonView" data-id="{{ $detail->id }}" class="btn btn-primary btn-sm">View</a></td> 
                                                    <td>{{ date('Y-m-d', strtotime($detail->applied_date)) }}</td>
                                                    <td>{{ $detail->claim_catagory }}</td>
                                                    <td>MYR {{ $detail->amount }}</td>
                                                    <td>{{ $detail->desc }}</td>
                                                    <td>
                                                    @if(!empty($detail->file_upload))
                                                    @php
                                                    $filenames = explode(',', $detail->file_upload);
                                                    @endphp
                                                    @foreach($filenames as $filename)
                                                    <a href="/storage/GeneralFile/{{ $filename }}" target="_blank">{{ $filename }}</a><br>
                                                    @endforeach
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="row p-2"> </div>
                        </div>
                    </div>
                    @include('pages.eclaim.GNCHistory')
                </div>
            </div>
            <div class="row p-2">
                <div class="col align-self-start">
                    <a href="/myClaimView" class="btn btn-light" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>
        @include('modal.eclaim.viewGNC')
    </div>
    
@endsection
