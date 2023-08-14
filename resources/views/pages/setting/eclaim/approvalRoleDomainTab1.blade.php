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
                        <td>{{ isset($roles->checker1) ? $roles->checker1 : 'Na' }}</td>
                        <td>{{ isset($roles->checker1Name) ? $roles->checker1Name : 'Na' }}</td>
                    </tr>
                    
                    <tr>
                        <td>Checker 2</td>
                        <td>{{ isset($roles->checker2) ? $roles->checker2 : 'Na' }}</td>
                        <td>{{ isset($roles->checker2Name) ? $roles->checker2Name : 'Na' }}</td>
                    </tr>

                    <tr>
                        <td>Checker 3</td>
                        <td>{{ isset($roles->checker3) ? $roles->checker3 : 'Na' }}</td>
                        <td>{{ isset($roles->checker3Name) ? $roles->checker3Name : 'Na' }}</td>
                    </tr>
                    
                    <tr>
                        <td>Checker 4</td>
                        <td>{{ isset($roles->checker4) ? $roles->checker4 : 'Na' }}</td>
                        <td>{{ isset($roles->checker4Name) ? $roles->checker4Name : 'Na' }}</td>
                    </tr>

                    <tr>
                        <td>Checker 3</td>
                        <td>{{ isset($roles->checker5) ? $roles->checker5 : 'Na' }}</td>
                        <td>{{ isset($roles->checker5Name) ? $roles->checker5Name : 'Na' }}</td>
                    </tr>

                    <tr>
                        <td>Recommender</td>
                        <td>{{ isset($roles->recommender) ? $roles->recommender : 'Na' }}</td>
                        <td>{{ isset($roles->recommenderName) ? $roles->recommenderName : 'Na' }}</td>
                    </tr>
                    
                    <tr>
                        <td>Approver</td>
                        <td>{{ isset($roles->approver) ? $roles->approver : 'Na' }}</td>
                        <td>{{ isset($roles->approverName) ? $roles->approverName : 'Na' }}</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        {{-- cash advance --}}
        <div class="col-md-6">
            <div class="row p-2">
                <h4>CASH ADVANCE</h4>
            </div>
            <div class="row p-2">
                <div class="col pr-0 text-right">
                    @if(isset($rolesCA->id))
                        <a href="javascript:;" id="cashadvancemodal" data-id="{{ $rolesCA->id }}" class="btn btn-primary">Update</a>
                    @else
                        <a href="javascript:;" id="cashadvancemodal" class="btn btn-primary">Update</a>
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
                        <td>{{ isset($rolesCA->checker1) ? $rolesCA->checker1 : 'Na' }}</td>
                        <td>{{ isset($rolesCA->checker1Name) ? $rolesCA->checker1Name : 'Na' }}</td>
                    </tr>
                    
                    <tr>
                        <td>Checker 2</td>
                        <td>{{ isset($rolesCA->checker2) ? $rolesCA->checker2 : 'Na' }}</td>
                        <td>{{ isset($rolesCA->checker2Name) ? $rolesCA->checker2Name : 'Na' }}</td>
                    </tr>
                    
                    <tr>
                        <td>Checker 3</td>
                        <td>{{ isset($rolesCA->checker3) ? $rolesCA->checker3 : 'Na' }}</td>
                        <td>{{ isset($rolesCA->checker3Name) ? $rolesCA->checker3Name : 'Na' }}</td>
                    </tr>

                    <tr>
                        <td>Checker 4</td>
                        <td>{{ isset($rolesCA->checker4) ? $rolesCA->checker4 : 'Na' }}</td>
                        <td>{{ isset($rolesCA->checker4Name) ? $rolesCA->checker4Name : 'Na' }}</td>
                    </tr>

                    <tr>
                        <td>Checker 3</td>
                        <td>{{ isset($rolesCA->checker5) ? $rolesCA->checker5 : 'Na' }}</td>
                        <td>{{ isset($rolesCA->checker5Name) ? $rolesCA->checker5Name : 'Na' }}</td>
                    </tr>
                    
                    <tr>
                        <td>Recommender</td>
                        <td>{{ isset($rolesCA->recommender) ? $rolesCA->recommender : 'Na' }}</td>
                        <td>{{ isset($rolesCA->recommenderName) ? $rolesCA->recommenderName : 'Na' }}</td>
                    </tr>
                    
                    <tr>
                        <td>Approver</td>
                        <td>{{ isset($rolesCA->approver) ? $rolesCA->approver : 'Na' }}</td>
                        <td>{{ isset($rolesCA->approverName) ?$rolesCA->approverName : 'Na' }}</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        {{-- FINANCE --}}
        <div class="row">
            <div class="col-md-6">
                <div class="row p-2">
                    <h4>FINANCE</h4>
                </div>
                <div class="row p-2"> 
                    <div class="col">
                        <h4 class="pl-0">Level 3 - Finance</h4>
                    </div>
                    <div class="col pr-0 text-right">
                        @if(isset($rolesFinance->id))
                            <a href="javascript:;" id="financemodal" data-id="{{$rolesFinance->id}}" class="btn btn-primary">Update</a>
                        @else
                            <a href="javascript:;" id="" class="btn btn-primary">Update</a>
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
                            <td>{{ isset($rolesFinance->checker1) ? $rolesFinance->checker1 : 'Na' }}</td>
                            <td>{{ isset($rolesFinance->checker1Name) ? $rolesFinance->checker1Name : 'Na' }}</td>
                        </tr>
                        
                        <tr>
                            <td>Checker 2</td>
                            <td>{{ isset($rolesFinance->checker2) ? $rolesFinance->checker2 : 'Na' }}</td>
                            <td>{{ isset($rolesFinance->checker2Name) ? $rolesFinance->checker2Name : 'Na' }}</td>
                        </tr>
                        
                        <tr>
                            <td>Checker 3</td>
                            <td>{{ isset($rolesFinance->checker3) ? $rolesFinance->checker3 : 'Na' }}</td>
                            <td>{{ isset($rolesFinance->checker3Name) ? $rolesFinance->checker3Name : 'Na' }}</td>
                        </tr>

                        <tr>
                            <td>Checker 4</td>
                            <td>{{ isset($rolesFinance->checker4) ? $rolesFinance->checker4 : 'Na' }}</td>
                            <td>{{ isset($rolesFinance->checker4Name) ? $rolesFinance->checker4Name : 'Na' }}</td>
                        </tr>

                        <tr>
                            <td>Checker 5</td>
                            <td>{{ isset($rolesFinance->checker5) ? $rolesFinance->checker5 : 'Na' }}</td>
                            <td>{{ isset($rolesFinance->checker5Name) ? $rolesFinance->checker5Name : 'Na' }}</td>
                        </tr>
                        
                        
                        <tr>
                            <td>Recommender</td>
                            <td>{{ isset($rolesFinance->recommender) ? $rolesFinance->recommender : 'Na' }}</td>
                            <td>{{ isset($rolesFinance->recommenderName) ? $rolesFinance->recommenderName : 'Na' }}</td>
                        </tr>
                        
                        <tr>
                            <td>Approver</td>
                            <td>{{ isset($rolesFinance->approver) ? $rolesFinance->approver : 'Na' }}</td>
                            <td>{{ isset($rolesFinance->approverName) ? $rolesFinance->approverName : 'Na' }}</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    @include('modal.setting.eclaim.addapprovalrole')


    
</div>
