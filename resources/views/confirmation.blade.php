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
							<li><a href="#"><span>Order number</span> : #{{ $order->id }}</a></li>
							<li><a href="#"><span>Date</span> : {{ date_format($order->created_at, 'd M Y')}}</a></li>
							<li><a href="#"><span>Total</span> : EUR {{ round($order->paiement_total, 2) }}</a></li>							
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Billing Address</h4>
						<ul class="list">
							<li>
								<a href="#">
									<span>Name</span> : 
									{{ $order->paiement_firstname }} {{ $order->paiement_lastname }} 
								</a>
							</li>							
							<li><a href="#"><span>Address</span> : {{ $order->paiement_address }}</a></li>
							<li><a href="#"><span>Postcode </span> : {{ $order->paiement_postalcode }}</a></li>
							<li><a href="#"><span>City</span> : {{ $order->paiement_city }}</a></li>
							<li><a href="#"><span>Country</span> : France</a></li>
							<li><a href="#"><span>Phone</span> : {{ $order->paiement_phone }}</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Shipping Address</h4>
						<ul class="list">
							<li>
								<a href="#">
									<span>Name</span> : 
									{{ $order->paiement_firstname }} {{ $order->paiement_lastname }}
								</a>
							</li>							
							<li><a href="#"><span>Address</span> : {{ $order->paiement_address }}</a></li>
							<li><a href="#"><span>Postcode </span> : {{ $order->paiement_postalcode }}</a></li>
							<li><a href="#"><span>City</span> : {{ $order->paiement_city }}</a></li>
							<li><a href="#"><span>Country</span> : France</a></li>
							<li><a href="#"><span>Phone</span> : {{ $order->paiement_phone }}</a></li>
						</ul>
					</div>
				</div>
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
							{{-- @foreach (Cart::getContent() as $product) --}}
							@foreach ($order->products as $product)
							<tr>
								<td>
									<p>{{ $product->name }}</p>
									<img class="img-thumbnail" style="width: 15%;" 
										 src="{{ $product->image }}" 
										 alt="image product"
                                    >
								</td>
								<td>
									<h5>x {{ $product->pivot->quantity }}</h5>
								</td>
								<td>
									<p>${{ round($product->price * $product->pivot->quantity, 2) }}</p>
								</td>
							</tr>							
							@endforeach

							<tr>
								@if ($order->discount)
								<td>Discount</td>
								<td><h5></h5></td>
								<td>																		
									<li>
										<a href="#">Discount {{ $order->discount }}
											<span>- $ 00</span>
										</a>
									</li>								
								</td>		                             
								@endif																	
							</tr>
							<tr>
								<td>
									<h4>Shipping</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>Flat rate: $00.00</p>
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
													$order->paiement_total
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