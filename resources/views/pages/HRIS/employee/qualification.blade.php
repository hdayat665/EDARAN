<div class="tab-pane fade" id="default-tab-2">
    <div class="card-header">
         <ul class="nav nav-tabs" id="myTab">
             <li class="nav-item">
                 <a href="#quali-tab-1" data-bs-toggle="tab" class="nav-link active">
                     <span class="d-sm-none">Education</span>
                     <span class="d-sm-block d-none">Education</span>
                 </a>
             </li>
             <li class="nav-item" id="qualifi">
                 <a href="#quali-tab-2" data-bs-toggle="tab" class="nav-link">
                     <span class="d-sm-none">Others</span>
                     <span class="d-sm-block d-none">Others</span>
                 </a>
             </li>
         </ul>
    </div>


     <div class="tab-content panel m-0 rounded-0 p-3">
         <div class="tab-pane fade active show" id="quali-tab-1">
             <div class="row p-2">
                 <button class="btn btn-primary col-md-2" data-bs-toggle="modal" data-bs-target="#modalladded"><i class="fa fa-plus"></i> New Education</button>
             </div>
             <div class="row p-2">
                <table id="employeeEducation" style="width: 100%" class="table table-striped align-middle">
                     <thead>
                     <tr>
                         <th data-orderable="false">No</th>
                         <th data-orderable="false">Action</th>
                         <th class="text-nowrap">From Date</th>
                         <th class="text-nowrap">To Date</th>
                         <th class="text-nowrap">Institute Name</th>
                         <th class="text-nowrap">Highest Level Attained</th>
                         <th class="text-nowrap">Result</th>
                         <th class="text-nowrap">Education Attachments</th>
                     </tr>
                     </thead>
                     <tbody>
                    <?php $id = 0 ?>
                    @if ($educations)
                        @foreach ($educations as $education)
                        <?php $id++ ?>
                        <tr>
                            <td> {{$id}} </td>
                            <td>
                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Actions <i class="fa fa-caret-down"></i></a>
                                <div class="dropdown-menu">
                                    <a href="javascript:;" id="educationModalEdit{{$education->id}}" data-id="{{$education->id}}" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editmodaledd"> Edit</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:;" id="deleteEducation{{$education->id}}" data-id="{{$education->id}}" class="dropdown-item" data-bs-toggle="modal"> Delete</a>
                                    <!-- <div class="dropdown-divider"></div> -->
                                </div>
                            </td>

                            <td> {{ $education->fromDate }} </td>
                            <td> {{ $education->toDate }} </td>
                            <td style="text-transform: uppercase;"> {{ $education->instituteName }} </td>
                            <td style="text-transform: uppercase;"> {{ $education->highestLevelAttained }} </td>
                            <td style="text-transform: uppercase;"> {{ $education->result }} </td>
                            <td></td>
                        </tr>
                        @endforeach
                    @endif
                    <span style="display: none"><input type="text" id="educationId" value="{{$educationId}}"></span>
                     </tbody>
                 </table>
             </div>

         </div>
         <div class="tab-pane fade show" id="quali-tab-2">
             <div class="row p-2">
                 <button class="btn btn-primary col-md-2" data-bs-toggle="modal" data-bs-target="#addmodalothers"><i class="fa fa-plus"></i> New Others</button>
             </div>
             <div class="row p-2">
                <table id="employeeOthers" style="width: 100%" class="table table-striped align-middle">
                     <thead>
                     <tr>
                         <th data-orderable="false">No</th>
                         <th data-orderable="false">Action</th>
                         <th class="text-nowrap"> Date</th>
                         <th class="text-nowrap">Professional Qualification Details</th>
                         <th class="text-nowrap">Attachments</th>
                     </tr>
                     </thead>
                     <tbody>
                        <?php $id = 0 ?>
                        @if ($others)
                            @foreach ($others as $other)
                            <?php $id++ ?>
                            <tr>
                                <td> {{$id}} </td>
                                <td>
                                    <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Actions <i class="fa fa-caret-down"></i></a>
                                    <div class="dropdown-menu">
                                        <a href="javascript:;" id="othersQualificationModalEdit{{$other->id}}" data-id="{{$other->id}}" class="dropdown-item" data-bs-toggle="modal"> Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="javascript:;" id="deleteOthers{{$other->id}}" data-id="{{$other->id}}" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteOthers"> Delete</a>
                                        <!-- <div class="dropdown-divider"></div> -->
                                    </div>
                                </td>

                                <td> {{ $other->otherDate }} </td>
                                <td style="text-transform: uppercase;"> {{ $other->otherPQDetails }} </td>
                                <td><a href="{{ route('view', ['filename' => $other->file]) }}" target="blank_">{{$other->file}}</a></td>
                            </tr>
                            @endforeach
                        @endif
                        <span style="display: none"><input type="text" id="othersId" value="{{$othersId}}"></span>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
     <div class="row p-2">
         <div class="modal-footer">
             <a class="btn btn-white me-5px btnPrevious">Previous</a>

             <a class="btn btn-white me-5px btnNext">Next</a>
         </div>
     </div>
 </div>

@include('modal.employee.addEducation')
@include('modal.employee.editEducation')
@include('modal.employee.addOthers')
@include('modal.employee.editOthers')
