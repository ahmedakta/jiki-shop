@extends('layouts.frontend.app')
@section('content')

	{{-- <!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Confirmation</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Confirmation</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area --> --}}

	<!--================Order Details Area =================-->
	<section class="order_details section_gap">
		<div class="container">
			<h2 class="">Compairation Result</h2> 
			<div class="row order_d_inner">
				<div class="col-lg-4" ng-repeat="product in compareProducts">
					<div class="details_item">
						<img class="img-fluid" src="{{asset('theme/img/product/p1.jpg')}}" alt="">
						<h4>@{{product.product_title}}</h4>
						<ul class="list">
							<li><a class="compare-data" href="#"><span>{{__('Product Price')}}</span> : @{{product.product_price}}$</a></li>
							<li>
								<a class="compare-data" href="#"><span>{{__('Water Resistance')}}</span> : 
									<i ng-if="product.product_water_resistance == 1" class='bx bx-check bx-tada bx-rotate-90 bx-icon' ></i>
									<i ng-if="product.product_water_resistance != 1" class='bx bx-x bx-tada bx-rotate-90 bx-icon' ></i>
								</a>
							</li>
							<li>
								<a class="compare-data" href="#"><span>{{__('Custmization')}}</span> : 
									<i ng-if="product.product_customization == 1" class='bx bx-check bx-tada bx-rotate-90 bx-icon' ></i>
									<i ng-if="product.product_customization != 1" class='bx bx-x bx-tada bx-rotate-90 bx-icon' ></i>
								</a>
							</li>
							<li><a class="compare-data" href="#"><span>Stocks</span> : @{{product.product_stocks}} </a></li>
						</ul>
					</div>
				</div>
			</div>
			{{-- <div class="order_details_table">
				<h2>Order Details</h2>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Product</th>
								<th scope="col">Quantity</th>
								<th scope="col">Total</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<p>Pixelstore fresh Blackberry</p>
								</td>
								<td>
									<h5>x 02</h5>
								</td>
								<td>
									<p>$720.00</p>
								</td>
							</tr>
							<tr>
								<td>
									<p>Pixelstore fresh Blackberry</p>
								</td>
								<td>
									<h5>x 02</h5>
								</td>
								<td>
									<p>$720.00</p>
								</td>
							</tr>
							<tr>
								<td>
									<p>Pixelstore fresh Blackberry</p>
								</td>
								<td>
									<h5>x 02</h5>
								</td>
								<td>
									<p>$720.00</p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Subtotal</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>$2160.00</p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Shipping</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>Flat rate: $50.00</p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Total</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>$2210.00</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div> --}}
		</div>
	</section>
	<!--================End Order Details Area =================-->
@endsection