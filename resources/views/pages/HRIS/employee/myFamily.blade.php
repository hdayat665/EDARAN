<style>  
    .custom-dropdown-menu {
    position: static ;
    height: auto ;
    max-height: none ;
    overflow: visible ;
    }
</style>
<div class="tab-pane fade" id="default-tab-7"> 
        <div class="row p-2">
            <button type="button"  data-bs-toggle="modal" id="parentModalAdd" class="btn btn-primary col-sm-2"><i class="fa fa-plus"></i> New Family</button>
        </div>
        <table id="tableParent" style="width: 100%" class="table table-striped align-middle">
            <thead>
                <th width="1%">No</th>
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
                        <div class="btn-group">
                            <div>
                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm"><i class="fa fa-cogs"></i> Actions <i class="fa fa-caret-down"></i></a>
                            </div>
                            <ul><div class="dropdown-menu custom-dropdown-menu fam">
                                <li><a href="javascript:;" class="dropdown-item" id="parentModalEdit{{$parent->id}}" data-id="{{$parent->id}}">Edit</a></li>
                                <div class="dropdown-divider"></div>
                                <li><a href="javascript:;" class="dropdown-item" id="deleteParent{{$parent->id}}" data-id="{{$parent->id}}">Delete</a></li>
                            </ul>
                        </div>
                    </td>

                    <td style="text-transform: uppercase;">{{$parent->firstName}}</td>
                    <td style="text-transform: uppercase;">{{$parent->lastName}}</td>
                    <td style="text-transform: uppercase;">
                        {!! $parent->address1 ?? '' !!}
                        {!! $parent->address2 ? ', ' . $parent->address2 . ',<br>' : '' !!}
                        {!! $parent->postcode ? $parent->postcode . ', ' : '' !!}
                        {!! $parent->city ? $parent->city . ', ' : '' !!}
                        {!! $parent->state ? $parent->state . ', ' : '' !!}
                        {!! $parent->country ? $parent->country : '' !!}
                    </td>
                    <td style="text-transform: uppercase;">{{ ($parent->relationship) ? relationshipFamily($parent->relationship) : ''}}</td>
                    <td>{{$parent->DOB}}</td>
                    <td>{{$parent->contactNo}}</td>
                </tr>
                @endforeach
                <span style="display: none"><input type="text" id="parentId" value="{{$parentId}}"></span>
            </tbody>
        </table>
    <!-- </div> -->
    <div class="container" style="display: none">
        <h4 class="mt-3 mb-3">Siblings Information</h4>
        <button type="button"  data-bs-toggle="modal" id="siblingModalAdd"  class="btn btn-white mt-3 mb-3"><i class="fa fa-plus"></i> New Sibling</button>
        <table id="tableSibling" style="width: 100%" class="table table-striped align-middle">
            <thead>
                <th width="1%">No</th>
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

                    <td style="text-transform: uppercase;">{{$sibling->firstName}}</td>
                    <td style="text-transform: uppercase;">{{$sibling->lastName}}</td>
                    <td style="text-transform: uppercase;">{{$sibling->address1}}</td>
                    <td style="text-transform: uppercase;">{{($sibling->relationship) ? relationship($sibling->relationship) : ''}}</td>
                    <td>{{$sibling->DOB}}</td>
                    <td>{{$sibling->contactNo}}</td>
                </tr>
                @endforeach
                <span style="display: none"><input type="text" id="siblingId" value="{{$siblingId}}"></span>
            </tbody>
        </table>
    </div>
    <div class="row p-2">
            <div class="modal-footer">
                 <a  class="btn btn-white me-5px btnPrevious">Previous</a>
            </div>
    </div>
</div>

        {{-- modal add parent --}}
        @include('modal.employee.addParent')

        <!-- Modal Add Siblings -->
        @include('modal.employee.addSibling')
