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
    <div class="panel panel-inverse" data-sortable-id="index-1">

        <div class="panel-heading">
            <h4 class="panel-title">Latest Announcement</h4>
            <div class="panel-heading-btn">
            </div>
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
            </tbody>
        </table>
    </div>

    <div class="panel panel-inverse w-50 " data-sortable-id="index-1">

        <div class="panel-heading">
            <h4 class="panel-title">Events</h4>
        </div>

        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{env('ASSETS_URL')}}/img/gallery/Majlis Edaran 1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Majlis Pelancaran MyVeteran Mall</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{env('ASSETS_URL')}}/img/gallery/Majlis Edaran 2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Majlis Pelancaran MyVeteran Mall</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{env('ASSETS_URL')}}/img/gallery/Majlis Edaran 3.jpg" class="d-block w-100" alt="...">
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


