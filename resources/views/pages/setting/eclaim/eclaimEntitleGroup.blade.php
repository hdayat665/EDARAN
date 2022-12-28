@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">Settings| Entitlement Group</h1>
        <div class="panel panel" id="entitleJs">
            <div class="panel-body">
                <div class="row">
                    <h3>Entitlement Group List</h3>
                </div>
                <div class="row p-2">
                    <div class="form-check">
                        <a href="/setting/eclaimEntitleGroupAddView" type="button" class="btn btn-primary " name=""
                            id=""><i class="fa fa-plus"></i> Entitlement Group</a>
                    </div>
                </div>
                <div class="row p-2">
                    <table id="tableEntitle" class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                <th data-orderable="false">Action</th>
                                <th class="text-nowrap">Status</th>
                                <th class="text-nowrap">Claim <BR> benefit</th>
                                <th class="text-nowrap">Subsistence <BR> Allowence</th>
                                <th class="text-nowrap">Entitlement <BR> Group Name</th>
                                <th class="text-nowrap">Local <BR> Travelling</th>
                                <th class="text-nowrap">Overseas <BR> Travelling</th>
                                <th class="text-nowrap">Lodging <BR> Allowance</th>
                                <th class="text-nowrap">Local Hotel</th>
                                <th class="text-nowrap">Car<BR> Mileage</th>
                                <th class="text-nowrap">Mcycle<BR> Mileage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($entitles)
                                @foreach ($entitles as $data)
                                    <tr>
                                        <td>
                                            <a href="#" data-bs-toggle="dropdown"
                                                class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i>
                                                Action <i class="fa fa-caret-down"></i></a>
                                            <div class="dropdown-menu">
                                                <a href="/setting/eclaimEntitleGroupEditView/{{ $data->id }}"
                                                    class="dropdown-item">Update</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="javascript:;" id="deleteButton" data-id="{{ $data->id }}"
                                                    class="dropdown-item">Delete</a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input statusCheck" name="mainCompanion"
                                                    type="checkbox" data-id="{{ $data->id }}" id="updateStatus"
                                                    {{ $data->status == '1' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td><button class="btn btn-primary" id="viewClaimButton"
                                                data-id="{{ $data->id }}">view</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" data-id="{{ $data->id }}"
                                                id="viewSubsButton">view</button></i>
                                        </td>
                                        <td>{{ $data->group_name }}</td>
                                        <td>{{ $data->local_travel }}</td>
                                        <td>{{ $data->oversea_travel }}</td>
                                        {{-- <td>{{ $data->local_hotel_allowance }}</td> --}}
                                        <td>{{ $data->lodging_allowance == 1 ? 'Actual' : 'Input Value' }}</td>
                                        <td>{{ $data->local_hotel_allowance == 1 ? 'Actual' : 'Input Value' }}</td>
                                        <td>{{ $data->car_millage }}</td>
                                        <td>{{ $data->motor_millage }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="row p-2">
                    <div class="col align-self-start">
                        <a href="/setting" class="btn btn-light" style="color: black" type="submit"><i
                                class="fa fa-arrow-left"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal  claim benefit-->
        @include('modal.setting.eclaim.claimBenefit')
        {{-- modal subsistence --}}
        @include('modal.setting.eclaim.claimSubsistance')
    </div>
@endsection
