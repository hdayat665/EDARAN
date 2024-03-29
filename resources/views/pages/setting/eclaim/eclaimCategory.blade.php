@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">Setting <small>| Claim Category</small></h1>
        <div class="panel panel">
            <div class="panel-body" style="relative">
                <div>
                    <div class="row" id="claimCategoryJs">
                        <div class="form-check">
                            <a href="/setting/addClaimView" type="button" class="btn btn-white mt-3 mb-3" name="" id=""><i class="fa fa-plus"></i> Claim Category</a>
                        </div>
                    </div>
                    <div class="row p-2">
                        <table id="claimCategoryTable" class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">Status</th>
                                    <th class="text-nowrap">Claim Category<BR> Code</th>
                                    <th class="text-nowrap">Claim<BR> Category</th>
                                    <th class="text-nowrap">Claim Type</th>
                                    <th class="text-nowrap">Description</th>
                                    <th class="text-nowrap">Added By</th>
                                    <th class="text-nowrap">Added Time</th>
                                    <th class="text-nowrap">Modified By</th>
                                    <th class="text-nowrap">Modified Time</th>
                                    <th data-orderable="false">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if ($claimCategorys)
                                    @foreach ($claimCategorys as $data)
                                        <tr>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" {{ $data->status == 1 ? 'checked' : '' }} name="" type="checkbox" role="switch" data-id="{{ $data->id }}"
                                                        id="statusClaim">
                                                </div>
                                            </td>
                                            <td>{{ $data->claim_catagory_code }}</td>
                                            <td>{{ $data->claim_catagory }}</td>
                                            <td>
                                                <div class="col"> <span class="badge bg-primary"></span>
                                                    <span class="badge bg-warning">{{ $data->claim_type }}</span>
                                                </div>
                                            </td>
                                            <td>{{ $data->desc }}</td>
                                            <td> {{$data->addedBy ?? '-'}}</td>
                                            <td>{{$data->created_at ?? '-'}}</td>
                                            <td>{{$data->modifiedBy ?? '-'}}</td>
                                            <td>{{$data->modifiedTime ?? '-'}}</td>
                                            <td>
                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                                                <div class="dropdown-menu">
                                                    <a href="/setting/editClaimView/{{ $data->id }}" class="dropdown-item"> Edit</a>
                                                    <div class="dropdown-divider"></div>
                                                    <button id="deleteButton" data-id="{{ $data->id }}" class="dropdown-item"> Delete </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col align-self-start">
                        <a href="/setting" class="btn btn-light" style="color: black" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
