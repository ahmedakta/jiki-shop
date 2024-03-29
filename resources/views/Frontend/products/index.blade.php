@extends('layouts.frontend.app')
@section('content')
	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Shop Category page</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Fashon Category</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head">{{__('Browse Categories')}}</div>
					<ul class="main-categories">
						@foreach ($categories as $category)
							<li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable" aria-expanded="false" aria-controls="fruitsVegetable">
								<span class="lnr lnr-arrow-right" ng-click="getData('/products' , {category_id : {{$category->id}}})"></span>{{$category->category_name}}<span class="number">(53)</span></a>
								<ul class="collapse" id="fruitsVegetable" data-toggle="collapse" aria-expanded="false" aria-controls="fruitsVegetable">
									<li class="main-nav-list child"><a href="#">Frozen Fish<span class="number">(13)</span></a></li>
									<li class="main-nav-list child"><a href="#">Dried Fish<span class="number">(09)</span></a></li>
									<li class="main-nav-list child"><a href="#">Fresh Fish<span class="number">(17)</span></a></li>
									<li class="main-nav-list child"><a href="#">Meat Alternatives<span class="number">(01)</span></a></li>
									<li class="main-nav-list child"><a href="#">Meat<span class="number">(11)</span></a></li>
								</ul>
							</li>
						@endforeach
						{{-- <li class="main-nav-list"><a data-toggle="collapse" href="#meatFish" aria-expanded="false" aria-controls="meatFish"><span
								 class="lnr lnr-arrow-right"></span>Meat and Fish<span class="number">(53)</span></a>
							<ul class="collapse" id="meatFish" data-toggle="collapse" aria-expanded="false" aria-controls="meatFish">
								<li class="main-nav-list child"><a href="#">Frozen Fish<span class="number">(13)</span></a></li>
								<li class="main-nav-list child"><a href="#">Dried Fish<span class="number">(09)</span></a></li>
								<li class="main-nav-list child"><a href="#">Fresh Fish<span class="number">(17)</span></a></li>
								<li class="main-nav-list child"><a href="#">Meat Alternatives<span class="number">(01)</span></a></li>
								<li class="main-nav-list child"><a href="#">Meat<span class="number">(11)</span></a></li>
							</ul>
						</li>
						<li class="main-nav-list"><a data-toggle="collapse" href="#cooking" aria-expanded="false" aria-controls="cooking"><span
								 class="lnr lnr-arrow-right"></span>Cooking<span class="number">(53)</span></a>
							<ul class="collapse" id="cooking" data-toggle="collapse" aria-expanded="false" aria-controls="cooking">
								<li class="main-nav-list child"><a href="#">Frozen Fish<span class="number">(13)</span></a></li>
								<li class="main-nav-list child"><a href="#">Dried Fish<span class="number">(09)</span></a></li>
								<li class="main-nav-list child"><a href="#">Fresh Fish<span class="number">(17)</span></a></li>
								<li class="main-nav-list child"><a href="#">Meat Alternatives<span class="number">(01)</span></a></li>
								<li class="main-nav-list child"><a href="#">Meat<span class="number">(11)</span></a></li>
							</ul>
						</li>
						<li class="main-nav-list"><a data-toggle="collapse" href="#beverages" aria-expanded="false" aria-controls="beverages"><span
								 class="lnr lnr-arrow-right"></span>Beverages<span class="number">(24)</span></a>
							<ul class="collapse" id="beverages" data-toggle="collapse" aria-expanded="false" aria-controls="beverages">
								<li class="main-nav-list child"><a href="#">Frozen Fish<span class="number">(13)</span></a></li>
								<li class="main-nav-list child"><a href="#">Dried Fish<span class="number">(09)</span></a></li>
								<li class="main-nav-list child"><a href="#">Fresh Fish<span class="number">(17)</span></a></li>
								<li class="main-nav-list child"><a href="#">Meat Alternatives<span class="number">(01)</span></a></li>
								<li class="main-nav-list child"><a href="#">Meat<span class="number">(11)</span></a></li>
							</ul>
						</li>
						<li class="main-nav-list"><a data-toggle="collapse" href="#homeClean" aria-expanded="false" aria-controls="homeClean"><span
								 class="lnr lnr-arrow-right"></span>Home and Cleaning<span class="number">(53)</span></a>
							<ul class="collapse" id="homeClean" data-toggle="collapse" aria-expanded="false" aria-controls="homeClean">
								<li class="main-nav-list child"><a href="#">Frozen Fish<span class="number">(13)</span></a></li>
								<li class="main-nav-list child"><a href="#">Dried Fish<span class="number">(09)</span></a></li>
								<li class="main-nav-list child"><a href="#">Fresh Fish<span class="number">(17)</span></a></li>
								<li class="main-nav-list child"><a href="#">Meat Alternatives<span class="number">(01)</span></a></li>
								<li class="main-nav-list child"><a href="#">Meat<span class="number">(11)</span></a></li>
							</ul>
						</li>
						<li class="main-nav-list"><a href="#">Pest Control<span class="number">(24)</span></a></li>
						<li class="main-nav-list"><a data-toggle="collapse" href="#officeProduct" aria-expanded="false" aria-controls="officeProduct"><span
								 class="lnr lnr-arrow-right"></span>Office Products<span class="number">(77)</span></a>
							<ul class="collapse" id="officeProduct" data-toggle="collapse" aria-expanded="false" aria-controls="officeProduct">
								<li class="main-nav-list child"><a href="#">Frozen Fish<span class="number">(13)</span></a></li>
								<li class="main-nav-list child"><a href="#">Dried Fish<span class="number">(09)</span></a></li>
								<li class="main-nav-list child"><a href="#">Fresh Fish<span class="number">(17)</span></a></li>
								<li class="main-nav-list child"><a href="#">Meat Alternatives<span class="number">(01)</span></a></li>
								<li class="main-nav-list child"><a href="#">Meat<span class="number">(11)</span></a></li>
							</ul>
						</li>
						<li class="main-nav-list"><a data-toggle="collapse" href="#beauttyProduct" aria-expanded="false" aria-controls="beauttyProduct"><span
								 class="lnr lnr-arrow-right"></span>Beauty Products<span class="number">(65)</span></a>
							<ul class="collapse" id="beauttyProduct" data-toggle="collapse" aria-expanded="false" aria-controls="beauttyProduct">
								<li class="main-nav-list child"><a href="#">Frozen Fish<span class="number">(13)</span></a></li>
								<li class="main-nav-list child"><a href="#">Dried Fish<span class="number">(09)</span></a></li>
								<li class="main-nav-list child"><a href="#">Fresh Fish<span class="number">(17)</span></a></li>
								<li class="main-nav-list child"><a href="#">Meat Alternatives<span class="number">(01)</span></a></li>
								<li class="main-nav-list child"><a href="#">Meat<span class="number">(11)</span></a></li>
							</ul>
						</li>
						<li class="main-nav-list"><a data-toggle="collapse" href="#healthProduct" aria-expanded="false" aria-controls="healthProduct"><span
								 class="lnr lnr-arrow-right"></span>Health Products<span class="number">(29)</span></a>
							<ul class="collapse" id="healthProduct" data-toggle="collapse" aria-expanded="false" aria-controls="healthProduct">
								<li class="main-nav-list child"><a href="#">Frozen Fish<span class="number">(13)</span></a></li>
								<li class="main-nav-list child"><a href="#">Dried Fish<span class="number">(09)</span></a></li>
								<li class="main-nav-list child"><a href="#">Fresh Fish<span class="number">(17)</span></a></li>
								<li class="main-nav-list child"><a href="#">Meat Alternatives<span class="number">(01)</span></a></li>
								<li class="main-nav-list child"><a href="#">Meat<span class="number">(11)</span></a></li>
							</ul>
						</li>
						<li class="main-nav-list"><a href="#">Pet Care<span class="number">(29)</span></a></li>
						<li class="main-nav-list"><a data-toggle="collapse" href="#homeAppliance" aria-expanded="false" aria-controls="homeAppliance"><span
								 class="lnr lnr-arrow-right"></span>Home Appliances<span class="number">(15)</span></a>
							<ul class="collapse" id="homeAppliance" data-toggle="collapse" aria-expanded="false" aria-controls="homeAppliance">
								<li class="main-nav-list child"><a href="#">Frozen Fish<span class="number">(13)</span></a></li>
								<li class="main-nav-list child"><a href="#">Dried Fish<span class="number">(09)</span></a></li>
								<li class="main-nav-list child"><a href="#">Fresh Fish<span class="number">(17)</span></a></li>
								<li class="main-nav-list child"><a href="#">Meat Alternatives<span class="number">(01)</span></a></li>
								<li class="main-nav-list child"><a href="#">Meat<span class="number">(11)</span></a></li>
							</ul>
						</li>
						<li class="main-nav-list"><a class="border-bottom-0" data-toggle="collapse" href="#babyCare" aria-expanded="false"
							 aria-controls="babyCare"><span class="lnr lnr-arrow-right"></span>Baby Care<span class="number">(48)</span></a>
							<ul class="collapse" id="babyCare" data-toggle="collapse" aria-expanded="false" aria-controls="babyCare">
								<li class="main-nav-list child"><a href="#">Frozen Fish<span class="number">(13)</span></a></li>
								<li class="main-nav-list child"><a href="#">Dried Fish<span class="number">(09)</span></a></li>
								<li class="main-nav-list child"><a href="#">Fresh Fish<span class="number">(17)</span></a></li>
								<li class="main-nav-list child"><a href="#">Meat Alternatives<span class="number">(01)</span></a></li>
								<li class="main-nav-list child"><a href="#" class="border-bottom-0">Meat<span class="number">(11)</span></a></li>
							</ul>
						</li> --}}
					</ul>
				</div>
				<div class="sidebar-filter mt-50">
					<div class="top-filter-head">{{__('Product Filters')}}</div>
					<div class="common-filter">
						<div class="head">{{__('Brands')}}</div>
						<form action="#">
							<ul>
								@foreach ($brands as $brand)									
									<li class="filter-list"><input class="pixel-radio"  ng-click="getData('/products' , {brand_id : {{$brand->id}}})" type="radio" id="apple" name="brand"><label for="apple">{{$brand->category_name}}<span>(29)</span></label></li>
								@endforeach
							</ul>
						</form>
					</div>
					<div class="common-filter">
						<div class="head">{{__('Color')}}</div>
						<form action="#">
							<ul>
								@foreach ($colors as $color)
									<li class="filter-list"><input class="pixel-radio" ng-click="getData('/products' , {color_id : {{$color->id}}})" type="radio" id="black" name="color"><label for="black">{{$color->category_name}}<span>(29)</span></label></li>
								@endforeach
							</ul>
						</form>
					</div>
					<div class="common-filter">
						<div class="head">Price</div>
						<div class="price-range-area">
							<div id="price-range"></div>
							<div class="value-wrapper d-flex">
								<div class="price">Price:</div>
								<span>$</span>
								<div id="lower-value"></div>
								<div class="to">to</div>
								<span>$</span>
								<div id="upper-value"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="sorting">
						<select>
							<option value="1">Default sorting</option>
							<option value="1">Default sorting</option>
							<option value="1">Default sorting</option>
						</select>
					</div>
					<div class="sorting mr-auto">
						<select>
							<option value="1">Show 12</option>
							<option value="1">Show 12</option>
							<option value="1">Show 12</option>
						</select>
					</div>
				</div>
				<!-- End Filter Bar -->
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list ">
					<div class="row ">
                            <!-- single product -->
                            <div class="col-lg-4 col-md-6" ng-repeat="product in data.data">
                                <div class="single-product">
									<img class="img-fluid" src="{{asset('theme/img/product/p1.jpg')}}" alt="">
                                    <div class="product-details">
										<a ng-href="/products/@{{product.id}}">
											<h6>@{{product.product_title}}</h6>
										</a>
                                        <div class="price">
                                            <h6>$@{{product.product_price}}</h6>
                                            <h6 class="l-through">$210.00</h6>
                                        </div>
                                        <div class="prd-bottom">
                                            <a href="" ng-click="addToCart(product.id)" class="social-info">
                                                <span class="ti-bag" ng-style="{
													'transition' : isProductInCart(product.id) ? 'all 1s ease-out' : '',
													'background' : isProductInCart(product.id) ? 'linear-gradient(90deg, #d2b770 0%, #ff6c00 100%)' : '',
													}">
												</span>
                                                <p class="hover-text">@{{isProductInCart(product.id) ? 'Remove' : 'Add to bag'}}</p>
                                            </a>
                                            <a href="" ng-click="postData('favorite/store',product.id)"  class="social-info">
                                                <span class="lnr lnr-heart" ng-style="{
													'transition' : isProductInFavorites(product.id) ? 'all 1s ease-out' : '',
													'background' : isProductInFavorites(product.id) ? 'linear-gradient(326deg, rgba(121,9,9,1) 0%, rgba(250,250,250,1) 0%, rgba(206,43,3,1) 61%, rgba(255,0,0,1) 100%)' : '',
												}"></span>
                                                <p class="hover-text">@{{isProductInFavorites(product.id) ? 'Remove' : 'Wishlist'}}</p>
                                            </a>
                                            <a href="" class="social-info">
                                                <span class="lnr lnr-sync"  ng-click="postData('compare/store',product.id)"></span>
                                                <p class="hover-text">{{__('compare')}}</p>
                                            </a>
                                            <a href="" class="social-info">
                                                <span class="lnr lnr-move"></span>
                                                <p class="hover-text">view more</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
					</div>
				</section>
				<!-- End Best Seller -->
				<!-- Start Filter Bar -->
				<posts-pagination
				current-page="data.current_page" 
				total-pages="data.last_page" 
				items-per-page="data.per_page"
				links="data.links"
				data="data"
				>
				</posts-pagination>

				<!-- End Filter Bar -->
			</div>
		</div>
	</div>
@endsection