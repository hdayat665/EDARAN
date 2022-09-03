@extends('layouts.dashboardTenant')

@section('content')


<div id="content" class="app-content">
    <!-- BEGIN breadcrumb -->
    <!-- BEGIN breadcrumb -->
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">Dashboard</h1>
    <!-- END page-header -->
    <!-- BEGIN row -->
    <div class="row">
        <!-- BEGIN col-3 -->
        <div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-blue">
				<div class="stats-icon"><i class="fa fa-calendar-days"></i></div>
				<div class="stats-info">
					<h4>MY TIMESHEET</h4>
					<p>4</p>	
				</div>
				<div class="stats-link">
					<a ><i class="fa fa-calendar-days"></i></a>
				</div>
			</div>
		</div>
        <!-- END col-3 -->
        <!-- BEGIN col-3 -->
        <div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-info">
				<div class="stats-icon"><i class="fa fa-bag-shopping"></i></div>
				<div class="stats-info">
					<h4>MY PROJECTS</h4>
					<p>6</p>	
				</div>
				<div class="stats-link">
				<a ><i class="fa fa-bag-shopping"></i></a>
				</div>
			</div>
		</div>
        <!-- END col-3 -->
        <!-- BEGIN col-3 -->
        <div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-success">
				<div class="stats-icon"><i class="fa fa-money-check"></i></div>
				<div class="stats-info">
					<h4>COMPANY PROJECTS</h4>
					<p>89</p>	
				</div>
				<div class="stats-link">
				<a ><i class="fa fa-money-check"></i></a>
				</div>
			</div>
		</div>
        <!-- END col-3 -->
        <!-- BEGIN col-3 -->
        <div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-lime">
				<div class="stats-icon"><i class="fa fa-users"></i></div>
				<div class="stats-info">
					<h4>REGISTERED EMPLOYEE</h4>
					<p>351</p>	
				</div>
				<div class="stats-link">
				<a ><i class="fa fa-users"></i></a>
				</div>
			</div>
		</div>
        <!-- END col-3 -->
    </div>
    <!-- END row -->
    <!-- BEGIN row -->

    <!-- BEGIN col-8 -->
    <div class="row">
		<div class="col-lg-12 panel panel-inverse" data-sortable-id="index-1">
				<div class="panel-heading mt-15px">
							<h4 class="panel-title"> <i class="fas fa-message fa-fw me-3"></i>Announcements</h4>
				</div>
				<div class="panel-body">
						<table id="data-table-default-announcement" class="table table-striped table-bordered align-middle">
				<thead>
					<tr>
						<th width="1%"></th>
						<th class="text-nowrap">Date</th>
						<th class="text-nowrap">Time</th>
						<th class="text-nowrap">Title</th>
						<th class="text-nowrap">Content</th>
						<th class="text-nowrap">Supporting Document</th>
					</tr>
				</thead>
				<tbody>
					<tr class="odd gradeX">
						<td width="1%" class="fw-bold text-dark">1</td>
						<td>1/1/2022</td>
						<td>09.25 am</td>
						<td>Title A</td>
						<td>Content 2</td>
						<td><a href="#">example.png</a></td>
					</tr>
					<tr class="even gradeC">
						<td class="fw-bold text-dark">2</td>
						<td>13/1/2022</td>
						<td>01.25 am</td>
						<td>Title B</td>
						<td>Content F</td>
						<td><a href="#">example.png</a></td>
					</tr>
					<tr class="odd gradeA">
						<td class="fw-bold text-dark">3</td>
						<td>16/1/2022</td>
						<td>07.25 am</td>
						<td>Title C</td>
						<td>Content A</td>
						<td><a href="#">example.png</a></td>
					</tr>
					<tr class="even gradeA">
						<td class="fw-bold text-dark">4</td>
						<td>1/2/2022</td>
						<td>09.22 am</td>
						<td>Title D</td>
						<td>Content D</td>
						<td><a href="#">example.png</a></td>
					</tr>
					<tr class="odd gradeA">
						<td class="fw-bold text-dark">5</td>
						<td>1/6/2022</td>
						<td>09.25 pm</td>
						<td>Title E</td>
						<td>Content A</td>
						<td><a href="#">example.png</a></td>
					</tr>
					<tr class="even gradeA">
						<td class="fw-bold text-dark">6</td>
						<td>1/8/2022</td>
						<td>02.25 pm</td>
						<td>Title E</td>
						<td>Content A</td>
						<td><a href="#">example.png</a></td>
					</tr>
					<tr class="gradeA">
						<td class="fw-bold text-dark">7</td>
						<td>12/12/2022</td>
						<td>01.25 am</td>
						<td>Title A</td>
						<td>Content A</td>
						<td><a href="#">example.png</a></td>
					</tr>
					<tr class="gradeA">
						<td class="fw-bold text-dark">8</td>
						<td>1/1/2023</td>
						<td>06.25 am</td>
						<td>Title A</td>
						<td>Content A</td>
						<td><a href="#">example.png</a></td>
					</tr>
					<tr class="gradeA">
						<td class="fw-bold text-dark">9</td>
						<td>12/11/2023</td>
						<td>03.25 am</td>
						<td>Title A</td>
						<td>Content A</td>
						<td><a href="#">example.png</a></td>
					</tr>
					<tr class="gradeA">
						<td class="fw-bold text-dark">10</td>
						<td>1/1/2025</td>
						<td>05.25 am</td>
						<td>Title A</td>
						<td>Content A</td>
						<td><a href="#">example.png</a></td>
					</tr>
				</tbody>
			</table>

						
				</div>
					
			</div>
		</div>
    <!-- END col-8 -->
	<div class="row">
		<div class="col-lg-12 panel panel-inverse" data-sortable-id="index-1">
				<div class="panel-heading mt-15px">
							<h4 class="panel-title"> <i class="fas fa-newspaper fa-fw me-3"></i>Events</h4>
				</div>
				
				<div class="panel-body">
				
						<table id="data-table-default-events" class="table table-striped table-bordered align-middle">
					<thead>
					<tr>
						<th width="1%"></th>
						<th class="text-nowrap">Event Name</th>
						<th class="text-nowrap">Date</th>
						<th class="text-nowrap">Time</th>
						<th class="text-nowrap">Location</th>
						<th class="text-nowrap">Description</th>
						<th class="text-nowrap">Participants</th>
					</tr>
				</thead>
				<tbody>
					<tr class="odd gradeX">
						<td class="fw-bold text-dark">1</td>
						<td>Event A</td>
						<td>1/1/2021-1/2/2021</td>
						<td>05.25 am - 010.25 am</td>
						<td>location A</td>
						<td>Description A</td>
						<td> 423 </td>
					</tr>
					<tr class="even gradeC">
						<td class="fw-bold text-dark">2</td>
						<td>Event A</td>
						<td>1/1/2021-1/2/2021</td>
						<td>05.25 am - 010.25 am</td>
						<td>location A</td>
						<td>Description A</td>
						<td> 23 </td>
					</tr>
					<tr class="odd gradeA">
						<td class="fw-bold text-dark">3</td>
						<td>Event A</td>
						<td>1/1/2021-1/2/2021</td>
						<td>05.25 am - 010.25 am</td>
						<td>location A</td>
						<td>Description A</td>
						<td> 12 </td>
					</tr>
					<tr class="even gradeA">
						<td class="fw-bold text-dark">4</td>
						<td>Event A</td>
						<td>1/1/2021-1/2/2021</td>
						<td>05.25 am - 010.25 am</td>
						<td>location A</td>
						<td>Description A</td>
						<td> 43 </td>
					</tr>
					<tr class="odd gradeA">
						<td class="fw-bold text-dark">5</td>
						<td>Event A</td>
						<td>1/1/2021-1/2/2021</td>
						<td>05.25 am - 010.25 am</td>
						<td>location A</td>
						<td>Description A</td>
						<td> 123 </td>
					</tr>
					<tr class="even gradeA">
						<td class="fw-bold text-dark">6</td>
						<td>Event A</td>
						<td>1/1/2021-1/2/2021</td>
						<td>05.25 am - 010.25 am</td>
						<td>location A</td>
						<td>Description A</td>
						<td> 23 </td>
					</tr>
					<tr class="gradeA">
						<td class="fw-bold text-dark">7</td>
						<td>Event A</td>
						<td>1/1/2021-1/2/2021</td>
						<td>05.25 am - 010.25 am</td>
						<td>location A</td>
						<td>Description A</td>
						<td> 5 </td>
					</tr>
					<tr class="gradeA">
						<td class="fw-bold text-dark">8</td>
						<td>Event A</td>
						<td>1/1/2021-1/2/2021</td>
						<td>05.25 am - 010.25 am</td>
						<td>location A</td>
						<td>Description A</td>
						<td> 36 </td>
					</tr>
					<tr class="gradeA">
						<td class="fw-bold text-dark">9</td>
						<td>Event A</td>
						<td>1/1/2021-1/2/2021</td>
						<td>05.25 am - 010.25 am</td>
						<td>location A</td>
						<td>Description A</td>
						<td> 25 </td>
					</tr>
					<tr class="gradeA">
						<td class="fw-bold text-dark">10</td>
						<td>Event A</td>
						<td>1/1/2021-1/2/2021</td>
						<td>05.25 am - 010.25 am</td>
						<td>location A</td>
						<td>Description A</td>
						<td> 423 </td>
					</tr>
				</tbody>
			</table>

						
				</div>
					
			</div>
		</div>
	<!--  -->
	<div class="row">
		<div class="col-lg-12 panel panel-inverse" data-sortable-id="index-1">
				<div class="panel-heading mt-15px">
							<h4 class="panel-title"> <i class="fas fa-newspaper fa-fw me-3"></i>Live Clock In Activities</h4>
				</div>
				<div class="panel-body">
						<table id="data-table-default-clocks" class="table table-striped table-bordered align-middle">
					<thead>
					<tr>
						<th width="1%"></th>
						<th width="1%">View</th>
						<th width="1%">Image</th>
						<th class="text-nowrap">Employee Name</th>
						<th class="text-nowrap">Phone Number</th>
						<th class="text-nowrap">Designation</th>
						<th class="text-nowrap">Department</th>
						<th class="text-nowrap">Attendance</th>
						<th class="text-nowrap">Clock In</th>
						<th class="text-nowrap">Clock Out</th>
						<th class="text-nowrap">Location</th>
					</tr>
				</thead>
				<tbody>
					<tr class="odd gradeX">
						<td class="fw-bold text-dark">1</td>
						<td style="text-align:center" width="1%" ><a href ="#"><i class="fas fa-eye fa-2x"></i></td>
						<td style="text-align:center" width="1%" class="with-img"><img src="/assets/img/user/user-1.jpg" class="rounded h-30px my-n1 mx-n1" /></td>
						<td>Elon Musk</td>
						<td>0123456789</td>
						<td>Senior Manager</td>
						<td>Service Delivery Department</td>
						<td><span class="badge bg-green">Present</span></td>
						<td>8.12 am</td>
						<td>10.10 am</td>
						<td>Headquarters</td>
					</tr>
					<tr class="even gradeC">
						<td class="fw-bold text-dark">2</td>
						<td style="text-align:center" width="1%" ><a href ="#"><i class="fas fa-eye fa-2x"></i></td>
						<td style="text-align:center" width="1%" class="with-img"><img src="/assets/img/user/user-1.jpg" class="rounded h-30px my-n1 mx-n1" /></td>
						<td>Bill Gate</td>
						<td>0123456789</td>
						<td>Senior Manager</td>
						<td>Service Delivery Department</td>
						<td><span class="badge bg-warning">On-leave</span></td>
						<td>-</td>
						<td>-</td>
						<td>Unavailable</td>
					</tr>
					<tr class="odd gradeA">
						<td class="fw-bold text-dark">3</td>
						<td style="text-align:center" width="1%" ><a href ="#"><i class="fas fa-eye fa-2x"></i></td>
						<td style="text-align:center" width="1%" class="with-img"><img src="/assets/img/user/user-1.jpg" class="rounded h-30px my-n1 mx-n1" /></td>
						<td>Drow Ranger</td>
						<td>0123456789</td>
						<td>Senior Manager</td>
						<td>Service Delivery Department</td>
						<td><span class="badge bg-green">Present</span></td>
						<td>8.12 am</td>
						<td> - </td>
						<td>Headquarters</td>
					</tr>
					<tr class="even gradeA">
						<td class="fw-bold text-dark">4</td>
						<td style="text-align:center" width="1%" ><a href ="#"><i class="fas fa-eye fa-2x"></i></td>
						<td style="text-align:center" width="1%" class="with-img"><img src="/assets/img/user/user-1.jpg" class="rounded h-30px my-n1 mx-n1" /></td>
						<td>Invoker</td>
						<td>0123456789</td>
						<td>Senior Manager</td>
						<td>Service Delivery Department</td>
						<td><span class="badge bg-green">Present</span></td>
						<td>8.12 am</td>
						<td>10.10 am</td>
						<td>Headquarters</td>
					</tr>
					<tr class="odd gradeA">
						<td class="fw-bold text-dark">5</td>
						<td style="text-align:center" width="1%" ><a href ="#"><i class="fas fa-eye fa-2x"></i></td>
						<td style="text-align:center" width="1%" class="with-img"><img src="/assets/img/user/user-1.jpg" class="rounded h-30px my-n1 mx-n1" /></td>
						<td>Topson</td>
						<td>0123456789</td>
						<td>Senior Manager</td>
						<td>Service Delivery Department</td>
						<td><span class="badge bg-danger">Absent</span></td>
						<td>-</td>
						<td> - </td>
						<td>Unavailable</td>
					</tr>
					<tr class="even gradeA">
						<td class="fw-bold text-dark">6</td>
						<td style="text-align:center" width="1%" ><a href ="#"><i class="fas fa-eye fa-2x"></i></td>
						<td style="text-align:center" width="1%" class="with-img"><img src="/assets/img/user/user-1.jpg" class="rounded h-30px my-n1 mx-n1" /></td>
						<td>Notail</td>
						<td>0123456789</td>
						<td>Senior Manager</td>
						<td>Service Delivery Department</td>
						<td><span class="badge bg-green">Present</span></td>
						<td>8.12 am</td>
						<td>10.10 am</td>
						<td>Unavailable</td>
					</tr>
					<tr class="gradeA">
						<td class="fw-bold text-dark">7</td>
						<td style="text-align:center" width="1%" ><a href ="#"><i class="fas fa-eye fa-2x"></i></td>
						<td style="text-align:center" width="1%" class="with-img"><img src="/assets/img/user/user-1.jpg" class="rounded h-30px my-n1 mx-n1" /></td>
						<td>Sumail</td>
						<td>0123456789</td>
						<td>Senior Manager</td>
						<td>Service Delivery Department</td>
						<td><span class="badge bg-green">Present</span></td>
						<td>8.12 am</td>
						<td>10.10 am</td>
						<td>Unavailable</td>
					</tr>
					<tr class="gradeA">
						<td class="fw-bold text-dark">8</td>
						<td style="text-align:center" width="1%" ><a href ="#"><i class="fas fa-eye fa-2x"></i></td>
						<td style="text-align:center" width="1%" class="with-img"><img src="/assets/img/user/user-1.jpg" class="rounded h-30px my-n1 mx-n1" /></td>
						<td>Ammar</td>
						<td>0123456789</td>
						<td>Senior Manager</td>
						<td>Service Delivery Department</td>
						<td><span class="badge bg-green">Present</span></td>
						<td>8.12 am</td>
						<td>10.10 am</td>
						<td>Unavailable</td>
					</tr>
					<tr class="gradeA">
						<td class="fw-bold text-dark">9</td>
						<td style="text-align:center" width="1%" ><a href ="#"><i class="fas fa-eye fa-2x"></i></td>
						<td style="text-align:center" width="1%" class="with-img"><img src="/assets/img/user/user-1.jpg" class="rounded h-30px my-n1 mx-n1" /></td>
						<td>Weeha</td>
						<td>0123456789</td>
						<td>Senior Manager</td>
						<td>Service Delivery Department</td>
						<td><span class="badge bg-green">Present</span></td>
						<td>8.12 am</td>
						<td>10.10 am</td>
						<td>Unavailable</td>
					</tr>
					<tr class="gradeA">
						<td class="fw-bold text-dark">10</td>
						<td style="text-align:center" width="1%" ><a href ="#"><i class="fas fa-eye fa-2x"></i></td>
						<td style="text-align:center" width="1%" class="with-img"><img src="/assets/img/user/user-1.jpg" class="rounded h-30px my-n1 mx-n1" /></td>
						<td>Abdul Hazim</td>
						<td>0123456789</td>
						<td>Senior Manager</td>
						<td>Service Delivery Department</td>
						<td><span class="badge bg-green">Present</span></td>
						<td>8.12 am</td>
						<td>10.10 am</td>
						<td>Unavailable</td>
					</tr>
				</tbody>
			</table>

						
				</div>
					
			</div>
		</div>

	
    <!-- END col-8 -->
    <!-- BEGIN col-4 -->
    
	<div class="row">
					<div class="col-lg-6 panel panel-inverse">
					<div class="panel-heading mt-15px">
								<h4 class="panel-title"><i class="fas fa-clipboard-check fa-fw me-3"></i>Leave Employee Report</h4>
							</div>
						<div class="panel-body">
							
							<div id="chart-wrapper">
									<canvas id="pie-chart"  style="border:1px solid" width="300" height="200">
					</div>
				</div>
			</div>

					<div class="col-lg-6 panel panel-inverse">
					<div class="panel-heading mt-15px">
								<h4 class="panel-title"><i class="fas fa-clock-rotate-left fa-fw me-3"></i>Attendance Summary Report</h4>
							</div>
					<div class="panel-body">
					<canvas id="bar-chart" style="border:1px solid"></canvas>
							</div></div>
				</div>
				
					
		
    <!-- END col-4 -->
   
    
    <!-- END row -->
    <!-- BEGIN row -->
    <div class="row">
        <!-- BEGIN col-4 -->
        <div class="col-xl-4 col-lg-6">
            <!-- BEGIN panel -->

            <!-- END panel -->
        </div>
        <!-- END col-4 -->
        <!-- BEGIN col-4 -->
        <div class="col-xl-4 col-lg-6">
            <!-- BEGIN panel -->

            <!-- END panel -->
        </div>
        <!-- END col-4 -->
        <!-- BEGIN col-4 -->
        <div class="col-xl-4 col-lg-6">
            <!-- BEGIN panel -->

            <!-- END panel -->
        </div>
        <!-- END col-4 -->
    </div>
    <!-- END row -->
</div>



@endsection


