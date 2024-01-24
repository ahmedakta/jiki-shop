@extends('layouts.frontend.app')
@section('content')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>{{__('Favorites')}}</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html">Fashon Category</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <!-- End Filter Bar -->
            <!-- Start Best Seller -->
            <section class="lattest-product-area pb-40 category-list" >
                <div class="row">
                        <!-- single product -->
                        <div class="col-lg-4 col-md-6" ng-repeat="product in favorites">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </section>
            <!-- End Best Seller -->
            <!-- Start Filter Bar -->
            <posts-pagination ng-if="favoritesItems"
            current-page="data.current_page" 
            total-pages="data.last_page" 
            items-per-page="data.per_page"
            links="data.links"
            data="data"
            >
            </posts-pagination>

            <p ng-if="favoritesItems == 0"> Empty</p>

            <!-- End Filter Bar -->
        </div>
    </div>
</div>
@endsection