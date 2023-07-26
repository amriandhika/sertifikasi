@extends('frontend.layout')
@section('title','Checkout')
@section('head')
    @if(!empty($payment_gateways['stripe']) && !empty($payment_gateways['stripe']->public_key))
        <script src="https://js.stripe.com/v3/"></script>
    @endif
    @if(!empty($payment_gateways['paypal_checkout']) && !empty($payment_gateways['paypal_checkout']->param_1)))
    <script src="https://www.paypal.com/sdk/js?client-id={{$payment_gateways['paypal_checkout']->param_1}}&currency=USD"></script>
    @endif
@endsection
@section('content')

    <main>
        <section class=" section section-lg bg-white line-bottom-soft mt-7 pt-3 pt-xl-5 mt-7 py-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">

                    </div>
                </div>
            </div>
        </section>
        <!-- =======================
        Page Banner END -->

        <!-- =======================
        Page content START -->
        <section class="pt-5">
            <div class="container">

                <div class="row g-4 g-sm-5">
                    <!-- Main content START -->
                    <div class="col-xl-8 mb-4 mb-sm-0">
                        <!-- Alert -->

                        @if (session()->has('error'))
                            <div class="alert bg-pink-light text-danger">
                                {{session('error')}}
                            </div>
                        @endif

                        @if(!empty($student))

                            @if(!empty($payment_gateways) && getCartTotalPrice() > 0)

                                <div class="" role="alert">
                                    <div class="alert text-success bg-success-light alert-dismissible d-flex align-items-center fade show py-3 pe-2 mb-3" role="alert">
                                        <div>
                                        <span class="fw-bolder me-1 ">
                                            {{__('Proceed to payment')}}
                                        </span>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-link mb-0 text-end" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x-lg text-dark"></i></button>
                                </div>

                            @endif

                        @else
                            <div class="" role="alert">
                                <div class="alert text-danger bg-pink-light alert-dismissible d-flex align-items-center fade show py-3 pe-2" role="alert">
                                    <div>
                                        <span class="fs-5 me-1 "></span>
                                        {{__(' Already have an account?')}} <a href="/student/login" class="text-reset btn-link mb-0 fw-bold">{{__('Log in')}}</a></div><strong class="text-danger ms-1"></strong>
                                </div>
                                <button type="button" class="btn btn-link mb-0 text-end" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x-lg text-dark"></i></button>
                            </div>

                            <div class="card card-body shadow p-4 mb-3">
                                <!-- Title -->
                                <h5 class="mb-0">{{__('Personal Details')}}</h5>

                                <!-- Form START -->
                                <form class="row g-3 mt-0" method="post" action="/student-signup-post">
                                    @if (session()->has('status'))
                                        <div class="alert alert-success">
                                            {{session('status')}}
                                        </div>
                                    @endif
                                    @if ($errors->any())
                                        <div class="alert bg-pink-light text-danger">
                                            <ul class="list-unstyled">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <!-- Name -->
                                    <div class="col-md-6 bg-light-input">
                                        <label for="yourName" class="form-label">{{__('First Name')}} *</label>
                                        <input type="text" name="first_name" class="form-control" id="yourName" placeholder="Name">
                                    </div>
                                    <!-- Email -->
                                    <div class="col-md-6 bg-light-input">
                                        <label for="yourName" class="form-label">{{__('Last Name')}} *</label>
                                        <input type="text" name="last_name" class="form-control" id="yourName" placeholder="Name">
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-6 bg-light-input">
                                        <label for="emailInput" class="form-label">{{__('Email address')}} *</label>
                                        <input type="email" name="email" class="form-control" id="emailInput" placeholder="Email">
                                    </div>
                                    <div class="col-md-6 bg-light-input">
                                        <label for="mobileNumber" class="form-label">{{__('Mobile number')}}</label>
                                        <input type="text" name="phone_number" class="form-control" id="mobileNumber" placeholder="Mobile number">
                                    </div>


                                    <div class="col-md-6 bg-light-input">
                                        <label for="postalCode" class="form-label">{{__('Password')}} *</label>
                                        <input type="password"  name="password" class="form-control" id="postalCode" placeholder="Password">
                                    </div>


                                    <!-- Button -->
                                    @csrf
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success mb-0">{{__('Signup')}}</button>
                                    </div>
                                </form>
                                <!-- Form END -->

                                <!-- Payment method START -->

                                <!-- Payment method END -->
                            </div>

                        @endif

                        <!-- Personal info START -->

                        <!-- Personal info END -->
                        @if(!empty($student))

                            <div class="row g-3">

                                <div class="card card-body shadow p-4">

                                    @if(getCartTotalPrice() == 0)
                                        <h3>{{__('Enroll to Courses')}}</h3>
                                        <a class="btn btn-info mt-4" href="/enroll-free-courses">{{__('Enroll')}}</a>
                                    @endif

                                    @if(!empty($payment_gateways) && getCartTotalPrice() > 0)
                                        <div class="accordion-1" id="accordionPaymentGateways">
                                            <div class="accordion" id="accordionSettings">

                                                @if(!empty($payment_gateways['stripe']) && !empty($payment_gateways['stripe']->public_key))
                                                    <div class="accordion-item mb-3">
                                                        <h5 class="accordion-header" id="headingOne">
                                                            <button class="accordion-button border-bottom font-weight-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                                {{__('Pay with credit/debit card')}}
                                                                <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                                                <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                                            </button>
                                                        </h5>
                                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionPaymentGateways" style="">
                                                            <div id="stripeDiv" class="my-3 p-3">
                                                                <form action="/payment-stripe" method="post" id="payment-form">
                                                                    <div class="form-row">
                                                                        <label for="card-element">
                                                                            {{__('Credit or debit card')}}
                                                                        </label>
                                                                        <div id="card-element" class="form-control">
                                                                            <!-- A Stripe Element will be inserted here. -->
                                                                        </div>

                                                                        <!-- Used to display form errors. -->
                                                                        <div id="card-errors" role="alert"></div>
                                                                    </div>




                                                                    @csrf

                                                                    <button class="btn btn-info mt-4" id="btnStripeSubmit"
                                                                    >{{__('Submit Payment')}}</button>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if(!empty($payment_gateways['paypal']) && !empty($payment_gateways['paypal']->username))

                                                    <div class="accordion-item mb-3">
                                                        <h5 class="accordion-header" id="headingTwo">
                                                            <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                {{__('Pay with Paypal')}}
                                                                <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                                                <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                                            </button>
                                                        </h5>
                                                        <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionPaymentGateways">
                                                            <div class="accordion-body text-sm opacity-8">

                                                                <div class="my-3">
                                                                    <div id="paypal-button-container">

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                @endif


                                                @if(!empty($payment_gateways['toyyibpay']) && !empty($payment_gateways['toyyibpay']->public_key))

                                                    <div class="accordion-item mb-3">
                                                        <h5 class="accordion-header" id="heading_toyyibPay">
                                                            <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_toyyibPay" aria-expanded="false" aria-controls="collapse_toyyibPay">
                                                                {{__('toyyibPay')}}
                                                                <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                                                <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                                            </button>
                                                        </h5>
                                                        <div id="collapse_toyyibPay" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionPaymentGateways">
                                                            <div class="accordion-body text-sm opacity-8">

                                                                <div class="my-3">
                                                                   <form method="post" action="/handle-payment-gateway">


                                                                       <div class="mb-3">
                                                                           <label>{{__('Phone')}}</label>
                                                                           <input class="form-control" type="text" name="phone" required>
                                                                       </div>

                                                                       <input type="hidden" name="gateway_api_name" value="toyyibPay">
                                                                       @csrf
                                                                       <button type="submit" class="btn btn-info">{{$payment_gateways['toyyibpay']->instruction ?? 'Pay with toyyibPay'}}</button>

                                                                   </form>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                @endif

                                                    @if(!empty($payment_gateways['paystack']) && !empty($payment_gateways['paystack']->public_key))

                                                        <div class="accordion-item mb-3">
                                                            <h5 class="accordion-header" id="heading_toyyibPay">
                                                                <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_Paystack" aria-expanded="false" aria-controls="collapse_Paystack">
                                                                    {{__('PayStack')}}
                                                                    <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                                                    <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                                                </button>
                                                            </h5>
                                                            <div id="collapse_Paystack" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionPaymentGateways">
                                                                <div class="accordion-body text-sm opacity-8">

                                                                    <div class="my-3">
                                                                        <form method="post" action="/handle-payment-gateway">




                                                                            <input type="hidden" name="gateway_api_name" value="paystack">
                                                                            @csrf
                                                                            <button type="submit" class="btn btn-info">{{__('Pay')}}</button>

                                                                        </form>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    @endif

                                                    @if(!empty($payment_gateways['bank']) && !empty($payment_gateways['bank']->name))

                                                        <div class="accordion-item mb-3">
                                                            <h5 class="accordion-header" id="heading_bank">
                                                                <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_bank" aria-expanded="false" aria-controls="collapse_toyyibPay">
                                                                    {{__('Pay with Bank')}}
                                                                    <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                                                    <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                                                </button>
                                                            </h5>
                                                            <div id="collapse_bank" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionPaymentGateways">
                                                                <div class="accordion-body text-sm opacity-8">

                                                                    <div class="my-3">
                                                                        <h6>
                                                                            {{__('Payment Instruction')}}
                                                                        </h6>

                                                                        <div>
                                                                            {!! $payment_gateways['bank']->instruction!!}
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    @endif


                                            </div>
                                        </div>


                                    @endif


                                </div>

                            </div>

                        @endif

                    </div>
                    <!-- Main content END -->

                    <!-- Right sidebar START -->
                    <div class="col-xl-4">
                        <div class="row mb-0">
                            <div class="col-md-6 col-xl-12">
                                <!-- Order summary START -->
                                <div class="card card-body shadow p-4 mb-4">
                                    <!-- Title -->
                                    <h4 class="mb-4">{{__('Order Summary')}}</h4>



                                    <!-- Course item START -->
                                    <div class="row g-3">
                                        <!-- Image -->
                                        @if(!empty($cart['course']))

                                            @foreach($cart['course'] as $course_in_cart)


                                                <div class="col-md-12">
                                                    <h6 class="mb-0"><a href="/course-details?id={{$course_in_cart->id}}">{{$course_in_cart->name}}</a></h6>
                                                    <!-- Info -->
                                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                                        <!-- Price -->
                                                        <span class="text-success">@if(!empty($course_in_cart->price))
                                                                {{formatCurrency($course_in_cart->price,getWorkspaceCurrency($super_settings))}}

                                                            @endif
                                                        </span>

                                                        <!-- Remove and edit button -->
                                                        <div class="text-primary-hover">
                                                            <a href="/remove-item-from-cart/{{$course_in_cart->id}}" class="btn btn-md bg-pink-light text-danger px-2 mb-0"><i class="fas fa-fw fa-times"></i></a>


                                                        </div>
                                                    </div>
                                                </div>


                                                <hr> <!-- Divider -->


                                            @endforeach

                                        @endif
                                        @if(!empty($cart['ebook']))

                                            @foreach($cart['ebook'] as $ebook_in_cart)


                                                <div class="col-md-12">
                                                    <h6 class="mb-0"><a href="/view-ebook?id={{$ebook_in_cart->id}}">{{$ebook_in_cart->name}}</a></h6>
                                                    <!-- Info -->
                                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                                        <!-- Price -->
                                                        <span class="text-success">
                                                            @if(!empty($ebook_in_cart->price))
                                                                {{formatCurrency($ebook_in_cart->price,getWorkspaceCurrency($super_settings))}} @endif
                                                        </span>

                                                        <!-- Remove and edit button -->
                                                        <div class="text-primary-hover ">
                                                            <a href="/remove-item-from-cart/{{$ebook_in_cart->id}}" class="btn btn-md bg-pink-light text-danger px-2 mb-0"><i class="fas fa-fw fa-times"></i></a>


                                                        </div>
                                                    </div>
                                                </div>



                                                <hr> <!-- Divider -->

                                            @endforeach

                                        @endif

                                    </div>


                                    <!-- Price and detail -->
                                    <ul class="list-group list-group-borderless mb-2">

                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="h5 mb-0">{{__('Total')}}</span>
                                            <span class="h5 mb-0">
                                                {{formatCurrency(getCartTotalPrice(),getWorkspaceCurrency($super_settings))}}
                                                </span>
                                        </li>
                                    </ul>

                                    <!-- Button -->


                                    <!-- Content -->
                                    <p class="small mb-0 mt-2 text-center">{{__('By completing order, you agree to these')}} <a href="/termsandconditions"><strong>{{__('Terms of Service')}}</strong></a></p>

                                </div>
                                <!-- Order summary END -->
                            </div>

                            <div class="col-md-6 col-xl-12">
                                <div class="card bg-blue p-3 position-relative overflow-hidden" >
                                    <!-- SVG decoration -->

                                    <!-- Body -->
                                    <div class="card-body">
                                        <!-- Title -->


                                    </div>
                                </div>
                            </div>
                        </div><!-- Row End -->
                    </div>
                    <!-- Right sidebar END -->

                </div><!-- Row END -->
            </div>
        </section>
        <!-- =======================
        Page content END -->

    </main>


@endsection


@section('script')
    @if(!empty($payment_gateways['paypal']))
        <script src="https://www.paypal.com/sdk/js?client-id={{$payment_gateways['paypal']->username}}&currency=USD">
        </script>
    @endif




    <script>
        jQuery(document).ready(function () {
            "use strict";

            @if(!empty($payment_gateways['stripe']) && !empty($payment_gateways['stripe']->public_key))
            // Dynamic JS for Stripe
            var stripe = Stripe('{{$payment_gateways['stripe']->public_key}}');


            var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
                base: {
                    color: '#32325d',
                    lineHeight: '18px',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

// Create an instance of the card Element.
            var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

// Handle real-time validation errors from the card Element.
            card.addEventListener('change', function (event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

// Handle form submission.
            var form = document.getElementById('payment-form');
            var $btnStripeSubmit = $('#btnStripeSubmit');
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                $btnStripeSubmit.prop('disabled', true);
                stripe.createToken(card).then(function (result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                        $btnStripeSubmit.prop('disabled', false);
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);

                    }
                });
            });

// Submit the form with the token ID.
            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'token_id');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }
            @endif


            @if(!empty($payment_gateways['paypal']))
            // Dynamic JS for Stripe


            paypal.Buttons({
                // Sets up the transaction when a payment button is clicked
                createOrder: (data, actions) => {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: '{{round(getCartTotalPrice(),2)}}' // Can also reference a variable or function
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
                        // When ready to go live, remove the alert and show a success message within this page. For example:
                        const element = document.getElementById('paypal-button-container');
                        element.innerHTML = '<h3>Thank you for your payment! It may take some time to change invoice status to Paid</h3>';
                        // Or go to another URL:  actions.redirect('thank_you.html');
                    });
                }
            }).render('#paypal-button-container');

            @endif

        });
    </script>
@endsection
