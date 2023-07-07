<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\AssignmentSubmission;
use App\Models\CertificateReceive;
use App\Models\CertificateTemplate;
use App\Models\Course;
use App\Models\CoursePurchase;
use App\Models\EbookPurchase;
use App\Models\Product;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class StudentController extends BaseController
{
    public function students(Request $request)
    {
        $students = Student::all();

        return \view("student.students", [
            "selected_navigation" => "students",
            "selected_sub_navigation" => "students",
            "students" => $students,
        ]);
    }
    public function viewStudent(Request $request)
    {
        $student = false;

        if ($request->id) {
            $student = Student::where("id", $request->id)->first();
        }

        return \view("student.view-student", [
            "selected_navigation" => "students",
            "selected_sub_navigation" => "students",
            "student" => $student,
        ]);
    }

    public function aboutViewStudent(Request $request)
    {
        $student = false;

        if ($request->id) {
            $student = Student::where("id", $request->id)->first();
        }

        return \view("student.about-view-student", [
            "selected_navigation" => "students",
            "selected_nav" => "student-about",
            "selected_sub_navigation" => "students",
            "student" => $student,
        ]);
    }

    public function coursesViewStudent(Request $request)
    {
        $student = false;

        if ($request->id) {
            $student = Student::where("id", $request->id)->first();
        }

        $course_purchased = [];
        if ($student) {
            $course_purchased = CoursePurchase::where(
                "student_id",
                $student->id
            )
                ->get()
                ->keyBy("course_id")
                ->all();
        }

        $course_purchased_ids = [];

        if(!empty($course_purchased)){
            foreach ($course_purchased as $key => $value) {
                $course_purchased_ids[] = $value->course_id;
            }
        }


        $courses = Course::all()
            ->keyBy("id")
            ->all();

        return \view("student.courses-view-student", [
            "selected_navigation" => "students",
            "selected_nav" => "student-course",
            "selected_sub_navigation" => "students",
            "student" => $student,
            "courses" => $courses,
            "course_purchased" => $course_purchased,
            "course_purchased_ids" => $course_purchased_ids,
        ]);
    }
    public function ebooksViewStudent(Request $request)
    {
        $student = false;

        if ($request->id) {
            $student = Student::where("id", $request->id)->first();
        }

        $course_purchased = false;
        if ($request->id) {
            $course_purchased = EbookPurchase::where(
                "id",
                $request->id
            )->first();
        }

        $courses = Product::all()
            ->keyBy("id")
            ->all();

        $course_purchaseds = EbookPurchase::all()
            ->keyBy("id")
            ->all();

        return \view("student.ebook-view-student", [
            "selected_navigation" => "students",
            "selected_nav" => "student-ebook",
            "selected_sub_navigation" => "students",
            "student" => $student,
            "courses" => $courses,
            "course_purchased" => $course_purchased,
            "course_purchaseds" => $course_purchaseds,
        ]);
    }

    public function certificateViewStudent(Request $request)
    {
        $student = false;

        if ($request->id) {
            $student = Student::where("id", $request->id)->first();
        }

        $course_purchased = false;
        if ($request->id) {
            $course_purchased = CertificateReceive::where(
                "id",
                $request->id
            )->first();
        }

        $certificates = CertificateTemplate::all()
            ->keyBy("id")
            ->all();

        $course_purchaseds = CertificateReceive::all()
            ->keyBy("id")
            ->all();

        $received_certificates = CertificateReceive::where("student_id", $student->id)->get();

        $courses = Course::all();

        return \view("student.certificate-view-student", [
            "selected_navigation" => "students",
            "selected_nav" => "student-certificate",
            "selected_sub_navigation" => "students",
            "student" => $student,
            "certificates" => $certificates,
            "course_purchased" => $course_purchased,
            "course_purchaseds" => $course_purchaseds,
            "courses" => $courses,
            "received_certificates" => $received_certificates,
        ]);
    }

    public function assignmentsViewStudent(Request $request)
    {
        $student = false;

        if ($request->id) {
            $student = Student::where("id", $request->id)->first();
        }

        $assignments = Assignment::where(
            "members",
            "like",
            '%"' . $student->id . '"%'
        )->get();
        $total_assignments = Assignment::where(
            "members",
            "like",
            '%"' . $student->id . '"%'
        )->count();

        $courses = Course::all();

        return \view("student.assignment-view-student", [
            "selected_navigation" => "students",
            "selected_sub_navigation" => "students",
            "selected_nav" => "student-assignment",
            "student" => $student,
            "courses" => $courses,
            "assignments" => $assignments,
            "total_assignments" => $total_assignments,
        ]);
    }

    public function newStudent(Request $request)
    {
        $student = false;

        if ($request->id) {
            $student = Student::where("id", $request->id)->first();
        }
        $available_languages = Student::$available_languages;

        return \view("student.new-student", [
            "selected_navigation" => "students",
            "selected_sub_navigation" => "new-student",
            "student" => $student,
            "available_languages" => $available_languages,
        ]);
    }

    public function studentPost(Request $request)
    {
        $request->validate([
            "first_name" => "required|string|max:100",
            "last_name" => "required|string|max:100",
            "email" => "nullable|email",
            "phone" => "nullable|string|max:50",
            "password" => "nullable|string|max:50",
            "id" => "nullable|integer",
            "photo" => "nullable|file|mimes:jpg,png",
        ]);

        $student = false;

        ray($request->all());

        if ($request->id) {
            $student = Student::where("id", $request->id)->first();
        }

        if (!$student) {
            $student = new Student();
        }

        $path = null;
        if ($request->photo) {
            $path = $request->file("photo")->store("media", "uploads");
        }
        if (!empty($path)) {
            $student->photo = $path;
        }

        $cover_path = null;

        if ($request->cover_photo) {
            $cover_path = $request
                ->file("cover_photo")
                ->store("media", "uploads");
        }

        if (!empty($cover_path)) {
            $student->cover_photo = $cover_path;
        }

        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;


        if(!empty($request->password)){
            $student->password = Hash::make($request->password);
        }


        $student->email = $request->email;
        $student->phone_number = $request->phone_number;
        $student->bio = $request->bio;
        $student->language = $request->language;

        $student->twitter = $request->twitter;
        $student->facebook = $request->facebook;
        $student->website = $request->website;
        $student->linkedin = $request->linkedin;
        $student->address = $request->address;

        $student->city = $request->city;

        $student->state = $request->state;
        $student->country = $request->country;

        $student->zip = $request->zip;

        if ($request->timezone) {
            $student->timezone = $request->timezone;
            $student->save();
        }
        $student->save();

        return redirect("/students")->with(
            "success",
            "Profile updated successfully"
        );
    }
}
