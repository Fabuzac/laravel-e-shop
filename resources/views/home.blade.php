@extends('layouts.app')

@section('content')
<!-- Start Banner Area -->
<section class="banner-area">
	<div class="container">
		<div class="row fullscreen align-items-center justify-content-start">
			<div class="col-lg-12">
				<div class="active-banner-slider owl-carousel">
					<!-- single-slide -->
					@foreach($news as $new)					
					<div class="row single-slide align-items-center d-flex">
						<div class="col-lg-5 col-md-6">
							<div class="banner-content">
								<h2>{{ $new->name }}<br>Collection!</h2>
								<p>{{ $new->details }}</p>
								<div class="add-bag d-flex align-items-center">
									<form action="{{ route('cart.store') }}" method="POST">
										@csrf
										<input type="hidden" name="id" value="{{ $new->id }}">
										<input type="hidden" name="name" value="{{ $new->name }}">
										<input type="hidden" name="price" value="{{ $new->price }}">
										<button type="submit" class="primary-btn">
											<a class="add-btn" href="#">
												<i class="fa fa-shopping-cart" 
												   style="color:#fff;font-size:19px;"></i>
											</a>
											<span class="text-light add-text text-uppercase">
												Add to Cart
											</span>
										</button>
									</form>																	
								</div>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="banner-img">
								<img class="img-fluid img-home" 
									 style="width:50%;" 
									 src="{{ Voyager::image($new->image) }}" 
									 alt="image product"
								>
							</div>
						</div>
					</div>
					@endforeach					
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End banner Area -->

<!-- Start brand Area -->
<section class="brand-area section_gap">
	<div class="container">
		<div class="row">
			<a class="col single-img" href="#">
				<img class="img-fluid d-block mx-auto" src="img/brand/1.png" alt="">
			</a>
			<a class="col single-img" href="#">
				<img class="img-fluid d-block mx-auto" src="img/brand/2.png" alt="">
			</a>
			<a class="col single-img" href="#">
				<img class="img-fluid d-block mx-auto" src="img/brand/3.png" alt="">
			</a>
			<a class="col single-img" href="#">
				<img class="img-fluid d-block mx-auto" src="img/brand/4.png" alt="">
			</a>
			<a class="col single-img" href="#">
				<img class="img-fluid d-block mx-auto" src="img/brand/5.png" alt="">
			</a>
		</div>
	</div>
</section>
<!-- End brand Area -->

<!-- Start category Area -->
<section class="category-area">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-md-12">
				<div class="row">
					<div class="col-lg-8 col-md-8">
						<div class="single-deal">
							<div class="overlay"></div>
							<img class="img-fluid w-100" src="img/category/c1.jpg" alt="image product">
							<a href="img/category/c1.jpg" class="img-pop-up" target="_blank">
								<div class="deal-details">
									<h6 class="deal-title">Sneaker for Sports</h6>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-4 col-md-4">
						<div class="single-deal">
							<div class="overlay"></div>
							<img class="img-fluid w-100" src="img/category/c2.jpg" alt="image product">
							<a href="img/category/c2.jpg" class="img-pop-up" target="_blank">
								<div class="deal-details">
									<h6 class="deal-title">Sneaker for Sports</h6>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-4 col-md-4">
						<div class="single-deal">
							<div class="overlay"></div>
							<img class="img-fluid w-100" src="img/category/c3.jpg" alt="image product">
							<a href="img/category/c3.jpg" class="img-pop-up" target="_blank">
								<div class="deal-details">
									<h6 class="deal-title">Product for Couple</h6>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-8 col-md-8">
						<div class="single-deal">
							<div class="overlay"></div>
							<img class="img-fluid w-100" src="img/category/c4.jpg" alt="image product">
							<a href="img/category/c4.jpg" class="img-pop-up" target="_blank">
								<div class="deal-details">
									<h6 class="deal-title">Sneaker for Sports</h6>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="single-deal">
					<div class="overlay"></div>
					<img class="img-fluid w-100" src="img/category/c3.jpg" alt="image product">
					<a href="img/category/c6.jpg" class="img-pop-up" target="_blank">
						<div class="deal-details">
							<h6 class="deal-title">New Article</h6>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End category Area -->

<!-- start product Area -->
<section class="owl-carousel active-product-area section_gap">
	<!-- single product slide -->
	<div class="single-product-slider">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Latest Products</h1>						
					</div>
				</div>
			</div>
			<div class="row">
				<!-- single product -->
				@foreach ($latestproducts as $product)
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<a href="{{ route('shop.show', $product->slug) }}">									
								<img class="img-fluid" 
									 src="{{ Voyager::image($product->image) }}" 
									 alt="image product">
							</a>	
							<div class="product-details">
								<h6>{{ $product->name }}</h6>
								<p>{{ $product->details }}</p>
								<div class="price">
									<h6>${{ $product->price }}</h6>										
								</div>
								<div class="prd-bottom">
									<a href="#" class="social-info">
										<form action="{{ route('cart.store') }}" method="POST">
											@csrf
											<input type="hidden" name="id" value="{{ $product->id }}">
											<input type="hidden" name="name" value="{{ $product->name }}">
											<input type="hidden" name="price" value="{{ $product->price }}">											
											<button type="submit" class="form-btn">												
												<span><i class="fas fa-shopping-bag"></i></span>
												<p class="hover-text">add to bag</p>
											</button>
										</form>											
									</a>
									<a href="#" class="social-info">
										<span> <i class="fas fa-heart"></i> </span>
										<p class="hover-text">Wishlist</p>
									</a>
									
									<a href="{{ route('shop.show', $product->slug) }}" class="social-info">
										<span> <i class="fa fa-eye"></i> </span>
										<p class="hover-text">view more</p>
									</a>									
								</div>
							</div>
						</div>
					</div>
				@endforeach					
			</div>
		</div>
	</div>
	<!-- single product slide -->
	<div class="single-product-slider">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Bestseller</h1>
						<p>
							Lorem ipsum dolor sit amet.
						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- single product -->
				@foreach ($bestsellers as $bestseller)				
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<a href="{{ route('shop.show', $bestseller->slug) }}">									
								<img class="img-fluid" 
									 src="{{ Voyager::image($bestseller->image) }}" 
									 alt="image product">
							</a>	
							<div class="product-details">
								<h6>{{ $bestseller->name }}</h6>
								<p>{{ $bestseller->details }}</p>
								<div class="price">
									<h6>${{ $bestseller->price }}</h6>										
								</div>
								<div class="prd-bottom">
									<a href="#" class="social-info">
										<form action="{{ route('cart.store') }}" method="POST">
											@csrf
											<input type="hidden" name="id" value="{{ $bestseller->id }}">
											<input type="hidden" name="name" value="{{ $bestseller->name }}">
											<input type="hidden" name="price" value="{{ $bestseller->price }}">											
											<button type="submit" class="form-btn">												
												<span><i class="fas fa-shopping-bag"></i></span>
												<p class="hover-text">add to bag</p>																				
											</button>
										</form>											
									</a>
									<a href="#" class="social-info">
										<span> <i class="fas fa-heart"></i> </span>
										<p class="hover-text">Wishlist</p>
									</a>									
									<a href="{{ route('shop.show', $bestseller->slug) }}" class="social-info">
										<span> <i class="fa fa-eye"></i> </span>
										<p class="hover-text">view more</p>
									</a>									
								</div>								
							</div>
						</div>
					</div>
				@endforeach						
			</div>
		</div>
	</div>
</section>
<!-- end product Area -->

<!-- start features Area -->
<section class="features-area section_gap">
	<div class="container">
		<div class="row features-inner">
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="img/features/f-icon1.png" alt="">
					</div>
					<h6>Free Delivery</h6>
					<p>Free Shipping on all order</p>
				</div>
			</div>
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="img/features/f-icon2.png" alt="">
					</div>
					<h6>Return Policy</h6>
					<p>Free Shipping on all order</p>
				</div>
			</div>
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="img/features/f-icon3.png" alt="">
					</div>
					<h6>24/7 Support</h6>
					<p>Free Shipping on all order</p>
				</div>
			</div>
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="img/features/f-icon4.png" alt="">
					</div>
					<h6>Secure Payment</h6>
					<p>Free Shipping on all order</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end features Area -->
@endsection