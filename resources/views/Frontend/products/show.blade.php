@extends('layouts.frontend.app')
@section('content')
	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Product Details Page</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="single-product.html">product-details</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="s_Product_carousel">
						@foreach (json_decode($product->product_photos) as $item)
							<div class="single-prd-item">
								<img class="img-fluid" src="{{asset($item->name)}}" alt="">
							</div>
						@endforeach
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3>{{$product->product_title}}</h3>
						<h2>>${{$product->product_price}}</h2>
						<ul class="list">
							<li><a class="active" href="#"><span>Category</span> : Household</a></li>
							<li><a href="#"><span>Availibility</span> : In Stock</a></li>
						</ul>
						<p>{{$product->product_introduction}}</p>
						<div class="product_count">
							<label for="qty">Quantity:</label>
							<input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
							 class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
							 class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
						</div>
							<div class="card_area d-flex align-items-center">
							<a class="primary-btn" href="#">Add to Cart</a>
							<a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
							<a class="icon_btn" href="" ng-click="addToCart({{$product->id}})" ng-style="{'background' : isProductInCart({{$product->id}}) ? 'linear-gradient(90deg, #d2b770 0%, #ff6c00 100%)' : '' }"><i class="ti-bag"></i></a>
							<a class="icon_btn" ng-click="postData('favorite/store',{{$product->id}})" href="" ng-style="{'background' : isProductInFavorites({{$product->id}}) ? 'linear-gradient(326deg, rgba(121,9,9,1) 0%, rgba(250,250,250,1) 0%, rgba(206,43,3,1) 61%, rgba(255,0,0,1) 100%)' : '' }"><i class="ti-heart"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->
	<!--================Product Description Area =================-->
	<section class="product_description_area">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
					 aria-selected="false">Specification</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" ng-click="getData('{{encrypt($product->id)}}/comments')" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
								aria-selected="false">Reviews </a> 
				</li>
			</ul>
			
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
					<p>{{$product->product_desc}}</p>
				</div>
				<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<div class="table-responsive">
						<table class="table">
							<tbody>
								<tr>
									<td>
										<h5>Width</h5>
									</td>
									<td>
										<h5>128mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Height</h5>
									</td>
									<td>
										<h5>508mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Depth</h5>
									</td>
									<td>
										<h5>85mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Weight</h5>
									</td>
									<td>
										<h5>52gm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Quality checking</h5>
									</td>
									<td>
										<h5>yes</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Freshness Duration</h5>
									</td>
									<td>
										<h5>03days</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>When packeting</h5>
									</td>
									<td>
										<h5>Without touch of hand</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Each Box contains</h5>
									</td>
									<td>
										<h5>60pcs</h5>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
					<div class="row">
						<div class="col-lg-6">
							<div class="row total_rate">
								<div class="col-6">
									<div class="box_total">
										<h5>Overall</h5>
										<h4>4.0</h4>
										<h6>(03 Reviews)</h6>
									</div>
								</div>
								<div class="col-6">
									<div class="rating_list">
										<h3>Based on 3 Reviews</h3>
										<ul class="list">
											<li><a href="#">5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
													 class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
											<li><a href="#">4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
													 class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
											<li><a href="#">3 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
													 class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
											<li><a href="#">2 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
													 class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
											<li><a href="#">1 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
													 class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="review_list">
								<div ng-if="dataLoading" class="text-center"><i class='bx bx-loader-circle bx-spin'></i></div>
									<div class="review_item" ng-if="data.length" ng-repeat="comment in data">
										<div class="media">
											<div class="d-flex">
												<img src="{{asset('theme/img/product/review-1.png')}}" alt="">
											</div>
											<div class="media-body">
												<h4>@{{comment.user.name}}</h4>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<a class="reply_btn" ng-class="{'primary-btn': replyToComment.id == comment.id}" ng-click="!replyToComment || replyToComment.id != comment.id ? replyToUser(comment) : replyToUser('')" ng-if="comment.user.id != {{isset($user) ? $user->id : null}}">{{__('Reply')}}</a>
												<a class="delete_reply_btn genric-btn primary-border small" ng-if="comment.user.id == {{isset($user) ? $user->id : null}}" ng-click="deleteData('comments/'+ {{($product->id)}} + '/' + comment.id + '/delete')"><span class="ti-trash"></span></a>
											</div>
										</div>
										<p>@{{comment.comment_message}}</p>
										<div class="review_item reply" ng-if="comment.replies.length" ng-repeat="reply in comment.replies">
											<div class="media">
												<div class="d-flex">
													<img src="{{asset('theme/img/product/review-2.png')}}" alt="">
												</div>
												<div class="media-body">
													<h4>@{{reply.user.name}}</h4>
													<h5>12th Feb, 2018 at 05:56 pm</h5>
													
													<a class="delete_reply_btn genric-btn danger-border small" ng-if="reply.user.id == {{isset($user) ? $user->id : null}}" ng-click="deleteData('comments/'+ {{($product->id)}} + '/' + reply.id + '/delete')"><span class="ti-trash"></span></a>
												</div>
											</div>
											<p>@{{reply.comment_message}}</p>
										</div>
									</div>
									<div ng-if="data.length == 0">
											No Comments
									</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="review_box">
								@guest
								<h4 class="text-center"><a href="{{route('login')}}">{{__('Login')}}</a><br>{{__('To Post A Comment..')}}</h4>
								@else
								<h4>Add a Review</h4>
								<p>Your Rating:</p>
								<ul class="list">
									<li><a href="#"><i class="fa fa-star"></i></a></li>
									<li><a href="#"><i class="fa fa-star"></i></a></li>
									<li><a href="#"><i class="fa fa-star"></i></a></li>
									<li><a href="#"><i class="fa fa-star"></i></a></li>
									<li><a href="#"><i class="fa fa-star"></i></a></li>
								</ul>
								<p>Outstanding</p>
								<h4 ng-if="replyToComment">{{__('Replying To')}} @{{replyToComment.user.name}}</h4>
									<h4 ng-if="!replyToComment">{{__('Post a comment')}}</h4>
									<form ng-init="encryptedId = '{{ encrypt($product->id) }}'" ng-submit="postData('store/comment' , { encryptedId: encryptedId, type: 'comment', replyingCommentId: replyToComment.id })">
										<div class="col-md-12">
											<div class="form-group">
												<textarea rows="5" class="form-control" ng-model="formData.message" id="message" rows="1" placeholder="{{__('Your Comment..')}}"></textarea>
											</div>
										</div>
										<div class="col-md-12 text-right">
											<button type="submit" value="submit" class="btn primary-btn" ng-click="">{{__('Post')}}</button>
										</div>
									</form>
								@endguest
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Product Description Area =================-->
@endsection