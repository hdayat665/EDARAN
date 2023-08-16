<style>  
        .custom-dropdown-menu {
        position: static ;
        height: auto ;
        max-height: none ;
        overflow: visible ;
    }
</style>
<div class="tab-pane fade" id="default-tab-6">
    <div class="row p-2">
        <button type="button"  data-bs-toggle="modal" id="childModalAdd" data-type="add" class="btn btn-primary col-sm-2"><i class="fa fa-plus"></i> New Children</button>
    </div>
    <table id="tableChildren" style="width: 100%" class="table table-striped align-middle">
        <thead>
            <th width="1%" >No</th>
            <th width="1%" data-orderable="false">Action</th>
            <th class="text-nowrap">Name</th>
            <th class="text-nowrap">ID/Passport Number</th>
            <th class="text-nowrap">Age</th>
            <th class="text-nowrap">Education</th>
            <th class="text-nowrap">Institution Name</th>
            <th class="text-nowrap">Marital Status</th>
        </thead>
        <tbody>
            <?php $id = 0 ?>
            @if ($childrens)
            @foreach ($childrens as $children)
            <?php $id++ ?>
            <tr>
                <td width="1%">{{$id}}</td>
                <td>
                    <div class="btn-group">
                        <div>
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm"><i class="fa fa-cogs"></i> Actions <i class="fa fa-caret-down"></i></a>
                        </div>
                        <ul><div class="dropdown-menu custom-dropdown-menu child">
                            <li><a href="javascript:;" data-bs-toggle="modal" id="childModalEdit{{$children->id}}" data-id="{{$children->id}}" class="dropdown-item" >Edit</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a href="javascript:;" data-bs-toggle="modal" id="deleteChildren{{$children->id}}" data-id="{{$children->id}}" class="dropdown-item">Delete</a></li>
                        </ul>
                    </div>
                </td>
                <td style="text-transform: uppercase;">{{ $children->fullName }}</td>

                @if($children->nonCitizen == 'on')
                    <td>{{ $children->passport }}</td>
                @else
                    <td>{{ $children->idNo }}</td>
                @endif

                <td>{{ $children->age }}</td>
                <td style="text-transform: uppercase;">{{ ($children->educationLevel == "0") ? '-' : educationLevel($children->educationLevel) }}</td>
                <td style="text-transform: uppercase;">{{ $children->instituition ?? '-' }}</td>
                <td style="text-transform: uppercase;">{{ ($children->maritalStatus == "0") ? '-' : getMaritalStatus($children->maritalStatus) }}</td>

            </tr>
            @endforeach
            @endif
            <span style="display: none"><input type="text" id="childId" value="{{$childId}}"></span>
        </tbody>
    </table>
    <div class="row p-2">
            <div class="modal-footer">
                <a class="btn btn-white me-5px btnPrevious">Previous</a>

                <a class="btn btn-white me-5px btnNext">Next</a>
            </div>
    </div>
</div>

@include('modal.myProfile.addChildren')
