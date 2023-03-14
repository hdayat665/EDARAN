@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">eClaim <small>| My Claim | Update General Claim</small></h1>
        <div class="panel panel" id="editGNCJs">
            <div class="panel-body">
                <div class="row p-2">
                    <div class="col-md-6">
                        <form id="updateForm">
                            @csrf
                            <div class="form-control">
                                <div class="row p-2">
                                    <div class="col-md-3">
                                        <label class="form-label">Claim ID</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input readonly type="text" value="{{ $GNC->claim_id }}" name="claim-id" class="form-control">
                                        <input type="hidden" id="idG" value="{{ $GNC->id }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Claim Type</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input readonly type="text" name="claim_type" value="GNC" class="form-control">
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-md-3">
                                        <label class="form-label">Status</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input readonly type="text" value="{{ $GNC->status }}" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Total Amount</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input readonly type="text" value="{{ $GNC->total_amount }}" class="form-control">
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <br>
                                </div>
                                <div class="form-control">
                                    <div class="row p-2">
                                        <div class="col-md-3">
                                            <label class="form-label">Year</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select class="form-select" name="year" style="pointer-events:none;background:#e9ecef;">
                                                <option class="form-label" value="" selected>Please Select
                                                </option>
                                                <?php $years = year(); ?>
                                                @foreach ($years as $year => $data)
                                                    <option class="form-label" {{ $GNC->year == $year ? 'selected' : '' }} value="{{ $year }}">{{ $year }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-3">
                                            <label class="form-label">Month</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select class="form-select" name="month" style="pointer-events:none;background:#e9ecef;">
                                                <option class="form-label" value="" selected>Please Select
                                                </option>
                                                <?php $months = month(); ?>
                                                @foreach ($months as $month => $data)
                                                    <option class="form-label" {{ $GNC->month == $data ? 'selected' : '' }} value="{{ $data }}">{{ $data }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-3">
                                            <label class="form-label">Applied Date</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="input-group" id=""> 
                                                <input type="text" name="applied_date" class="form-control" disabled value="{{ date('Y-m-d', strtotime($GNC->created_at))  }}" id="udatepicker" />
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-3">
                                            <label class="form-label">Claim Category</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select class="form-select" id="claimcategory" name="claim_category">
                                                <option class="form-label" value="Please Select" selected>Please
                                                    Select</option>
                                                {{ $categorys = getClaimCategory() }}
                                                @foreach ($categorys as $category)
                                                    <option value="{{ $category->id }}">{{ $category->claim_catagory }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-3">
                                            <label class="form-label" id="label"></label>
                                        </div>
                                        <div class="col-md-9">
                                            <select class="form-select" id="contentLabel" name="claim_category_detail">
                                                <option class="form-label" value="Please Select" selected>Please
                                                    Select</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-3">
                                            <label class="form-label">Amount (MYR)</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="number" name="amount" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-3">
                                            <label class="form-label">Description</label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-3">
                                            <label class="form-label">Supporting Document</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="file" name="file_upload" class="form-control-file" id="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="modal-footer"> <button type="button" class="btn btn-secondary">Reset</button>
                                        <button type="submit" id="updateButton" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="form-control">
                            <table id="applyclaimtable" class="table table-striped table-bordered align-middle">
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
                                                <td><a data-bs-toggle="modal" id="deleteButton" data-id="{{ $detail->id }}" class="btn btn-primary btn-sm">Delete</a></td>
                                                <td>{{ date('Y-m-d', strtotime($GNC->created_at))   }}</td> 
                                                <td>{{ $detail->claim_catagory ?? $detail->claim_category }}</td>
                                                <td>{{ $detail->amount }}</td>
                                                <td>{{ $detail->desc }}</td>
                                                <td> <a href="/storage/{{ $detail->file_upload }}">{{ $detail->file_upload }}</a></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-2">
                <div class="col align-self-start">
                    <a href="/myClaimView" class="btn btn-light" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-light" style="color: black" type="submit" id="submitButton" data-id="{{ $GNC->id }}"><i class="fa fa-save"></i>
                        Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection
