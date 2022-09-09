@extends('layouts.dashboardTenant')

@section('content')
<div id="content" class="app-content">
    <h1 class="page-header" id="customerJs">Project Registration <small>| Customers</small></h1>
    <div class="panel panel">
        <div class="panel-heading">
            <div class="col-md-6">
                <a href="javascript:;" data-bs-toggle="modal" id="addButton" class="btn btn-primary">+ Add Customer</a>
            </div>
            <h4 class="panel-title"></h4>
        </div>
        <div class="panel-body">
            <table id="customerTable" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th width="9%" data-orderable="false" class="align-middle">Action</th>
                        <th class="text-nowrap">Status</th>
                        <th class="text-nowrap">Customer Name</th>
                        <th class="text-nowrap">Address</th>
                        <th class="text-nowrap">Phone Number</th>
                        <th class="text-nowrap">Email</th>
                        <th class="text-nowrap">Added By</th>
                        <th class="text-nowrap">Added Time</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($customers)
                    @foreach ($customers as $customer )
                    <tr>
                        <td>
                            <a href="javascript:;" id="editButton" data-id="{{$customer->id}}" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a>
                            <a href="javascript:;" id="deleteButton" data-id="{{$customer->id}}" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input statusCheck" data-id="{{$customer->id}}" {{($customer->status == 1) ? 'checked' : ''}} type="checkbox" role="switch" id="flexSwitchCheckDefault" />
                                <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                            </div>
                        </td>
                        <td>{{$customer->customer_name}}</td>
                        <td>{{$customer->address}}</td>
                        <td>{{$customer->phoneNo}}</td>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->addedBy}}</td>
                        <td>{{$customer->created_at}}</td>
                    </tr>
                    @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    </div>


    @include('modal.customer.customerAdd')
    @include('modal.customer.customerEdit')
    <div class="row">
        <div class="col-xl-4 col-lg-6">
        </div>
        <div class="col-xl-4 col-lg-6">
        </div>
        <div class="col-xl-4 col-lg-6">
        </div>
    </div>
</div>
@endsection
