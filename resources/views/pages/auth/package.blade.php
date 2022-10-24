@extends('layouts.package')

@section('content')
<link href="../assets/css/one-page-parallax/vendor.min.css" rel="stylesheet" />
<link href="../assets/css/one-page-parallax/app.min.css" rel="stylesheet" />
<script src="../assets/js/one-page-parallax/vendor.min.js"></script>
	<script src="../assets/js/one-page-parallax/app.min.js"></script>
<div class="text-center">
    <img src="{{env('ASSETS_URL')}}/img/logo/orbit-logo-5.png" class="img-fluid" style="margin:1h"  alt="Orbit Logo" width="500" height="500">
</div>



<div class="content" data-scrollview="true">
			<!-- begin container -->
			<div class="container" data-animation="true" data-animation-type="fadeInDown">
				
				<!-- begin row -->
				<div class="row ">
					<!-- begin col-12 -->
					<div class="col-md-12">
						<!-- begin pricing-table -->
						<ul class="pricing-table pricing-col-3">
							<li>
								<!-- begin pricing-container -->
								<div class="pricing-container">
									<h3>BASIC</h3>
									<div class="price">
										<div class="price-figure">
											<span class="price-number">FREE</span>
										</div>
									</div>
									<ul class="features">
										<li>User Count : 100</li>
										<li>2 Clients</li>
										<li>5 Active Projects</li>
										<li>5 Colors</li>
										<li>Free Goodies</li>
										<li>24/7 Email support</li>
									</ul>
									<div class="footer">
                                    <a href="/registerTenant/basic"><button type="submit" class="btn btn-dark btn-theme btn-block">Buy Now</button></a>
									</div>
								</div>
								<!-- end pricing-container -->
							</li>
							<li>
								<!-- begin pricing-container -->
								<div class="pricing-container">
									<h3>GOLD</h3>
									<div class="price">
										<div class="price-figure">
											<span class="price-number">$9.99</span>
											<span class="price-tenure">per month</span>
										</div>
									</div>
									<ul class="features">
										<li>User Count : Unlimited</li>
										<li>5 Clients</li>
										<li>10 Active Projects</li>
										<li>10 Colors</li>
										<li>Free Goodies</li>
										<li>24/7 Email support</li>
									</ul>
									<div class="footer">
                                    <a href="/registerTenant/gold"><button type="submit" class="btn btn-dark btn-theme btn-block">Buy Now</button></a>
									</div>
								</div>
								<!-- end pricing-container -->
							</li>
							<li class="highlight">
								<!-- begin pricing-container -->
								<div class="pricing-container">
									<h3>PREMIUM</h3>
									<div class="price">
										<div class="price-figure">
											<span class="price-number">$19.99</span>
											<span class="price-tenure">per month</span>
										</div>
									</div>
									<ul class="features">
										<li>User Count : Unlimited</li>
										<li>10 Clients</li>
										<li>20 Active Projects</li>
										<li>20 Colors</li>
										<li>Free Goodies</li>
										<li>24/7 Email support</li>
									</ul>
									<div class="footer">
                                    <a href="/registerTenant/premium"><button type="submit" class="btn btn-primary btn-theme btn-block">Buy Now</button></a>
									</div>
								</div>
								<!-- end pricing-container -->
							</li>
							<li>
								<!-- begin pricing-container -->
								<div class="pricing-container">
									<h3>PLATINUM</h3>
									<div class="price">
										<div class="price-figure">
											<span class="price-number">$999</span>
										</div>
									</div>
									<ul class="features">
										<li>User Count : Unlimited</li>
										<li>Unlimited Clients</li>
										<li>Unlimited Projects</li>
										<li>Unlimited Colors</li>
										<li>Free Goodies</li>
										<li>24/7 Email support</li>
									</ul>
									<div class="footer">
                                    <a href="#"><button type="submit" class="btn btn-dark btn-theme btn-block" disabled>Coming Soon</button></a>
									</div>
								</div>
								<!-- end pricing-container -->
							</li>
						</ul>
						<!-- end pricing-table -->
					</div>
					<!-- end col-12 -->
				</div>
				<!-- end row -->
			</div>
			<!-- end container -->
		</div>








@endsection
