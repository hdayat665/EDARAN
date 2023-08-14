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
                                                
                                                <input type="text" id="type" name="type" value="monthlyClaim">
                                                <input type="text" name="category_role" name="category_role" value="admin">
                                                <input type="text" class="form-control" id="id" name="id" maxlength="100" placeholder="" >
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





