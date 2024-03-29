@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">eClaim <small>| My Claim | Update Monthly Claim</small></h1> <!-- END page-header -->
        <div class="panel panel" id="monthlyClaimJs">
            <div class="panel-body">
                <div class="row p-2">
                    <div class="col-md-12">
                        <div class="">
                            <div class="row p-2">
                                <div class="col-md-6">
                                    <div class="form-control">
                                        <div class="row p-2">
                                            <div class="col-md-3">
                                                <label class="form-label">Year</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input readonly type="text" value="{{ $GNC->year }}" name="claim-id" class="form-control">
                                                <input type="hidden" id="idG" value="{{ $GNC->id }}">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Claim ID</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input readonly type="text" value="{{ $GNC->claim_id }}" name="claim-id" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row p-2">
                                            <div class="col-md-3">
                                                <label class="form-label">Month</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input readonly type="text" value="{{ $GNC->month }}" name="claim-id" class="form-control">
                                                
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Claim Type</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input readonly type="text" value="{{ $GNC->claim_type }}" name="claim_type" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row p-2">
                                            <div class="col-md-3">
                                                <label class="form-label">Status</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input readonly type="text" value="{{ $GNC->status }}" name="claim-id" class="form-control">
                                                
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row p-2">
                                        <div class="col d-flex justify-content-end">
                                            <input type="hidden" value="{{ Request::segment(4) }}" id="generalId">
                                            <button class="btn btn-light" id="editSubmitButton" style="color: black" type="submit">
                                                Submit</button> 
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col d-flex justify-content-end">
                                            <a href="/myClaimView" class="btn btn-light" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="p-2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row p-2">
                                            <div class="col-md-6">
                                                <label class="form-label">Travelling</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" readonly value='RM {{ number_format($totalcarmotor ?? 0, 2) }}'>
                                            </div>
                                        </div>
                                        <div class="row p-2">
                                            <div class="col-md-6">
                                                <label class="form-label">Petrol/Fare</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" readonly value='RM {{ number_format($summaryTravelling[0]->total_petrol ?? 0, 2) }}'>
                                            </div>
                                        </div>
                                        <div class="row p-2">
                                            <div class="col-md-6">
                                                <label class="form-label">Toll</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" readonly value='RM {{ number_format($summaryTravelling[0]->total_toll ?? 0, 2) }}'>
                                            </div>
                                        </div>
                                        <div class="row p-2">
                                            <div class="col-md-6">
                                                <label class="form-label">Parking</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" readonly value='RM {{ number_format($summaryTravelling[0]->total_parking ?? 0, 2) }}'>
                                            </div>
                                        </div>
                                        <div class="row p-2">
                                            <div class="col-md-6">
                                                <label class="form-label">Subsistence Allowance</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" readonly value='RM {{ number_format($summarySubs[0]->total_subs ?? 0, 2) }}'>
                                            </div>
                                        </div>
                                        <div class="row p-2">
                                            <div class="col-md-6">
                                                <label class="form-label">Accommodation & Lodging</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" readonly value='RM {{ number_format($summarySubs[0]->total_acc ?? 0, 2) }}'>
                                            </div>
                                        </div>
                                        <div class="row p-2">
                                            <div class="col-md-6">
                                                <label class="form-label">Laundry</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" readonly value='RM {{ number_format($summarySubs[0]->total_laundry ?? 0, 2) }}'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row p-2">
                                            <div class="col-md-6">
                                                <label class="form-label">Others</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" readonly value='RM {{ number_format($summaryOthers[0]->total_amount ?? 0, 2) }}'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row p-2">
                                            <div class="col-md-6">
                                                <label class="form-label">Total</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" readonly value='RM {{ number_format($sum ?? 0, 2) }}'>
                                            </div>
                                        </div>
                                        <div class="row p-2">
                                            <div class="col-md-6">
                                                <label class="form-label">Cash Advance (Less) <a href="#" id="viewCaBtn">View</a></label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" readonly value='RM {{ number_format($cashAdvance ?? 0, 2) }}'>
                                            </div>
                                        </div>
                                        <div class="row p-2">
                                            <div class="col-md-6">
                                                <label class="form-label">Balance Due to/(From) Employee</label>
                                            </div>
                                            <div class="col-md-6">
                                                <form id="balance">
                                                    <input type="text" class="form-control" readonly value='RM {{ number_format($balance ?? 0, 2) }}'>
                                                    <input type="hidden" name="amount" id="balanceValue" value="{{ number_format($balance ?? 0, 2) }}">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row p-2">
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
                                    <input readonly type="text" value="{{ $GNC->claim_type }}" name="claim_type" class="form-control">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-3">
                                    <label class="form-label">Status</label>
                                </div>
                                <div class="col-md-3">
                                    <input readonly type="text" value="Draft"class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Total Amount</label>
                                </div>
                                <div class="col-md-3">
                                    <input readonly type="text" value="{{ $GNC->total_amount }}" name="claim_type" class="form-control">
                                </div>
                            </div> -->
                            </div> 
                            <div class="row p-2">
                                <br>
                            </div>
                            @include('pages.eclaim.accordianMonthlyClaim')
                        </div>
                   
                    <div class="row p-2">
                                <br>
                            </div>
                    <div class="col-md-12">
                        @include('pages.eclaim.tableListMonthlyClaim')
                    </div>
                </div>
            </div>
            <!-- <div class="row p-2">
                <div class="col align-self-start">
                    <a href="/myClaimView" class="btn btn-light" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <div class="col d-flex justify-content-end">
                    <input type="hidden" value="{{ Request::segment(4) }}" id="generalId">
                    <button class="btn btn-light" id="editSubmitButton" style="color: black" type="submit"><i class="fa fa-save"></i>
                        Submit</button>
                </div>
            </div> -->
        </div>
    </div>
@endsection
