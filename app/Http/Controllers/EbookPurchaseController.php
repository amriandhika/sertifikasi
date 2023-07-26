<?php

namespace App\Http\Controllers;

use App\Models\CoursePurchase;
use App\Models\EbookPurchase;
use Illuminate\Http\Request;

class EbookPurchaseController extends BaseController
{
    public function saveEbookPurchased(Request $request)
    {
        $request->validate([
            "product_id" => "required|integer",
            "student_id" => "required|integer",
        ]);

        $course_purchased = false;

        if ($request->id) {
            $course_purchased = EbookPurchase::find($request->id)->first();
        }

        if (!$course_purchased) {
            $course_purchased = new EbookPurchase();
        }
        $course_purchased->product_id = $request->product_id;

        $course_purchased->student_id = $request->student_id;
        $course_purchased->save();

        return redirect()->back();
    }
}
