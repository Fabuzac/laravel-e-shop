@extends('layouts.app')

@section('content')
	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Confirmation</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Confirmation</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Order Details Area =================-->
	<section class="order_details section_gap">
		<div class="container">
			
			@if ($message = Session::get('success'))
				<div class="text-light alert alert-succes alert-block bg-success">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>
					<p>{{ $message }}</p>
				</div>
     		@endif
			 
			<div class="row order_d_inner">
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Order Info</h4>
						<ul class="list">
							<li><a href="#"><span>Order number</span> : 60235</a></li>
							<li><a href="#"><span>Date</span> : 19/03/2022</a></li>
							<li><a href="#"><span>Total</span> : $ 2210</a></li>							
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Billing Address</h4>
						<ul class="list">
							<li><a href="#"><span>Number</span> : 56</a></li>
							<li><a href="#"><span>Street</span> : Boulevard taratintin</a></li>
							<li><a href="#"><span>City</span> : Nantes</a></li>
							<li><a href="#"><span>Postcode </span> : 44200</a></li>
							<li><a href="#"><span>Country</span> : France</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Shipping Address</h4>
						<ul class="list">
							<li><a href="#"><span>Number</span> : 56</a></li>
							<li><a href="#"><span>Street</span> : Boulevard taratintin</a></li>
							<li><a href="#"><span>City</span> : Nantes</a></li>
							<li><a href="#"><span>Postcode </span> : 44200</a></li>
							<li><a href="#"><span>Country</span> : France</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div>
				<h4>My Bill PDF:</h4><span>01.PDF</span>
			</div>

			<div class="order_details_table">
				<h2>Order Details</h2>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Product</th>
								<th scope="col">Quantity</th>
								<th scope="col">Total</th>
							</tr>
						</thead>
						<tbody>
							@foreach (Cart::getContent() as $product)
							<tr>
								<td>
									<p>{{ $product->model->name }}</p>
									<img class="img-thumbnail" style="width: 15%;" 
										 src="{{ Voyager::image($product->model->image) }}" 
										 alt="image product"
                                    >
								</td>
								<td>
									<h5>x {{ $product->quantity }}</h5>
								</td>
								<td>
									<p>${{ $product->model->price }}</p>
								</td>
							</tr>
							@endforeach
							<tr>
								<td>
									<h4>Subtotal</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>${{ Cart::getSubTotal() }}</p>
								</td>
							</tr>

							<tr>
								<td>Discount</td>
								<td><h5></h5></td>
								<td>									
									@if (session()->has('coupon'))
										<li>
											<a href="#">Discount {{ session()->get('coupon')['name'] }}
												<span>- $ {{ session()->get('coupon')['discount'] }}</span>
											</a>
										</li>										                             
									@endif									
								</td>
							</tr>
							<tr>
								<td>
									<h4>Shipping</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>Flat rate: $50.00</p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Total</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<ul>
									<li><a href="#">Shipping <span>$00.00</span></a></li>
										<li>
											<a href="#">Total 
												<span>${{ 
													session()->has('coupon')
													? Cart::getTotal() - session()->get('coupon')['discount'] 
													: Cart::getTotal()
												}}
												</span>
											</a>
										</li>
									</ul>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!--================End Order Details Area =================-->
@endsection