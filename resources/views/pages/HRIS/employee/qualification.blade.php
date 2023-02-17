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
                 <button class="btn btn-primary col-md-2" data-bs-toggle="modal" data-bs-target="#modalladded">Add Education</button>
             </div>
             <div class="row p-2">
                 <table  id=""  class="table table-striped table-bordered align-middle">
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
                     <tr>
                         <td>1</td>
                         <td>
                             <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i class="fa fa-caret-down"></i></a>
                             <div class="dropdown-menu">
                                 <a href="javascript:;" id="" data-id="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editmodaledd" > Edit</a>
                                 <div class="dropdown-divider"></div>
                                 <a href="javascript:;" id="" data-id="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalreject"> Delete</a>
                                 <div class="dropdown-divider"></div>
                             </div>
                         </td>
                         <td>01/04/2019</td>
                         <td>31/08/2021</td>
                         <td>UNIVERSITI MALAYA</td>
                         <td>BACHELOR OF DEGREE</td>
                         <td>3.25</td>
                         <td>Degree.pdf</td>
                     </tr>
                     <tr>
                         <td>2</td>
                         <td>
                             <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i class="fa fa-caret-down"></i></a>
                             <div class="dropdown-menu">
                                 <a href="javascript:;" id="" data-id="" class="dropdown-item" > Edit</a>
                                 <div class="dropdown-divider"></div>
                                 <a href="javascript:;" id="" data-id="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalreject"> Delete</a>
                                 <div class="dropdown-divider"></div>
                             </div>
                         </td>
                         <td>03/02/2022</td>
                         <td>31/08/2021</td>
                         <td>UNIVERSITI MALAYA</td>
                         <td>MASTER'S DEGREE</td>
                         <td>PASS</td>
                         <td>Master.pdf</td>
                     </tr>
                     </tbody>
                 </table>
             </div>
             
         </div>
         <div class="tab-pane fade show" id="quali-tab-2">
             <div class="row p-2">
                 <button class="btn btn-primary col-md-2" data-bs-toggle="modal" data-bs-target="#addmodalothers"  >Add Others</button>
             </div>
             <div class="row p-2">
                 <table  id=""  class="table table-striped table-bordered align-middle">
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
                     <tr>
                         <td>1</td>
                         <td>
                             <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i class="fa fa-caret-down"></i></a>
                             <div class="dropdown-menu">
                                 <a href="javascript:;" id="" data-id="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editmodalothers" editmodalothers > Edit</a>
                                 <div class="dropdown-divider"></div>
                                 <a href="javascript:;" id="" data-id="" class="dropdown-item"> Delete</a>
                                 <div class="dropdown-divider"></div>
                             </div>
                         </td>
                         <td>16/09/2022</td>
                         <td>laravel Training</td>
                         <td>laravel.pdf</td>
                     </tr>
                     <tr>
                         <td>2</td>
                         <td>
                             <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i class="fa fa-caret-down"></i></a>
                             <div class="dropdown-menu">
                                 <a href="javascript:;" id="" data-id="" class="dropdown-item" > Edit</a>
                                 <div class="dropdown-divider"></div>
                                 <a href="javascript:;" id="" data-id="" class="dropdown-item"> Delete</a>
                                 <div class="dropdown-divider"></div>
                             </div>
                         </td>
                         <td>17/09/2022</td>
                         <td>Architect</td>
                         <td>Architect.pdf</td>
                     </tr>
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
 
 
 {{-- modal add education --}}
 <div class="modal fade " id="modalladded" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h1 class="modal-title fs-5" id="exampleModalLabel">Add Education</h1>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
             <div class="row p-2">
                 <div class="col-md-6">
                     <div class="form-group">
                         <label for="" class="form-label">From Date</label>
                         <input type="text" class="form-control" id="datepicker-fromdate" placeholder="YYYY/MM/DD">
                     </div>
                 </div>
                 <div class="col-md-6">
                     <div class="form-group">
                         <label for="" class="form-label">To Date</label>
                         <input type="text" class="form-control" id="datepicker-todate" placeholder="YYYY/MM/DD">
                     </div>
                 </div>
             </div>
             <div class="row p-2">
                 <div class="col-md-6">
                     <div class="form-group">
                         <label for="" class="form-label">Institute Name</label>
                         <input type="text" class="form-control" id="" placeholder="INSTITUTE NAME">
                     </div>
                 </div>
                 <div class="col-md-6">
                     <div class="form-group">
                         <label for="" class="form-label">Highest Level Attained</label>
                         <input type="text" class="form-control" id="" placeholder="HISGHEST LEVEL ATTAINED">
                     </div>
                 </div>
             </div>
             <div class="row p-2">
                 <div class="col-md-6">
                     <div class="form-group">
                         <label for="" class="form-label">Result</label>
                         <input type="text" class="form-control" id="" placeholder="RESULT">
                     </div>
                 </div>
                 <div class="col-md-6">
                     <div class="form-group">
                         <label for="" class="form-label">Education Attachments</label>
                         <input type="file" class="form-control-file" id="">
                     </div>
                 </div>
             </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           <button type="button" class="btn btn-primary">Save changes</button>
         </div>
       </div>
     </div>
   </div>
   
 {{-- end modal add education --}}
 
 {{-- start modal edit education --}}
 <div class="modal fade " id="editmodaledd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Education</h1>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
             <div class="row p-2">
                 <div class="col-md-6">
                     <div class="form-group">
                         <label for="" class="form-label">From Date</label>
                         <input type="text" class="form-control" id="datepicker-fromdateu" placeholder="YYYY/MM/DD">
                     </div>
                 </div>
                 <div class="col-md-6">
                     <div class="form-group">
                         <label for="" class="form-label">To Date</label>
                         <input type="text" class="form-control" id="datepicker-todateu" placeholder="YYYY/MM/DD">
                     </div>
                 </div>
             </div>
             <div class="row p-2">
                 <div class="col-md-6">
                     <div class="form-group">
                         <label for="" class="form-label">Institute Name</label>
                         <input type="text" class="form-control" id="" placeholder="INSTITUTE NAME">
                     </div>
                 </div>
                 <div class="col-md-6">
                     <div class="form-group">
                         <label for="" class="form-label">Highest Level Attained</label>
                         <input type="text" class="form-control" id="" placeholder="HIGHEST LEVEL ATTAINED">
                     </div>
                 </div>
             </div>
             <div class="row p-2">
                 <div class="col-md-6">
                     <div class="form-group">
                         <label for="" class="form-label">Result</label>
                         <input type="text" class="form-control" id="" placeholder="RESULT">
                     </div>
                 </div>
                 <div class="col-md-6">
                     <div class="form-group">
                         <label for="" class="form-label">Education Attachments</label>
                         <input type="file" class="form-control-file" id="">
                     </div>
                 </div>
             </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           <button type="button" class="btn btn-primary">Save changes</button>
         </div>
       </div>
     </div>
   </div>
   
 {{-- end modal add education --}}
 
 {{-- start modal others education --}}
 <div class="modal fade " id="addmodalothers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h1 class="modal-title fs-5" id="exampleModalLabel">Add Others Education</h1>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div class="row p-2">
                 <div class="form-group row">
                     <label for="staticEmail" class="col-sm-4 col-form-label">Date</label>
                     <div class="col-sm-8">
                         <input type="text" class="form-control" id="datepicker-others" placeholder="YYYY/MM/DD">
                     </div>
                 </div>
            </div>
            <div class="row p-2">
                 <div class="form-group row">
                     <label for="staticEmail" class="col-sm-4 col-form-label">Professional Qualification Details</label>
                     <div class="col-sm-8">
                         <input type="text" class="form-control" placeholder="PROFESSIONAL QUALIFICATION DETAILS">
                     </div>
                 </div>
             </div>
             <div class="row p-2">
                 <div class="form-group row">
                     <label for="staticEmail" class="col-sm-4 col-form-label">Attachments</label>
                     <div class="col-sm-8">
                         <input type="file" class="form-control-file" id="">
                     </div>
                 </div>
             </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           <button type="button" class="btn btn-primary">Save changes</button>
         </div>
       </div>
     </div>
   </div>
   
 {{-- end modal add education --}}
 
 {{-- start modal edit others education --}}
 <div class="modal fade " id="editmodalothers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Others Education</h1>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div class="row p-2">
                 <div class="form-group row">
                     <label for="staticEmail" class="col-sm-4 col-form-label">Date</label>
                     <div class="col-sm-8">
                         <input type="text" class="form-control" id="datepicker-othersu" placeholder="YYYY/MM/DD">
                     </div>
                 </div>
            </div>
            <div class="row p-2">
                 <div class="form-group row">
                     <label for="staticEmail" class="col-sm-4 col-form-label">Professional Qualification Details</label>
                     <div class="col-sm-8">
                         <input type="text" class="form-control" placeholder="PROFESSIONAL QUALIFICATION DETAILS">
                     </div>
                 </div>
             </div>
             <div class="row p-2">
                 <div class="form-group row">
                     <label for="staticEmail" class="col-sm-4 col-form-label">Attachments</label>
                     <div class="col-sm-8">
                         <input type="file" class="form-control-file" id="">
                     </div>
                 </div>
             </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           <button type="button" class="btn btn-primary">Save changes</button>
         </div>
       </div>
     </div>
   </div>
   
 {{-- end modal edit education --}}