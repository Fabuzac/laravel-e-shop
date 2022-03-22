@extends('layouts.app')

@section('includes')
    {{-- <script src="https://js.stripe.com/v3/"></script> --}}
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
@endsection

@section('content')

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Checkout</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="single-product.html">Checkout</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Checkout Area =================-->
<section class="checkout_area section_gap">
    <div class="container">
        <div class="returning_customer">
            <div class="check_title">
                <h2>Returning Customer? <a href="#">Click here to login</a></h2>
            </div>
            <p>
                If you have shopped with us before,
                please enter your details in the boxes below. If you are a new
                customer, please proceed to the Billing & Shipping section.
            </p>
            <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                <div class="col-md-6 form-group p_star">
                    <input type="text" class="form-control" id="name" name="name">
                    <span class="placeholder" data-placeholder="Email" placeholder="Email"></span>
                </div>
                <div class="col-md-6 form-group p_star">
                    <input type="password" class="form-control" id="password" name="password">
                    <span class="placeholder" data-placeholder="Password"></span>
                </div>
                <div class="col-md-12 form-group">
                    <button type="submit" value="submit" class="primary-btn">login</button>
                    <div class="creat_account">
                        <input type="checkbox" id="f-option" name="selector">
                        <label for="f-option">Remember me</label>
                    </div>
                    <a class="lost_pass" href="#">Lost your password?</a>
                </div>
            </form>
        </div>
        
        {{-- USER INFO --}}
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8 form-group">
                    <h3>Billing Details</h3>
                    <form role="form" 
                            action="{{ route('checkout.store') }}"
                            method="POST" 
                            class="require-validation" 
                            id="payment-form"
                            data-cc-on-file="false" 
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" 
                    >
                    @csrf
                        {{-- USER DATA --}}
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" placeholder="First name" id="firstName" name="name">
                            <span class="placeholder"></span>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" placeholder="Last name" id="lastName" name="lastname">
                            <span class="placeholder"></span>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" placeholder="Compagny name" id="company" name="company">
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" placeholder="Phone number" id="number" name="number">
                            <span class="placeholder"></span>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" placeholder="Email Address" id="email" name="email">
                            <span class="placeholder"></span>
                        </div>
                        <div class="col-md-12 form-group p_star">   
                            <select class="country_select" id="country">
                                <option value="1">France</option>
                                <option value="2">USA</option>
                                <option value="4">Colombia</option>
                            </select>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" placeholder="Address line 01" id="add1" name="add1">
                            <span class="placeholder"></span>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" placeholder="Address line 01" id="add2" name="add2">
                            <span class="placeholder"></span>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" placeholder="City" id="city" name="city">
                            <span class="placeholder"></span>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" placeholder="District" id="district" name="district">
                            <span class="placeholder"></span>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP">
                        </div>
                        {{-- CREDIT CARD --}}
                        <div class="col-md-12 form-group">
                            <h4>Credit or debit card</h4>                        
                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-6 form-group required'>
                                    <label class='control-label'>Name on Card</label> 
                                    <input class='form-control name' size='4' type='text'>
                                </div>
                                <div class='col-xs-12 col-md-6 form-group required'>
                                    <label class='control-label'>Card Number</label> 
                                    <input autocomplete='off' class='form-control card-number' maxlength="16" size='20' type='text'>
                                </div>
                            </div>                        
                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                    <label class='control-label'>CVC</label> 
                                    <input autocomplete='off' class='form-control card-cvc' maxlength="3" placeholder='ex. 311' size='4' type='text'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Month</label> 
                                    <input class='form-control card-expiry-month' maxlength="2" placeholder='MM' size='2' type='text'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Year</label> 
                                    <input class='form-control card-expiry-year' maxlength="4" placeholder='YYYY' size='4' type='text'>
                                </div>
                            </div>                     
                            <div class="form-row row">
                                <div class="col-xs-12">
                                    <button class="primary-btn" type="submit">Pay Now</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- CART --}}
                <div class="col-lg-4">
                    <div class="order_box">
                        <h2>Your Order</h2>
                        <ul class="list">
                            <li><a href="#">Product <span>Total</span></a></li>
                            @foreach (Cart::getContent() as $product)                               
                                <li>
                                    <a href="#">{{ substr($product->model->name,0,10) }}...
                                        <img class="img-thumbnail" style="width: 15%;" 
                                             src="{{ Voyager::image($product->model->image) }}" 
                                             alt="image product"
                                        >
                                        <span class="middle">x {{ $product->quantity }}</span>
                                        <span class="last">${{ $product->model->price }}</span>
                                    </a>                                    
                                </li>
                            @endforeach                            
                        </ul>
                        <ul class="list list_2">
                            <li><a href="#">Subtotal <span>${{ Cart::getSubTotal() }}</span></a></li>
                            <li><a href="#">Shipping <span>Flat rate: $50.00</span></a></li>
                            <li><a href="#">Total <span>${{ Cart::getSubTotal() }}</span></a></li>
                        </ul>
                        <div class="payment_item">
                            <div class="radion_btn">
                                <input type="radio" id="f-option5" name="selector">
                                <label for="f-option5">Check payments</label>
                                <div class="check"></div>
                            </div>
                            <p>
                                Please send a check to Store Name,
                                Store Street, Store Town, Store State / County,
                                Store Postcode.
                            </p>
                        </div>
                        <div class="payment_item active">
                            <div class="radion_btn">
                                <input type="radio" id="f-option6" name="selector">
                                <label for="f-option6">Paypal </label>
                                <img src="img/product/card.jpg" alt="">
                                <div class="check"></div>
                            </div>
                            <p>
                                Pay via PayPal; 
                                you can pay with your credit card if you don’t have a PayPal
                                account.
                            </p>
                        </div>
                        <div class="creat_account">
                            <input type="checkbox" id="f-option4" name="selector">
                            <label for="f-option4">I’ve read and accept the </label>
                            <a href="#">terms & conditions*</a>
                        </div>
                        <a class="primary-btn" href="#">Proceed to Paypal</a>
                    </div>
                    <div class="coupon my-3">
                        <div class="code">
                            <p>Have a code ?</p>
                            <form action="#" method="POST">
                                <div class="d-flex  align-items-center contact_form">
                                    <input type="text" name="coupon_code" id="coupon_code" class="form-control" placeholder="Coupon Code">
                                    <button class="primary-btn my-3" type="submit">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Checkout Area =================-->
@endsection

{{-- ======== STRIPE FORM VALIDATION ======== --}}
@section('js')
<script type="text/javascript">
    $(function() {
        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]', 'input[type=file]', 'textarea'].join(', '),
            $inputs = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid = true;
            $errorMessage.addClass('hide');
            $('.has-error').removeClass('has-error');

            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
              e.preventDefault();
              Stripe.setPublishableKey($form.data('stripe-publishable-key'));
              Stripe.createToken({
                  number: $('.card-number').val(),
                  cvc: $('.card-cvc').val(),
                  exp_month: $('.card-expiry-month').val(),
                  exp_year: $('.card-expiry-year').val(),                  
              }, stripeResponseHandler);
              
            }
        });
    
        function stripeResponseHandler(status, response) {
            if(response.error) {
                $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
            }else {
              /* token contains id, last4, and card type */
              var token = response['id'];
              $form.find('input[type=text]').empty();
              $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
              $form.get(0).submit();
            }
        }
    });
    </script>
@endsection