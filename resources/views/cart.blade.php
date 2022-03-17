@extends('layouts.app')

@section('content')

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">        
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Cart</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html">Cart</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">        
        @if ($message = Session::get('success'))
            <div class="text-light alert alert-succes alert-block bg-success">
                <button type="button" data-dismiss="alert" class="close">X</button>
                {{ $message }}
            </div>
        @endif

        <div class="cart_inner">

        @if (count(Cart::getContent()) > 0)                            

            <h2>{{ count(Cart::getContent()) }} item(s) in shopping cart</h2> 
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="dol">About</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>                        
                        @foreach (Cart::getContent() as $product)                        
                        <tr>                            
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <a href="#">
                                            <img class="img-thumbnail w-20" 
                                                 src="{{ Voyager::image($product->model->image) }}" 
                                                 alt="image product"
                                            >
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="media-body">
                                    <h4>{{ $product->model->name }}</h4>
                                    <p>{{ $product->model->details }}</p>
                                </div>
                            </td>
                            <td>
                                <h5>${{ $product->model->price }}</h5>
                            </td>
                            
                            <td>
                                <div  class="product_count"> 
                                    <input type="text" 
                                           name="qty" 
                                           id="sst" 
                                           maxlength="12" 
                                           value="x {{ $product->quantity }}" 
                                           title="Quantity:"
                                           class="input-text qty"
                                           disabled
                                    >
                                    <button 
                                        onclick="var result = document.getElementById('sst');
                                                 var sst = result.value;
                                                 if( !isNaN( sst )) result.value++;
                                                 return false;"
                                        class="increase items-count" type="button">
                                        <i class="fa fa-chevron-up"></i>
                                    </button>

                                    <button 
                                        onclick="var result = document.getElementById('sst');
                                                 var sst = result.value; 
                                                 if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;
                                                 return false;"
                                        class="reduced items-count" type="button">
                                        <i class="fa fa-chevron-down"></i>
                                    </button>
                                </div>
                            </td>
                            <td>                                
                                <form action="{{ route('cart.delete', $product->model) }}" method="POST">
                                    @method("DELETE")
                                    @csrf
                                    <button type="submit" class="btn btn-link">Remove</button>
                                </form>                                
                                
                                <form action="{{ route('cart.save', $product->model) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-link">Save for later</button>
                                </form>                                
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td class="border">                                                              
                                <h4>Total</h4>                                
                            </td>
                            <td class="border">
                                <h5>${{ Cart::getSubTotal() }}</h5>
                            </td>
                        </tr>
                            <tr class="out_button_area">                  
                        </tr>
                    </tbody>
                </table>
                <div class="checkout_btn_inner d-flex align-items-center justify-content-around mb-3">
                    <a class="gray_btn" href="{{ route('shop.index') }}">Continue Shopping</a>
                    <a class="primary-btn" href="{{ route('checkout.index') }}">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>    
    @else
        <h3 class="my-3 text-center">No item in shopping cart</h3>
        <div class="checkout_btn_inner d-flex align-items-center justify-content-around mb-3">
            <a class="gray_btn" href="{{ route('shop.index') }}">Continue Shopping</a>
        </div>
    @endif
   <div class="single-product-slider">
        <div class="container">
            <h2>Wishlist</h2>
        </div>
   </div>
</section>
<!--================End Cart Area =================-->
@endsection