<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\ContactSection;
use App\Models\CookiePolicy;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CoursePurchase;
use App\Models\CourseReview;
use App\Models\EbookReview;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\LandingPage;
use App\Models\Lesson;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PrivacyPolicy;
use App\Models\Product;
use App\Models\ProductCategories;
use App\Models\Setting;
use App\Models\Student;
use App\Models\JobType;
use App\Models\CareerLevel;

use App\Models\Terms;
use App\Models\User;
use Illuminate\Support\Str;

use App\Supports\UpdateSupport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FrontendController extends WebsiteBaseController
{
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

    public function home()
    {
        $current_build_id = config("app.build_id", 1);
        $installed_build_id = $this->super_settings["installed_build_id"] ?? 0;

        if ($current_build_id != $installed_build_id) {
            $current_build_id = config("app.build_id", 1);
            UpdateSupport::updateSchema();
            $setting = Setting::where("workspace_id", 1)
                ->where("key", "installed_build_id")
                ->first();
            if (!$setting) {
                $setting = new Setting();
                $setting->workspace_id = 1;
                $setting->key = "installed_build_id";
            }

            $setting->value = $current_build_id;
            $setting->save();
        }
        $landingpage = LandingPage::first();

        $categories = CourseCategory::all()
            ->keyBy("id")
            ->all();

        $courses = Course::orderBy("id", "desc")
            ->limit(4)
            ->get();
        $blogs = Blog::orderBy("id", "desc")
            ->limit(3)
            ->get();
        $ebooks = Product::orderBy("id", "desc")
            ->limit(4)
            ->get();
        $users = User::all()
            ->keyBy("id")
            ->all();
        $students = Student::orderBy("id", "desc")
            ->limit(6)
            ->get();
        $contact = ContactSection::first();

        if (($this->super_settings["landingpage"] ?? null) === "Default") {
            return \view("frontend.home", [
                "landingpage" => $landingpage,
                "categories" => $categories,
                "courses" => $courses,
                "users" => $users,
                "blogs" => $blogs,
                "ebooks" => $ebooks,
                "students" => $students,
                "contact" => $contact,
            ]);
        }

        return \view("auth.login", [
            "landingpage" => $landingpage,
        ]);
    }

    public function privacy()
    {
        $privacy = PrivacyPolicy::first();
        $contact = ContactSection::first();

        return \view("frontend.privacy", [
            "privacy" => $privacy,
            "contact" => $contact,
        ]);
    }

    public function shop(Request $request)
    {
        $request->validate([
            "category_id" => "nullable|integer",
        ]);

        $categories = ProductCategories::all()
            ->keyBy("id")
            ->all();

        $products = new Product();

        if ($request->category_id) {
            $products = $products->where("category_id", $request->category_id);
        }

        $products = $products->get();
        $privacy = PrivacyPolicy::first();
        $contact = ContactSection::first();
        //        $products = Product::all();
        $recent_products = Product::orderBy("id", "desc")
            ->limit(4)
            ->get();

        return \view("frontend.shop", [
            "privacy" => $privacy,
            "contact" => $contact,
            "products" => $products,
            "categories" => $categories,
            "recent_products" => $recent_products,
        ]);
    }

    public function viewEbook($slug)
    {
        $product = Product::where("slug", $slug)->first();

        abort_unless($product, 404);

        $product_id = $product->id;

        //        $product = false;
        //
        //        if ($request->id) {
        //            $product = Product::where("id", $request->id)->first();
        //        }

        $privacy = PrivacyPolicy::first();
        $contact = ContactSection::first();
        $products = Product::all();
        $total_reviews = EbookReview::where("product_id", $product_id)->count();
        $reviews = EbookReview::where("product_id", $product_id)->get();
        $students = Student::all()
            ->keyBy("id")
            ->all();

        $total_ratings = EbookReview::where("product_id", $product_id)->count();

        $total_star_count = EbookReview::where("id", $product_id)->sum(
            "star_count"
        );

        if ($total_ratings > 0) {
            $rating_out_of_five = round($total_star_count / $total_ratings);
        } else {
            $rating_out_of_five = 0;
        }

        return \view("frontend.view-product", [
            "privacy" => $privacy,
            "contact" => $contact,
            "products" => $products,
            "product" => $product,
            "total_reviews" => $total_reviews,
            "reviews" => $reviews,
            "students" => $students,
            "rating_out_of_five" => $rating_out_of_five,
        ]);
    }

    public function termsCondition()
    {
        $term = Terms::first();
        $contact = ContactSection::first();

        return \view("frontend.terms", [
            "term" => $term,
            "contact" => $contact,
        ]);
    }
    public function cookiePolicy()
    {
        $term = CookiePolicy::first();
        $contact = ContactSection::first();

        return \view("frontend.cookie", [
            "term" => $term,
            "contact" => $contact,
        ]);
    }

    public function blogs()
    {
        $blogs = Blog::all();
        $users = User::all()
            ->keyBy("id")
            ->all();
        $contact = ContactSection::first();

        return \view("frontend.blog", [
            "blogs" => $blogs,
            "users" => $users,
            "contact" => $contact,
        ]);
    }
    public function career(Request $request)
    {
        $request->validate([
            "title" => "nullable|string",
            "job_type" => "nullable|integer",
            "career_level" => "nullable|integer",
        ]);

        $jobs = new Job();

        if ($request->title) {
            $jobs = $jobs->where("title", "like", "%{$request->title}%");
        }
        if ($request->job_type) {
            $jobs = $jobs->where("job_type_id", $request->job_type);
        }
        if ($request->career_level) {
            $jobs = $jobs->where("career_level_id", $request->career_level);
        }

        $jobs = $jobs->orderBy("id", "desc")->paginate(10);

        $users = User::all()
            ->keyBy("id")
            ->all();

        $contact = ContactSection::first();

        $careerlevels = CareerLevel::all()
            ->keyBy("id")
            ->all();

        $jobtypes = JobType::all()
            ->keyBy("id")
            ->all();

        return \view("frontend.career", [
            "jobs" => $jobs,
            "users" => $users,
            "contact" => $contact,
            "careerlevels" => $careerlevels,
            "jobtypes" => $jobtypes,
        ]);
    }
    public function viewJob(Request $request)
    {
        $job = null;
        if ($request->id) {
            $job = Job::where("id", $request->id)->first();
        }

        $users = User::all()
            ->keyBy("id")
            ->all();
        $contact = ContactSection::first();
        $jobtypes = JobType::all()
            ->keyBy("id")
            ->all();

        $careerlevels = CareerLevel::all()
            ->keyBy("id")
            ->all();

        return \view("frontend.view-job", [
            "job" => $job,
            "users" => $users,
            "contact" => $contact,
            "jobtypes" => $jobtypes,
            "careerlevels" => $careerlevels,
        ]);
    }

    public function jobApplicationPost(Request $request)
    {
        $request->validate([
            "id" => "nullable|integer",
            "resume" => "required|file",
            "cover_letter" => "required|file",
        ]);

        $job_submission = false;

        if ($request->id) {
            $job_submission = JobApplication::find($request->id);
        }

        if (!$job_submission) {
            $job_submission = new JobApplication();
            $job_submission->uuid = Str::uuid();
        }
        $path = null;
        if ($request->resume) {
            $path = $request->file("resume")->store("media", "uploads");
        }
        if (!empty($path)) {
            $job_submission->resume = $path;
        }
        $cover_path = null;
        if ($request->cover_letter) {
            $cover_path = $request
                ->file("cover_letter")
                ->store("media", "uploads");
        }
        if (!empty($path)) {
            $job_submission->resume = $cover_path;
        }

        $job_submission->description = clean($request->description);
        $job_submission->job_id = $request->job_id;
        $job_submission->first_name = $request->first_name;
        $job_submission->last_name = $request->last_name;
        $job_submission->email = $request->email;
        $job_submission->phone = $request->phone;
        $job_submission->save();

        return redirect()
            ->back()
            ->with("success", "Application submitted successfully");
    }

    public function viewArticle($slug)
    {
        $blog = Blog::where("slug", $slug)->first();

        abort_unless($blog, 404);
        //        $blog = false;
        //
        //        if ($request->id) {
        //            $blog = Blog::where("id", $request->id)->first();
        //        }
        $users = User::all()
            ->keyBy("id")
            ->all();
        $contact = ContactSection::first();

        return \view("frontend.view-blog", [
            "blog" => $blog,
            "users" => $users,
            "contact" => $contact,
        ]);
    }

    public function courses(Request $request)
    {
        $request->validate([
            "category_id" => "nullable|integer",
        ]);

        $categories = CourseCategory::all()
            ->keyBy("id")
            ->all();

        $courses = new Course();

        if ($request->category_id) {
            $courses = $courses->where("category_id", $request->category_id);
        }

        $courses = $courses->get();

        $contact = ContactSection::first();

        $total_lessons = Lesson::where("course_id", $request->id)->count();

        return \view("frontend.courses", [
            "categories" => $categories,
            "courses" => $courses,
            "contact" => $contact,
            "total_lessons" => $total_lessons,
        ]);
    }

    public function contact()
    {
        return \view("frontend.contact");
    }

    public function pricing()
    {
        $contact = ContactSection::first();

        return \view("frontend.pricing", [
            "contact" => $contact,
        ]);
    }

    public function courseDetails(Request $request)
    {
        $course = false;

        if ($request->id) {
            $course = Course::where("id", $request->id)->first();
        }

        $categories = CourseCategory::all()
            ->keyBy("id")
            ->all();
        $students = Student::all()
            ->keyBy("id")
            ->all();
        $users = User::all()
            ->keyBy("id")
            ->all();

        $reviews = CourseReview::where("course_id", $request->id)->get();

        $total_reviews = CourseReview::where(
            "course_id",
            $request->id
        )->count();

        $lessons = Lesson::where("course_id", $request->id)->get();
        $total_lessons = Lesson::where("course_id", $request->id)->count();
        $contact = ContactSection::first();

        $total_ratings = CourseReview::where(
            "course_id",
            $request->id
        )->count();
        $total_star_count = CourseReview::where("course_id", $request->id)->sum(
            "star_count"
        );

        if ($total_ratings > 0) {
            $rating_out_of_five = round($total_star_count / $total_ratings);
        } else {
            $rating_out_of_five = 0;
        }

        return \view("frontend.course-details", [
            "selected_navigation" => "courses",
            "course" => $course,
            "categories" => $categories,
            "lessons" => $lessons,
            "contact" => $contact,
            "reviews" => $reviews,
            "students" => $students,
            "users" => $users,
            "total_reviews" => $total_reviews,
            "total_lessons" => $total_lessons,
            "rating_out_of_five" => $rating_out_of_five,
        ]);
    }

    public function viewCourse($slug)
    {
        $course = Course::where("slug", $slug)->first();

        abort_unless($course, 404);

        $course_id = $course->id;

        $categories = CourseCategory::all()
            ->keyBy("id")
            ->all();
        $students = Student::all()
            ->keyBy("id")
            ->all();
        $users = User::all()
            ->keyBy("id")
            ->all();

        $reviews = CourseReview::where("course_id", $course_id)->get();

        $total_reviews = CourseReview::where("course_id", $course_id)->count();

        $lessons = Lesson::where("course_id", $course_id)->get();
        $total_lessons = Lesson::where("course_id", $course_id)->count();
        $contact = ContactSection::first();

        $total_ratings = CourseReview::where("course_id", $course_id)->count();
        $total_star_count = CourseReview::where("course_id", $course_id)->sum(
            "star_count"
        );

        if ($total_ratings > 0) {
            $rating_out_of_five = round($total_star_count / $total_ratings);
        } else {
            $rating_out_of_five = 0;
        }

        return \view("frontend.course-details", [
            "selected_navigation" => "courses",
            "course" => $course,
            "categories" => $categories,
            "lessons" => $lessons,
            "contact" => $contact,
            "reviews" => $reviews,
            "students" => $students,
            "users" => $users,
            "total_reviews" => $total_reviews,
            "total_lessons" => $total_lessons,
            "rating_out_of_five" => $rating_out_of_five,
        ]);
    }

    public function enrollFreeCourses()
    {
        abort_unless($this->student, 401);
        $cart = $this->cart;

        if (empty($cart)) {
            abort(401);
        }

        if (!empty($cart["course"])) {
            foreach ($cart["course"] as $course) {
                $course_purchased = new CoursePurchase();
                $course_purchased->course_id = $course->id;
                $course_purchased->student_id = $this->student->id;
                $course_purchased->save();
            }
        }
        if (!empty($cart["ebook"])) {
            foreach ($cart["ebook"] as $ebook) {

            }
        }

        session()->forget("cart");

        return redirect()->route("student.dashboard");

    }

    public function update()
    {
        UpdateSupport::updateSchema();
    }
}
