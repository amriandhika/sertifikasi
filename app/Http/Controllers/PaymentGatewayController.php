<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentGatewayController extends WebsiteBaseController
{
    public function paypalPayment()
    {
        return \view("billing.paypal", []);
    }
    public function paymentStripe()
    {
        return \view("billing.paypal", []);
    }


}
