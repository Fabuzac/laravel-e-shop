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

        @if ($message = Session::get('success'))
            <div class="text-light alert alert-succes alert-block bg-success">
                <button type="button" data-dismiss="alert" class="close">X</button>
                {{ $message }}
            </div>
        @endif

        {{-- USER INFO --}}
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-7 form-group">
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
                            <input type="text" 
                                   class="form-control" 
                                   placeholder="* First name" 
                                   id="firstName" 
                                   name="firstname"
                            >
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" 
                                   class="form-control" 
                                   placeholder="* Last name" 
                                   id="lastName" 
                                   name="lastname"
                            >
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" 
                                   class="form-control" 
                                   placeholder="* Phone number" 
                                   id="number" 
                                   name="phone"
                                   required
                            >
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" 
                                   class="form-control" 
                                   placeholder="* Email Address" 
                                   id="email" 
                                   name="email"
                            >
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" 
                                   class="form-control" 
                                   placeholder="* Address" 
                                   id="add1" 
                                   name="address"
                            >
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" 
                                   class="form-control" 
                                   placeholder="Additional Addresses APT 01 BUILDING 02" 
                                   id="add2" 
                                   name="address2"
                            >
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" 
                                   class="form-control" 
                                   placeholder="* City" 
                                   id="city" 
                                   name="city"
                            >
                        </div>                    
                        <div class="col-md-12 form-group">
                            <input type="text" 
                                   class="form-control" 
                                   id="zip" 
                                   name="postalcode" 
                                   placeholder="Postcode/ZIP"
                            >
                        </div>
                        <div class="col-md-12 form-group p_star">   
                            <select class="country_select" id="country">
                                <option value="1">France</option>
                                <option value="2">Germany</option>
                                <option value="4">Colombia</option>
                            </select>
                        </div>
                        {{-- CREDIT CARD --}}
                        <div class="col-md-12 form-group">
                            <h4>Credit or debit card</h4>                        
                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-6 form-group required'>
                                    <label class='control-label'>Name on Card</label> 
                                    <input class='form-control name' 
                                           size='4' 
                                           type='text'
                                    >
                                </div>
                                <div class='col-xs-12 col-md-6 form-group required'>
                                    <label class='control-label'>Card Number</label> 
                                    <input autocomplete='off'
                                           class='form-control card-number' 
                                           maxlength="16" 
                                           size='20' 
                                           type='text'
                                    >
                                </div>
                            </div>                        
                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                    <label class='control-label'>CVC</label> 
                                    <input autocomplete='off'
                                           class='form-control card-cvc' 
                                           maxlength="3" 
                                           placeholder='ex. 311' 
                                           size='4' 
                                           type='text'
                                    >
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Month</label> 
                                    <input class='form-control card-expiry-month'
                                           maxlength="2" 
                                           placeholder='MM' 
                                           size='2' 
                                           type='text'
                                    >
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Year</label> 
                                    <input class='form-control card-expiry-year'
                                           maxlength="4" 
                                           placeholder='YYYY' 
                                           size='4' 
                                           type='text'
                                    >
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
                            <li><a href="#"><strong>Product</strong> <span>Total</span></a></li>
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

                            @if (session()->has('coupon'))
                                <li>
                                    <a href="#">Discount {{ session()->get('coupon')['name'] }}
                                        <span>- $ {{ session()->get('coupon')['discount'] }}</span>
                                    </a>
                                </li>
                                <form action="{{ route('coupon.destroy') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn" type="submit">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>                                
                            @endif

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
                    </div>
                    {{-- START COUPON --}}
                    <div class="code">
                        <p>Have a code ?</p>                        
                        <form action="{{ route('coupon.store') }}" method="POST">
                            @csrf
                            <div class="d-flex align-items-center contact_form">
                                <input type="text" 
                                       name="coupon" 
                                       id="coupon" 
                                       class="form-control" 
                                       placeholder="Coupon Code"
                                >
                                <button class="primary-btn my-3" type="submit">
                                    <i class="fas fa-check"></i>
                                </button>
                            </div>
                        </form>
                    </div>   
                    {{-- END COUPON --}}  
                </div>
                {{-- PAYPAL --}}
                <div class="payment_item active mt-5">
                    <h3>Pay via PayPal</h3>
                    <!-- Set up a container element for the button -->
                    <div id="paypal-button-container"></div>

                    <!-- Include the PayPal JavaScript SDK -->
                    <script src="https://www.paypal.com/sdk/js?client-id={{config('services.paypal.sandbox.client_id')}}&currency=USD">
                    </script>
                    <script>
                        
                        paypal.Buttons({
                        // Sets up the transaction when a payment button is clicked                            
                            createOrder: (data, actions) => {

                            return actions.order.create({

                                purchase_units: [{

                                    amount: {
                                        value: '77.44' // Can also reference a variable or function
                                    }
                                }]
                            });
                            },

                            // Finalize the transaction after payer approval
                            onApprove: (data, actions) => {

                            return actions.order.capture().then(function(orderData) {

                                // Successful capture! For dev/demo purposes:

                                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                                const transaction = orderData.purchase_units[0].payments.captures[0];

                                alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);

                            });
                        }

                    }).render('#paypal-button-container');
                    </script>
                                      
                </div>             
            </div>
        </div>
    </div>
</section>
@endsection

{{-- ======== STRIPE FORM VALIDATION ======== --}}
@section('js')
<script type="text/javascript">
    $(function() {
        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = [
                    'input[type=email]',
                    'input[type=password]', 
                    'input[type=text]', 
                    'input[type=file]', 
                    'textarea'].join(', '),
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