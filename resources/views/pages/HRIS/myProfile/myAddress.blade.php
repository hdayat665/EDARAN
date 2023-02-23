<div class="tab-pane fade" id="default-tab-3">
    <div class="row p-2">
        <button class="btn btn-primary col-md-3" data-bs-toggle="modal" data-bs-target="#modaladdaddress">Add New Address</button>
    </div>
    <div class="row p-2">
        <table id="" class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th class="text-nowrap">Action</th>
                    <th class="text-nowrap">No</th>
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
                        <td>
                            <div class="btn-group me-1 mb-1">
                                <a href="javascript:;" class="btn btn-primary btn-sm">Action</a>
                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm"><i class="fa fa-caret-down"></i></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:;" data-bs-toggle="modal" id="updateAddressDetails{{$address->id}}" data-id="{{$address->id}}" data-type="edit" class="dropdown-item">Update</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:;" id="deleteAddressDetails{{$address->id}}" data-id="{{$address->id}}" data-bs-toggle="modal" class="dropdown-item">Delete</a>
                                </div>
                            </div>
                        </td>
                        <td> {{$id}} </td>
                        <td style="text-transform: uppercase;">
                            {!! $address->address1 ?? '' !!}
                            {!! $address->address2 ? ', ' . $address->address2 . ',<br>' : '' !!}
                            {!! $address->postcode ? $address->postcode . ', ' : '' !!}
                            {!! $address->city ? $address->city . ', ' : '' !!}
                            {!! $address->state ? $address->state . ', ' : '' !!}
                            {!! $address->country ? $address->country : '' !!}
                        </td>
                                                
                        <td style="text-transform: uppercase;"> {{ addressType($address->addressType) }} </td>
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

@include('modal.myProfile.addAddress')
@include('modal.myProfile.editAddress')
