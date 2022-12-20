@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">Setting <small> | eClaim | General </small></h1>
        <div class="panel panel">
            <div class="panel-body">
                <div class="form-control">
                    <h3>Claim Settings</h3>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <h5>Notify approver when a claim is submitted ?</h5>
                            <div class="col-sm-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="mainCompanion" type="checkbox" role="switch"
                                        id="set-main" checked>
                                    <label class="form-check-label" for="set-main">Send notification
                                        email</label>
                                    <i class="fa fa-question-circle" style="color:rgba(0, 81, 255, 0.904)"
                                        data-toggle="tooltipapproverapprover"
                                        title="When this setting is on, approver will receive an email whenever a claim is submitted."></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <h5>Disable user request ?</h5>
                            <div class="col-sm-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="mainCompanion" type="checkbox" role="switch"
                                        id="set-main1" checked>
                                    <label class="form-check-label" for="set-main1">Disable user request
                                        ?</label>
                                    <i class="fa fa-question-circle" style="color:rgba(0, 81, 255, 0.904)"
                                        data-toggle="tooltipdisableuser"
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
                    <form>
                        <div class="row">
                            <label for="maximumpaidout" class="col-sm-3 col-form-label">Maximum Paid
                                Out(%)*</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="maximumpaidout" id="maximum_paidout"
                                    value="75">
                            </div>
                        </div>
                    </form> <br>
                    <h5>Subsistence Allowence</h5>
                    <br>
                    <button type="button" class="btn btn-white mt-3 mb-3" data-bs-toggle="modal" id="myModal1"
                        data-bs-target="#addarea"><i class="fa fa-plus"></i> Area</button>
                    <div class="col-sm-6">
                        <table id="tableSaveArea" class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th data-orderable="false">Action</th>
                                    <th class="text-nowrap">Area</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr> </tr>
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col align-self-start">
                        <a href="/setting" class="btn btn-light" style="color: black;" type="submit"><i
                                class="fa fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <button class="btn btn-light" style="color: black" type="submit"><i class="fa fa-save"></i>
                            Save</button>
                    </div>
                </div>
                <!-- Modal add subsitence -->
                <div class="modal fade" id="addarea" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add Area</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row mb-3">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Area*</label><br>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="Area" value="">
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" id="saveArea" class="btn btn-primary" data-bs-dismiss="modal"> Save
                                changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Modal update subsistence -->
        <div class="modal fade" id="updatearea" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Update Area</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Area*</label><br>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="" value="">
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
