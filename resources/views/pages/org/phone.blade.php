@extends('layouts.dashboardTenant')

@section('content')
<div id="content" class="app-content">
    <h1 class="page-header" id="organization">General Information</h1>
    <div class="panel panel-with-tabs">
        <div class="panel-heading p-0">
            <div class="tab-overflow">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#default-tab-1" data-bs-toggle="tab" class="nav-link active">
                            <span class="d-sm-none">Phone Directory</span>
                            <span class="d-sm-block d-none">Phone Directory</span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
        <div class="panel-body tab-content">
            <div class="tab-pane fade active show" id="default-tab-1">
                <table id="data-table-default" class="table table-striped table-bordered align-middle">
                    <thead>
                        <tr>
                            <th class="text-nowrap">No</th>
                            <th class="text-nowrap">Image</th>
                            <th class="text-nowrap">First Name</th>
                            <th class="text-nowrap">Last name</th>
                            <th class="text-nowrap">Designation</th>
                            <th class="text-nowrap">Extension Number</th>
                            <th class="text-nowrap">Phone Number</th>
                            <th class="text-nowrap">Email</th>
                            <th class="text-nowrap">Department</th>

                            {{-- <th class="text-nowrap">No</th>
                            <th class="text-nowrap">Action</th>
                            <th class="text-nowrap">Employee ID</th>
                            <th class="text-nowrap">First Name</th>
                            <th class="text-nowrap">Last Name</th>
                            <th class="text-nowrap">Email</th>
                            <th class="text-nowrap">Phone Number</th>
                            <th class="text-nowrap">Department</th>
                            <th class="text-nowrap">Report to</th>
                            <th class="text-nowrap">Employee Status</th> --}}

                        </tr>
                    </thead>
                    <tbody>

                        {{-- <tr class="odd gradeX">
                            <td>1</td>
                            <td class="text-center"><img src="../assets/img/user/user-13.jpg" class="w-50px"></td>
                            <td>Ali</td>
                            <td>Daud</td>
                            <td>Customer Care</td>
                            <td>-</td>
                            <td>Safuan</td>
                            <td>60123456789</td>
                            <td>IT</td>
                        </tr>
                        <tr class="odd gradeX">
                            <td>2</td>
                            <td class="text-center"><img src="../assets/img/user/user-5.jpg" class="w-50px"></td>
                            <td>Husin</td>
                            <td>Suhaimi</td>
                            <td>Customer  Care</td>
                            <td>-</td>
                            <td>Safuan</td>
                            <td>60123456789</td>
                            <td>IT</td>
                        </tr>
                        <tr class="odd gradeX">
                            <td>3</td>
                            <td class="text-center"><img src="../assets/img/user/user-6.jpg" class="w-50px"></td>
                            <td>Kamal</td>
                            <td>Afifi</td>
                            <td>Customer Care</td>
                            <td>-</td>
                            <td>Safuan</td>
                            <td>60123456789</td>
                            <td>Infra</td>
                        </tr>
                        <tr class="odd gradeX">
                            <td>4</td>
                            <td class="text-center"><img src="../assets/img/user/user-7.jpg" class="w-50px"></td>
                            <td>Sulaiman</td>
                            <td>Imran</td>
                            <td>Data Administrator</td>
                            <td>-</td>
                            <td>Safuan</td>
                            <td>60123456789</td>
                            <td>Finance</td>
                        </tr>
                        <tr class="odd gradeX">
                            <td>5</td>
                            <td class="text-center"><img src="../assets/img/user/user-13.jpg" class="w-50px"></td>
                            <td>Ayubi</td>
                            <td>Suhail</td>
                            <td>Data Administrator</td>
                            <td>-</td>
                            <td>Safuan</td>
                            <td>60123456789</td>
                            <td>IT</td>
                        </tr>
                        <tr class="odd gradeX">
                            <td>6</td>
                            <td class="text-center"><img src="../assets/img/user/user-8.jpg" class="w-50px"></td>
                            <td>Wan</td>
                            <td>Rahim</td>
                            <td>Customer Care</td>
                            <td>-</td>
                            <td>Safuan</td>
                            <td>60123456789</td>
                            <td>IT</td>
                        </tr>
                        <tr class="odd gradeX">
                            <td>7</td>
                            <td class="text-center"><img src="../assets/img/user/user-9.jpg" class="w-50px"></td>
                            <td>Salim</td>
                            <td>Khan</td>
                            <td>Data Administrator</td>
                            <td>-</td>
                            <td>Safuan</td>
                            <td>60123456789</td>
                            <td>Finance</td>
                        </tr>
                        <tr class="odd gradeX">
                            <td>8</td>
                            <td class="text-center"><img src="../assets/img/user/user-10.jpg" class="w-50px"></td>
                            <td>Ghani</td>
                            <td>Ayub</td>
                            <td>Data Administrator</td>
                            <td>-</td>
                            <td>Safuan</td>
                            <td>60123456789</td>
                            <td>Infra</td>
                        </tr>
                        <tr class="odd gradeX">
                            <td>9</td>
                            <td class="text-center"><img src="../assets/img/user/user-11.jpg" class="w-50px"></td>
                            <td>Jalil</td>
                            <td>Iman</td>
                            <td>Customer Care</td>
                            <td>-</td>
                            <td>Safuan</td>
                            <td>60123456789</td>
                            <td>Infra</td>
                        </tr>
                        <tr class="odd gradeX">
                            <td>10</td>
                            <td class="text-center"><img src="../assets/img/user/user-12.jpg" class="w-50px"></td>
                            <td>Tapan</td>
                            <td>Hamid</td>
                            <td>Customer Care</td>
                            <td>-</td>
                            <td>Safuan</td>
                            <td>60123456789</td>
                            <td>IT</td>
                        </tr> --}}
                        @if ($phoneDirectoryInfos)
                    <?php $no = 1 ?>
                    @foreach ($phoneDirectoryInfos as $phoneInfo)
                    <tr class="odd gradeX">
                        <td width="1%" class="fw-bold text-dark">{{$no++}}</td>
                        {{-- <td class="text-center"><img src="../assets/img/user/user-13.jpg" class="w-50px"></td> --}}
                        @php
                        $profilePicUrl = asset('storage/profilePic/' . $phoneInfo->user_id . '.jpg');
                        @endphp

                        @if ($phoneInfo->user_id && file_exists(public_path('storage/profilePic/' . $phoneInfo->user_id . '.jpg')))
                        <td class="text-center"><img src="{{ $profilePicUrl }}" class="w-50px"></td>
                        @else
                            {{-- <img src="{{ asset('../assets/img/user/user-13.jpg') }}" width="1%" class="rounded d-block" alt="Profile Picture" data-bs-toggle="modal" data-bs-target="#modal-dialog"> --}}
                            <td class="text-center"><img src="{{ asset('../assets/img/user/user-13.jpg') }}" class="w-50px"></td>
                        @endif

                      

                        <td>{{$phoneInfo->firstName}}</td>
                        <td>{{$phoneInfo->lastName}}</td>
                        <td>{{$phoneInfo->designationName}}</td>
                        <td>{{$phoneInfo->extensionNo ?? '-'}}</td>
                        <td>{{$phoneInfo->phoneNo}}</td>
                        <td>{{$phoneInfo->workingEmail}}</td>
                        <td>{{$phoneInfo->department}}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
                </table>
            </div>
            @include('pages.HRIS.employee.terminateEmployee')
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-lg-6">
        </div>
        <div class="col-xl-4 col-lg-6">
        </div>
        <div class="col-xl-4 col-lg-6">
        </div>
    </div>
</div>
@endsection
