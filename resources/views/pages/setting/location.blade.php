@extends('layouts.dashboardTenant')

@section('content')

<div id="content" class="app-content">
    <h1 class="page-header">Settings <small>| Location </small></h1>
    <div class="panel panel">
        <div class="panel-heading" id="locationJs">
            <div class="col-md-6">
                <a data-bs-toggle="modal" id="addCountryState" class="btn btn-primary">+ New Country & State</a>
                <a data-bs-toggle="modal" id="addLocation" class="btn btn-primary">+ New Location</a>
                {{-- <a data-bs-toggle="modal" id="deleteStateModal" class="btn btn-danger">Delete State</a> --}}
            </div>
            <h4 class="panel-title"></h4>
        </div>
        <div class="panel-body">
            <table id="tablelocation" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th width="1%">NO</th>
                        <th class="text-nowrap">Country Name</th>
                        <th class="text-nowrap">State</th>
                        <th class="text-nowrap">Postcode</th>
                        <th width="9%" data-orderable="false" class="align-middle">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id = 0 ?>
                        @if ($locations)
                        @foreach ($locations as $l)
                            <?php $id++ ?>

                            <tr class="odd gradeX">
                                <td>{{ $id }}</td>
                                <td>{{$l->CountryName}}</td>
                                <td>{{$l->stateName}}</td>
                                <td>{{$l->postcode}}</td>
                                <td>
                                    <a data-bs-toggle="modal" id="deleteLocation" data-id="{{$l->id}}" class="btn btn-danger">Delete</a>
                                </td>

                            </tr>

                    @endforeach
                    @endif
                </tbody>
            </table>
            <div class="row p-2">
                <div class="col align-self-start">
                    <a href="/setting" class="btn btn-light" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

@php
    $countries = getCountries();
    $states = getStates();
@endphp

    <div class="modal fade" id="addModalCountryState" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Country & State</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addFormState">
                        <div class="mb-2">
                            <label class="form-label">Country*</label>
                            <select class="form-select" id="addCountry1" name="countryID" style="text-transform:uppercase" required>
                                <option value="" label="PLEASE CHOOSE"></option>
                                @if ($countries)
                                    @foreach ($countries as $country => $status)
                                        <option value="{{$country}}" <?php echo ($country == 'MY') ? 'selected' : ''; ?>>{{$status}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">State*</label>
                            <input type="text" id="addState1" class="form-control" name="stateName" maxlength="100" placeholder="" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">State Code*</label>
                            <input type="text" id="addStateCode1" class="form-control" name="stateCode" maxlength="100" placeholder="" required>
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button href="javascript:;" class="btn btn-primary" id="saveButtonState">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addModalLocation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Location</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addFormLocation">
                        <div class="mb-2">
                            <label class="form-label">Country*</label>
                            <select class="form-select" id="addCountry2" name="countryID" style="text-transform:uppercase" required>
                                <option value="" label="PLEASE CHOOSE"></option>
                                @if ($countries)
                                    @foreach ($countries as $country => $status)
                                        <option value="{{$country}}" <?php echo ($country == 'MY') ? 'selected' : ''; ?>>{{$status}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">State*</label>
                            <select class="form-select" id="addState2" name="stateID" style="text-transform:uppercase" >
                                <option value="" label="PLEASE CHOOSE"></option>
                                @if ($states)
                                    @foreach ($states as $state => $status)
                                        <option value="{{ $state }}" <?php echo $state; ?>>{{ $status }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Postcode*</label>
                            <input type="text" id="addPostcodeName2" class="form-control" name="postcode" maxlength="100" placeholder="" >
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button href="javascript:;" class="btn btn-primary" id="saveButtonLocation">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModalState" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete State</h5>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <form id="deleteForm">
                        <div class="mb-2">
                            <label class="form-label">Country</label>
                            <select class="form-select" name="countryID" id="addCountry3" required>
                                <option value="" label="Please Select Country"></option>
                                @if ($countries)
                                    @foreach ($countries as $country => $status)
                                        <option value="{{$country}}" <?php echo $country; ?>>{{$status}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">State</label>
                            <select class="form-select" name="stateID" id="addState3" required>
                                <option value="" label="Please Select State"></option>
                                @if ($states)
                                    @foreach ($states as $state => $status)
                                        <option value="{{ $state }}" <?php echo $state; ?>>{{ $status }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                </div>

                <?php $todeletestate = $status ?>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button href="javascript:;" class="btn btn-danger" data-id="" id="deleteState">Delete</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
