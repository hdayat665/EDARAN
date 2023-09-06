@extends('layouts.dashboardTenant')
@section('content')

    <div id="content" class="app-content">
        <h1 class="page-header" id="projectStatusJs">Reporting <small>| Project | Project Report </small></h1>
        <div class="panel panel">
            <div class="panel-body">
                <form id="searchForm" action="/searchReportProject">
                    <div class="form-group col-md-4 ">
                        <label class="form-label" for="Menu1">By : </label>
                        <select class="form-control" name="filter" id="select1" required
                            oninvalid="this.setCustomValidity('Please Choose')"
                            oninput="setCustomValidity('')">
                            <option value="">PLEASE CHOOSE</option>
                            <option value="All">ALL</option>
                            <option value="CustName">CUSTOMER NAME</option>
                            <option value="FinYear">FINANCIAL YEAR</option>
                            <option value="AccManager">ACCOUNT MANAGER</option>
                            <option value="ProjManager">PROJECT MANAGER</option>
                            <option value="Status">STATUS</option>
                            <option value="ProjName">PROJECT NAME</option>
                            <option value="EmpName">EMPLOYEE NAME</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4 mt-3" id="menu2">
                        <label class="form-label" for="Menu2">Customer Name : </label>
                        <select class="form-control" name="customerName" id="select2"
                            oninvalid="this.setCustomValidity('Please Choose Customer Name')"
                            oninput="setCustomValidity('')">
                            <option value="">PLEASE CHOOSE</option>
                            <?php $customers = customer(); ?>
                            @if ($customers)
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group col-md-4 mt-3" id="menu3">
                        <label class="form-label" for="Menu2">Financial Year : </label>
                        <select class="form-control" name="financialYear" id="select3"
                            oninvalid="this.setCustomValidity('Please Choose Financial Year')"
                            oninput="setCustomValidity('')">
                            <option value="">PLEASE CHOOSE</option>
                            <?php $getFinancialYears = getFinancialYear(); ?>
                            @if ($getFinancialYears)
                                @foreach ($getFinancialYears as $year)
                                    <option value="{{ $year['financial_year'] }}">{{ $year['financial_year'] }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group col-md-4 mt-3" id="menu4">
                        <label class="form-label" for="Menu2">Account Manager : </label>
                        <select class="form-control" name="accManager" id="select4"
                            oninvalid="this.setCustomValidity('Please Choose Account Manager')"
                            oninput="setCustomValidity('')">
                            <option value="">PLEASE CHOOSE</option>
                            <?php $accManagers = accManager(); ?>
                            @if ($accManagers)
                                @foreach ($accManagers as $manager)
                                    <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group col-md-4 mt-3" id="menu5">
                    <label class="form-label" for="Menu2">Project Manager : </label>
                    <select class="form-control" name="projectManager" id="select5"
                        oninvalid="this.setCustomValidity('Please Choose Project Manager')"
                        oninput="setCustomValidity('')">
                        <option value="">PLEASE CHOOSE</option>
                        <?php $prjManagers = prjManager(); ?>
                        @if ($prjManagers)
                            @foreach ($prjManagers as $manager)
                                @if ($manager->name)
                                    <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>

                    <div class="form-group col-md-4 mt-3" id="menu6">
                        <label class="form-label" for="Menu2">Status : </label>
                        <select class="form-control" name="statusProject" id="select6"
                            oninvalid="this.setCustomValidity('Please Choose Status')" oninput="setCustomValidity('')">
                            <option value="">PLEASE CHOOSE</option>
                            <?php $getStatusProjects = getStatusProject(); ?>
                            @if ($getStatusProjects)
                                @foreach ($getStatusProjects as $key => $name)
                                    <option value="{{ $key }}">{{ $name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group col-md-4 mt-3" id="menu7">
                        <label class="form-label" for="Menu2">Customer Name : </label>
                        <select class="form-control" name="customerNameProject" id="select7"
                            oninvalid="this.setCustomValidity('Please Choose Customer Name')"
                            oninput="setCustomValidity('')">
                            <option value="">PLEASE CHOOSE</option>
                            <?php $customers = customer(); ?>
                            @if ($customers)
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                @endforeach
                            @endif
                        </select>

                        <div class="form-group mt-3" id="menu8">
                            <label class="form-label" for="Menu3">Project Name : </label>
                            <select class="form-select" name="projectName" id="select8">
                                <option label="PLEASE CHOOSE" selected="selected"> </option>
                            </select>

                        </div>

                    </div>
                    <div class="form-group col-md-4 mt-3" id="menu9">
                        <label class="form-label" for="Menu2">Department : </label>
                        <select class="form-control" name="department" id="select9"
                            oninvalid="this.setCustomValidity('Please Choose Department')"
                            oninput="setCustomValidity('')">
                            <option value="">PLEASE CHOOSE</option>
                            <?php $getDepartments = getDepartment(); ?>
                            @if ($getDepartments)
                                @foreach ($getDepartments as $getDepartment)
                                    <option value="{{ $getDepartment->id }}">{{ $getDepartment->departmentName }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        <div class="form-group mt-3" id="menu10">
                            <label class="form-label" for="Menu3">Employee Name : </label>
                            <select class="form-control" name="employee" id="select10">
                            <option value="">PLEASE CHOOSE</option>
                            </select>
                        </div>

                    </div>
                    <button type="submit" id="searchButton" class="btn btn-primary mt-3">
                        Submit
                    </button>

            </div>
            </form>
        </div>
    @endsection
