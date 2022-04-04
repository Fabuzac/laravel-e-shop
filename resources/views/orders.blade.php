@extends('layouts.app')
@section('content')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Orders</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Home<span class="fa fa-arrow-right"></span></a>
                    <a href="category.html">Orders</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->
<div class="container my-5">
    <div class="orders">
        <h2 class="text-center">Orders Details</h2>         
        @foreach($orders as $order)        
        <div class="table-responsive order_details_table">    
            <h5>My Bill PDF:</h5>
            <span>
                <a target="_blank" href="{{ route('pdf', $order->id) }}">{{ strtotime($order->created_at) }}.PDF</a>
            </span>          
            <div class="d-flex justify-content-between my-5 px-5">                
                <h4>
                    <i class="fas fa-receipt"></i>
                     Order #{{ $order->id }}                                      
                </h4>                
                <h4>Date : {{ date_format($order->created_at, 'd M Y') }}</h4>
            </div>
            <table class="table">
                <thead>                    
                    <tr>
                        <th scope="col" class="font-weight-bold">Product</th>
                        <th scope="col" class="font-weight-bold">Quantity</th>
                        <th scope="col" class="font-weight-bold">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->products as $product)                    
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>x {{ $product->pivot->quantity }}</td>
                        <td>$ {{ round($product->price * $product->pivot->quantity, 2) }}</td>
                    </tr>
                    @endforeach                    
                    <tr>
                        <td><b>Total</b></td>                        
                        <td>$ {{ round($order->paiement_total) }}</td>
                    </tr>
                </tbody>
            </table>            
        </div>
        @endforeach
    </div>
</div>
@endsection