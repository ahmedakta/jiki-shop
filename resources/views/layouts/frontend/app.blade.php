<!DOCTYPE html>
<html lang="zxx" class="no-js" ng-app="App" ng-controller="AppController">
<script>
            var jsonData = null;
</script>
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>{{ __('JIKI Shop') }}</title>
    <!--
  CSS
  ============================================= -->
    <link rel="stylesheet" href="{{ asset('theme/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/ion.rangeSlider.css') }}" />
    <link rel="stylesheet" href="{{ asset('theme/css/ion.rangeSlider.skinFlat.css') }}" />
    <link rel="stylesheet" href="{{ asset('theme/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/main.css') }}">

    <!-- Include AngularJS -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>

    {{-- Box Icons --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <!-- Start Header Area -->
    <header class="header_area sticky-header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light main_box">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="{{route('home')}}"><img src="{{ asset('theme/img/logo.png') }}"
                            alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item {{Route::currentRouteName() == 'home' ? 'active' : '' }}"><a class="nav-link" href="{{route('home')}}">{{__('Home')}}</a></li>
                            <li class="nav-item  {{Route::currentRouteName() == 'products.index' ? 'active' : '' }}">
                                <a href="{{route('products.index')}}" class="nav-link">{{__('Shop')}}</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">{{__('Blogs')}}</a>
                            </li>
                            <li class="nav-item  {{Route::currentRouteName() == 'pages.contact' ? 'active' : '' }}"><a class="nav-link" href="{{route('pages.contact')}}">{{__('Contact')}}</a></li>
                            @guest
                            @if (Route::has('login'))
                                <li class="nav-item {{Route::currentRouteName() == 'login' ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item  {{Route::currentRouteName() == 'register' ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item submenu dropdown  {{Route::currentRouteName() == 'user.profile' ? 'active' : '' }}">
                                <a href="#" class="nav-link" data-toggle="dropdown"
                                    role="button" aria-haspopup="true"
                                    aria-expanded="false"><span class="ti-user"></span> {{ Auth::user()->name }}</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a  class="nav-link"  href="{{route('user.profile')}}">
                                            {{ __('Profile') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a  class="nav-link"  href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item {{Route::currentRouteName() == 'cart.index' ? 'active' : '' }}">
                                <a href="{{route('cart.index')}}" class="cart">
                                    <span class="ti-bag"></span>
                                    <span class="cart-count">@{{cartItems}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="cart">
                                    <span class="ti-heart"></span>
                                    <span class="favorites-count">@{{favoritesItems}}</span>
                                </a>
                            </li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="dropdown-toggle"><span class="ti-world"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="login.html">En</a></li>
                                    <li class="nav-item"><a class="nav-link" href="tracking.html">Tr</a></li>
                                    <li class="nav-item"><a class="nav-link" href="elements.html">Ru</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                            </li>

                            {{-- <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
                                    role="button" aria-haspopup="true"
                                    aria-expanded="false">{{ __('EN') }}</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                                    <li class="nav-item"><a class="nav-link" href="tracking.html">Tracking</a></li>
                                    <li class="nav-item"><a class="nav-link" href="elements.html">Elements</a></li>
                                </ul>
                            </li> --}}
                        </ul>

                    </div>
                </div>
            </nav>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container">
                <form class="d-flex justify-content-between">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- End Header Area -->
    <main class="py-4">
        @yield('content')
    </main>
    <!-- Start related-product Area -->
	<section class="related-product-area section_gap_bottom">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Deals of the Week</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
							magna aliqua.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-9">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="{{asset('theme/img/r1.jpg')}}" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="{{asset('theme/img/r2.jpg')}}" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="{{asset('theme/img/r3.jpg')}}" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="{{asset('theme/img/r5.jpg')}}" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="{{asset('theme/img/r6.jpg')}}" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="{{asset('theme/img/r7.jpg')}}" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="single-related-product d-flex">
								<a href="#"><img src="{{asset('theme/img/r9.jpg')}}" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="single-related-product d-flex">
								<a href="#"><img src="{{asset('theme/img/r10.jpg')}}" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="single-related-product d-flex">
								<a href="#"><img src="{{asset('theme/img/r11.jpg')}}" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="ctg-right">
						<a href="#" target="_blank">
							<img class="img-fluid d-block mx-auto" src="{{asset('theme/img/category/c5.jpg')}}" alt="">
						</a>
					</div>
				</div>
			</div>
		</div>
           <!--preview panel-->
            <div class="w3-container  w3-center" ng-show="compareProductsItems">
                <div class="w3-row w3-card-4 w3-grey w3-round-large w3-border comparePanle w3-margin-top">
                    <div class="w3-row">
                        <div class="w3-col l9 m8 s6 w3-margin-top">
                            <h4>{{__('Added for compression')}}</h4>
                        </div>
                        <div class="w3-col l3 m4 s6 w3-margin-top">
                           <div class="product-cart" ng-repeat="product in compareProducts">
                                @{{product.product_title}}
                            </div>
                            <button class="w3-btn w3-round-small w3-white w3-border notActive cmprBtn" ng-disabled="compareProductsItems < 2">Compare</button>
                        </div>
                    </div>
                    <div class=" titleMargin w3-container comparePan">
                    </div>
                </div>
            </div>
    <!--end of preview panel-->
	</section>
	<!-- End related-product Area -->
    <!-- start footer Area -->
    <footer class="footer-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>About Us</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut labore dolore
                            magna aliqua.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Newsletter</h6>
                        <p>Stay update with our latest</p>
                        <div class="" id="mc_embed_signup">

                            <form target="_blank" novalidate="true"
                                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                method="get" class="form-inline">

                                <div class="d-flex flex-row">

                                    <input class="form-control" name="EMAIL" placeholder="Enter Email"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"
                                        required="" type="email">


                                    <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right"
                                            aria-hidden="true"></i></button>
                                    <div style="position: absolute; left: -5000px;">
                                        <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1"
                                            value="" type="text">
                                    </div>

                                    <!-- <div class="col-lg-4 col-md-4">
            <button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
           </div>  -->
                                </div>
                                <div class="info"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget mail-chimp">
                        <h6 class="mb-20">Instragram Feed</h6>
                        <ul class="instafeed d-flex flex-wrap">
                            <li><img src="{{ asset('theme/img/i1.jpg') }}" alt=""></li>
                            <li><img src="{{ asset('theme/img/i2.jpg') }}" alt=""></li>
                            <li><img src="{{ asset('theme/img/i3.jpg') }}" alt=""></li>
                            <li><img src="{{ asset('theme/img/i4.jpg') }}" alt=""></li>
                            <li><img src="{{ asset('theme/img/i5.jpg') }}" alt=""></li>
                            <li><img src="{{ asset('theme/img/i6.jpg') }}" alt=""></li>
                            <li><img src="{{ asset('theme/img/i7.jpg') }}" alt=""></li>
                            <li><img src="{{ asset('theme/img/i8.jpg') }}" alt=""></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Follow Us</h6>
                        <p>Let us be social</p>
                        <div class="footer-social d-flex align-items-center">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
                <p class="footer-text m-0">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                        aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->

    <script src="{{ asset('theme/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="{{ asset('theme/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('theme/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('theme/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('theme/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('theme/js/countdown.js') }}"></script>
    <script src="{{ asset('theme/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('theme/js/owl.carousel.min.js') }}"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="{{ asset('theme/js/gmaps.min.js') }}"></script>
    <script src="{{ asset('theme/js/main.js') }}"></script>
    {{-- Angular Js Section --}}
    <script>
        var app = angular.module('App', []);
        app.controller('AppController', function($scope, $http , $timeout) {
            $scope.data = jsonData;
            $http.get('/cart').then(function(response) {
                $scope.cart = response.data.data;
                $scope.cartItems = Object.keys(response.data.data).length;
            });
            $http.get('/favorite').then(function(response) {
                $scope.favorites = response.data.favorites;
                console.log($scope.favorites);
                $scope.favoritesItems = Object.keys(response.data.favorites).length;
            });
            // Get Data
            $scope.getData = function (url , params) {
                var config = {
                    params: params,
                    headers: {
                        'Authorization': 'bd3e1aed20a036fad49dd1d4486b63ef187edbf3460664e6535642db4fb09ed9', // Replace with your actual token
                        'Other-Header': 'header-value' // Add other headers as needed
                    }
                };
                $scope.dataLoading = true;
                $scope.data = null;
                $http.get(url, config)
                    .then(function (response) {
                         // Set a timeout to change dataLoading to false after 3 seconds
                        $timeout(function() {
                            $scope.dataLoading = false;
                            $scope.data = response.data.data;
                        }, 500);
                    });
            };
            // Post Data To Save
            $scope.postData = function (url  ,params) {
                $scope.dataLoading = true;
                if(params.type == 'comment')
                {
                    // TODO change this stupid logic
                    $scope.formData.productId = params.encryptedId;
                    $scope.formData.replyedCommentId = params.replyingCommentId;
                    params = $scope.formData;
                }
                $http.post(url, params)
                    .then(function (response) {
                        $scope.dataLoading = false;
                        if(response.data.data) // if we are returning data in json , update the data. 
                        {
                            $scope.data = response.data.data;
                        }
                        if(response.data.favorites) // if we are stored a favorite data, update favorite info.
                        {
                            $scope.favorites = response.data.favorites; // TODO: we should use getData global function..
                            $scope.favoritesItems = Object.keys(response.data.favorites).length;
                        }
                        if(response.data.compareProducts) // if we are stored a favorite data, update favorite info.
                        {
                            $scope.compareProducts = response.data.compareProducts; // TODO: we should use getData global function..
                            $scope.compareProductsItems = Object.keys(response.data.compareProducts).length;
                        }
                    });
            };
            // Delete Data
            $scope.deleteData = function(url,params){
                $http.delete(url ,params).then(function(response){
                    $scope.data = response.data.data;
                    console.log('deleted');
                });
            };
            // Add product to cart TODO make it into postData
            $scope.addToCart = function(productId) {
                $http.post('cart/store', { product_id: productId }).then(function(response) {
                    // change the button text
                    var span = document.querySelector('.add-text-' + productId);
                    if (span) {
                        span.textContent = response.data.status == 'success' ? 'Product in Cart' : 'Add to Cart';
                    }
                    $http.get('/cart').then(function(response) {
                        $scope.cart = response.data.data;
                        $scope.cartItems = Object.keys(response.data.data).length;
                    });
                });
            };
            // Product Quantity Action
            $scope.quantityAction = function(productId , quantityAction){
                $http.post('cart/product/quantity' , {product_id : productId , quantity_action : quantityAction}).then(function(response){
                    $http.get('/cart').then(function(response) {
                        $scope.cart = response.data.data;
                        $scope.cartItems = Object.keys(response.data.data).length;
                    });
                });
            };

            // Compare Products Logic
            $scope.compareProducts =  [];
            $scope.compareProduct = function(product)
            {
                if ($scope.compareProducts.indexOf(product) === -1) {
                    $scope.compareProducts.push(product);
                } else {
                    // Remove the product if it's already in the compare array (toggle)
                    $scope.compareProducts.splice($scope.compareProducts.indexOf(product), 1);
                }
                console.log($scope.compareProducts);
            };


            // Get subtotal of the user cart products
            $scope.calculateTotal = function() {
                var total = 0;
                angular.forEach($scope.cart, function(product) {
                    total += parseInt(product.total, 10);
                });
               return total;
            };
             // Function to check if a product is in the cart
            $scope.isProductInCart = function(productId) {
                return $scope.cart && $scope.cart[productId];
            };
            $scope.isProductInFavorites = function(productId) {
                return $scope.favorites && $scope.favorites[productId];
            };

            // // reply to the product comment
            $scope.replyToUser = function(comment){
                $scope.replyToComment = comment;
            };

        });
        app.directive('postsPagination', function($http){  
        return{
            restrict: 'E', 
            template: '<div class="filter-bar d-flex flex-wrap align-items-center">'+
					'<div class="sorting mr-auto">'+
						'<select>'+
							'<option value="1">Show 12</option>'+
							'<option value="1">Show 12</option>'+
							'<option value="1">Show 12</option>'+
						'</select>'+
					'</div>'+
					'<div class="pagination">'+
						// '<a href="@{{page.previousPage}}" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>'+
						'<a ng-repeat="page in links" ng-click="getData(page.url)" ng-class="{active: page.active}">@{{page.label}}</a>'+
						// '<a href="@{{page.nextPage}}" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>'+
					'</div>'+
				'</div>',
                scope: {
                currentPage: '=',
                links: '=',
                getData: '&',
                data:'=',
                },
                // '<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>'+
                link: function (scope, element, attrs) {
                    scope.getData = function (url) {
                        $http.get(url)
                            .then(function (response) {
                                scope.data = response.data.data;
                        });
                    };
                },
        };
        });
    </script>
</body>

</html>
