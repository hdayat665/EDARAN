@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">Setting | Approval Configuration</h1>
        <div class="row">
            <div class="col-xl-15">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#default-tab-1" data-bs-toggle="tab" class="nav-link active">
                            <span class="d-sm-none">Tab 1</span>
                            <span class="d-sm-block d-none">Monthly Claim</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#default-tab-2" id="tab2" data-bs-toggle="tab" class="nav-link">
                            <span class="d-sm-none">Tab 2</span>
                            <span class="d-sm-block d-none">General Claim</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#default-tab-3" id="tab3" data-bs-toggle="tab" class="nav-link">
                            <span class="d-sm-none">Tab 3</span>
                            <span class="d-sm-block d-none">Cash Advance</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content panel m-0 rounded-0 p-3">
                    <div class="tab-pane fade active show" id="default-tab-1">
                        <div class="panel-body">
                            <table id="table-monthly" class="table table-bordered align-middle">
                                <thead>
                                    <tr>
                                        <th width="1%">&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th colspan="5">&nbsp;</th>
                                        <th colspan="4" style="text-align: center">CHECKER 1</th>
                                        <th colspan="4" style="text-align: center">CHECKER 2</th>
                                        <th colspan="4" style="text-align: center">CHECKER 3</th>
                                    </tr>
                                    <tr>
                                        <th>NO</th>
                                        <th style="width:180px;text-align: center;">ROLE</th>
                                        <th style="text-align: center">ACTIVE</th>
                                        <th style="text-align: center">APPROVE</th>
                                        <th style="text-align: center">REJECT</th>
                                        <th style="text-align: center">AMEND</th>
                                        <th style="text-align: center">CANCEL</th>
                                        <th style="text-align: center">CHECK</th>
                                        <th style="text-align: center;">GENERATE&nbsp;PV</th>
                                        <th style="text-align: center">PAYMENT</th>
                                        <th style="text-align: center">PAID</th>
                                        <th style="text-align: center">CHECK</th>
                                        <th style="text-align: center">GENERATE&nbsp;PV</th>
                                        <th style="text-align: center">PAYMENT</th>
                                        <th style="text-align: center">PAID</th>
                                        <th style="text-align: center">CHECK</th>
                                        <th style="text-align: center">GENERATE&nbsp;PV</th>
                                        <th style="text-align: center">PAYMENT</th>
                                        <th style="text-align: center">PAID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="19" style="text-align: center"><label class="form-label">Level
                                                1</label></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td width="40%">SUPERVISOR - RECOMMENDER</td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox" />
                                        </td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox" />
                                        </td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox" />
                                        </td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox" />
                                        </td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox" />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td width="40%">HOD / CEO - APPROVER</td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                    </tr>
                                    <tr>
                                        <td colspan="19" style="text-align: center"><label class="form-label">Level
                                                2</label></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td width="40%">ADMIN - CHECKER</td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td width="40%">ADMIN - RECOMMENDER</td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td width="40%">ADMIN - APPROVER</td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                    </tr>
                                    <tr>
                                        <td colspan="19" style="text-align: center"><label class="form-label">Level
                                                3</label></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td width="40%">FINANCE - CHECKER</td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td width="40%">FINANCE - RECOMMENDER</td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td width="40%">FINANCE - APPROVER</td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="default-tab-2">
                        <div class="panel-body">
                            <table id="table-general" class="table table-bordered align-middle">
                                <thead>
                                    <tr>
                                        <th width="1%">&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th colspan="5">&nbsp;</th>
                                        <th colspan="4" style="text-align: center">CHECKER 1</th>
                                        <th colspan="4" style="text-align: center">CHECKER 2</th>
                                        <th colspan="4" style="text-align: center">CHECKER 3</th>
                                    </tr>
                                    <tr>
                                        <th>NO</th>
                                        <th style="width:180px;text-align: center;">ROLE</th>
                                        <th style="text-align: center">ACTIVE</th>
                                        <th style="text-align: center">APPROVE</th>
                                        <th style="text-align: center">REJECT</th>
                                        <th style="text-align: center">AMEND</th>
                                        <th style="text-align: center">CANCEL</th>
                                        <th style="text-align: center">CHECK</th>
                                        <th style="text-align: center;">GENERATE&nbsp;PV</th>
                                        <th style="text-align: center">PAYMENT</th>
                                        <th style="text-align: center">PAID</th>
                                        <th style="text-align: center">CHECK</th>
                                        <th style="text-align: center">GENERATE&nbsp;PV</th>
                                        <th style="text-align: center">PAYMENT</th>
                                        <th style="text-align: center">PAID</th>
                                        <th style="text-align: center">CHECK</th>
                                        <th style="text-align: center">GENERATE&nbsp;PV</th>
                                        <th style="text-align: center">PAYMENT</th>
                                        <th style="text-align: center">PAID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="19" style="text-align: center"><label class="form-label">Level
                                                1</label></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td width="40%">HOD / CEO - APPROVER</td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox" />
                                        </td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox" />
                                        </td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox" />
                                        </td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox" />
                                        </td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox" />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                    </tr>
                                    <tr>
                                        <td colspan="19" style="text-align: center"><label class="form-label">Level
                                                3</label></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td width="40%"> FINANCE - CHECKER</td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td width="40%">FINANCE - RECOMMENDER</td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox" />
                                        </td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox" />
                                        </td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox" />
                                        </td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox" />
                                        </td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox" />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td width="40%">FINANCE - APPROVER</td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="default-tab-3">
                        <div class="panel-body">
                            <table id="table-cash-advance" class="table table-bordered align-middle">
                                <thead>
                                    <tr>
                                        <th width="1%">&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th colspan="5">&nbsp;</th>
                                        <th colspan="4" style="text-align: center">CHECKER 1</th>
                                        <th colspan="4" style="text-align: center">CHECKER 2</th>
                                        <th colspan="4" style="text-align: center">CHECKER 3</th>
                                    </tr>
                                    <tr>
                                        <th>NO</th>
                                        <th style="width:180px;text-align: center;">ROLE</th>
                                        <th style="text-align: center">ACTIVE</th>
                                        <th style="text-align: center">APPROVE</th>
                                        <th style="text-align: center">REJECT</th>
                                        <th style="text-align: center">AMEND</th>
                                        <th style="text-align: center">CANCEL</th>
                                        <th style="text-align: center">CHECK</th>
                                        <th style="text-align: center;">GENERATE&nbsp;PV</th>
                                        <th style="text-align: center">PAYMENT</th>
                                        <th style="text-align: center">PAID</th>
                                        <th style="text-align: center">CHECK</th>
                                        <th style="text-align: center">GENERATE&nbsp;PV</th>
                                        <th style="text-align: center">PAYMENT</th>
                                        <th style="text-align: center">PAID</th>
                                        <th style="text-align: center">CHECK</th>
                                        <th style="text-align: center">GENERATE&nbsp;PV</th>
                                        <th style="text-align: center">PAYMENT</th>
                                        <th style="text-align: center">PAID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="19" style="text-align: center"><label class="form-label">Level
                                                1</label></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td width="40%">HOD / CEO - APPROVER</td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox" />
                                        </td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox" />
                                        </td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox" />
                                        </td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox" />
                                        </td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox" />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                    </tr>
                                    <tr>
                                        <td colspan="19" style="text-align: center"><label class="form-label">Level
                                                3</label></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td width="40%"> FINANCE - CHECKER</td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td width="40%">FINANCE - RECOMMENDER</td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox" />
                                        </td>
                                        <td style="text-align: center"><input class="form-check-input"
                                                type="checkbox" /></td>
                                        <td style="text-align: center"><input class="form-check-input"
                                                type="checkbox" /></td>
                                        <td style="text-align: center"><input class="form-check-input"
                                                type="checkbox" /></td>
                                        <td style="text-align: center"><input class="form-check-input"
                                                type="checkbox" /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td width="40%">FINANCE - APPROVER</td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center"><input class="form-check-input" type="checkbox"
                                                checked /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                        <td style="text-align: center;background-color:darkgray!important;"><input
                                                class="form-check-input" type="checkbox" disabled /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col align-self-start">
                            <a href="/setting" class="btn btn-light" style="color: black;" type="submit"><i
                                    class="fa fa-arrow-left"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
