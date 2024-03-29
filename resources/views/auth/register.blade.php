@extends('layouts.frontend.app')
@section('content')
	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Login/Register</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Login/Register</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Register Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="{{asset('theme/img/login.jpg')}}" alt="">
						<div class="hover">
							<h4>{{__('Already hav an account ?')}}</h4>
							<p>{{__('Login Now')}}</p>
							<a class="primary-btn" href="{{route('login')}}">{{__('Login')}}</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Log in to enter</h3>
                            <form method="POST" class="row login_form" action="{{ route('register') }}">
                                @csrf
                                {{-- Name Of User --}}
                                <div class="col-md-12 form-group">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name'">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- Email Of User --}}
                                <div class="col-md-12 form-group">
                                    <input  type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus  placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- Password Of User --}}
                                <div class="col-md-12 form-group">
                                    <input type="password"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"  placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- Confirm Password Of User --}}
                                <div class="col-md-12 form-group">        
                                        <input id="password-confirm" type="password" class="form-control  @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password"  placeholder="Confirm the password!" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    {{-- Remember Me --}}
                                <div class="col-md-12 form-group">
                                    <div class="creat_account">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} type="checkbox" id="f-option2" name="selector">
                                        <label for="f-option2">{{ __('Remember Me') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit" class="primary-btn">{{ __('Register') }}</button>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Register Box Area =================-->
@endsection