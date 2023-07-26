<?php

namespace App\Http\Controllers;

use App\Models\Assignment;

use App\Models\Blog;

use App\Models\Calendar;
use App\Models\CertificateReceive;
use App\Models\CertificateTemplate;

use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CoursePurchase;
use App\Models\Document;
use App\Models\EbookPurchase;
use App\Models\Lesson;
use App\Models\Note;
use App\Models\Product;
use App\Models\ProductCategories;
use App\Models\Student;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteController extends BaseController
{
    public function delete($action, $id)
    {
        switch ($action) {
            case "event":
                $event = Calendar::where("id", $id)->first();

                if ($event) {
                    $event->delete();
                    return redirect("/calendar");
                }
                break;

            case "note":
                $note = Note::where("id", $id)->first();

                if ($note) {
                    $note->delete();
                    return redirect("/notes");
                }
                break;

            case "staff":
                if (config("app.environment") === "demo") {
                    return redirect()->back();
                }

                $workspace = Workspace::find($this->user->workspace_id);
                $staff = User::where("id", $id)->first();

                if ($staff) {
                    if (
                        !$workspace->owner_id ||
                        $staff->id != $workspace->owner_id
                    ) {
                        if ($staff->id === $this->user->id) {
                            abort(401);
                        }

                        $staff->delete();

                        return redirect("/staff");
                    }
                }

                break;

            case "document":
                $document = Document::where("id", $id)->first();
                if ($document) {
                    if (Storage::exists("public/" . $document->path)) {
                        Storage::delete("public/" . $document->path);
                    }

                    $document->delete();

                    return redirect("/documents");
                }

                break;

            case "course":
                $course = Course::where("id", $id)->first();
                if ($course) {
                    $course->delete();
                    return redirect("/courses");
                }

                break;

            case "lesson":
                $lesson = Lesson::where("id", $id)->first();
                if ($lesson) {
                    $lesson->delete();
                    return redirect("lessons?id=" . $lesson->course_id);
                }

                break;

            case "blog":
                $course = Blog::where("id", $id)->first();

                if ($course) {
                    $course->delete();
                    return redirect("/blogs");
                }

                break;

            case "product":
                $product = Product::where("id", $id)->first();
                if ($product) {
                    $product->delete();
                    return redirect("/products");
                }

                break;

            case "student":
                $student = Student::where("id", $id)->first();
                if ($student) {
                    $student->delete();
                    return redirect("/students");
                }

                break;

            case "assignment":
                $assignment = Assignment::where("id", $id)->first();

                if ($assignment) {
                    $assignment->delete();
                    return redirect("/assignments");
                }

                break;

            case "certificate-template":
                $certificate = CertificateTemplate::where("id", $id)->first();

                if ($certificate) {
                    $certificate->delete();
                    return redirect("/certificates");
                }

                break;

            case "course-purchase":
                $course = CoursePurchase::where("id", $id)->first();
                $student = Student::where("id", $course->student_id)->first();
                if ($course) {
                    $course->delete();
                    return redirect("/student-courses?id=" . $student->id);
                }

                break;

            case "ebook-purchase":
                $ebook = EbookPurchase::where("id", $id)->first();
                $student = Student::where("id", $ebook->student_id)->first();
                if ($ebook) {
                    $ebook->delete();
                    return redirect("/student-ebooks?id=" . $student->id);
                }

                break;

            case "certificate-received":
                $course = CertificateReceive::where("id", $id)->first();
                $student = Student::where("id", $course->student_id)->first();
                if ($course) {
                    $course->delete();
                    return redirect("/student-certificates?id=" . $student->id);
                }

                break;
            case "course-category":
                $course = CourseCategory::where("id", $id)->first();
                if ($course) {
                    $course->delete();
                    return redirect("/course-categories");
                }

                break;
            case "product-category":
                $product = ProductCategories::where("id", $id)->first();
                if ($product) {
                    $product->delete();
                    return redirect("/product-categories");
                }

                break;
        }
    }
}
