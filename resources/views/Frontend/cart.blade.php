@extends('layouts.frontend.app')
@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
    <!--================ Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <div ng-if="dataLoading" class="text-center"><i class='bx bx-loader-circle bx-spin'></i></div>
                    <table class="table" ng-if="cart.length != 0 && !dataLoading">
                        <thead>
                            <tr>
                                <th scope="col">{{__('Product')}}</th>
                                <th scope="col">{{__('Price')}}</th>
                                <th scope="col">{{__('Quantity')}}</th>
                                <th scope="col">{{__('Total')}}</th>
                                <th scope="col">{{__('Action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr ng-repeat="item in cart">
                                    <td>
                                        <div class="media">
                                            <div class="d-flex" ng-repeat="photo in item.product_photos">
                                                    {{-- get the featured image of product --}}
                                                    <img width="100rem" ng-if="photo.isfeatured == 1" src="@{{photo.name}}" alt="">
                                            </div>
                                            <div class="media-body">
                                                <p>@{{item.product_title}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>@{{item.product_price}}</h5>
                                    </td>
                                    <td>
                                        <div class="product_count">
                                            <input type="text" name="qty" maxlength="12" value="@auth @{{item.pivot.quantity}} @else @{{item.product_quantity}} @endauth" title="Quantity:"
                                                class="input-text qty">
                                            <button ng-click="quantityAction(item.id , 1)" class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                            <button ng-click="quantityAction(item.id , 0)" class="reduced items-count" type="button" ng-disabled="item.product_quantity < 1"><i class="lnr lnr-chevron-down"></i></button>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>@{{item.total}}</h5>
                                    </td>
                                    <td>
                                        <h5><a class="genric-btn danger circle" ng-click="addToCart(item.id)"><span class="ti-trash"></span></a></h5>
                                    </td>
                                </tr>
                            @guest
                            <tr class="out_button_area">
                                <td>
                                    <a  href="{{route('register')}}">{{__('Register')}}</a> {{__('Or')}} <a href="{{route('login')}}">{{__('Login')}}</a> {{__('To Continue Order')}}
                                </td>
                            </tr>
                            @else
                                    <tr class="bottom_button">
                                        <td>
                                            <a class="gray_btn" href="#">Update Cart</a>
                                        </td>
                                        <td>

                                        </td>
                                        <td>

                                        </td>
                                        <td>

                                        </td>
                                        <td>
                                            <div class="cupon_text d-flex align-items-center">
                                                <input type="text" placeholder="Coupon Code">
                                                <a class="primary-btn" href="#">Apply</a>
                                                <a class="gray_btn" href="#">Close</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>

                                        </td>
                                        <td>

                                        </td>
                                        <td>

                                        </td>
                                        <td>
                                            <h5>Subtotal</h5>
                                        </td>
                                        <td>
                                            <h5>@{{calculateTotal()}}</h5>
                                        </td>
                                    </tr>
                                    <tr class="shipping_area">
                                        <td>

                                        </td>
                                        <td>

                                        </td>
                                        <td>

                                        </td>
                                        <td>
                                            <h5>Shipping</h5>
                                        </td>
                                        <td>
                                            <div class="shipping_box">
                                                <ul class="list">
                                                    <li ng-if="total < 1000"><a>Flat Rate: $5.00</a></li>
                                                    <li ng-if="total > 1000"><a>Free Shipping</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="out_button_area">
                                        <td>

                                        </td>
                                        <td>

                                        </td>
                                        <td>

                                        </td>
                                        <td>

                                        </td>

                                        <td>
                                            <a class="btn btn-warning" href="{{route('cart.checkout')}}">Proceed to checkout</a>
                                        </td>
                                    </tr>
                            @endguest
                        </tbody>
                    </table>
                    <div ng-if="cart.length == 0" class="container empty-cart-conatiner">
                        <img src="{{asset('/theme/img/product/empty_cart.png')}}" alt="">
                        <p>{{__('Your Cart Is Empty')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
@endsection