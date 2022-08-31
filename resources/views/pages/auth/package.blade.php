@extends('layouts.package')

@section('content')

<div class="text-center mt-40px">
    <img src="{{env('ASSETS_URL')}}/img/logo/orbit-logo-5.png" class="img-fluid" style="margin:3h"  alt="Orbit Logo">
</div>

<div class="row row-cols-1 row-cols-md-3 g-4 mt-50px">
  <div class="col">
    <div class="card h-100">
                 <div class="card-body text-center">
                            <i class="fas fa-box fa-7x text-center "></i>
                            <h2 class="text-center mt-30px">BASIC</h2>
                            <h3 class="text-center text-gray">Free</h3>
                                <div class="card border-0" style="padding:2vh">
                                    <p class="text-center text-green">
                                        <i class="fa-solid fa-square-check"></i>    
                                        Maximum User Count : 100</p>
                                    <p class="text-center text-green">
                                        <i class="fa-solid fa-square-check"></i>    
                                    Test check feature</p>
                                    <p class="text-center text-danger">
                                        <i class="fa-solid fa-ban"></i>    
                                        Test check feature 2</p>
                                </div>
              </div>
                    <div class="mb-15px">
                    <a href="/registerTenant/basic"><button type="submit" class="btn btn-primary d-block h-45px w-100 btn-lg fs-14px">Basic Package</button></a>
                    </div>
    </div>
  </div>

  <div class="col">
    <div class="card h-100">
                 <div class="card-body text-center">
                 <i class="fas fa-gem fa-7x text-center "></i>
                <h2 class="text-center mt-30px">GOLD</h2>
                <h4 class="text-center text-gray">RM 199.99 / YEARLY</h4>
				<div class="card border-0" style="padding:2vh">
                    <p class="text-center text-green">
                        <i class="fa-solid fa-square-check"></i>    
                        Maximum User Count : Unlimited</p>
                    <p class="text-center text-green">
                        <i class="fa-solid fa-square-check"></i>    
                       Test check feature</p>
					   <p class="text-center text-green">
					   <i class="fa-solid fa-square-check"></i>     
						Test check feature 2</p>
                                </div>
              </div>
                    <div class="mb-15px">
                    <a href="/registerTenant/gold"><button type="submit" class="btn btn-primary d-block h-45px w-100 btn-lg fs-14px">Gold Package</button></a>
                    </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
                 <div class="card-body text-center">
                 <i class="fas fa-gift fa-7x text-center "></i>
                <h2 class="text-center mt-30px">PLATINUM</h2>
                <h4 class="text-center text-gray">RM 299.99 / YEARLY</h4>
                <div class="card border-0" style="padding:2vh">
                    <p class="text-center">
                        RM1 PERDAY <br>
						RM7 PERWEEK <br>
						RM30 PERMONTH<br>
						299.99 PERYEAR
                    
						<p class="text-center text-green">
                        <i class="fa-solid fa-square-check"></i>    
                        Maximum User Count : Unlimited</p>
                    <p class="text-center text-green">
                        <i class="fa-solid fa-square-check"></i>    
                       Test check feature</p>
					   <p class="text-center text-green">
					   <i class="fa-solid fa-square-check"></i>     
						Test check feature 2</p>
                                </div>
              </div>
                    <div class="mb-15px">
                    <a href="/registerTenant/premium"><button type="submit" class="btn btn-primary d-block h-45px w-100 btn-lg fs-14px">Platinum Package</button></a>
                    </div>
        </div>
    </div>
    
  </div>

@endsection
