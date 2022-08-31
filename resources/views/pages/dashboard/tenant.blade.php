@extends('layouts.dashboardTenant')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

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
            <div class="widget widget-stats bg-teal">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-users	 fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">EMPLOYEES</div>
                    <div class="stats-number">15</div>
                </div>
            </div>
        </div>
        <!-- END col-3 -->
        <!-- BEGIN col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-check-to-slot fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">PRESENT</div>
                    <div class="stats-number">9</div>
                </div>
            </div>
        </div>
        <!-- END col-3 -->
        <!-- BEGIN col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-indigo">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-circle-xmark fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">ABSENT</div>
                    <div class="stats-number">3</div>
                </div>
            </div>
        </div>
        <!-- END col-3 -->
        <!-- BEGIN col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-dark">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-user-large-slash fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">LEAVE</div>
                    <div class="stats-number">3</div>
                </div>
            </div>
        </div>
        <!-- END col-3 -->
    </div>
    <!-- END row -->
    <!-- BEGIN row -->

    <!-- BEGIN col-8 -->
    <div class="row">
					<div class="col-lg-6 panel panel-inverse" data-sortable-id="index-1">

						<div class="panel-heading mt-15px">
							<h4 class="panel-title"> <i class="fas fa-message fa-fw me-3"></i>Latest Announcement</h4>
						</div>

						<table class="table table-hover table-bordered table-responsive padding-auto">
							<thead>
									<tr>
									<th scope="col">Date</th>
									<th scope="col">Time</th>
									<th scope="col">Title</th>
									</tr>
								</thead>
								<tbody>
									<tr>
									<th scope="row">13 October 2020</th>
									<td>4 PM</td>
									<td>Memorandum : Conditional Movement Control Order</td>
									</tr>
									<tr>
									<th scope="row">11 September 2020</th>
									<td>9 AM</td>
									<td>Memorandum: from the Group Chief Executive Officer</td>
									</tr>
									<tr>
									<th scope="row">11 September 2020</th>
									<td>9 AM</td>
									<td>Memorandum: from the Group Chief Executive Officer</td>
									</tr>
									<tr>
									<th scope="row">11 September 2020</th>
									<td>9 AM</td>
									<td>Memorandum: from the Group Chief Executive Officer</td>
									</tr>
									<tr>
									<th scope="row">11 September 2020</th>
									<td>9 AM</td>
									<td>Memorandum: from the Group Chief Executive Officer</td>
									</tr>
									<tr>
									<th scope="row">11 September 2020</th>
									<td>9 AM</td>
									<td>Memorandum: from the Group Chief Executive Officer</td>
									</tr>
                                    <tr>
									<th scope="row">11 September 2020</th>
									<td>9 AM</td>
									<td>Memorandum: from the Group Chief Executive Officer</td>
									</tr>
                                    <tr>
									<th scope="row">11 September 2020</th>
									<td>9 AM</td>
									<td>Memorandum: from the Group Chief Executive Officer</td>
									</tr>
                                    <tr>
									<th scope="row">11 September 2020</th>
									<td>9 AM</td>
									<td>Memorandum: from the Group Chief Executive Officer</td>
									</tr>
                                    <tr>
									<th scope="row">11 September 2020</th>
									<td>9 AM</td>
									<td>Memorandum: from the Group Chief Executive Officer</td>
									</tr>
                                    <tr>
									<th scope="row">11 September 2020</th>
									<td>9 AM</td>
									<td>Memorandum: from the Group Chief Executive Officer</td>
									</tr>
								</tbody>
						</table>

						<nav aria-label="Page navigation example">
							<ul class="pagination justify-content-center">
								<li class="page-item">
								<a class="page-link" href="#" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
								</a>
								</li>
								<li class="page-item"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item">
								<a class="page-link" href="#" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
								</a>
								</li>
							</ul>
							</nav>
					</div>
					<div class="col-lg-6 panel panel-inverse">
							<div class="panel-heading mt-45px">
								<h4 class="panel-title"><i class="fas fa-rectangle-list fa-fw me-3"></i>Events</h4>
							</div>

							<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
								<div class="carousel-indicators">
									<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
									<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
									<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
								</div>
							<div class="carousel-inner">
								<div class="carousel-item active">
								<img src="../assets/img/gallery/Majlis Edaran 1.jpg" class="d-block w-100" alt="...">
								<div class="carousel-caption d-none d-md-block">
									<h5>Majlis Pelancaran MyVeteran Mall</h5>
									<p>Some representative placeholder content for the first slide.</p>
								</div>
								</div>
								<div class="carousel-item">
								<img src="../assets/img/gallery/Majlis Edaran 2.jpg" class="d-block w-100" alt="...">
								<div class="carousel-caption d-none d-md-block">
									<h5>Majlis Pelancaran MyVeteran Mall</h5>
									<p>Some representative placeholder content for the second slide.</p>
								</div>
								</div>
								<div class="carousel-item">
								<img src="../assets/img/gallery/Majlis Edaran 3.jpg" class="d-block w-100" alt="...">
								<div class="carousel-caption d-none d-md-block">
									<h5>Edaran Eyes TurnAround</h5>
									<p>Some representative placeholder content for the third slide.</p>
								</div>
								</div>
								</div>
								<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Previous</span>
								</button>
								<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Next</span>
								</button>
							</div>
				</div>
    <!-- END col-8 -->
    <!-- BEGIN col-4 -->
    <div class="panel panel-inverse">
		<div class="panel-heading mt-10px">
			<h4 class="panel-title"><i class="fas fa-rectangle-list fa-fw me-3"></i>Activity Log</h4>
			</div>
			<table id="data-table-default" class="table table-hover table-striped table-bordered align-middle ">
				<thead>
					<tr>
						<th class="text-nowrap">Employee ID</th>
						<th class="text-nowrap">Name</th>
						<th class="text-nowrap">Email</th>
						<th class="text-nowrap">Phone</th>
						<th class="text-nowrap">Status</th>
						<th class="text-nowrap">Clock in</th>
						<th class="text-nowrap">Location</th>
						<th class="text-nowrap">Project</th>
						<th class="text-nowrap">Activity</th>

					</tr>
				</thead>
				<tr class="odd gradeX">
					
						<td>TNG001</td>
						<td>ahmad</td>
						<td>ali@gmail.com</td>
						<td>60123456789</td>
						<td><span class="badge bg-green">Active</span></td>
						<td>8:30 AM</td>
						<td>Desa Pandan, Kuala Lumpur</td>
						<td>Projek KASTAM</td>
						<td>Data Flow</td>
						
					</tr>
					<tr class="odd gradeX">
					
						<td>TNG002</td>
						<td>ahmad</td>
						<td>ali@gmail.com</td>
						<td>60123456789</td>
						<td><span class="badge bg-green">Active</span></td>
						<td>8:30 AM</td>
						<td>Desa Pandan, Kuala Lumpur</td>
						<td>Projek KASTAM</td>
						<td>Data Flow</td>
						
					</tr>
					<tr class="odd gradeX">
					
						<td>TNG003</td>
						<td>ahmad</td>
						<td>ali@gmail.com</td>
						<td>60123456789</td>
						<td><span class="badge bg-yellow">Away</span></td>
						<td>-</td>
						<td>-</td>
						<td>-</td>
						<td>-</td>
						
					</tr>
					<tr class="odd gradeX">
					
						<td>TNG004</td>
						<td>husin</td>
						<td>husin@gmail.com</td>
						<td>601376542398</td>
						<td><span class="badge bg-green">Active</span></td>
						<td>8:30 AM</td>
						<td>Desa Pandan, Kuala Lumpur</td>
						<td>Projek KASTAM</td>
						<td>Data Flow</td>
						
					</tr>
					<tr class="odd gradeX">
					
						<td>TNG005</td>
						<td>ahmad</td>
						<td>ali@gmail.com</td>
						<td>60123456789</td>
						<td><span class="badge bg-red">Unavailable</span></td>
						<td>-</td>
						<td>-</td>
						<td>-</td>
						<td>-</td>
					</tr>
			</table>

					
		<nav aria-label="Page navigation example">
							<ul class="pagination justify-content-center">
								<li class="page-item">
								<a class="page-link" href="#" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
								</a>
								</li>
								<li class="page-item"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item">
								<a class="page-link" href="#" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
								</a>
								</li>
							</ul>
							</nav>
	</div>
    <!-- END col-4 -->
   
    <div class="row">
		<div class="col-lg-6 panel panel-inverse">
		<canvas id="myChart" style="width:100%;max-width:600px"></canvas>
		</div>
						
		<div class="col-lg-6 panel panel-inverse">
		<canvas id="bar-chart-grouped" style="width:100%;max-width:600px"></canvas>
		</div>
    </div>
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

<script>
var xValues = ["Annual Leave", "Emergency Leave", "Sick Leave", "Unpaid Leave", "Maternity Leave"];
var yValues = [55, 49, 44, 24, 15];
var barColors = [
  "#FFA600",
  "#57167E",
  "#9B3192",
  "#EA5F89",
  "#F7B7A3"
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Leave Employee Report"
    }
  }
});
</script>

<script>
	new Chart(document.getElementById("bar-chart-grouped"), {
    type: 'bar',
    data: {
      labels: ["20 Sept", "21 Sept", "22 Sept", "23 Sept"],
      datasets: [
        {
          label: "Check-in",
          backgroundColor: "#0030F1",
          data: [20,30,40,50]
        }, {
          label: "Check-out",
          backgroundColor: "#F10000",
          data: [80,60,40,20]
        }, {
          label: "Idle",
          backgroundColor: "#8C8C8C",
          data: [5,30,50,20]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Attendance Summary Report'
      }
    }
});
	</script>

@endsection


