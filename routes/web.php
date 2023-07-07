<?php

use App\Http\Controllers\ActionsController;
use App\Http\Controllers\AppRouteController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CertificateReceiveController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CoursePurchaseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\EarningController;
use App\Http\Controllers\EbookPurchaseController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PaymentGatewayController;
use App\Http\Controllers\PlansController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentPortalController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/create-demo", function () {
    Artisan::call("create:demo");
});
Route::get("/home", [FrontendController::class, "home"]);

Route::prefix("admin")->group(function () {
    Route::get("/", [AuthController::class, "superAdminLogin"])->name(
        "admin-login"
    );
    Route::post("/auth", [AuthController::class, "superAdminAuthenticate"]);
});

Route::get("/admin/dashboard", [AdminController::class, "dashboard"]);

Route::get("/admin/update-schema", [AdminController::class, "updateSchema"]);

Route::get("/landingpage", [AdminController::class, "landingPage"]);
Route::get("/themes", [AdminController::class, "themes"]);
Route::get("/theme-pages", [AdminController::class, "themePages"]);

Route::get("/termspage", [AdminController::class, "termsPage"]);
Route::get("/privacypage", [AdminController::class, "privacyPage"]);
Route::get("/contactpage", [AdminController::class, "contactPage"]);
Route::get("/footer", [AdminController::class, "footer"]);

Route::get("/", [FrontendController::class, "home"]);
Route::get("/career", [FrontendController::class, "career"]);
Route::get("/view-job", [FrontendController::class, "viewJob"]);
Route::post("/job-application-post", [
    FrontendController::class,
    "jobApplicationPost",
]);

Route::get("/shop", [FrontendController::class, "shop"]);
Route::get("/view-ebook", [FrontendController::class, "viewEbook"]);

Route::get("/products", [ShopController::class, "products"]);
Route::get("/add-product", [ShopController::class, "createProduct"]);
Route::get("/view-product", [ShopController::class, "viewProduct"]);
Route::post("/save-product", [ShopController::class, "productPost"]);

Route::get("/pricing", [FrontendController::class, "pricing"]);
Route::get("/privacy", [FrontendController::class, "privacy"]);
Route::get("/termsandconditions", [
    FrontendController::class,
    "termsCondition",
]);
Route::get("/contact", [FrontendController::class, "contact"]);
Route::get("/blog", [FrontendController::class, "blogs"]);

Route::get("/blog/{slug}", [FrontendController::class, "viewArticle"]);
Route::get("/add-to-cart/{id}", [BillingController::class, "addToCart"]);
Route::get("/remove-item-from-cart/{id}", [
    BillingController::class,
    "removeItemFromCart",
]);

Route::get("/course", [FrontendController::class, "courses"]);

Route::get("/course/{slug}", [FrontendController::class, "viewCourse"]);
//Route::get("/home/{slug}", [FrontendController::class, "viewCourse"]);
Route::get("/shop/{slug}", [FrontendController::class, "viewEbook"]);
Route::get("/course-details", [FrontendController::class, "courseDetails"]);
Route::get("/enroll-free-courses", [FrontendController::class, "enrollFreeCourses"]);

Route::post("/save-footer-section", [AdminController::class, "footerSection"]);
Route::post("/save-calltoaction-section", [
    AdminController::class,
    "calltoactionSection",
]);

Route::post("/save-hero-section", [AdminController::class, "heroSection"]);
Route::post("/save-testimonial-section", [
    AdminController::class,
    "testimonialSection",
]);
Route::post("/save-feature2-section", [
    AdminController::class,
    "feature2Section",
]);
Route::post("/save-partner-section", [
    AdminController::class,
    "partnerSection",
]);

Route::post("/save-story1-section", [AdminController::class, "story1Section"]);
Route::post("/save-story2-section", [AdminController::class, "story2Section"]);

Route::post("/save-newsletter-section", [
    AdminController::class,
    "newsletterSection",
]);
Route::post("/save-number-section", [AdminController::class, "numberSection"]);
Route::post("/save-privacy-section", [AdminController::class, "savePrivacy"]);
Route::post("/save-terms-section", [AdminController::class, "saveTerms"]);

Route::get("/write-blog", [BlogController::class, "writeBlog"]);
Route::get("/blogs", [BlogController::class, "blogs"]);
Route::get("/view-blog", [BlogController::class, "viewBlog"]);
Route::post("/save-blog", [BlogController::class, "blogPost"]);

Route::get("/course-categories", [CourseController::class, "categories"]);
Route::get("/product-categories", [ShopController::class, "categories"]);
Route::post("/category-save", [CourseController::class, "categoryPost"]);
Route::post("/product-category-save", [ShopController::class, "categoryPost"]);

Route::get("/courses", [CourseController::class, "courses"]);

Route::get("/course-discussion", [CourseController::class, "courseDiscussion"]);
Route::get("/lessons", [CourseController::class, "lessons"]);
Route::get("/view-lesson", [CourseController::class, "viewLesson"]);
Route::get("/view-mylesson", [CourseController::class, "viewMyLesson"]);

Route::get("/create-course", [CourseController::class, "createCourse"]);
Route::get("/create-lesson", [CourseController::class, "createLesson"]);
Route::get("/view-course", [CourseController::class, "viewCourse"]);
Route::post("/save-course", [CourseController::class, "coursePost"]);
Route::post("/save-lesson", [CourseController::class, "lessonPost"]);
Route::get("/category-edit", [CourseController::class, "categoryEdit"]);
Route::get("/product-category-edit", [ShopController::class, "categoryEdit"]);

Route::get("/cart", [BillingController::class, "cartPage"])->name("cart");
Route::get("/checkout", [BillingController::class, "checkout"]);
Route::get("/order-confirmed", [BillingController::class, "orderConfirmed"]);
Route::get("/orders", [BillingController::class, "orders"]);
Route::get("/view-order", [BillingController::class, "viewOrder"]);

Route::get("/earnings", [EarningController::class, "earnings"]);
Route::get("/order-details", [EarningController::class, "orderDetails"]);

Route::get("/payment-gateways", [AdminController::class, "paymentGateways"]);
Route::get("/paypal-payment", [
    PaymentGatewayController::class,
    "paypalPayment",
]);
Route::get("/configure-payment-gateway", [
    AdminController::class,
    "configurePaymentGateway",
]);
Route::post("/save-subscription-plan", [
    AdminController::class,
    "subscriptionPlanPost",
]);
Route::get("/edit-workspace", [AdminController::class, "editWorkspace"]);
Route::post("/save-workspace", [AdminController::class, "saveWorkspace"]);
Route::post("/configure-gateway", [
    AdminController::class,
    "configurePaymentGatewayPost",
]);
Route::post("/payment-stripe", [BillingController::class, "paymentStripe"]);
Route::get("/user-profile", [AdminController::class, "userProfile"]);
Route::get("/admin-profile", [AdminController::class, "adminProfile"]);
Route::get("/admin-setting", [AdminController::class, "adminSetting"]);
Route::get("/workspaces", [AdminController::class, "workspaces"]);
Route::get("/add-user", [AdminController::class, "addUser"]);
Route::get("/delete-workspace/{id}", [
    AdminController::class,
    "deleteWorkspace",
]);

Route::get("/messages", [MessageController::class, "messages"]);
Route::post("/admin/chat-send", [MessageController::class, "postMessages"]);

Route::get("/assignments", [AssignmentController::class, "assignments"]);
Route::get("/create-assignment", [
    AssignmentController::class,
    "createAssignment",
]);
Route::get("/view-assignment", [AssignmentController::class, "viewAssignment"]);
Route::get("/check-assignment", [
    AssignmentController::class,
    "checkAssignment",
]);
Route::post("/save-assignment", [
    AssignmentController::class,
    "assignmentPost",
]);
Route::post("/save-assignment-mark", [
    AssignmentController::class,
    "assignmentMarkPost",
]);

Route::get("/email-setting", [AdminController::class, "emailSetting"]);
Route::post("/save-email-setting", [
    AdminController::class,
    "saveEmailSetting",
]);

Route::get("/delete-user/{id}", [AdminController::class, "deleteUser"]);
Route::get("/users", [AdminController::class, "users"]);
Route::get("/emails", [AdminController::class, "newsletterEmail"]);

//Route::get("/", [AuthController::class, "login"])->name("login");
Route::get("/login", [AuthController::class, "login"])->name("login");

Route::get("/signup", [AuthController::class, "signup"]);
Route::get("/logout", [AuthController::class, "logout"]);
Route::get("/student-logout", [AuthController::class, "studentLogout"]);

Route::get("/forgot-password", [AuthController::class, "forgotPassword"]);
Route::get("/password-reset", [AuthController::class, "passwordReset"]);
Route::get("/calendar/{action?}", [PlansController::class, "calendarAction"]);
Route::get("/notes", [ActionsController::class, "notes"]);

Route::get("/add-task", [ActionsController::class, "addTask"]);
Route::get("/add-note", [ActionsController::class, "addNote"]);
Route::get("/view-note", [ActionsController::class, "viewNote"]);

Route::get("/user-edit/{id}", [ProfileController::class, "userEdit"]);
Route::get("/download/{id}", [DownloadController::class, "download"]);
Route::get("/downloadBook/{id}", [DownloadController::class, "downloadBook"]);

Route::get("/dashboard", [DashboardController::class, "dashboard"]);
Route::get("/new-user", [ProfileController::class, "newUser"]);
Route::get("/documents", [DocumentController::class, "documents"]);
Route::get("/profile", [ProfileController::class, "profile"]);
Route::get("/staff", [ProfileController::class, "staff"]);
Route::get("/settings", [SettingController::class, "settings"]);
Route::get("/billing", [SettingController::class, "billing"]);
Route::get("/delete/{action}/{id}", [DeleteController::class, "delete"]);

Route::post("/save-reset-password", [
    AuthController::class,
    "resetPasswordPost",
]);
Route::post("/post-new-password", [AuthController::class, "newPasswordPost"]);
Route::post("/user-change-password", [
    ProfileController::class,
    "userChangePasswordPost",
]);
Route::post("/login", [AuthController::class, "loginPost"]);
Route::post("/admin/login", [AuthController::class, "superAdminLoginPost"]);
Route::post("/signup", [AuthController::class, "signupPost"]);
Route::post("/student-signup-post", [
    AuthController::class,
    "studentSignupPost",
]);
Route::post("/save-note", [ActionsController::class, "notePost"]);

Route::post("/document", [DocumentController::class, "documentPost"]);
Route::post("/settings", [SettingController::class, "settingsPost"]);
Route::post("/profile", [ProfileController::class, "profilePost"]);
Route::post("/save-event", [PlansController::class, "eventPost"]);
Route::post("/user-post", [ProfileController::class, "userPost"]);

Route::prefix("student")
    ->name("student.")
    ->group(function () {
        Route::get("/login", [StudentPortalController::class, "login"])->name(
            "login"
        );
        Route::post("/login", [AuthController::class, "studentLoginPost"]);
        Route::get("/profile", [
            StudentPortalController::class,
            "studentProfile",
        ])->name("profile");
        Route::get("/messages", [
            StudentPortalController::class,
            "studentMessages",
        ]);
        Route::post("/send-messages", [
            StudentPortalController::class,
            "postStudentMessages",
        ]);
        Route::get("/assignments", [
            StudentPortalController::class,
            "assignments",
        ]);
        Route::get("/ebooks", [StudentPortalController::class, "ebooks"]);
        Route::get("/view-assignment", [
            StudentPortalController::class,
            "viewAssignment",
        ]);
        Route::post("/submit-assignment", [
            StudentPortalController::class,
            "submitAssignmentPost",
        ]);
        Route::get("/edit-profile", [
            StudentPortalController::class,
            "studentEditProfile",
        ]);
        Route::post("/student-edit-profile", [
            StudentPortalController::class,
            "studentEditPost",
        ]);
        Route::get("/dashboard", [
            StudentPortalController::class,
            "dashboard",
        ])->name("dashboard");
        Route::get("/my-certificates", [
            StudentPortalController::class,
            "myCertificates",
        ]);
        Route::get("/my-courses", [
            StudentPortalController::class,
            "myCourses",
        ]);
        Route::get("/my-course-details", [
            StudentPortalController::class,
            "myCourseDetails",
        ]);
        Route::get("/my-course-lessons", [
            StudentPortalController::class,
            "myCourseLessons",
        ]);
        Route::get("/my-course-discussion", [
            StudentPortalController::class,
            "myCourseDiscussion",
        ]);
        Route::post("/save-review", [
            StudentPortalController::class,
            "reviewPost",
        ]);
        Route::post("/save-ebook-review", [
            StudentPortalController::class,
            "ebookReviewPost",
        ]);
        Route::post("/save-course-comment", [
            StudentPortalController::class,
            "courseCommentPost",
        ]);
        Route::get("/view-mylesson", [
            StudentPortalController::class,
            "viewMyLesson",
        ]);
        Route::get("/view-ebook", [
            StudentPortalController::class,
            "viewEbook",
        ]);
        Route::get("/view-certificate", [
            StudentPortalController::class,
            "viewCertificate",
        ]);

        Route::post('/mark-lesson-as-completed', [StudentPortalController::class, 'markLessonAsCompleted'])->name('mark-lesson-as-completed');
        Route::post('/check-quiz-submission', [StudentPortalController::class, 'checkQuizSubmission'])->name('check-quiz-submission');

    });

Route::get("/certificates", [CertificateController::class, "certificates"]);
Route::get("/create-certificate", [
    CertificateController::class,
    "newCertificate",
]);
Route::post("/save-certificate-template", [
    CertificateController::class,
    "certificateTemplatePost",
]);

Route::post("/handle-payment-gateway", [
    BillingController::class,
    "handlePaymentGateway",
]);

Route::get("/new-student", [StudentController::class, "newStudent"]);
Route::get("/students", [StudentController::class, "students"]);
Route::post("/save-student", [StudentController::class, "studentPost"]);
Route::get("/view-student", [StudentController::class, "viewStudent"]);
Route::get("/student-about", [StudentController::class, "aboutViewStudent"]);
Route::get("/student-courses", [
    StudentController::class,
    "coursesViewStudent",
]);
Route::get("/student-assignments", [
    StudentController::class,
    "assignmentsViewStudent",
]);
Route::get("/student-ebooks", [StudentController::class, "ebooksViewStudent"]);
Route::get("/student-certificates", [
    StudentController::class,
    "certificateViewStudent",
]);

Route::post("/save-course-purchased", [
    CoursePurchaseController::class,
    "saveCoursePurchased",
]);
Route::post("/save-certificate-received", [
    CertificateReceiveController::class,
    "saveCertificateReceived",
]);
Route::post("/save-ebook-purchased", [
    EbookPurchaseController::class,
    "saveEbookPurchased",
]);

//Routes added later

Route::post("/save-cookie-section", [AdminController::class, "saveCookie"]);
Route::get("/cookiepage", [AdminController::class, "cookiePage"]);
Route::get("/cookie-policy", [FrontendController::class, "cookiePolicy"]);

Route::post("/settings/{action}", [SettingController::class, "settingsStore"]);
Route::post("/admin/messages/{action}", [
    MessageController::class,
    "messagesStore",
]);

Route::get("/update", [FrontendController::class, "update"]);

Route::get("/{plugin}/{method?}/{page?}", [
    AppRouteController::class,
    "handle",
]);

Route::post("/{plugin}/{method?}/{page?}", [
    AppRouteController::class,
    "store",
]);
