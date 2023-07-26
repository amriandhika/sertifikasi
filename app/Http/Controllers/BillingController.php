<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Course;
use App\Models\CoursePurchase;
use App\Models\CreditCard;
use App\Models\Customer;
use App\Models\EbookPurchase;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PaymentGateway;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Student;

use App\Models\SubscriptionPlan;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use Stripe\Stripe;

class BillingController extends WebsiteBaseController
{
    //
    public function __construct()
    {
        parent::__construct();

        $this->middleware(function ($request, $next) {
            $super_settings = [];

            $super_settings_data = Setting::where("workspace_id", 1)->get();
            foreach ($super_settings_data as $super_setting) {
                $super_settings[$super_setting->key] = $super_setting->value;
            }

            $this->super_settings = $super_settings;
            View::share("super_settings", $super_settings);
            return $next($request);
        });
    }

    public function cartPage()
    {
        return \view("billing.cart", []);
    }

    public function checkout()
    {
        $payment_gateways = PaymentGateway::get()
            ->keyBy("api_name")
            ->all();



        return \view("billing.checkout", [
            "payment_gateways" => $payment_gateways,
        ]);
    }

    public function addToCart($id, Request $request)
    {
        $request->validate([
            "type" => "required|in:course,ebook",
        ]);

        $cart = session()->get("cart");
        if (!$cart) {
            $cart = [];
        }

        if ($request->query("type") == "course") {
            $course = Course::find($id);
            $cart["course"][$id] = $course;
            session()->put("cart", $cart);
        } else {
            $ebook = Product::find($id);
            $cart["ebook"][$id] = $ebook;
            session()->put("cart", $cart);
        }

        return redirect()->route("cart");
    }

    public function removeItemFromCart($id)
    {
        $cart = session()->get("cart");

        if (isset($cart["course"][$id])) {
            unset($cart["course"][$id]);
        } else {
            unset($cart["ebook"][$id]);
        }

        session()->put("cart", $cart);

        return redirect()->route("cart");
    }

    public function orderConfirmed()
    {
        $payment_gateways = PaymentGateway::get()
            ->keyBy("api_name")
            ->all();

        if (empty($payment_gateways)) {
            return response("No payment gateway is configured");
        }

        $cart = $this->cart;

        if (empty($cart)) {
            abort(401);
        }

        $order = new Order();
        $order->order_total = getCartTotalPrice();
        $order->student_id = $this->student->id;

        $order->save();

        if (!empty($cart["course"])) {
            foreach ($cart["course"] as $course) {
                $order_item = new OrderItem();
                $order_item->order_id = $order->id;
                $order_item->item_id = $course["id"];
                $order_item->item_name = $course["name"];

                $order_item->type = "course";

                $order_item->price = $course["price"];
                $order_item->save();
            }
        }
        if (!empty($cart["ebook"])) {
            foreach ($cart["ebook"] as $ebook) {
                $order_item = new OrderItem();
                $order_item->order_id = $order->id;

                $order_item->type = "ebook";
                $order_item->item_id = $ebook["id"];
                $order_item->item_name = $ebook["name"];

                $order_item->price = $ebook["price"];
                $order_item->save();
            }
        }

        session()->forget("cart");

        return \view("billing.order", [
            "payment_gateways" => $payment_gateways,
            "order" => $order,
            "order_item" => $order_item,
        ]);
    }

    public function orders()
    {
        $orders = Order::where("student_id", $this->student->id)->get();

        return \view("settings.billing", [
            "selected_navigation" => "orders",
            "orders" => $orders,
        ]);
    }

    public function viewOrder(Request $request)
    {
        if ($request->id) {
            $order = Order::where("id", $request->id)->first();

            if (empty($order)) {
                abort(401);
            }
        }

        $order_items = OrderItem::where("order_id", $order->id)->get();

        return \view("billing.view-order", [
            "selected_navigation" => "orders",
            "order" => $order,
            "order_items" => $order_items,
        ]);
    }

    public function paymentStripe(Request $request)
    {
        $request->validate([
            "token_id" => "required",
        ]);

        $gateway = PaymentGateway::where("api_name", "stripe")->first();

        if (!$gateway) {
            abort(401);
        }

        $token = $request->token_id;

        $amount = getCartTotalPrice();

        if ($amount > 0) {
            try {
                // Set your secret key: remember to change this to your live secret key in production
                // See your keys here: https://dashboard.stripe.com/account/apikeys
                Stripe::setApiKey($gateway->private_key);

                // Create a Customer:

                $customer_data = [];

                $customer_data["source"] = $token;
                $customer_data["email"] = $this->student->email;
                $customer_data["name"] =
                    $this->student->first_name .
                    " " .
                    $this->student->last_name;

                $customer = \Stripe\Customer::create($customer_data);

                $card = new CreditCard();
                $card->gateway_id = $gateway->id;
                $card->user_id = $this->student->id;
                $card->token = $customer->id;
                $card->save();

                $amount_x_100 = (int) $amount * 100;
                // Charge the Customer instead of the card:
                $charge = \Stripe\Charge::create([
                    "amount" => $amount_x_100,
                    "currency" => config("app.currency"),
                    "customer" => $customer->id,
                    "description" =>
                        config("app.name") . " - " . $this->student->email,
                    "statement_descriptor" => substr(config("app.name"), 0, 22), // Maximum 22 character
                ]);

                // Add courses to student

                $cart = $this->cart;
                if (!empty($cart["course"])) {
                    foreach ($cart["course"] as $course) {
                        $course_purchased = new CoursePurchase();
                        $course_purchased->course_id = $course->id;
                        $course_purchased->student_id = $this->student->id;
                        $course_purchased->save();
                    }
                }

                // Add ebooks to student

                if (!empty($cart["ebook"])) {
                    foreach ($cart["ebook"] as $ebook) {
                        $ebook_purchased = new EbookPurchase();
                        $ebook_purchased->ebook_id = $ebook->id;
                        $ebook_purchased->student_id = $this->student->id;
                        $ebook_purchased->save();
                    }
                }

                return redirect("/student/dashboard")->with(
                    "status",
                    __("Payment successful")
                );
            } catch (\Exception $e) {
                return response(
                    [
                        "success" => false,
                        "errors" => [
                            "system" =>
                                "An error occurred! " . $e->getMessage(),
                        ],
                    ],
                    422
                );
            }
        }

        return redirect()->route("cart");
    }

    public function handlePaymentGateway(Request $request)
    {
        $gateway_api_name = $request->gateway_api_name;

        switch ($gateway_api_name) {
            case "toyyibPay":
                $amount = getCartTotalPrice();

                $gateway = PaymentGateway::where(
                    "api_name",
                    "toyyibPay"
                )->first();

                abort_unless($gateway, 401);
                abort_unless($this->student, 401);

                if ($amount > 0) {
                    $amount_x_100 = (int) $amount * 100;

                    $response = Http::asForm()
                        ->post(
                            "https://toyyibpay.com/index.php/api/createBill",
                            [
                                "userSecretKey" => $gateway->private_key,
                                "categoryCode" => $gateway->public_key,
                                "billName" => config("app.name") . " Checkout",
                                "billDescription" =>
                                    "Purchase from " . config("app.name"),
                                "billPriceSetting" => 0,
                                "billPayorInfo" => 1,
                                "billAmount" => $amount_x_100,
                                "billReturnUrl" =>
                                    config("app.url") . "/student/dashboard",
                                "billCallbackUrl" =>
                                    config("app.url") . "/student/dashboard",
                                // 'billExternalReferenceNo' => 'AFR341DFI',
                                "billTo" =>
                                    $this->student->first_name .
                                    " " .
                                    $this->student->last_name,
                                "billEmail" => $this->student->email,
                                "billPhone" => $request->input("phone"),
                                "billSplitPayment" => 0,
                                "billSplitPaymentArgs" => "",
                                "billPaymentChannel" => "0",
                                "billContentEmail" =>
                                    "Thank you for purchasing our product!",
                                "billChargeToCustomer" => 1,
                                "billExpiryDate" => "17-12-2020 17:00:00",
                                "billExpiryDays" => 3,
                            ]
                        )
                        ->json();

                    //  ray($response);

                    if (!empty($response[0]["BillCode"])) {
                        $billCode = $response[0]["BillCode"];
                        return redirect("https://toyyibpay.com/" . $billCode);
                    } else {
                        return redirect()
                            ->back()
                            ->with("error", $response["msg"]);
                    }
                }

                break;

            case "paystack":
                $amount = getCartTotalPrice();

                $gateway = PaymentGateway::where(
                    "api_name",
                    "paystack"
                )->first();

                abort_unless($gateway, 401);
                abort_unless($this->student, 401);

                if ($amount > 0) {
                    $response = Http::withToken($gateway->private_key)
                        ->post(
                            "https://api.paystack.co/transaction/initialize",
                            [
                                "email" => $this->student->email,
                                "amount" => $amount * 100,
                                "callback_url" =>
                                    config("app.url") . "/student/dashboard",
                            ]
                        )
                        ->json();

                    if (!empty($response["data"]["authorization_url"])) {
                        return redirect($response["data"]["authorization_url"]);
                    } else {
                        return redirect()
                            ->back()
                            ->with("error", $response["message"]);
                    }
                }

                break;
        }
    }
}
