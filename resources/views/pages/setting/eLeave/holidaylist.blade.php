@extends('layouts.dashboardTenant')

@section('content')
    <style>
        .swal2-modal .swal2-title {
            color: #595959;
            font-size: 20px !important;
            text-align: center;
            font-weight: 600;
            text-transform: none;
            position: relative;
            margin: 0 0 0.4em;
            padding: 0;
            display: block;
            word-wrap: break-word;
        }

        .border {
            border-radius: 4px !important;
        }

        .select-all-checkbox {
            margin-right: 10px !important;
        }

        .select-all-label {
            margin-left: 5px !important;
        }

        .wan {
            margin-left: 5px !important; /* Mencentangkan tepi ke tengah secara horizontal */
            margin-right: 5px !important; /* Mencentangkan tepi ke tengah secara horizontal */
        }


    </style>

    <div id="content" class="app-content">
        <h1 class="page-header" id="eleaveholidayJs">Setting <small>| Holiday</small></h1>
        <div class="panel panel">
            <div class="panel-body">
                <div class="form-control">
                    <div class="row p-2">
                    </div>
                    <div class="row p-2 ">
                        <div class="col align-self-start">
                            <button class="btn btn-primary" data-bs-toggle="modal" id="myModal1" data-bs-target="#addleave"> <i class="fa fa-plus" aria-hidden="true"></i> New Holiday </button>
                            {{-- <button class="btn btn-primary " data-bs-toggle="modal" id="myModal1" data-bs-target="#uploadbulk"> <i class="fa fa-upload" aria-hidden="true"></i></i> Bulk Upload</button> --}}
                        </div>
                    </div>
                    <br>
                    <div class="row p-2">
                        <form action="/holidaylist" method="POST">
                            <div class="row">
                                <label class="form-label">Country*</label>
                                <div class="col-4">

                                    <select class="form-select select2" id="countrySearch" name="countrySearch" style="text-transform:uppercase">
                                        <option value="" label="PLEASE CHOOSE"></option>
                                        @foreach($country as $ct)
                                            <option value="{{ $ct->country_id }}" {{ old('countrySearch') == $ct->country_id ? 'selected' : ($countrySearch == $ct->country_id ? 'selected' : '') }}>{{ $ct->country_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-2">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <br>
                    <div class="row p-2">
                        <table id="tableholiday" class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th width="1%">No.</th>
                                    <th width="1%" class="text-nowrap" data-orderable="false">Action</th>
                                    <th class="text-nowrap" data-orderable="false">Status</th>
                                    <th class="text-nowrap">Country</th>
                                    <th class="text-nowrap">State</th>
                                    <th class="text-nowrap">Holiday Title</th>
                                    <th class="text-nowrap">Start Date</th>
                                    <th class="text-nowrap">End Date</th>
                                    <th class="text-nowrap">Annual Holiday</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $id = 0; ?>
                                @if ($holiday)
                                    @foreach ($holiday as $h)
                                        <?php $id++; ?>
                                        <tr>
                                            <td>{{ $id }}</td>
                                            <td>
                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i class="fa fa-caret-down"></i></a>
                                                <div class="dropdown-menu">
                                                    <a href="javascript:;" id="editButton" data-id="{{ $h->id }}" class="dropdown-item" data-bs-toggle="modal" id="myModal1"
                                                        data-bs-target="#updateleave"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:;" id="deleteButton" data-id="{{ $h->id }}" class="dropdown-item"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input statusCheck" name="mainCompanion" type="checkbox" data-id="{{ $h->id }}" id="updateStatus"
                                                        {{ $h->status == '1' ? 'checked' : '' }}>
                                                </div>
                                            </td>
                                            <td>
                                                {{ $h->country }}
                                            </td>
                                            <td style="text-align:center">
                                                <a class="btn btn-primary" href="javascript:;" data-bs-toggle="modal" data-id="{{ $h->id }}" data-all = "{{ $h->total }}" id="holidayState" ></i>{{ $h->total }}</a></td>
                                            </td>
                                            <td>{{ $h->holiday_title }}</td>
                                            <td>{{ $h->start_date }}</td>
                                            <td>{{ $h->end_date }}</td>
                                            <td>{{ $h->annual_date == 1 ? 'Yes' : 'No' }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row p-2">
                <div class="col align-self-start">
                    <a href="/setting" class="btn btn-light" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>

            </div>
        </div>

        @include('modal.eleave.holiday.holidayListModal')
        @include('modal.eleave.holiday.holidayState')
    </div>
@endsection
