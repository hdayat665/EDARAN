@extends('layouts.master')

@section('content')
<div class="content" id="profile">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">My Profile
                            <small class="description"></small>
                        </h4>
                    </div>
                    <div class="card-body ">
                        <ul class="nav nav-pills nav-pills-info" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#changePassword" role="tablist">
                                    Change Password
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" id="vec" href="#vehicle" role="tablist">
                                    Vehicle
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content tab-space">
                            <div class="tab-pane active" id="changePassword">
                                @include('pages.HRIS.changePassword');
                            </div>
                            <div class="tab-pane" id="vehicle">
                                @include('pages.HRIS.vehicleList');
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-6">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">Navigation Pills -
                            <small class="description">Vertical Tabs</small>
                        </h4>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="nav nav-pills nav-pills-rose flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#link4" role="tablist">
                                            Profile
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#link5" role="tablist">
                                            Settings
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#link6" role="tablist">
                                            Options
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-8">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="link4">
                                        Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits.
                                        <br>
                                        <br> Dramatically maintain clicks-and-mortar solutions without functional solutions. Dramatically visualize customer directed convergence without revolutionary ROI. Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. This is very nice.
                                    </div>
                                    <div class="tab-pane" id="link5">
                                        Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas.
                                        <br>
                                        <br>Dramatically maintain clicks-and-mortar solutions without functional solutions.
                                    </div>
                                    <div class="tab-pane" id="link6">
                                        Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas.
                                        <br>
                                        <br>Dynamically innovate resource-leveling customer service for state of the art customer service.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection
