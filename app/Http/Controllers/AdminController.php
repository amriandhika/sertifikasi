<?php

namespace App\Http\Controllers;

use App\Models\ContactSection;
use App\Models\CookiePolicy;
use App\Models\Course;

use App\Models\LandingPage;
use App\Models\Lesson;

use App\Models\Order;
use App\Models\PaymentGateway;
use App\Models\PrivacyPolicy;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Student;

use App\Models\Terms;
use App\Models\User;
use App\Models\Workspace;

use App\Supports\UpdateSupport;
use Illuminate\Http\Request;

class AdminController extends AdminBaseController
{
    public function dashboard()
    {
        $total_users = User::count();
        $total_courses = Course::count();
        $total_students = Student::count();
        $total_products = Product::count();
        $total_lessons = Lesson::count();

        $recent_users = User::orderBy("id", "desc")
            ->limit(5)
            ->get();
        $recent_students = Student::orderBy("id", "desc")
            ->limit(5)
            ->get();
        $recent_courses = Course::orderBy("id", "desc")
            ->limit(4)
            ->get();

        $recent_ebooks = Product::orderBy("id", "desc")
            ->limit(4)
            ->get();
        $recent_orders = Order::orderBy("id", "desc")
            ->limit(5)
            ->get();
        $students = Student::all()
            ->keyBy("id")
            ->all();

        return \view("admin-dashboard", [
            "selected_navigation" => "dashboard",
            "total_users" => $total_users,
            "recent_users" => $recent_users,
            "total_courses" => $total_courses,
            "total_students" => $total_students,
            "total_products" => $total_products,
            "total_lessons" => $total_lessons,
            "recent_students" => $recent_students,
            "recent_courses" => $recent_courses,
            "recent_orders" => $recent_orders,
            "recent_ebooks" => $recent_ebooks,
            "students" => $students,
        ]);
    }

    public function users()
    {
        $users = User::all();

        $workspaces = Workspace::all()
            ->keyBy("id")
            ->all();

        return \view("admin.users", [
            "selected_navigation" => "users",
            "users" => $users,
            "workspaces" => $workspaces,
        ]);
    }

    public function userProfile(Request $request)
    {
        $up_user = false;

        if ($request->id) {
            $up_user = User::find($request->id);
        }

        return \view("admin.user-profile", [
            "selected_navigation" => "users",
            "layout" => "admin-portal",
            "up_user" => $up_user,
        ]);
    }
    public function addUser(Request $request)
    {
        $focus_user = false;

        if ($request->id) {
            $focus_user = User::find($request->id);
        }

        return \view("admin.add-new-user", [
            "selected_navigation" => "users",
            "layout" => "admin-portal",
            "focus_user" => $focus_user,
        ]);
    }
    public function adminProfile(Request $request)
    {
        $available_languages = User::$available_languages;
        $workspace = Workspace::find($this->user->workspace_id);

        return \view("profile.profile", [
            "selected_navigation" => "profile",
            "layout" => "admin-portal",
            "available_languages" => $available_languages,
            "workspace" => $workspace,
        ]);
    }

    public function adminSetting(Request $request)
    {
        return \view("settings.settings", [
            "selected_navigation" => "settings",
            "layout" => "admin-portal",
        ]);
    }

    public function paymentGateways()
    {
        $users = User::all();
        $payment_gateways = PaymentGateway::all()
            ->keyBy("api_name")
            ->all();

        return \view("admin.payment-gateways", [
            "selected_navigation" => "payment-gateways",
            "users" => $users,
            "payment_gateways" => $payment_gateways,
        ]);
    }

    public function configurePaymentGateway(Request $request)
    {
        $request->validate([
            "api_name" => "required|string",
        ]);

        $api_name = $request->api_name;
        $gateway = PaymentGateway::where("api_name", $api_name)->first();

        return \view("admin.configure-payment-gateway", [
            "selected_navigation" => "payment-gateways",
            "gateway" => $gateway,
            "api_name" => $api_name,
        ]);
    }

    public function configurePaymentGatewayPost(Request $request)
    {
        $api_name = $request->api_name;

        $payment_gateway = PaymentGateway::where(
            "api_name",
            $api_name
        )->first();

        if (!$payment_gateway) {
            $payment_gateway = new PaymentGateway();
            $payment_gateway->api_name = $api_name;
        }

        if ($api_name === "paypal") {
            $payment_gateway->name = "Paypal";
            $payment_gateway->api_name = $api_name;
            $payment_gateway->username = $request->username;
            $payment_gateway->password = $request->password;
        } elseif ($api_name === "stripe") {
            $payment_gateway->name = "Stripe";
            $payment_gateway->api_name = $api_name;
            $payment_gateway->private_key = $request->private_key;
            $payment_gateway->public_key = $request->public_key;
        } elseif ($api_name === "toyyibpay") {
            $payment_gateway->name = "toyyibpay";
            $payment_gateway->api_name = $api_name;
            $payment_gateway->private_key = $request->private_key;
            $payment_gateway->public_key = $request->public_key;
            $payment_gateway->instruction = $request->instruction;
        } elseif ($api_name === "bank") {
            $payment_gateway->name = "bank";
            $payment_gateway->api_name = $api_name;
            $payment_gateway->instruction = $request->instruction;
        } elseif ($api_name === "paystack") {
            $payment_gateway->name = "paystack";
            $payment_gateway->api_name = $api_name;
            $payment_gateway->private_key = $request->private_key;
            $payment_gateway->public_key = $request->public_key;
        }

        $payment_gateway->save();

        return redirect("/payment-gateways");
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        if ($user) {
            if ($this->user->id === $user->id) {
                return redirect("/users");
            }

            $user->delete();
            return redirect("/users");
        }
    }

    public function emailSetting(Request $request)
    {
        $workspace = Workspace::find($this->user->workspace_id);

        return \view("admin.email-settings", [
            "selected_navigation" => "email-settings",
            "layout" => "admin-portal",
            "workspace" => $workspace,
        ]);
    }

    public function saveEmailSetting(Request $request)
    {
        $request->validate([
            "mail_from_address" => "required|email",
            "smtp_host" => "nullable|string|max:200",
            "smtp_username" => "nullable|string|max:200",
            "smtp_password" => "nullable|string|max:200",
            "smtp_port" => "nullable|integer|max:65536",
        ]);

        Setting::updateSettings(
            $this->workspace_id,
            "mail_from_address",
            $request->mail_from_address
        );

        Setting::updateSettings(
            $this->workspace_id,
            "smtp_host",
            $request->smtp_host
        );
        Setting::updateSettings(
            $this->workspace_id,
            "smtp_username",
            $request->smtp_username
        );
        Setting::updateSettings(
            $this->workspace_id,
            "smtp_password",
            $request->smtp_password
        );
        Setting::updateSettings(
            $this->workspace_id,
            "smtp_port",
            $request->smtp_port
        );

        return redirect("/settings");
    }

    public function landingPage()
    {
        $landingpage = LandingPage::first();
        $students = Student::orderBy("id", "desc")
            ->limit(4)
            ->get();

        return \view("admin.landing-page", [
            "selected_navigation" => "landing-page",
            "landingpage" => $landingpage,
            "students" => $students,
        ]);
    }
    public function themes()
    {
        $landingpage = LandingPage::first();

        return \view("admin.themes.themelist", [
            "selected_navigation" => "themes",
            "landingpage" => $landingpage,
        ]);
    }
    public function themePages()
    {
        $landingpage = LandingPage::first();

        return \view("admin.themes.default.theme-pages", [
            "selected_navigation" => "themes",
            "landingpage" => $landingpage,
        ]);
    }

    public function heroSection(Request $request)
    {
        $request->validate([
            "background_image" => "nullable|file|mimes:jpg,png",
        ]);
        $post = LandingPage::first();

        if (!$post) {
            $post = new LandingPage();
        }

        if ($request->background_image) {
            $path = $request
                ->file("background_image")
                ->store("media", "uploads");
        }
        if (!empty($path)) {
            $post->background_image = $path;
        }

        $post->hero_title = $request->hero_title;
        $post->hero_subtitle = $request->hero_subtitle;
        $post->hero_paragraph = clean($request->hero_paragraph);

        $post->save();

        return redirect(config("app.url") . "/landingpage");
    }

    public function story2Section(Request $request)
    {
        $request->validate([
            "story2_image" => "nullable|file|mimes:jpg,png",
        ]);

        $post = LandingPage::first();

        if (!$post) {
            $post = new LandingPage();
        }

        if ($request->story2_image) {
            $path = $request->file("story2_image")->store("media", "uploads");
        }
        if (!empty($path)) {
            $post->story2_image = $path;
        }

        $post->story2_title = $request->story2_title;
        $post->story2_paragrapgh = clean($request->story2_paragrapgh);
        $post->save();

        return redirect(config("app.url") . "/landingpage");
    }
    public function testimonialSection(Request $request)
    {
        $request->validate([
            "testimonial1_image" => "nullable|file|mimes:jpg,png",
            "testimonial2_image" => "nullable|file|mimes:jpg,png",
        ]);

        $post = LandingPage::first();

        if (!$post) {
            $post = new LandingPage();
        }

        if ($request->testimonial1_image) {
            $path = $request
                ->file("testimonial1_image")
                ->store("media", "uploads");
        }
        if (!empty($path)) {
            $post->testimonial1_image = $path;
        }
        if ($request->testimonial2_image) {
            $path = $request
                ->file("testimonial2_image")
                ->store("media", "uploads");
        }
        if (!empty($path)) {
            $post->testimonial2_image = $path;
        }

        $post->testimonial_sidecard = $request->testimonial_sidecard;
        $post->testimonial1_student_name = $request->testimonial1_student_name;
        $post->testimonial1_occupation = $request->testimonial1_occupation;
        $post->testimonial1_student_name = $request->testimonial1_student_name;
        $post->testimonial1_paragraph = clean($request->testimonial1_paragraph);
        $post->testimonial2_student_name = $request->testimonial2_student_name;
        $post->testimonial2_occupation = $request->testimonial2_occupation;
        $post->testimonial2_student_name = $request->testimonial2_student_name;
        $post->testimonial2_paragraph = clean($request->testimonial2_paragraph);
        $post->save();

        return redirect(config("app.url") . "/landingpage");
    }
    public function calltoactionSection(Request $request)
    {
        $post = LandingPage::first();

        if (!$post) {
            $post = new LandingPage();
        }

        $post->calltoaction_title = $request->calltoaction_title;

        $post->calltoaction_subtitle = $request->calltoaction_subtitle;

        $post->save();

        return redirect(config("app.url") . "/landingpage");
    }

    public function privacyPage()
    {
        $privacy = PrivacyPolicy::first();

        return \view("admin.privacy-page-editor", [
            "selected_navigation" => "privacy-page-editor",

            "privacy" => $privacy,
        ]);
    }
    public function termsPage()
    {
        $term = Terms::first();

        return \view("admin.terms-page-editor", [
            "selected_navigation" => "terms",

            "term" => $term,
        ]);
    }

    public function savePrivacy(Request $request)
    {
        $post = PrivacyPolicy::first();

        if (!$post) {
            $post = new PrivacyPolicy();
        }

        $post->date = $request->date;
        $post->title = $request->title;
        $post->description = clean($request->description);
        $post->save();

        return redirect(config("app.url") . "/privacypage");
    }

    public function saveTerms(Request $request)
    {
        $post = Terms::first();

        if (!$post) {
            $post = new Terms();
        }

        $post->date = $request->date;
        $post->title = $request->title;
        $post->description = clean($request->description);
        $post->save();

        return redirect(config("app.url") . "/termspage");
    }

    public function footer()
    {
        $contact = ContactSection::first();

        return \view("admin.footer", [
            "selected_navigation" => "footer",

            "contact" => $contact,
        ]);
    }

    public function footerSection(Request $request)
    {
        $post = ContactSection::first();
        if (!$post) {
            $post = new ContactSection();
        }

        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->email = $request->email;
        $post->phone_number = $request->phone_number;
        $post->address_1 = $request->address_1;
        $post->facebook = $request->facebook;
        $post->youtube = $request->youtube;
        $post->twitter = $request->twitter;
        $post->save();

        return redirect(config("app.url") . "/footer");
    }

    public function cookiePage()
    {
        $term = CookiePolicy::first();

        return \view("admin.cookie-page-editor", [
            "selected_navigation" => "landing-page",
            "selected_sub_navigation" => "cookie-page-editor",
            "term" => $term,
        ]);
    }
    public function saveCookie(Request $request)
    {
        $post = CookiePolicy::first();

        if (!$post) {
            $post = new CookiePolicy();
        }

        $post->date = $request->date;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return redirect(config("app.url") . "/cookiepage");
    }

    public function updateSchema()
    {
        $current_build_id = config("app.build_id", 1);
        UpdateSupport::updateSchema();
        $setting = Setting::where("workspace_id", $this->user->workspace_id)
            ->where("key", "installed_build_id")
            ->first();

        if (!$setting) {
            $setting = new Setting();
            $setting->workspace_id = $this->user->workspace_id;
            $setting->key = "installed_build_id";
        }

        $setting->value = $current_build_id;
        $setting->save();

        return redirect(config("app.url") . "/admin/dashboard");
    }
}
