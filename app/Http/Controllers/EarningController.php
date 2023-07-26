<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Student;
use Illuminate\Http\Request;

class EarningController extends AdminBaseController
{
    public function earnings()
    {
        $orders = Order::all();
        $students = Student::all()
            ->keyBy("id")
            ->all();

        return \view("earnings.orders", [
            "selected_navigation" => "earnings",
            "orders" => $orders,
            "students" => $students,
        ]);
    }

    public function orderDetails(Request $request)
    {
        if ($request->id) {
            $order = Order::where("id", $request->id)->first();

            if (empty($order)) {
                abort(401);
            }
        }

        $order_items = OrderItem::where("order_id", $order->id)->get();

        $students = Student::all()
            ->keyBy("id")
            ->all();

        return \view("earnings.view-order", [
            "selected_navigation" => "orders",
            "order" => $order,
            "order_items" => $order_items,
            "students" => $students,
        ]);
    }
}
