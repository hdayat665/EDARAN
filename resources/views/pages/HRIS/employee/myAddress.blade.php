<head>
</head>
<style>
    #employeeAddress th:first-child,
    #employeeAddress td:first-child {
        width: 0% !important;

    }
    #employeeAddress th:nth-child(2),
    #employeeAddress td:nth-child(2) {
        width: 16%  !important;
    }
    #employeeAddress th:nth-child(3),
    #employeeAddress td:nth-child(3) {
        width: 44% !important;
    }
    .custom-dropdown-menu {
    position: static !important;
    height: auto !important;
    max-height: none !important;
    overflow: visible !important;
    }
</style>
<div class="tab-pane fade" id="default-tab-3">
    <div class="row p-2">
        <button data-bs-toggle="modal" data-bs-target="#modaladdaddress" class="btn btn-primary col-sm-2"><i class="fa fa-plus"></i> New Address</button>
    </div>
    <div class="row p-2">
            <table id="employeeAddress" class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th class="text-nowrap">No</th>
                        <th class="text-nowrap">Action</th>
                        <th class="text-nowrap">Address</th>
                        <th class="text-nowrap">Address Type</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id = 0 ?>
                    @if ($addressDetails)
                        @foreach ($addressDetails as $address)
                        <?php $id++ ?>
                        <tr>
                            <td> {{$id}} </td>
                            <td>
                                <div class="btn-group">
                                    <div>
                                        <a href="javascript:;" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"><i class="fa fa-cogs"></i> Actions <i class="fa fa-caret-down"></i></a>
                                    </div>
                                    <ul><div class="dropdown-menu custom-dropdown-menu empadd">
                                        <li><a href="javascript:;" id="updateAddressDetails{{$address->id}}" data-id="{{$address->id}}" data-type="edit" class="dropdown-item" name="userAddress" >Edit</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a href="javascript:;" id="deleteAddressDetails{{$address->id}}" data-id="{{$address->id}}" class="dropdown-item">Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                            <td style="text-transform: uppercase;">
                                {!! $address->address1 ?? '' !!}
                                {!! $address->address2 ? ', ' . $address->address2 . ',<br>' : '' !!}
                                {!! $address->postcode ? $address->postcode . ', ' : '' !!}
                                {!! $address->city ? $address->city . ', ' : '' !!}
                                {!! $address->state ? $address->state . ', ' : '' !!}
                                {!! $address->country ? $address->country : '' !!}
                            </td>

                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="address_type[]"
                                    value="permanent" {{ $address->addressType == '1' || $address->addressType == '3' ? 'checked' : '' }}
                                    data-address-id="{{ $address->id }}" data-address-type="1"/>
                                    <label class="form-check-label" for="permanent">Permanent</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="address_type[]"
                                    value="correspondent" {{ $address->addressType == '2' || $address->addressType == '3' ? 'checked' : '' }}
                                    data-address-id="{{ $address->id }}" data-address-type="2"/>
                                    <label class="form-check-label" for="correspondent">Correspondent</label>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                    <span style="display: none"><input type="text" id="addressId" value="{{$addressId}}"></span>
                </tbody>
            </table>
        </div>
    <div class="row p-2">
        <div class="modal-footer">
            <a class="btn btn-white me-5px btnPrevious">Previous</a>

            <a class="btn btn-white me-5px btnNext">Next</a>
        </div>
    </div>
</div>

@include('modal.employee.addAddress')
@include('modal.employee.editAddress')
