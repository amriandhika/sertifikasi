<?php

namespace App\Http\Controllers;

use App\Models\CertificateReceive;
use App\Models\CoursePurchase;
use Illuminate\Http\Request;

class CertificateReceiveController extends BaseController
{
    public function saveCertificateReceived(Request $request)
    {
        $request->validate([
            "certificate_id" => "required|integer",
            "student_id" => "required|integer",
            'course_id' => 'required|integer',
        ]);

        $course_purchased = false;

        if ($request->id) {
            $course_purchased = CertificateReceive::find($request->id)->first();
        }

        if (!$course_purchased) {
            $course_purchased = new CertificateReceive();
        }
        $course_purchased->certificate_id = $request->certificate_id;

        $course_purchased->student_id = $request->student_id;
        $course_purchased->course_id = $request->course_id;
        $course_purchased->save();

        return redirect()->back();
    }
}
