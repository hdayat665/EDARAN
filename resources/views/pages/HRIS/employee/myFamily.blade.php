<div class="tab-pane fade" id="default-tab-6"> 
    <div class="container">
        <h4 class="mt-3 mb-3">Parents information</h4>
        <button type="button"  data-bs-toggle="modal" id="parentModalAdd" class="btn btn-white mt-3 mb-3"><i class="fa fa-plus"></i> New Parent</button>
        <table id="tableParent" style="width: 100%" class="table table-striped align-middle">
            <thead>
                <th width="1%"></th>
                <th width="1%" data-orderable="false">Action</th>
                <th class="text-nowrap">First Name</th>
                <th class="text-nowrap">Last Name</th>
                <th class="text-nowrap">Address</th>
                <th class="text-nowrap">Relationship</th>
                <th class="text-nowrap">Date of Birth</th>
                <th class="text-nowrap">Contact Number</th>
            </thead>
            <tbody>
                <?php $id = 0 ?>
                @foreach ($parents as $parent)
                <?php $id++ ?>
                <tr>
                    <td width="1%" class="fw-bold text-dark">{{$id}}</td>
                    <td>
                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Actions <i class="fa fa-caret-down"></i></a>
                        <div class="dropdown-menu">
                            <a href="javascript:;" class="dropdown-item" id="parentModalEdit{{$parent->id}}" data-id="{{$parent->id}}">Edit</a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:;" class="dropdown-item" id="parentModalView{{$parent->id}}" data-id="{{$parent->id}}">View</a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:;" class="dropdown-item" id="deleteParent{{$parent->id}}" data-id="{{$parent->id}}">Delete</a>
                        </div>
                    </td>

                    <td>{{$parent->firstName}}</td>
                    <td>{{$parent->lastName}}</td>
                    <td>{{$parent->address1}}</td>
                    <td>{{($parent->relationship) ? relationship($parent->relationship) : ''}}</td>
                    <td>{{$parent->DOB}}</td>
                    <td>{{$parent->contactNo}}</td>
                </tr>
                @endforeach
                <span style="display: none"><input type="text" id="parentId" value="{{$parentId}}"></span>
            </tbody>
        </table>
    </div>
    <div class="container">
        <h4 class="mt-3 mb-3">Siblings Information</h4>
        <button type="button"  data-bs-toggle="modal" id="siblingModalAdd"  class="btn btn-white mt-3 mb-3"><i class="fa fa-plus"></i> New Sibling</button>
        <table id="tableSibling" style="width: 100%" class="table table-striped align-middle">
            <thead>
                <th width="1%"></th>
                <th width="1%" data-orderable="false">Action</th>
                <th class="text-nowrap">First Name</th>
                <th class="text-nowrap">Last Name</th>
                <th class="text-nowrap">Address</th>
                <th class="text-nowrap">Relationship</th>
                <th class="text-nowrap">Date of Birth</th>
                <th class="text-nowrap">Contact Number</th>
            </thead>
            <tbody>
                <?php $id2 = 0 ?>
                @foreach ($siblings as $sibling)
                <?php $id2++ ?>
                <tr>
                    <td width="1%" class="fw-bold text-dark">{{$id2}}</td>
                    <td>
                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Actions <i class="fa fa-caret-down"></i></a>
                        <div class="dropdown-menu">
                            <a href="javascript:;" class="dropdown-item"id="siblingModalEdit{{$sibling->id}}" data-id="{{$sibling->id}}">Edit</a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:;" class="dropdown-item"id="siblingModalView{{$sibling->id}}" data-id="{{$sibling->id}}">View</a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:;" class="dropdown-item"id="deleteSibling{{$sibling->id}}" data-id="{{$sibling->id}}">Delete</a>
                        </div>
                    </td>

                    <td>{{$sibling->firstName}}</td>
                    <td>{{$sibling->lastName}}</td>
                    <td>{{$sibling->address1}}</td>
                    <td>{{($sibling->relationship) ? relationship($sibling->relationship) : ''}}</td>
                    <td>{{$sibling->DOB}}</td>
                    <td>{{$sibling->contactNo}}</td>
                </tr>
                @endforeach
                <span style="display: none"><input type="text" id="siblingId" value="{{$siblingId}}"></span>
            </tbody>
        </table>
    </div>
</div>

        {{-- modal add parent --}}
        @include('modal.employee.addParent')

        <!-- Modal Add Siblings -->
        @include('modal.employee.addSibling')
