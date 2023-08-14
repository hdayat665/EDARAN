{{-- admin modal role --}}
<div class="modal fade" id="addapprovalmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog "> 
        <div class="modal-content">
            <div class="modal-body">
                <form id="claimAdminForm">
                    <div class="panel-body">
                        <div class="row">
                                <div class="row p-2">
                                    <h4>MONTLY CLAIM</h4>
                                </div>
                                <div class="row p-2">
                                    <div class="col">
                                        <h4 class="pl-0">Level 2 - admin</h4>
                                    </div>
                                </div>
                                    <form id="">
                                        <div class="row p-2">
                                            <div class="col">
                                                <h4>Select Role</h4>
                                            </div>
                                            <div class="col">
                                                
                                                <input type="hidden" id="type" name="type" value="monthlyClaim">
                                                <input type="hidden" name="category_role" name="category_role" value="admin">
                                                <input type="hidden" class="form-control" id="id" name="id" maxlength="100" placeholder="" >
                                                <select class="form-select" id="roleId" name="role">
                                                    <option class="form-label" value="">Please Choose</option>
                                                    <?php $roles = getAllRole(); ?>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->id }}">{{ $role->roleName}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <table id="appealtablehistory" class="table table-striped table-bordered align-middle">
                                            <thead>
                                                <tr>
                                                    <th width="1%">Role</th>
                                                    <th width="text-nowrap">User Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Checker 1</td>
                                                    <td>
                                                        <select class="form-select" name="checker1" id="checker1">
                                                            {{-- <option class="form-label" value="">Please Select</option> --}}
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Checker 2</td>
                                                    <td>
                                                        <select class="form-select" id="checker2" name="checker2">
                                                            {{-- <option class="form-label" value="" selected>Please --}}
                                                                Select</option>
                                                        </select>
                                                    </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>Checker 3</td>
                                                    <td>
                                                        
                                                            <select class="form-select" id="checker3" name="checker3">
                                                                {{-- <option class="form-label" value="" selected>Please --}}
                                                                    Select</option>
                                                            </select>
                                                        
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Checker 4</td>
                                                    <td>
                                                        
                                                            <select class="form-select" id="checker4" name="checker4">
                                                                {{-- <option class="form-label" value="" selected>Please --}}
                                                                    Select</option>
                                                            </select>
                                                        
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Checker 5</td>
                                                    <td>
                                                        
                                                            <select class="form-select" id="checker5" name="checker5">
                                                                {{-- <option class="form-label" value="" selected>Please --}}
                                                                    Select</option>
                                                            </select>
                                                        
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Recommender</td>
                                                    <td>
                                                        <select class="form-select" id="recommender" name="recommender">
                                                            {{-- <option class="form-label" value="" selected>Please --}}
                                                                Select</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Approver</td>
                                                    <td>
                                                        
                                                            <select class="form-select" id="approver" name="approver">
                                                                {{-- <option class="form-label" value="" selected>Please --}}
                                                                    Select</option>
                                                            </select>
                                                        
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!-- <button href="javascript:;" id="addappealb" class="btn btn-primary">SUBMIT</button> -->
                        <button type="submit" class="btn btn-primary" id="claimAdminButton">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- financemodal --}}

<div class="modal fade" id="financeopenmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog "> 
        <div class="modal-content">
            <div class="modal-body">
                <form id="claimFinanceForm">
                    <div class="panel-body">
                        <div class="row">
                                <div class="row p-2">
                                    <h4>FINANCE</h4>
                                </div>
                                <div class="row p-2">
                                    <div class="col">
                                        <h4 class="pl-0">Level 2 - Finance</h4>
                                    </div>
                                </div>
                                    <form id="">
                                        <div class="row p-2">
                                            <div class="col">
                                                <h4>Select Role</h4>
                                            </div>
                                            <div class="col">
                                                
                                                <input type="hidden" id="type" name="type" value="monthlyClaim">
                                                <input type="hidden" name="category_role" value="finance">
                                                <input type="hidden" class="form-control" id="idF" name="id" maxlength="100" placeholder="" >
                                                <select class="form-select" id="roleIdF" name="role">
                                                    <option class="form-label" value="">Please Choose</option>
                                                    <?php $roles = getAllRole(); ?>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->id }}">{{ $role->roleName}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <table id="appealtablehistory" class="table table-striped table-bordered align-middle">
                                            <thead>
                                                <tr>
                                                    <th width="1%">Role</th>
                                                    <th width="text-nowrap">User Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Checker 1</td>
                                                    <td>
                                                        <select class="form-select" name="checker1" id="checker1F">
                                                            {{-- <option class="form-label" value="">Please Select</option> --}}
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Checker 2</td>
                                                    <td>
                                                        <select class="form-select" id="checker2F" name="checker2">
                                                            {{-- <option class="form-label" value="" selected>Please --}}
                                                                Select</option>
                                                        </select>
                                                    </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>Checker 3</td>
                                                    <td>
                                                    <select class="form-select" id="checker3F" name="checker3">
                                                        {{-- <option class="form-label" value="" selected>Please --}}
                                                            Select</option>
                                                    </select>
                                                        
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Checker 4</td>
                                                    <td>
                                                    <select class="form-select" id="checker4F" name="checker4">
                                                        {{-- <option class="form-label" value="" selected>Please --}}
                                                            Select</option>
                                                    </select>  
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Checker 5</td>
                                                    <td>
                                                    <select class="form-select" id="checker5F" name="checker5">
                                                        {{-- <option class="form-label" value="" selected>Please --}}
                                                            Select</option>
                                                    </select>  
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Recommender</td>
                                                    <td>
                                                        <select class="form-select" id="recommenderF" name="recommender">
                                                            {{-- <option class="form-label" value="" selected>Please --}}
                                                                Select</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Approver</td>
                                                    <td>
                                                        
                                                            <select class="form-select" id="approverF" name="approver">
                                                                {{-- <option class="form-label" value="" selected>Please --}}
                                                                    Select</option>
                                                            </select>
                                                        
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!-- <button href="javascript:;" id="addappealb" class="btn btn-primary">SUBMIT</button> -->
                        <button type="submit" class="btn btn-primary" id="claimFinanceButton">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- ca --}}
<div class="modal fade" id="casheopenmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog "> 
        <div class="modal-content">
            <div class="modal-body">
                <form id="cashAdminForm">
                    <div class="panel-body">
                        <div class="row">
                                <div class="row p-2">
                                    <h4>CASH ADVANCE</h4>
                                </div>
                                    <form id="">
                                        <div class="row p-2">
                                            <div class="col">
                                                <h4>Select Role</h4>
                                            </div>
                                            <div class="col">
                                                
                                                <input type="hidden" id="type" name="type" value="cashAdvance">
                                                <input type="hidden" name="category_role" value="cash_advance">
                                                <input type="hidden" class="form-control" id="idCA" name="id" maxlength="100" placeholder="" >
                                                <select class="form-select" id="roleIdC" name="role">
                                                    <option class="form-label" value="">Please Choose</option>
                                                    <?php $roles = getAllRole(); ?>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->id }}">{{ $role->roleName}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <table id="appealtablehistory" class="table table-striped table-bordered align-middle">
                                            <thead>
                                                <tr>
                                                    <th width="1%">Role</th>
                                                    <th width="text-nowrap">User Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Checker 1</td>
                                                    <td>
                                                        <select class="form-select" name="checker1" id="checker1C">
                                                            {{-- <option class="form-label" value="">Please Select</option> --}}
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Checker 2</td>
                                                    <td>
                                                        <select class="form-select" id="checker2C" name="checker2">
                                                            {{-- <option class="form-label" value="" selected>Please --}}
                                                                Select</option>
                                                        </select>
                                                    </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>Checker 3</td>
                                                    <td>
                                                        
                                                            <select class="form-select" id="checker3C" name="checker3">
                                                                {{-- <option class="form-label" value="" selected>Please --}}
                                                                    Select</option>
                                                            </select>
                                                        
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Checker 4</td>
                                                    <td>
                                                        <select class="form-select" id="checker4C" name="checker4">
                                                            {{-- <option class="form-label" value="" selected>Please --}}
                                                                Select</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Checker 5</td>
                                                    <td>
                                                    <select class="form-select" id="checker5C" name="checker5">
                                                        {{-- <option class="form-label" value="" selected>Please --}}
                                                            Select</option>
                                                    </select>  
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Recommender</td>
                                                    <td>
                                                        <select class="form-select" id="recommenderC" name="recommender">
                                                            {{-- <option class="form-label" value="" selected>Please --}}
                                                                Select</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Approver</td>
                                                    <td>
                                                        
                                                            <select class="form-select" id="approverC" name="approver">
                                                                {{-- <option class="form-label" value="" selected>Please --}}
                                                                    Select</option>
                                                            </select>
                                                        
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!-- <button href="javascript:;" id="addappealb" class="btn btn-primary">SUBMIT</button> -->
                        <button type="submit" class="btn btn-primary" id="cashAdminButton">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



