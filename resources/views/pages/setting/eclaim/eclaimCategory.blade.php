@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">Setting | Claim Category</h1>
        <div class="panel panel">
            <div class="panel-body" style="relative">
                <div>
                    <div class="row" id="claimCategoryJs">
                        <h3>Claim Category List</h3>
                        <div class="form-check">
                            <a href="/setting/addClaimView" type="button" class="btn btn-white mt-3 mb-3" name=""
                                id=""><i class="fa fa-plus"></i> Claim Category</a>
                        </div>
                    </div>
                    <div class="row p-2">
                        <table id="claimCategoryTable" class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th data-orderable="false">Action</th>
                                    <th class="text-nowrap">Status</th>
                                    <th class="text-nowrap">Claim Category<BR> Code</th>
                                    <th class="text-nowrap">Claim<BR> Category</th>
                                    <th class="text-nowrap">Claim Type</th>
                                    <th class="text-nowrap">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($claimCategorys)
                                    @foreach ($claimCategorys as $data)
                                        <tr>
                                            <td>
                                                <a href="/setting/editClaimView/{{ $data->id }}"
                                                    class="btn btn-outline-green"><i class="fa fa-edit"></i></a>
                                                <button class="btn btn-outline-red" id="deleteButton"
                                                    data-id="{{ $data->id }}"><i class="fa fa-trash"></i></button>
                                            </td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" name="" type="checkbox"
                                                        role="switch" id="" checked>
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
                        <a href="/setting" class="btn btn-light" style="color: black" type="submit"><i
                                class="fa fa-arrow-left"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
