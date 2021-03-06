@extends('layouts.app')

@section('content')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
	<div class="container">
		<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
			<div class="col-first">
				<h1>Shop page</h1>
				<nav class="d-flex align-items-center">
					<a href="{{ route('home') }}"> Home <i class="fa fa-angle-right"></i></a>
					<a href="{{ route('shop.index') }}"> Shop</a>
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
				<div class="head">Browse Categories</div>
				<ul class="main-categories">
					@foreach ($categories as $category)
						<li class="main-nav-list">
							<a class=""
							   href="{{ route('shop.index', ['category' => $category->label]) }}">
								{{ $category->label }}  
								<span class="number">( {{ count($category->products) }} )</span>								
							</a>
						</li>
					@endforeach						
				</ul>
			</div>
			<div class="sidebar-filter mt-50">
				<div class="top-filter-head">Product Filters</div>
				<div class="common-filter">
					<div class="head">Brands</div>
					<form action="#">
						<ul>
							<li class="filter-list">
								<input class="pixel-radio" type="radio" id="apple" name="brand">
								<label for="apple">Apple<span>(29)</span></label>
							</li>
							<li class="filter-list">
								<input class="pixel-radio" type="radio" id="asus" name="brand">
								<label for="asus">Asus<span>(29)</span></label>
							</li>
							<li class="filter-list">
								<input class="pixel-radio" type="radio" id="gionee" name="brand">
								<label for="gionee">Gionee<span>(19)</span></label>
							</li>
							<li class="filter-list">
								<input class="pixel-radio" type="radio" id="micromax" name="brand">
								<label for="micromax">Micromax<span>(19)</span></label>
							</li>
							<li class="filter-list">
								<input class="pixel-radio" type="radio" id="samsung" name="brand">
								<label for="samsung">Samsung<span>(19)</span></label>
							</li>
						</ul>
					</form>
				</div>
				<div class="common-filter">
					<div class="head">Color</div>
					<form action="#">
						<ul>
							<li class="filter-list">
								<input class="pixel-radio" type="radio" id="black" name="color">
								<label for="black">Black<span>(29)</span></label>
							</li>
							<li class="filter-list">
								<input class="pixel-radio" type="radio" id="balckleather" name="color">
								<label for="balckleather">Black Leather<span>(10)</span></label>
							</li>
							<li class="filter-list">
								<input class="pixel-radio" type="radio" id="blackred" name="color">
								<label for="blackred">Black	with red<span>(19)</span></label>
								</li>
							<li class="filter-list">
								<input class="pixel-radio" type="radio" id="gold" name="color">
								<label for="gold">Gold<span>(5)</span></label>
							</li>
							<li class="filter-list">
								<input class="pixel-radio" type="radio" id="spacegrey" name="color">
								<label for="spacegrey">Spacegrey<span>(19)</span></label>
							</li>
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
					<div class="dropdown">
						<a href="{{ route('shop.index', ['category' => request()->category, 'sort' => 'asc']) }}">Croissant</a>
						<a href="{{ route('shop.index', ['category' => request()->category, 'sort' => 'desc']) }}">Decroissant</a>
					</div>
				</div>
				<div class="sorting mr-auto">
					<select>
						<option value="1">Show 12</option>
						<option value="1">Show 12</option>
						<option value="1">Show 12</option>
					</select>
				</div>
				{{-- PAGINATION --}}
				<div class="text-center" role="toolbar" aria-label="Toolbar with button groups">
					<div role="group" aria-label="First group">
						{{ $products->links('override.pagination') }}
					</div>
				</div>
			</div>
			<!-- End Filter Bar -->
			<!-- Start Best Seller -->
			<section class="lattest-product-area pb-40 category-list">
				<div class="row">						
					<!-- single product -->
					@foreach ($products as $product)
					<div class="col-lg-4 col-md-6">
						<div class="single-product">
							<a href="{{ route('shop.show', $product->slug) }}">									
								<img class="img-fluid" src="{{ Voyager::image($product->image) }}" alt="">
							</a>								
							<div class="product-details">
								<h6>{{ $product->name }}</h6>
								<p>{{ $product->details }}</p>
								<div class="price">
									<h6>${{ $product->price }}</h6>									
								</div>
								<div class="prd-bottom">
									<a href="#" class="social-info">
										<span> <i class="fas fa-shopping-bag"></i> </span>
										<p class="hover-text">add to bag</p>
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
			</section>
			<!-- End Best Seller -->
			{{-- PAGINATION --}}
			<div class="text-center" role="toolbar" aria-label="Toolbar with button groups">
				<div role="group" aria-label="First group">
					{{ $products->links('override.pagination') }}
				</div>
			</div>
		</div>
	</div>
</div>	
@endsection