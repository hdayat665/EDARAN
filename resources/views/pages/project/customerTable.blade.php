@extends('layouts.dashboardTenant')

@section('content')
    <style>
    table.dataTable thead th:first-child {
    background-image: none !important;
    }
    </style>
    <div id="content" class="app-content">
        <h1 class="page-header" id="customerJs">Project Management <small>| Customers</small></h1>
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
                            <th class="text-nowrap">No.</th>
                            <th width="8%" data-orderable="false" class="align-middle">Action</th>
                            <th class="text-nowrap">Status</th>
                            <th class="text-nowrap">Customer Name</th>
                            <th class="text-nowrap">Address</th>
                            <th class="text-nowrap">Phone Number</th>
                            <th class="text-nowrap">Email</th>
                            <th class="text-nowrap">Added By</th>
                            <th class="text-nowrap">Added Time</th>
                            <th class="text-nowrap">Modified By</th>
                            <th class="text-nowrap">Modified Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id = 0 ?>
                        @if ($customers)
                            @foreach ($customers as $customer)
                            <?php $id++ ?>
                                <tr>
                                    <td width="1%" class="fw-bold text-dark">{{$id}}</td>
                                    <td>
                                        <a href="javascript:;" data-id="{{ $customer->id }}" id="editButton" class="btn btn-primary">Edit</a>
                                        
                                        <!-- <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Actions <i class="fa fa-caret-down"></i></a>
                                        <div class="dropdown-menu">
                                            <a href="javascript:;" id="editButton" data-id="{{ $customer->id }}" class="dropdown-item">Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:;"  class="dropdown-item">Close</a>
                                        </div> -->
                                        <!-- <a href="javascript:;" id="editButton" data-id="{{ $customer->id }}"
                                            class="btn btn-primary">Edit</a> -->
                                        <!-- <a href="javascript:;" id="deleteButton" data-id="{{ $customer->id }}"
                                            class="btn btn-outline-danger"><i class="fa fa-trash"></i></a> -->
                                    </td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input statusCheck" data-id="{{ $customer->id }}"
                                                {{ $customer->status == 1 ? 'checked' : '' }} type="checkbox" role="switch"
                                                id="flexSwitchCheckDefault" />
                                                
                                            <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                        </div>
                                    </td>
                                    <td>{{ $customer->customer_name }}</td>
                                    <td>{{ $customer->address }}, {{ $customer->address2 }} {{ $customer->city}}, {{ $customer->postcode}}, {{ $customer->state}} ,{{ $customer->country}}</td>
                                    <td>{{ $customer->phoneNo }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->addedBy }}</td>
                                    <td>{{ $customer->created_at }}</td>
                                    <td>{{ $customer->update_by ? getEmployeeName($customer->update_by) : '-' }}</td>
                                    <td>{{ $customer->update_by ? $customer->updated_at : '-' }}</td>
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
