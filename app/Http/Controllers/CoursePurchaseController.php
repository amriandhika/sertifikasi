<?php

namespace App\Http\Controllers;

use App\Models\CoursePurchase;
use App\Models\Student;
use Illuminate\Http\Request;

class CoursePurchaseController extends BaseController
{
    public function saveCoursePurchased(Request $request)
    {
        $request->validate([
            "course_id" => "required|integer",
            "student_id" => "required|integer",
        ]);

        $course_purchased = new CoursePurchase();
        $course_purchased->course_id = $request->course_id;

        $course_purchased->student_id = $request->student_id;
        $course_purchased->save();

        return redirect()->back();
    }
}
