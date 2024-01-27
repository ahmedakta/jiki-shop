@extends('layouts.frontend.app')
@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Checkout</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="single-product.html">Checkout</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>{{__('Billing Details')}}</h3>
                        {{-- <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="first" name="name">
                                <span class="placeholder" data-placeholder="First name"></span>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="last" name="name">
                                <span class="placeholder" data-placeholder="Last name"></span>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="company" name="company" placeholder="Company name">
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="number" name="number">
                                <span class="placeholder" data-placeholder="Phone number"></span>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="email" name="compemailany">
                                <span class="placeholder" data-placeholder="Email Address"></span>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <select class="country_select">
                                    <option value="1">Country</option>
                                    <option value="2">Country</option>
                                    <option value="4">Country</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="add1" name="add1">
                                <span class="placeholder" data-placeholder="Address line 01"></span>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="add2" name="add2">
                                <span class="placeholder" data-placeholder="Address line 02"></span>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="city" name="city">
                                <span class="placeholder" data-placeholder="Town/City"></span>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <select class="country_select">
                                    <option value="1">District</option>
                                    <option value="2">District</option>
                                    <option value="4">District</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP">
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option2" name="selector">
                                    <label for="f-option2">Create an account?</label>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <h3>Shipping Details</h3>
                                    <input type="checkbox" id="f-option3" name="selector">
                                    <label for="f-option3">Ship to a different address?</label>
                                </div>
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Order Notes"></textarea>
                            </div>
                        </form> --}}
                        <div id="accordion">
                            <div class="card">
                              <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                  <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    {{__('Shipping Address')}}
                                  </button>
                                </h5>
                              </div>

                              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                  <div class="card-body">
                                    <h6>{{__('Your Addresses')}}</h6>
                                    <hr>
                                    <ul class="list-group">
                                        @foreach ($addresses as $key => $address)
                                            <li class="list-group-item">
                                                <div class="radion_btn">
                                                    <input type="radio" id="f-option-address-{{$key}}" name="selector">
                                                    <label for="f-option-address-{{$key}}">{{$address}}</label>
                                                    <div class="check"></div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    </div>
                              </div>
                            </div>
                            <hr>
                            <div class="card">
                              <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                  <button ng-click="getData('user/profile/paymentCards')" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    {{__('Payment Method')}}
                                  </button>
                                </h5>
                              </div>
                              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col">{{__('Name On Card')}}</th>
                                                        <th scope="col">{{__('Expires On')}}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <tr ng-repeat="card in (dataLoading ? [1] : data)">
                                                    <td ng-class="{'loading': dataLoading }">
                                                        <div class="radion_btn">
                                                            <input ng-if="!dataLoading" type="radio" id="f-option-payment-@{{card.id}}" name="selector">
                                                            <img ng-if="!dataLoading"  ng-class="{'loading': dataLoading }" src="{{asset('theme/img/credit_card.png')}}" width="30rem" alt="">
                                                            <label ng-if="!dataLoading" ng-class="{'loading': dataLoading }" for="f-option-payment-@{{card.id}}">Garanti Credit Card</label>
                                                            <div ng-if="!dataLoading" class="check"></div>
                                                        </div>
                                                     </td>
                                                    <td ng-class="{'loading': dataLoading }">@{{dataLoading ? 'Loading' : ''}} @{{card.card_holder_name}}</td>
                                                    <td ng-class="{'loading': dataLoading }">@{{dataLoading ? 'Loading' : ''}} @{{card.card_expiration_date}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        <p ng-if="!data && !dataLoading">You Sould Add Payment Method</p>
                                        <a href="{{route('profile.payments')}}">Add</a>
                                    </div>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="card">
                              <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    {{__('Review Items And Shipping')}}
                                  </button>
                                </h5>
                              </div>
                              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="row">
                                        <div  class="col-lg-12">
                                            <blockquote class="generic-blockquote">
                                                <h6>{{__('Want to save a time on your next order and go directly to this step when checking out? ')}} </h6>
                                                <input id="default_checkbox" type="checkbox" id="default_checkbox" name="selector">
                                                <label for="default_checkbox">{{__('Default to this delivery address and payment method.')}}</label>
                                            </blockquote>
                                        </div>
                                        {{-- Card Items --}}
                                        {{-- <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr ng-repeat="item in cart">
                                                        <td>
                                                            <div class="d-flex" ng-repeat="photo in item.product_photos">
                                                                <img width="100rem" ng-if="photo.isfeatured == 1" src="/@{{photo.name}}" alt="">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h4>@{{item.product_title}}</h4>
                                                            @{{item.product_price}}
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> --}}
                                        <div class="row">
                                            <div  class="col-md-6">
                                                <div class="single-defination d-flex p-1" ng-repeat="item in cart">
                                                    <div class="d-flex" ng-repeat="photo in item.product_photos">
                                                        <h4 class="mb-20"> <img width="100rem"  ng-if="photo.isfeatured == 1" src="/@{{photo.name}}" alt=""></h4>
                                                    </div>
                                                    <h4 class="p-2">@{{item.product_title}} </h4> <br>
                                                    <span class="p-2" style="color: rgb(221, 82, 82);font-weight:bold">@{{item.product_price}}$</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-defination">
                                                    <h4 class="mb-20">{{__('Choose a delivery option:')}}</h4>
                                                    <div class="radion_btn">
                                                        <input type="radio" id="f-option-delivery-1" name="selector">
                                                        <label for="f-option-delivery-1"><b>Monday , Feb 12</b></label>
                                                        <p>$45.94 - AmazonGlobal Priority Shipping</p>
                                                        <div class="check"></div>
                                                    </div>
                                                    <div class="radion_btn">
                                                        <input type="radio" id="f-option-delivery-2" name="selector">
                                                        <label for="f-option-delivery-2"><b>Sat , Feb 13</b></label>
                                                        <p>$12.34 - AmazonGlobal Priority Shipping</p>
                                                        <div class="check"></div>
                                                    </div>
                                                    <p>Please Select Deliver Option.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>{{__('Order Summary')}}</h2>
                            <ul class="list list_2">
                                <li><a href="#">Items <span>@{{calculateTotal()}}</span></a></li>
                                <li><a href="#">Shipping <span>$50.00</span></a></li>
                                <li><a href="#">Tax <span>$50.00</span></a></li>
                                <li><a href="#">Total <span>@{{calculateTotal() + 100}}</span></a></li>
                            </ul>

                            <div class="creat_account">
                                <input type="checkbox" id="f-option4" name="selector">
                                <label for="f-option4">I’ve read and accept the </label>
                                <a href="#">terms & conditions*</a>
                                <label for="f-option4">What is the Amazon Currency Converter?
                                    You can track your shipment and view any applicable import fees deposit before placing your order. Learn more
                                    How are shipping costs calculated?
                                    Why didn't I qualify for free shipping?</label>
                            </div>
                            <a class="primary-btn" href="#">Proceed to Paypal</a>
                            <div class="payment_item active">
                                <p>By placing your order, you agree to Amazon's privacy notice and conditions of use.
                                    You also agree to AmazonGlobal's terms and conditions.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->
@endsection