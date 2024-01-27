@extends('layouts.frontend.app')
@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>{{__('Change Password')}}</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">{{__('Home')}}<span class="lnr lnr-arrow-right"></span></a>
                        <a href="single-product.html">{{__('Profile')}}<span class="lnr lnr-arrow-right"></span></a>
                        <a href="single-product.html">{{__('Chane Password')}}</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>{{__('Change Password')}}</h3>
                        <form class="row contact_form" action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-4 form-group p_star">
                                <label for="password">Old Password</label>
                                <input type="password" class="form-control" id="password" name="current_password">
                                <span class="placeholder" placeholder="Password"></span>
                            </div>
                            <div class="col-md-4 form-group p_star">
                                <label for="">New Password</label>
                                <input type="password" class="form-control" id="password" name="new_password">
                                <span class="placeholder" placeholder="Password"></span>
                            </div>
                            <div class="col-md-4 form-group p_star">
                                <label for="">Confirm New Password</label>
                                <input type="password" class="form-control" id="password" name="new_password_confirmation">
                                <span class="placeholder" placeholder="Password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="genric-btn info radius">{{__('change')}}</button>
                            </div>
                            <div class="form-group">
                                <a type="submit" href="{{route('profile.edit')}}" class="genric-btn info-border">{{__('Back')}}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->
@endsection