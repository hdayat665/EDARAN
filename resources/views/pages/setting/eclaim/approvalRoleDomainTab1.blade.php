<div class="tab-pane fade" id="default-tab-4">
    {{-- admin --}}
    <div class="row">
        <div class="col-md-6">
            <div class="row p-2">
                <h4>MONTLY CLAIM</h4>
            </div>
            <div class="row p-2">
                <div class="col">
                    <h4 class="pl-0">Level 2 - admin</h4>
                </div>
                <div class="col pr-0 text-right">
                    @if(isset($roles->id))
                        <a href="javascript:;" id="addapproval" data-id="{{$roles->id}}" class="btn btn-primary">Update</a>
                    @else
                        <a href="javascript:;" id="addapproval" class="btn btn-primary">Update</a>
                    @endif
                </div>
            </div>
            
            <table id="admintable" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th width="1%">Role</th>
                        <th width="text-nowrap">User ID</th>
                        <th width="text-nowrap">User Name</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Checker 1</td>
                        <td>{{ isset($roles->checker1) ? $roles->checker1 : 'checker 1' }}</td>
                        <td>{{ isset($roles->checker1Name) ? $roles->checker1Name : 'Na' }}</td>
                    </tr>
                    
                    <tr>
                        <td>Checker 2</td>
                        <td>{{ isset($roles->checker2) ? $roles->checker2 : 'checker 2' }}</td>
                        <td>{{ isset($roles->checker2Name) ? $roles->checker2Name : 'Na' }}</td>
                    </tr>
                    
                    <tr>
                        <td>Checker 3</td>
                        <td>{{ isset($roles->checker3) ? $roles->checker3 : 'checker 3' }}</td>
                        <td>{{ isset($roles->checker3Name) ? $roles->checker3Name : 'Na' }}</td>
                    </tr>
                    
                    <tr>
                        <td>Recommender</td>
                        <td>{{ isset($roles->recommender) ? $roles->recommender : 'Recommender' }}</td>
                        <td>{{ isset($roles->recommenderName) ? $roles->recommenderName : 'Na' }}</td>
                    </tr>
                    
                    <tr>
                        <td>Approver</td>
                        <td>{{ isset($roles->approver) ? $roles->approver : 'Approver' }}</td>
                        <td>{{ isset($roles->approverName) ? $roles->approverName : 'Na' }}</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        
    @include('modal.setting.eclaim.addapprovalrole')


    
</div>
