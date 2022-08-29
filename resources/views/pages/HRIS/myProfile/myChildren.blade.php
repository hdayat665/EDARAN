<div class="tab-pane fade" id="default-tab-5">
    <button type="button"  data-bs-toggle="modal" id="childModalAdd" data-type="add" class="btn btn-white mt-3 mb-3"><i class="fa fa-plus"></i> New children</button>
    <table id="tableChildren" style="width: 100%" class="table table-striped align-middle">
        <thead>
            <th width="1%"></th>
            <th width="1%" data-orderable="false">Action</th>
            <th class="text-nowrap">Name</th>
            <th class="text-nowrap">ID/Passport Number</th>
            <th class="text-nowrap">Age</th>
            <th class="text-nowrap">Education</th>
            <th class="text-nowrap">Institution</th>
            <th class="text-nowrap">Marital Status</th>
        </thead>
        <tbody>
            @foreach ($childrens as $children)
                <tr>
                    <td width="1%" class="fw-bold text-dark">1</td>
                    <td>
                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Actions <i class="fa fa-caret-down"></i></a>
                        <div class="dropdown-menu">
                            <a href="javascript:;" data-bs-toggle="modal" id="childModalEdit{{$children->id}}" data-id="{{$children->id}}" data-type="edit" class="dropdown-item">Edit</a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:;" data-bs-toggle="modal" id="childModalView{{$children->id}}" data-type="view" data-id="{{$children->id}}" class="dropdown-item">View</a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:;" data-bs-toggle="modal" id="deleteChildren{{$children->id}}" data-id="{{$children->id}}" class="dropdown-item">Delete</a>
                        </div>
                    </td>

                    <td>{{ $children->fullName }}</td>
                    <td>{{ $children->idNo }}</td>
                    <td>{{ $children->age }}</td>
                    <td>{{ $children->educationLevel }}</td>
                    <td>{{ $children->instituition }}</td>
                    <td>{{ $children->maritalStatus }}</td>
                </tr>
            @endforeach
            <span style="display: none"><input type="text" id="childId" value="{{$childId}}"></span>
        </tbody>
    </table>
</div>

@include('modal.myProfile.addChildren')
