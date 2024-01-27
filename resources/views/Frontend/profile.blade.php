@extends('layouts.frontend.app')
@section('content')
    <!--================Profile Area =================-->
    <section class="section_gap">
        <div class="container">
            <div class="profile_sections">
                <div class="row">
                    <!--================Profile Sections Area =================-->
                    <div class="col-lg-4" >
                        <div class="categories_post">
                            <img src="{{asset('theme/img/banner/banner-bg.jpg')}}" alt="post">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <a href="blog-details.html">
                                        <h5>{{__('Orders')}}</h5>
                                    </a>
                                    <div class="border_line"></div>
                                    <p>{{__('See yor all orders and order history.')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="categories_post">
                            <img src="{{asset('theme/img/banner/banner-bg.jpg')}}" alt="post">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <a href="{{route('profile.payments')}}">
                                        <h5>{{__('Payments')}}</h5>
                                    </a>
                                    <div class="border_line"></div>
                                    <p>{{__('Manage your payment cards and more..')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="categories_post">
                            <img src="{{asset('theme/img/banner/banner-bg.jpg')}}" alt="post">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <a href="{{route('profile.edit')}}">
                                        <h5>{{__('Login Information')}}</h5>
                                    </a>
                                    <div class="border_line"></div>
                                    <p>{{__('Manage your details.')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="categories_post">
                            <img src="{{asset('theme/img/banner/banner-bg.jpg')}}" alt="post">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <a href="{{route('profile.addresses')}}">
                                        <h5>{{__('Addresses')}}</h5>
                                    </a>
                                    <div class="border_line"></div>
                                    <p>{{__('Add or remove you addresses.')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="categories_post">
                            <img src="{{asset('theme/img/banner/banner-bg.jpg')}}" alt="post">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <a href="{{route('pages.contact')}}">
                                        <h5>{{__('Contact Us')}}</h5>
                                    </a>
                                    <div class="border_line"></div>
                                    <p>{{__('Contact to us by sending email.')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="categories_post">
                            <img src="{{asset('theme/img/banner/banner-bg.jpg')}}" alt="post">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <a href="blog-details.html">
                                        <h5>{{__('Download Mobile App')}}</h5>
                                    </a>
                                    <div class="border_line"></div>
                                    <p>{{__('Download the mobile app from app store & play store.')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--================ End Of Profile Sections Area =================-->
                    <!--================ Seperator =================-->
                  <div class="seperator"></div>

                    <!--================ Start Profile Links Area =================-->
                  <div class="container">
                    <div class="row">
                        <div class="col-lg-3  col-md-6 col-sm-6">
                            <div class="single-footer-widget">
                                <h6>{{__('Notifications , Messages and Cookies')}}</h6>
                                <a href="">{{__('Cookies Settings')}}</a> <br>
                                <a href="">{{__('Notifications')}}</a> <br>
                                <a href="">{{__('Order track settings')}}</a> <br>
                                <a href="">{{__('SMS settings')}}</a>
                            </div>
                        </div>
                        <div class="col-lg-4  col-md-6 col-sm-6">
                            <div class="single-footer-widget">
                                <h6>{{__('Privacy & Security')}}</h6>
                                <a href="">{{__('Read our privacy and policy')}}</a> <br>
                            </div>
                        </div>
                        <div class="col-lg-3  col-md-6 col-sm-6">
                            <div class="single-footer-widget">
                                <h6>{{__('Privacy & Security')}}</h6>
                                <a href="">{{__('Read our privacy and policy')}}</a> <br>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <div class="single-footer-widget">
                                <h6>Follow Us</h6>
                                <p>Let us be social</p>
                                <div class="footer-social d-flex align-items-center ">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-dribbble"></i></a>
                                    <a href="#"><i class="fa fa-behance"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->
@endsection
