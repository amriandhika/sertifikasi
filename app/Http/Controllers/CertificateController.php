<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\CertificateTemplate;
use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CertificateController extends BaseController
{
    public function certificates()
    {
        $certificates = CertificateTemplate::where(
            "workspace_id",
            $this->user->workspace_id
        )->get();

        $students = Student::all()
            ->keyBy("id")
            ->all();
        $courses = Course::all()
            ->keyBy("id")
            ->all();

        return \view("certificates.certificates", [
            "selected_navigation" => "certificates",
            "certificates" => $certificates,
            "students" => $students,
            "courses" => $courses,
        ]);
    }

    public function newCertificate(Request $request)
    {
        $certificate = false;

        if ($request->id) {
            $certificate = CertificateTemplate::where(
                "workspace_id",
                $this->user->workspace_id
            )
                ->where("id", $request->id)
                ->first();
        }

        $students = Student::all()
            ->keyBy("id")
            ->all();
        $courses = Course::all()
            ->keyBy("id")
            ->all();

        return \view("certificates.create-certificate", [
            "selected_navigation" => "certificates",
            "certificate" => $certificate,
            "students" => $students,
            "courses" => $courses,
        ]);
    }

    public function certificateTemplatePost(Request $request)
    {
        $request->validate([
            "title" => "nullable|string",
            "logo" => "nullable|file|mimes:jpg,png",
        ]);

        $certificate = false;

        if ($request->id) {
            $certificate = CertificateTemplate::where(
                "workspace_id",
                $this->user->workspace_id
            )
                ->where("id", $request->id)
                ->first();
        }

        if (!$certificate) {
            $certificate = new CertificateTemplate();
            $certificate->uuid = Str::uuid();
            $certificate->workspace_id = $this->user->workspace_id;
        }

        $path = null;
        if ($request->logo) {
            $path = $request->file("logo")->store("media", "uploads");
        }
        if (!empty($path)) {
            $certificate->logo = $path;
        }

        $certificate->title = $request->title;
        $certificate->course_id = $request->course_id;
        $certificate->border_color = $request->border_color;
        $certificate->background_color = $request->background_color;
        $certificate->save();

        return redirect()->back();
    }
}
