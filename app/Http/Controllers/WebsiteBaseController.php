<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class WebsiteBaseController extends Controller
{
    protected $cart;
    protected $student = null;
    public function __construct()
    {
        parent::__construct();

        $this->middleware(function ($request, $next) {
            $cart = session()->get("cart");
            $this->cart = $cart;
            $cart_count = 0;
            if ($cart) {
                foreach ($cart as $type) {
                    $cart_count += count($type);
                }
            }
            View::share("cart", $cart);
            View::share("cart_count", $cart_count);

            if (session("student_id")) {
                $this->student = Student::find(session("student_id"));
            }

            View::share("student", $this->student);

            return $next($request);
        });
    }
}
