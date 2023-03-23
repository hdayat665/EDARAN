@extends('layouts.dashboardTenant')
@section('content')
    <style>
        .modal {
            z-index: 9999;
        }
    </style>
    <div id="content" class="app-content">
        <h1 class="page-header">Setting <small> | eClaim | General </small></h1>
        <form id="generalForm">
            <div class="panel panel" id="eclaimGenearalJs">
                <div class="panel-body">
                    <div class="form-control">
                        <h3>Claim Settings</h3>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <h5>Notify approver when a claim is submitted ?</h5>
                                <div class="col-sm-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" value="1" {{ $general ? ($general->notify_user ? 'checked' : '') : '' }} type="checkbox" name="general_setting[notify_user]"
                                            role="switch" id="set-main">
                                        <input type="hidden" id="notify_user" name="general_setting[notify_user]" value="{{$general->notify_user}}">
                                        <input type="hidden" name="general_id" value="{{ $general->id ?? '' }}">
                                        <label class="form-check-label" for="set-main">Send notification
                                            email</label>
                                        <i class="fa fa-question-circle" style="color:rgba(0, 81, 255, 0.904)" data-toggle="tooltipapproverapprover"
                                            title="When this setting is on, approver will receive an email whenever a claim is submitted."></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h5>Disable user request ?</h5>
                                <div class="col-sm-6">
                                    <div class="form-check form-switch">
                                    <input class="form-check-input" {{ $general ? ($general->disable_user ? 'checked' : '') : '' }} type="checkbox" name="general_setting[disable_user]" role="switch" id="set-main1" value="1">
                                        <input type="hidden" id="disable_user" name="general_setting[disable_user]" value="{{$general->disable_user}}">

                                        <label class="form-check-label" for="set-main1">Disable user request
                                            ?</label>
                                        <i class="fa fa-question-circle" style="color:rgba(0, 81, 255, 0.904)" data-toggle="tooltipdisableuser"
                                            title="When this setting is on,users are unable to submit their claim&#010;e.g System on maintenance"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="panel-body">
                    <div class="form-control">
                        <h3>Cash Advance Settings</h3>
                        <br>
                        <div class="row">
                            <label for="maximumpaidout" class="col-sm-3 col-form-label">Maximum Paid
                                Out(%)*</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" value="{{ $general->max_paid_out ?? '' }}" name="general_setting[max_paid_out]" id="maximum_paidout" value="75">
                            </div>
                        </div>
                        <br>
                        <h5>Subsistence Allowence</h5>
                        <br>
                        <button type="button" class="btn btn-white mt-3 mb-3" id="addModalButton"><i class="fa fa-plus"></i>
                            Area</button>
                        <div class="col-sm-6">
                            <table id="tableSaveArea" class="table table-striped table-bordered align-middle">
                                <thead>
                                    <tr>
                                        <th data-orderable="false">Action</th>
                                        <th class="text-nowrap">Area</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($subsistances)
                                        @foreach ($subsistances as $subsistance)
                                            <tr>
                                                <td><a class="btn btn-primary btn-xs" data-id="{{ $subsistance->id }}" id="editModalButton">Edit
                                                    </a>
                                                    &nbsp;
                                                    <a class="btn btn-danger btn-xs" data-id="{{ $subsistance->id }}" id="deleteButton">Delete
                                                    </a>
                                                </td>
                                                <td>
                                                    <input type="hidden" name="subs_id[]" value="{{ $subsistance->id }}">
                                                    {{ $subsistance->area_name }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <br>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col align-self-start">
                            <a href="/setting" class="btn btn-light" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <button class="btn btn-light" style="color: black" type="submit" id="generalButton"><i class="fa fa-save"></i>
                                Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    @include('modal.setting.eclaim.editSubsistence')

    @include('modal.setting.eclaim.addSubsistence')
@endsection
