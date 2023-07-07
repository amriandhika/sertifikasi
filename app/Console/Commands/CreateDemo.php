<?php

namespace App\Console\Commands;

use App\Models\Assignment;
use App\Models\Blog;
use App\Models\CertificateTemplate;
use App\Models\ContactSection;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CoursePurchase;
use App\Models\CourseReview;
use App\Models\EbookPurchase;
use App\Models\EbookReview;
use App\Models\LandingPage;
use App\Models\Setting;
use App\Models\Student;
use App\Models\Workspace;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateDemo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "create:demo";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Command description";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (config("app.env") == "production") {
            $this->error(
                "This command should not be run in production environment."
            );
            return 1;
        }

        $this->info("Creating demo data...");

        Artisan::call("migrate:refresh --seed");

        $students = [
            [
                "first_name" => "Sarah",
                "last_name" => "Reneys",
                "email" => "sarah@example.com",
                "phone_number" => "+1 (234) 567-890",
                "password" => Hash::make("123456"),
                "bio" => "Web developer",
            ],
            [
                "first_name" => "Maria",
                "last_name" => "Lineas",
                "email" => "maria@example.com",
                "phone_number" => "+1 (560) 904-285",
                "password" => Hash::make("123456"),
                "bio" => "Web developer",
            ],
            [
                "first_name" => "Emily",
                "last_name" => "Sanner",
                "email" => "emily@example.com",
                "phone_number" => "+1 (760) 924-089",
                "password" => Hash::make("123456"),
                "bio" => "Web developer",
            ],
            [
                "first_name" => "Justine",
                "last_name" => "Yonson",
                "email" => "justine@example.com",
                "phone_number" => "+1 (264) 924-103",
                "password" => Hash::make("123456"),
                "bio" => "Web developer",
            ],
            [
                "first_name" => "Niomi",
                "last_name" => "Mira",
                "email" => "mira@example.com",
                "phone_number" => "+1 (434) 124-119",
                "password" => Hash::make("123456"),
                "bio" => "Web developer",
            ],
        ];

        foreach ($students as $student) {
            $create_student = new Student();
            $create_student->first_name = $student["first_name"];
            $create_student->last_name = $student["last_name"];
            $create_student->email = $student["email"];
            $create_student->password = Hash::make("123456");
            $create_student->save();
        }

        $assignments = [
            [
                "workspace_id" => "1",
                "uuid" => "03cd1a6f-b24a-4868-86db-514aea422aa4",
                "admin_id" => "0",
                "course_id" => "2",
                "title" => "Business Strategy",
                "marks" => "100",
                "file" => null,
                "start_date" => null,
                "end_date" => "2022-08-13",
                "status" => "Published",
                "description" => '<p><span style="font-size:10.5pt;font-family:Arial;color:#333333;">Est distinctio voluptatibus qui alias error est ipsum blanditiis eos facere voluptas est officia voluptatem et veritatis ipsa aut cumque maxime. Sit culpa quasi eum beatae odio sit velit debitis et consequatur magnam et impedit nesciunt ab libero deleniti.</span><span style="color:#333333;font-family:Arial;font-size:10.5pt;">Est distinctio voluptatibus qui alias error est ipsum blanditiis eos facere voluptas est officia voluptatem et veritatis ipsa aut cumque maxime. Sit culpa quasi eum beatae odio sit velit debitis et consequatur magnam et impedit nesciunt ab libero deleniti.</span><span style="color:#333333;font-family:Arial;font-size:10.5pt;">Est distinctio voluptatibus qui alias error </span></p>
<p><span style="color:#333333;font-family:Arial;font-size:10.5pt;">est ipsum blanditiis eos facere voluptas est officia voluptatem et veritatis ipsa aut cumque maxime. Sit culpa quasi eum beatae odio sit velit debitis et consequatur magnam et impedit nesciunt ab libero deleniti.v</span><span style="color:#333333;font-family:Arial;font-size:10.5pt;">Est distinctio voluptatibus qui alias error est ipsum blanditiis eos facere voluptas est officia voluptatem et veritatis ipsa aut cumque maxime. Sit culpa quasi eum beatae odio sit velit debitis et consequatur magnam et impedit nesciunt ab libero deleniti.</span><span style="color:#333333;font-family:Arial;font-size:10.5pt;">Est distinctio voluptatibus qui alias error est ipsum blanditiis eos facere voluptas est officia voluptatem et veritatis ipsa aut cumque maxime. Sit culpa quasi eum beatae odio sit velit debitis et consequatur magnam et impedit nesciunt ab libero deleniti.</span></p>',
                "notes" => null,
                "message" => null,
                "members" => '["2","3","4","5"]',
            ],
            [
                "workspace_id" => "1",
                "uuid" => "33238d73-7b04-4264-a747-8a0a0b612bbc",
                "admin_id" => "0",
                "course_id" => "4",
                "title" => "Math for AI",
                "marks" => "200",
                "file" => null,
                "start_date" => null,
                "end_date" => "2022-08-13",
                "status" => "Published",
                "description" =>
                    '<p><span><span style="font-size:10.5pt;font-family:Arial;color:#333333;">Est distinctio voluptatibus qui alias error est ipsum blanditiis eos facere voluptas est officia voluptatem et veritatis ipsa aut cumque maxime. Sit culpa quasi eum beatae odio sit velit debitis et consequatur magnam et impedit nesciunt ab libero deleniti.</span></span><span style="color:#333333;font-family:Arial;font-size:10.5pt;">Est distinctio voluptatibus qui alias error est ipsum blanditiis eos facere voluptas est officia voluptatem et veritatis ipsa aut cumque maxime. Sit culpa quasi eum beatae odio sit velit debitis et consequatur magnam et impedit nesciunt ab libero deleniti.</span><span style="color:#333333;font-family:Arial;font-size:10.5pt;">Est distinctio voluptatibus qui alias error est ipsum blanditiis eos facere voluptas est officia voluptatem et veritatis ipsa aut cumque maxime. Sit culpa quasi eum beatae odio sit velit debitis et consequatur magnam et impedit nesciunt ab libero deleniti.</span></p>',
                "notes" => null,
                "message" => null,
                "members" => '["1","2","4","5"]',
            ],
            [
                "workspace_id" => "1",
                "uuid" => "8b0e209f-1bfc-40a2-8106-5ed53e57405a",
                "admin_id" => "0",
                "course_id" => "3",
                "title" => "Marketing",
                "marks" => "50",
                "file" => null,
                "start_date" => null,
                "end_date" => "2022-08-13",
                "status" => "Published",
                "description" =>
                    '<p><span><span style="font-size:10.5pt;font-family:Arial;color:#333333;">Est distinctio voluptatibus qui alias error est ipsum blanditiis eos facere voluptas est officia voluptatem et veritatis ipsa aut cumque maxime. Sit culpa quasi eum beatae odio sit velit debitis et consequatur magnam et impedit nesciunt ab libero deleniti.</span></span><span style="color:#333333;font-family:Arial;font-size:10.5pt;">Est distinctio voluptatibus qui alias error est ipsum blanditiis eos facere voluptas est officia voluptatem et veritatis ipsa aut cumque maxime. Sit culpa quasi eum beatae odio sit velit debitis et consequatur magnam et impedit nesciunt ab libero deleniti.</span><span style="color:#333333;font-family:Arial;font-size:10.5pt;">Est distinctio voluptatibus qui alias error est ipsum blanditiis eos facere voluptas est officia voluptatem et veritatis ipsa aut cumque maxime. Sit culpa quasi eum beatae odio sit velit debitis et consequatur magnam et impedit nesciunt ab libero deleniti.</span><span style="color:#333333;font-family:Arial;font-size:10.5pt;">Est distinctio voluptatibus qui alias error est ipsum blanditiis eos facere voluptas est officia voluptatem et veritatis ipsa aut cumque maxime. Sit culpa quasi eum beatae odio sit velit debitis et consequatur magnam et impedit nesciunt ab libero deleniti.</span><span style="color:#333333;font-family:Arial;font-size:10.5pt;">Est distinctio voluptatibus qui alias error est ipsum blanditiis eos facere voluptas est officia voluptatem et veritatis ipsa aut cumque maxime. Sit culpa quasi eum beatae odio sit velit debitis et consequatur magnam et impedit nesciunt ab libero deleniti.</span><span style="color:#333333;font-family:Arial;font-size:10.5pt;">Est distinctio voluptatibus qui alias error est ipsum blanditiis eos facere voluptas est officia voluptatem et veritatis ipsa aut cumque maxime. Sit culpa quasi eum beatae odio sit velit debitis et consequatur magnam et impedit nesciunt ab libero deleniti.</span><span style="color:#333333;font-family:Arial;font-size:10.5pt;">Est distinctio voluptatibus qui alias error est ipsum blanditiis eos facere voluptas est officia voluptatem et veritatis ipsa aut cumque maxime. Sit culpa quasi eum beatae odio sit velit debitis et consequatur magnam et impedit nesciunt ab libero deleniti.</span><span style="color:#333333;font-family:Arial;font-size:10.5pt;">Est distinctio voluptatibus qui alias error est ipsum blanditiis eos facere voluptas est officia voluptatem et veritatis ipsa aut cumque maxime. Sit culpa quasi eum beatae odio sit velit debitis et consequatur magnam et impedit nesciunt ab libero deleniti.</span></p>',
                "notes" => null,
                "message" => null,
                "members" => '["1","2","4"]',
            ],
            [
                "workspace_id" => "1",
                "uuid" => "e353fb64-f6b3-41b8-9efe-6d5221533a1d",
                "admin_id" => "0",
                "course_id" => "2",
                "title" => "Finance 101",
                "marks" => "100",
                "file" => null,
                "start_date" => null,
                "end_date" => "2022-08-13",
                "status" => "Published",
                "description" =>
                    '<p><span style="font-size:10.5pt;font-family:Arial;color:#333333;">Est distinctio voluptatibus qui alias error est ipsum blanditiis eos facere voluptas est officia voluptatem et veritatis ipsa aut cumque maxime. Sit culpa quasi eum beatae odio sit velit debitis et consequatur magnam et impedit nesciunt ab libero deleniti.</span><span style="color:#333333;font-family:Arial;font-size:10.5pt;">Est distinctio voluptatibus qui alias error est ipsum blanditiis eos facere voluptas est officia voluptatem et veritatis ipsa aut cumque maxime. Sit culpa quasi eum beatae odio sit velit debitis et consequatur magnam et impedit nesciunt ab libero deleniti.</span></p>',
                "notes" => null,
                "message" => null,
                "members" => '["1","2","3","5"]',
            ],
        ];

        foreach ($assignments as $assignment) {
            $assignment_create = new Assignment();
            $assignment_create->workspace_id = $assignment["workspace_id"];
            $assignment_create->uuid = $assignment["uuid"];
            $assignment_create->admin_id = $assignment["admin_id"];
            $assignment_create->course_id = $assignment["course_id"];
            $assignment_create->title = $assignment["title"];
            $assignment_create->marks = $assignment["marks"];
            $assignment_create->file = $assignment["file"];
            $assignment_create->start_date = $assignment["start_date"];
            $assignment_create->end_date = $assignment["end_date"];
            $assignment_create->status = $assignment["status"];
            $assignment_create->description = $assignment["description"];
            $assignment_create->notes = $assignment["notes"];
            $assignment_create->message = $assignment["message"];
            $assignment_create->members = $assignment["members"];
            $assignment_create->save();
        }

        $blogs = [
            [
                "workspace_id" => "1",
                "uuid" => "a3583395-3cf3-4397-bb53-a07c2bad3530",
                "admin_id" => "1",
                "title" => "How did i got 730 in GMAT",
                "topic" => "GMAT",
                "notes" => '<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>',
                "cover_photo" =>
                    "media/sXKZN9EnXQkXbOCeHHNjP4cPGE2XmOFa4uiQs41Q.jpg",
            ],
            [
                "workspace_id" => "1",
                "uuid" => "ae9b6dbf-4b35-44d0-9d8b-635afeb07346",
                "admin_id" => "1",
                "title" => "Study technics to learn faster.",
                "topic" => "Study tecnic",
                "notes" => '<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>',
                "cover_photo" =>
                    "media/rntg7pONmWni5Ii9ejcrpICnTjVADjku6L9kK5lj.jpg",
            ],
            [
                "workspace_id" => "1",
                "uuid" => "d85881e1-cca4-445d-a39c-922a6a071f14",
                "admin_id" => "1",
                "title" =>
                    "How reading a new book every month changed my life.",
                "topic" => "Reading",
                "notes" => '<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>',
                "cover_photo" =>
                    "media/7NKlGZ9RzUBHU8frmgyeLN2We0k9HcfLEZ3jmNu8.jpg",
            ],
            [
                "workspace_id" => "1",
                "uuid" => "7751585b-50e3-4415-8b6e-c02525dddc7c",
                "admin_id" => "1",
                "title" =>
                    "Ability to learn new things faster is the most important skill to have in 2022.",
                "topic" => "Learning",
                "notes" => '<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>',
                "cover_photo" =>
                    "media/4kZ1npEkJOgEc9X8bNO2f7vRPmSxdHyStyQQDaOD.jpg",
            ],
            [
                "workspace_id" => "1",
                "uuid" => "86593118-e7f6-40c7-9f1a-cf702d282607",
                "admin_id" => "1",
                "title" => "How i learn difficult math quickly.",
                "topic" => "Math",
                "notes" => '<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>',
                "cover_photo" =>
                    "media/et1s7zH3uZCa0E9K7yC5b7dlHteMiSRAK4djaJ81.jpg",
            ],
            [
                "workspace_id" => "1",
                "uuid" => "13dc82e3-8c6d-494c-9d19-fcce8ea3f039",
                "admin_id" => "1",
                "title" => "Top 10 marketing strategies",
                "topic" => "Marketing",
                "notes" => '<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>
<p><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>',
                "cover_photo" =>
                    "media/F9Li7bqApZ7YkNHTDUIIomfLqUrntU8uAYDnkEUR.png",
            ],
        ];

        foreach ($blogs as $blog) {
            $blog_create = new Blog();
            $blog_create->workspace_id = $blog["workspace_id"];
            $blog_create->uuid = $blog["uuid"];
            $blog_create->admin_id = $blog["admin_id"];
            $blog_create->title = $blog["title"];
            $blog_create->topic = $blog["topic"];
            $blog_create->slug = Str::slug($blog["title"]);
            $blog_create->notes = $blog["notes"];
            $blog_create->cover_photo = $blog["cover_photo"];
            $blog_create->save();
        }

        $certificate_templates = [
            [
                "uuid" => "22325f41-d1c6-4e9e-9a59-fb19c52073c2",
                "admin_id" => "0",
                "workspace_id" => "1",
                "course_id" => "1",
                "title" => "Business",
                "signature" => null,
                "logo" => "media/KTANCmmTWSy4B4Cp2MJzwELH5jZaofcLstmnzV9a.png",
                "border_color" => "#f8f7f7",
                "background_color" => "#f4f0f0",
                "description" => null,
            ],
            [
                "uuid" => "0893d359-211e-4485-a638-53b138f2fe9a",
                "admin_id" => "0",
                "workspace_id" => "1",
                "course_id" => "4",
                "title" => "Math",
                "signature" => null,
                "logo" => "media/w37UOHnJxWmfwKwVf5I9DKyDvnSSpfVXhn9JckBL.png",
                "border_color" => "#dcd7ea",
                "background_color" => "#ebe8f8",
                "description" => null,
            ],
        ];

        foreach ($certificate_templates as $certificate_template) {
            $create_certificate_template = new CertificateTemplate();
            $create_certificate_template->uuid = $certificate_template["uuid"];
            $create_certificate_template->admin_id =
                $certificate_template["admin_id"];
            $create_certificate_template->workspace_id =
                $certificate_template["workspace_id"];
            $create_certificate_template->course_id =
                $certificate_template["course_id"];
            $create_certificate_template->title =
                $certificate_template["title"];
            $create_certificate_template->signature =
                $certificate_template["signature"];
            $create_certificate_template->logo = $certificate_template["logo"];
            $create_certificate_template->border_color =
                $certificate_template["border_color"];
            $create_certificate_template->background_color =
                $certificate_template["background_color"];
            $create_certificate_template->description =
                $certificate_template["description"];
            $create_certificate_template->save();
        }

        $contact_sections = [
            [
                "admin_id" => "0",
                "title" => "CloudOnex",
                "subtitle" =>
                    "Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum",
                "email" => "demo@examplee.com",
                "phone_number" => "12365677",
                "twitter" => "https://twitter.com",
                "facebook" => "https://facebook.com",
                "linkedin" => null,
                "youtube" => "https://youtube.com",
                "address_1" => "California, United states",
                "address_2" => null,
                "zip" => null,
                "city" => null,
                "state" => null,
                "country" => null,
            ],
        ];

        foreach ($contact_sections as $contact_section) {
            $create_contact_section = new ContactSection();
            $create_contact_section->admin_id = $contact_section["admin_id"];
            $create_contact_section->title = $contact_section["title"];
            $create_contact_section->subtitle = $contact_section["subtitle"];
            $create_contact_section->email = $contact_section["email"];
            $create_contact_section->phone_number =
                $contact_section["phone_number"];
            $create_contact_section->twitter = $contact_section["twitter"];
            $create_contact_section->facebook = $contact_section["facebook"];
            $create_contact_section->linkedin = $contact_section["linkedin"];
            $create_contact_section->youtube = $contact_section["youtube"];
            $create_contact_section->address_1 = $contact_section["address_1"];
            $create_contact_section->address_2 = $contact_section["address_2"];
            $create_contact_section->zip = $contact_section["zip"];
            $create_contact_section->city = $contact_section["city"];
            $create_contact_section->state = $contact_section["state"];
            $create_contact_section->country = $contact_section["country"];
            $create_contact_section->save();
        }

        $courses = [
            [
                "uuid" => "5edaa6e9-8e34-4a9f-b89a-76212e465679",
                "workspace_id" => "1",
                "admin_id" => "1",
                "category_id" => "4",
                "price" => "299.00",
                "price_monthly" => null,
                "price_yearly" => null,
                "price_two_years" => null,
                "price_three_years" => null,
                "deadline" => "2022-08-12",
                "outcomes" =>
                    '["Ut enim ad minim veniam","Ut enim ad minim veniam","dolore minim veniamcupidatat","eu  minim fugiat veniamcupidatat","nu fugiat minim veniamcupidatat","fugiat minim veniamcupidatat"]',
                "language" => null,
                "summary" =>
                    "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>",
                "duration" => "2h30m",
                "name" => "Excel Crash Course: Master Excel.",
                "description" =>
                    '<p><span style="font-size:10.5pt;font-family:Arial;color:#000000;background-color:#ffffff;font-weight:400;font-style:normal;text-decoration:none;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>',
                "image" => "media/keBQexfNRTJj3rIqQf80RyZjKijq0lYYxo1m6dAe.jpg",
                "video" => null,
                "certificate" => "No",
                "status" => "Published",
                "level" => "Beginner",
            ],
            [
                "uuid" => "48c3d1a6-c53d-4823-8691-2458b81a38b4",
                "workspace_id" => "1",
                "admin_id" => "1",
                "category_id" => "2",
                "price" => "199.00",
                "price_monthly" => null,
                "price_yearly" => null,
                "price_two_years" => null,
                "price_three_years" => null,
                "deadline" => "2022-08-12",
                "outcomes" =>
                    '["a qui officia  ea commodo consequat.","deserunt mollit  consequat.","animex ea commodo consequat.","irure dolor in re consequat.","ex ea commodo consequat."]',
                "language" => null,
                "summary" =>
                    "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>",
                "duration" => "20days",
                "name" => "Finance Training for Financial Analysts",
                "description" => '
<p><span style="font-size:10.5pt;font-family:Arial;background-color:#ffffff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>

<p><span style="font-size:10.5pt;font-family:Arial;background-color:#ffffff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>

<p><span style="font-size:10.5pt;font-family:Arial;color:#000000;background-color:#ffffff;font-weight:400;font-style:normal;text-decoration:none;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>',
                "image" => "media/ctPwbgsv7Q8s1lMK3POMEbmtGN6ertszhMmZeywK.jpg",
                "video" => null,
                "certificate" => "No",
                "status" => "Published",
                "level" => "Beginner",
            ],
            [
                "uuid" => "d7ea9124-1559-44a7-a65d-801f8e560c4a",
                "workspace_id" => "1",
                "admin_id" => "1",
                "category_id" => "0",
                "price" => "567.00",
                "price_monthly" => null,
                "price_yearly" => null,
                "price_two_years" => null,
                "price_three_years" => null,
                "deadline" => "2022-08-12",
                "outcomes" =>
                    '["fugiat nulla pariatur consequat","consectetur adipiscing  consequat","incididunt ut labore consequat","deserunt mollit anim id  consequat","aliquip ex ea commodo consequat"]',
                "language" => null,
                "summary" =>
                    "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>",
                "duration" => "5h70m",
                "name" => "Marketing Strategies for growing business",
                "description" => '
<p><span style="font-size:10.5pt;font-family:Arial;background-color:#ffffff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>

<p><span style="font-size:10.5pt;font-family:Arial;background-color:#ffffff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>

<p><span style="font-size:10.5pt;font-family:Arial;background-color:#ffffff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>

<p><span style="font-size:10.5pt;font-family:Arial;color:#000000;background-color:#ffffff;font-weight:400;font-style:normal;text-decoration:none;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>',
                "image" => "media/n7Gv4jWDkBYaTuf4A7RCLs2AEd4UyPXsbY5HcVZ7.jpg",
                "video" => null,
                "certificate" => "Yes",
                "status" => "Published",
                "level" => "Beginner",
            ],
            [
                "uuid" => "eb8f45ee-387b-460a-8113-96f8b8416ce2",
                "workspace_id" => "1",
                "admin_id" => "1",
                "category_id" => "2",
                "price" => "289.00",
                "price_monthly" => null,
                "price_yearly" => null,
                "price_two_years" => null,
                "price_three_years" => null,
                "deadline" => "2022-08-12",
                "outcomes" => null,
                "language" => null,
                "summary" =>
                    "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>",
                "duration" => "1h30m",
                "name" => "Basic math, biology and physics",
                "description" => '
<p><span style="font-size:10.5pt;font-family:Arial;background-color:#ffffff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>

<p><span style="font-size:10.5pt;font-family:Arial;background-color:#ffffff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>

<p><span style="font-size:10.5pt;font-family:Arial;color:#000000;background-color:#ffffff;font-weight:400;font-style:normal;text-decoration:none;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>',
                "image" => "media/PGduXWCgFuhu05k9IxNFv61QclLxEm0UohNB9Lpm.jpg",
                "video" => null,
                "certificate" => "No",
                "status" => "Published",
                "level" => "Beginner",
            ],
        ];

        foreach ($courses as $course) {
            $create_course = new Course();
            $create_course->uuid = $course["uuid"];
            $create_course->workspace_id = $course["workspace_id"];
            $create_course->admin_id = $course["admin_id"];
            $create_course->category_id = $course["category_id"];
            $create_course->price = $course["price"];
            $create_course->price_monthly = $course["price_monthly"];
            $create_course->price_yearly = $course["price_yearly"];
            $create_course->price_two_years = $course["price_two_years"];
            $create_course->price_three_years = $course["price_three_years"];
            $create_course->deadline = $course["deadline"];
            $create_course->outcomes = $course["outcomes"];
            $create_course->language = $course["language"];
            $create_course->summary = $course["summary"];
            $create_course->duration = $course["duration"];
            $create_course->name = $course["name"];
            $create_course->slug = Str::slug($course["name"]);
            $create_course->description = $course["description"];
            $create_course->image = $course["image"];
            $create_course->video = $course["video"];
            $create_course->certificate = $course["certificate"];
            $create_course->status = $course["status"];
            $create_course->level = $course["level"];
            $create_course->save();
        }

        $course_categories = [
            [
                "name" => "Self-help",
                "slug" => null,
                "sort_order" => "0",
                "description" => null,
            ],
            [
                "name" => "Business",
                "slug" => null,
                "sort_order" => "0",
                "description" => null,
            ],
            [
                "name" => "GMAT",
                "slug" => null,
                "sort_order" => "0",
                "description" => null,
            ],
            [
                "name" => "Technology",
                "slug" => null,
                "sort_order" => "0",
                "description" => null,
            ],
            [
                "name" => "Painting",
                "slug" => null,
                "sort_order" => "0",
                "description" => null,
            ],
            [
                "name" => "Php",
                "slug" => null,
                "sort_order" => "0",
                "description" => null,
            ],
            [
                "name" => "Python",
                "slug" => null,
                "sort_order" => "0",
                "description" => null,
            ],
        ];

        foreach ($course_categories as $course_category) {
            $create_course_category = new CourseCategory();
            $create_course_category->name = $course_category["name"];
            $create_course_category->slug = $course_category["slug"];
            $create_course_category->sort_order =
                $course_category["sort_order"];
            $create_course_category->description =
                $course_category["description"];
            $create_course_category->save();
        }

        $course_purchases = [
            [
                "course_id" => "1",
                "student_id" => "1",
            ],
            [
                "course_id" => "3",
                "student_id" => "1",
            ],
            [
                "course_id" => "3",
                "student_id" => "3",
            ],
            [
                "course_id" => "4",
                "student_id" => "3",
            ],
            [
                "course_id" => "1",
                "student_id" => "3",
            ],
            [
                "course_id" => "0",
                "student_id" => "3",
            ],
        ];

        foreach ($course_purchases as $course_purchase) {
            $create_course_purchase = new CoursePurchase();
            $create_course_purchase->course_id = $course_purchase["course_id"];
            $create_course_purchase->student_id =
                $course_purchase["student_id"];
            $create_course_purchase->save();
        }

        $course_reviews = [
            [
                "visitor_id" => "0",
                "admin_id" => "0",
                "student_id" => "3",
                "agent_id" => "0",
                "course_id" => "3",
                "star_count" => "5",
                "review" =>
                    "great, course. Est distinctio voluptatibus qui alias error est ipsum blanditiis eos facere voluptas est officia voluptatem et veritatis ipsa aut cumque maxime. Sit culpa quasi eum beatae odio sit velit debitis et consequatur magnam et impedit nesciunt ab libero deleniti.",
                "is_private" => "0",
            ],
            [
                "visitor_id" => "0",
                "admin_id" => "0",
                "student_id" => "3",
                "agent_id" => "0",
                "course_id" => "4",
                "star_count" => "5",
                "review" =>
                    "Est distinctio voluptatibus qui alias error est ipsum blanditiis eos facere voluptas est officia voluptatem et veritatis ipsa aut cumque maxime. Sit culpa quasi eum beatae odio sit velit debitis et consequatur magnam et impedit nesciunt ab libero deleniti.",
                "is_private" => "0",
            ],
            [
                "visitor_id" => "0",
                "admin_id" => "0",
                "student_id" => "3",
                "agent_id" => "0",
                "course_id" => "1",
                "star_count" => "5",
                "review" =>
                    "cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est lab",
                "is_private" => "0",
            ],
        ];

        foreach ($course_reviews as $course_review) {
            $create_course_review = new CourseReview();
            $create_course_review->visitor_id = $course_review["visitor_id"];
            $create_course_review->admin_id = $course_review["admin_id"];
            $create_course_review->student_id = $course_review["student_id"];
            $create_course_review->agent_id = $course_review["agent_id"];
            $create_course_review->course_id = $course_review["course_id"];
            $create_course_review->star_count = $course_review["star_count"];
            $create_course_review->review = $course_review["review"];
            $create_course_review->is_private = $course_review["is_private"];
            $create_course_review->save();
        }

        $ebook_purchases = [
            [
                "product_id" => "4",
                "student_id" => "1",
            ],
            [
                "product_id" => "1",
                "student_id" => "1",
            ],
            [
                "product_id" => "4",
                "student_id" => "3",
            ],
            [
                "product_id" => "2",
                "student_id" => "3",
            ],
            [
                "product_id" => "1",
                "student_id" => "3",
            ],
        ];

        foreach ($ebook_purchases as $ebook_purchase) {
            $create_ebook_purchase = new EbookPurchase();
            $create_ebook_purchase->product_id = $ebook_purchase["product_id"];
            $create_ebook_purchase->student_id = $ebook_purchase["student_id"];
            $create_ebook_purchase->save();
        }

        $ebook_reviews = [
            [
                "id" => "1",
                "visitor_id" => "0",
                "admin_id" => "0",
                "student_id" => "3",
                "agent_id" => "0",
                "product_id" => "4",
                "star_count" => "4",
                "review" =>
                    "cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est lab",
                "is_private" => "0",
            ],
            [
                "id" => "2",
                "visitor_id" => "0",
                "admin_id" => "0",
                "student_id" => "3",
                "agent_id" => "0",
                "product_id" => "2",
                "star_count" => "2",
                "review" =>
                    "cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est lab",
                "is_private" => "0",
            ],
            [
                "id" => "3",
                "visitor_id" => "0",
                "admin_id" => "0",
                "student_id" => "3",
                "agent_id" => "0",
                "product_id" => "1",
                "star_count" => "3",
                "review" =>
                    "cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est lab",
                "is_private" => "0",
            ],
        ];

        foreach ($ebook_reviews as $ebook_review) {
            $create_ebook_review = new EbookReview();
            $create_ebook_review->id = $ebook_review["id"];
            $create_ebook_review->visitor_id = $ebook_review["visitor_id"];
            $create_ebook_review->admin_id = $ebook_review["admin_id"];
            $create_ebook_review->student_id = $ebook_review["student_id"];
            $create_ebook_review->agent_id = $ebook_review["agent_id"];
            $create_ebook_review->product_id = $ebook_review["product_id"];
            $create_ebook_review->star_count = $ebook_review["star_count"];
            $create_ebook_review->review = $ebook_review["review"];
            $create_ebook_review->is_private = $ebook_review["is_private"];
            $create_ebook_review->save();
        }

        $landing_pages = [
            [
                "admin_id" => "0",
                "hero_title" =>
                    "Your knowledge is more valuable than you think.",
                "hero_subtitle" => "Learn with confidence",
                "background_image" =>
                    "media/9gkP2lK5Nu6GjdoC6eGcVycvjO9kR1ykezNQAiee.png",
                "hero_paragraph" =>
                    "<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>",
                "feature1_title" => null,
                "feature1_subtitle" => null,
                "feature1_one" => null,
                "feature1_one_paragraph" => null,
                "feature1_two" => null,
                "feature1_two_paragraph" => null,
                "feature1_three" => null,
                "feature1_three_paragraph" => null,
                "feature1_four" => null,
                "feature1_four_paragraph" => null,
                "feature1_five" => null,
                "feature1_five_paragraph" => null,
                "feature1_six" => null,
                "feature1_six_paragraph" => null,
                "feature1_image" => null,
                "feature1_image_title" => null,
                "feature1_image_subtitle" => null,
                "testimonial_sidecard" => "What my student say about my course",
                "testimonial1_image" =>
                    "media/LOjlJpPc9up8ks43IdFxPCPxnfSPTfSk2P7syWnN.jpg",
                "testimonial1_student_name" => "Sarah Erikson",
                "testimonial1_occupation" => "COO, Orange",
                "testimonial1_paragraph" =>
                    "<p>The marketing courses have helped me advance in my career, The knowledge I gained from your courses made me smarter and shaped my decision-making tremendously.</p>",
                "testimonial2_image" =>
                    "media/GDgce3krK69riwIPcORmbXnmKfDbOShWAiEJPTyQ.jpg",
                "testimonial2_student_name" => "Emily Karlson",
                "testimonial2_occupation" => "Executive, Hubzone",
                "testimonial2_paragraph" =>
                    "<p>The  business courses have helped me advance in my career. The knowledge I gained from your courses made me smarter and shaped my decision-making tremendously.</p>",
                "feature2_title" => null,
                "feature2_subtitle" => null,
                "feature2_one" => null,
                "feature2_one_paragraph" => null,
                "feature2_two" => null,
                "feature2_two_paragraph" => null,
                "feature2_three" => null,
                "feature2_three_paragraph" => null,
                "feature2_four" => null,
                "feature2_four_paragraph" => null,
                "feature2_five" => null,
                "feature2_five_paragraph" => null,
                "feature2_six" => null,
                "feature2_six_paragraph" => null,
                "feature2_seven" => null,
                "feature2_seven_paragraph" => null,
                "feature2_eight" => null,
                "feature2_eight_paragraph" => null,
                "partners_title" => null,
                "partners_subtitle" => null,
                "partners_paragraph" => null,
                "calltoaction_title" =>
                    "Advance in your career, join 5k+ students",
                "calltoaction_subtitle" => "Ready to get started?",
                "story1_title" => null,
                "story1_paragrapgh" => null,
                "story1_image" => null,
                "story2_title" => "Courses to thrive in Business",
                "story2_paragrapgh" =>
                    "<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>",
                "story2_image" =>
                    "media/fMs49rtpuBmPkz8tk8jY6qgxkenSX3DtA28tyZUd.png",
            ],
        ];

        foreach ($landing_pages as $landing_page) {
            $create_landing_page = new LandingPage();
            $create_landing_page->admin_id = $landing_page["admin_id"];
            $create_landing_page->hero_title = $landing_page["hero_title"];
            $create_landing_page->hero_subtitle =
                $landing_page["hero_subtitle"];
            $create_landing_page->background_image =
                $landing_page["background_image"];
            $create_landing_page->hero_paragraph =
                $landing_page["hero_paragraph"];
            $create_landing_page->feature1_title =
                $landing_page["feature1_title"];
            $create_landing_page->feature1_subtitle =
                $landing_page["feature1_subtitle"];
            $create_landing_page->feature1_one = $landing_page["feature1_one"];
            $create_landing_page->feature1_one_paragraph =
                $landing_page["feature1_one_paragraph"];
            $create_landing_page->feature1_two = $landing_page["feature1_two"];
            $create_landing_page->feature1_two_paragraph =
                $landing_page["feature1_two_paragraph"];
            $create_landing_page->feature1_three =
                $landing_page["feature1_three"];
            $create_landing_page->feature1_three_paragraph =
                $landing_page["feature1_three_paragraph"];
            $create_landing_page->feature1_four =
                $landing_page["feature1_four"];
            $create_landing_page->feature1_four_paragraph =
                $landing_page["feature1_four_paragraph"];
            $create_landing_page->feature1_five =
                $landing_page["feature1_five"];
            $create_landing_page->feature1_five_paragraph =
                $landing_page["feature1_five_paragraph"];
            $create_landing_page->feature1_six = $landing_page["feature1_six"];
            $create_landing_page->feature1_six_paragraph =
                $landing_page["feature1_six_paragraph"];
            $create_landing_page->feature1_image =
                $landing_page["feature1_image"];
            $create_landing_page->feature1_image_title =
                $landing_page["feature1_image_title"];
            $create_landing_page->feature1_image_subtitle =
                $landing_page["feature1_image_subtitle"];
            $create_landing_page->testimonial_sidecard =
                $landing_page["testimonial_sidecard"];
            $create_landing_page->testimonial1_image =
                $landing_page["testimonial1_image"];
            $create_landing_page->testimonial1_student_name =
                $landing_page["testimonial1_student_name"];
            $create_landing_page->testimonial1_occupation =
                $landing_page["testimonial1_occupation"];
            $create_landing_page->testimonial1_paragraph =
                $landing_page["testimonial1_paragraph"];
            $create_landing_page->testimonial2_image =
                $landing_page["testimonial2_image"];
            $create_landing_page->testimonial2_student_name =
                $landing_page["testimonial2_student_name"];
            $create_landing_page->testimonial2_occupation =
                $landing_page["testimonial2_occupation"];
            $create_landing_page->testimonial2_paragraph =
                $landing_page["testimonial2_paragraph"];
            $create_landing_page->feature2_title =
                $landing_page["feature2_title"];
            $create_landing_page->feature2_subtitle =
                $landing_page["feature2_subtitle"];
            $create_landing_page->feature2_one = $landing_page["feature2_one"];
            $create_landing_page->feature2_one_paragraph =
                $landing_page["feature2_one_paragraph"];
            $create_landing_page->feature2_two = $landing_page["feature2_two"];
            $create_landing_page->feature2_two_paragraph =
                $landing_page["feature2_two_paragraph"];
            $create_landing_page->feature2_three =
                $landing_page["feature2_three"];
            $create_landing_page->feature2_three_paragraph =
                $landing_page["feature2_three_paragraph"];
            $create_landing_page->feature2_four =
                $landing_page["feature2_four"];
            $create_landing_page->feature2_four_paragraph =
                $landing_page["feature2_four_paragraph"];
            $create_landing_page->feature2_five =
                $landing_page["feature2_five"];
            $create_landing_page->feature2_five_paragraph =
                $landing_page["feature2_five_paragraph"];
            $create_landing_page->feature2_six = $landing_page["feature2_six"];
            $create_landing_page->feature2_six_paragraph =
                $landing_page["feature2_six_paragraph"];
            $create_landing_page->feature2_seven =
                $landing_page["feature2_seven"];
            $create_landing_page->feature2_seven_paragraph =
                $landing_page["feature2_seven_paragraph"];
            $create_landing_page->feature2_eight =
                $landing_page["feature2_eight"];
            $create_landing_page->feature2_eight_paragraph =
                $landing_page["feature2_eight_paragraph"];
            $create_landing_page->partners_title =
                $landing_page["partners_title"];
            $create_landing_page->partners_subtitle =
                $landing_page["partners_subtitle"];
            $create_landing_page->partners_paragraph =
                $landing_page["partners_paragraph"];
            $create_landing_page->calltoaction_title =
                $landing_page["calltoaction_title"];
            $create_landing_page->calltoaction_subtitle =
                $landing_page["calltoaction_subtitle"];
            $create_landing_page->story2_title = $landing_page["story2_title"];
            $create_landing_page->story2_paragrapgh =
                $landing_page["story2_paragrapgh"];
            $create_landing_page->story2_image = $landing_page["story2_image"];

            $create_landing_page->save();
        }

        $lessons = [
            [
                "workspace_id" => "1",
                "course_id" => "1",
                "title" => "Introduction",
                "description" => '
<p><span style="font-size:10.5pt;font-family:Arial;background-color:#ffffff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>

<p><span style="font-size:10.5pt;font-family:Arial;background-color:#ffffff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>

<p><span style="font-size:10.5pt;font-family:Arial;color:#000000;background-color:#ffffff;font-weight:400;font-style:normal;text-decoration:none;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>',
                "image" => null,
                "video" => "media/TTtHUeosMkGZqu15wCjIM8iQGxhAOXET4e9LI9wi.mp4",
                "order" => "0",
            ],
            [
                "workspace_id" => "1",
                "course_id" => "1",
                "title" => "Attributions",
                "description" => '
<p><span style="font-size:10.5pt;font-family:Arial;color:#000000;background-color:#ffffff;font-weight:400;font-style:normal;text-decoration:none;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>',
                "image" => null,
                "video" => null,
                "order" => "0",
            ],
            [
                "workspace_id" => "1",
                "course_id" => "1",
                "title" => "Marking",
                "description" => '
<p><span style="font-size:10.5pt;font-family:Arial;color:#000000;background-color:#ffffff;font-weight:400;font-style:normal;text-decoration:none;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>',
                "image" => null,
                "video" => null,
                "order" => "0",
            ],
            [
                "workspace_id" => "1",
                "course_id" => "1",
                "title" => "Projects",
                "description" => '
<p><span style="font-size:10.5pt;font-family:Arial;color:#000000;background-color:#ffffff;font-weight:400;font-style:normal;text-decoration:none;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>',
                "image" => null,
                "video" => null,
                "order" => "0",
            ],
        ];

        foreach ($lessons as $lesson) {
            DB::table("lessons")->insert($lesson);
        }

        $messages = [
            [
                "admin_id" => "1",
                "contents" => null,
                "message" => "Hi sarah",
                "type" => "Admin",
                "from_id" => "1",
                "student_id" => "1",
                "to_id" => "1",
                "time" => null,
                "read" => null,
                "sent" => null,
                "attachment_path" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "admin_id" => "1",
                "contents" => null,
                "message" => "Hello jason",
                "type" => "Student",
                "from_id" => "3",
                "student_id" => "3",
                "to_id" => "1",
                "time" => null,
                "read" => null,
                "sent" => null,
                "attachment_path" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "admin_id" => "1",
                "contents" => null,
                "message" =>
                    "Est distinctio voluptatibus qui alias error est ipsum blanditiis eos facere voluptas est officia voluptatem et veritatis ipsa aut cumque maxime. Sit culpa quasi eum beatae odio sit velit debitis et consequatur magnam et impedit nesciunt ab libero deleniti.",
                "type" => "Admin",
                "from_id" => "1",
                "student_id" => "1",
                "to_id" => "1",
                "time" => null,
                "read" => null,
                "sent" => null,
                "attachment_path" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
        ];

        foreach ($messages as $message) {
            DB::table("messages")->insert($message);
        }

        $orders = [
            [
                "product_id" => "0",
                "student_id" => "3",
                "quantity" => "0",
                "order_total" => "529.00",
            ],
            [
                "product_id" => "0",
                "student_id" => "2",
                "quantity" => "0",
                "order_total" => "398.00",
            ],
            [
                "product_id" => "0",
                "student_id" => "5",
                "quantity" => "0",
                "order_total" => "199.00",
            ],
            [
                "product_id" => "0",
                "student_id" => "5",
                "quantity" => "0",
                "order_total" => "199.00",
            ],
            [
                "product_id" => "0",
                "student_id" => "3",
                "quantity" => "0",
                "order_total" => "299.00",
            ],
        ];

        foreach ($orders as $order) {
            DB::table("orders")->insert($order);
        }

        $order_items = [
            [
                "quantity" => "0",
                "order_id" => "1",
                "item_id" => "1",
                "price" => "299.00",
                "type" => "course",
                "item_name" => "Excel Crash Course: Master Excel.",
                "line_total" => "0.00",
            ],
            [
                "quantity" => "0",
                "order_id" => "1",
                "item_id" => "2",
                "price" => "230.00",
                "type" => "ebook",
                "item_name" => "Cake recipes",
                "line_total" => "0.00",
            ],
            [
                "quantity" => "0",
                "order_id" => "2",
                "item_id" => "2",
                "price" => "199.00",
                "type" => "course",
                "item_name" => "Finance Training for Financial Analysts",
                "line_total" => "0.00",
            ],
            [
                "quantity" => "0",
                "order_id" => "2",
                "item_id" => "3",
                "price" => "199.00",
                "type" => "ebook",
                "item_name" => "Kitchen decor",
                "line_total" => "0.00",
            ],
            [
                "quantity" => "0",
                "order_id" => "3",
                "item_id" => "3",
                "price" => "199.00",
                "type" => "ebook",
                "item_name" => "Kitchen decor",
                "line_total" => "0.00",
            ],
            [
                "quantity" => "0",
                "order_id" => "4",
                "item_id" => "2",
                "price" => "199.00",
                "type" => "course",
                "item_name" => "Finance Training for Financial Analysts",
                "line_total" => "0.00",
            ],
            [
                "id" => "7",
                "quantity" => "0",
                "order_id" => "5",
                "item_id" => "1",
                "price" => "299.00",
                "type" => "course",
                "item_name" => "Excel Crash Course: Master Excel.",
                "line_total" => "0.00",
            ],
        ];

        foreach ($order_items as $order_item) {
            DB::table("order_items")->insert($order_item);
        }

        $payment_gateways = [
            [
                "name" => "Paypal",
                "api_name" => "paypal",
                "username" => "aa",
                "password" => "22",
                "api_key" => null,
                "api_username" => null,
                "api_password" => null,
                "public_key" => null,
                "private_key" => null,
                "currency" => null,
                "description" => null,
                "instruction" => null,
                "active" => "1",
                "live" => "1",
            ],
        ];

        foreach ($payment_gateways as $payment_gateway) {
            DB::table("payment_gateways")->insert($payment_gateway);
        }

        $privacy_policies = [
            [
                "admin_id" => "0",
                "title" => "Privacy Policy",
                "date" => "2022-08-12",
                "description" => '<p><strong>What to Include in Your Privacy Policy</strong></p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">The content of your Privacy Policy will largely depend on the function of your website, the information gathered and how you intend to use said information. However, to pass legal standards, all Privacy policies should have these basic elements within the text.</p>
<p><strong>Your Business Contact Information</strong></p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">Your Privacy needs to display your organization details like the legal name, contact details and place of business. Best practice recommends that this part should appear as the first or the last part of your Privacy Policy for visibility.</p>
<p><strong>The Type of Data You Will Collect</strong></p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">This ranges from emails, physical and IP addresses, credit card details, phone numbers or tracking locations. CalOPPA goes a step further to mandate that commercial or online websites collecting information on California residents must categorically list the type of personal information collected.</p>
<p><strong>How You Will Collect the Information</strong></p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">In addition to filling out forms, you can also collect data automatically through the use of cookies. Internet cookies are, by far, the easiest way to collect user data since browsers collect and save information from an array of sites users have previously visited. However, you must also obtain consent from users to use their cookies when collecting information.</p>
<p><strong>How You Intend to Use the Data</strong></p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">A vital element of a Privacy Policy is describing how you intend to use the data collected. This clause is particularly important if third-parties like advertising programs or fintech companies are in the loop.</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">Will you use the data for transactional purposes alone or will you also send newsletters to your visitors? Will your company share information with other third-party entities like merchants? If so, the law legally requires you to list down all the relevant parties who will also have access to user information alongside your business.</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">In <a href="https://www.quora.com/about/privacy">Quora\'s</a> Privacy Policy, they have explained in great detail how they intend to use user information, and even further clarifying that they do not sell to third parties:</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;"> </p>
<p><strong>Security Measures in Place to Protect Data</strong></p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">Perhaps the most crucial clause in a Privacy Policy, website owners should give details of the security safeguards they have in place to keep customers\' and visitors\' personal information safe.</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">The industry-standard safety measure for protecting private information is the use of a <a href="https://www.ssl.com/faqs/faq-what-is-ssl/">Secure Socket Layers</a> (SSL) system. With SSLs, information fed into a website by users is automatically encrypted and coded, which prevents a breach during transmission.</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">You\'re free to integrate as many security measures as you want as long as malicious parties or unrestricted personnel can\'t intercept or have access to user information.</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">Here\'s how <a href="https://www.bathandbodyworks.com/customer-care/privacy-and-security.html">Bath and Body Works</a> explained its security measures in place. It doesn\'t go too technical on what they do, but its description manages to assure customers that their details are safe:</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;"> </p>
<p><strong>Rights of the Users</strong></p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">Under the EU\'s GDPR laws, you should also inform your users of the rights they have with their data. Under these rights, users should be able to request, update, transfer, view or erase their data (where applicable) upon request.</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">The GDPR outlines explicitly that the user has a right to:</p>
<ul>
<li>Know details about their information</li>
<li>Request access to their information</li>
<li>Ask you to rectify their information</li>
<li>Ask you to erase their information</li>
<li>Request that you refrain from processing their information (where erasure is not possible)</li>
<li>Request for copies of their data</li>
<li>Object to data processing</li>
<li>Object to automated decision-making</li>
</ul>
<p>How Long You Will Retain Collected Information</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">As a business owner, you should also let your users know how long you intend to keep their information in your database.</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">First and foremost, do you have a clause stating when the policy will take effect and how long you will retain personal information? Second, a Privacy Policy must give users the leeway to opt-out, clear instructions on how to do so and what options are available for users who want to opt-out.</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">For example, many website owners also share with marketing entities, whether in-house or as third-party entities. This is not exactly illegal, but at the very least, users should have the option of opting out from a marketer\'s mailing list in a simple way like sending an email or text message to a toll-free number.</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;"> </p>',
            ],
        ];

        DB::table("privacy_policies")->insert($privacy_policies);

        $products = [
            [
                "uuid" => "7e8d543b-7071-48a5-88f3-51e1ecc9e9cb",
                "workspace_id" => "1",
                "admin_id" => "1",
                "category_id" => "0",
                "course_id" => "0",
                "lesson_id" => "0",
                "price" => "199.00",
                "outcomes" => null,
                "language" => null,
                "summary" => null,
                "name" => "Basic Design",
                "slug" => "basic-design",
                "author_name" => "Sally Hemsorth",
                "author_photo" => null,
                "description" =>
                    "<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>",
                "author_description" =>
                    "<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>",
                "image" => "media/ierEQCoLMxFSwiNe92ASMIPzYxXhejImDe49vuiB.jpg",
                "file" => "media/r98sewHv1Z9W78JjdDsDVJOf91K9crJuyq0uDQqk.pdf",
                "video" => null,
                "type" => "Free",
                "status" => "Draft",
                "level" => "Beginner",
            ],
            [
                "uuid" => "55513e8b-a9ca-44a6-9ff9-67e3ed97d475",
                "workspace_id" => "1",
                "admin_id" => "1",
                "category_id" => "0",
                "course_id" => "0",
                "lesson_id" => "0",
                "price" => "230.00",
                "outcomes" => null,
                "language" => null,
                "summary" => null,
                "name" => "Cake recipes",
                "slug" => "cake-recipes",
                "author_name" => "Diana Lisa",
                "author_photo" => null,
                "description" =>
                    "<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>",
                "author_description" =>
                    "<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>",
                "image" => "media/HLSpvbBLY1yv5JGJuHIzj6hJIg6C9yTiq02zGRN1.jpg",
                "file" => null,
                "video" => null,
                "type" => "Free",
                "status" => "Draft",
                "level" => "Beginner",
            ],
            [
                "uuid" => "01e8d5b8-6504-4998-9c0d-3ae0dc33091f",
                "workspace_id" => "1",
                "admin_id" => "1",
                "category_id" => "0",
                "course_id" => "0",
                "lesson_id" => "0",
                "price" => "199.00",
                "outcomes" => null,
                "language" => null,
                "summary" => null,
                "name" => "Kitchen decor",
                "slug" => "kitchen-decor",
                "author_name" => "Arisa james",
                "author_photo" => null,

                "description" =>
                    "<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>",
                "author_description" =>
                    "<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>",
                "image" => "media/8TqLVRCIJK8jv1G9nVkea6jWe6ywPFG1yh8OGdrK.jpg",
                "file" => null,
                "video" => null,
                "type" => "Free",
                "status" => "Draft",
                "level" => "Beginner",
            ],
            [
                "uuid" => "dc6e75d7-efd3-457c-b5b4-80d7d1313726",
                "workspace_id" => "1",
                "admin_id" => "1",
                "category_id" => "0",
                "course_id" => "0",
                "lesson_id" => "0",
                "price" => "230.00",
                "outcomes" => null,
                "language" => null,
                "summary" => null,
                "name" => "The art of gratitude",
                "slug" => "the-art-of-gratitude",
                "author_name" => "Siera Milan",
                "author_photo" => null,

                "description" =>
                    "<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>",
                "author_description" =>
                    "<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>",
                "image" => "media/wROTO26cEI8jH0y68or6hDDBwCs24P3rGKGeij4S.jpg",
                "file" => null,
                "video" => null,
                "type" => "Free",
                "status" => "Draft",
                "level" => "Beginner",
            ],
        ];

        DB::table("products")->insert($products);

        $terms = [
            [
                "admin_id" => "0",
                "title" => "Terms and Conditions",
                "date" => "2022-08-12",
                "description" => '<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">These terms and conditions outline the rules and regulations for the use of Company Name\'s Website, located at Website.com.</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">By accessing this website we assume you accept these terms and conditions. Do not continue to use Website Name if you do not agree to take all of the terms and conditions stated on this page.</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: “Client”, “You” and “Your” refers to you, the person log on this website and compliant to the Company\'s terms and conditions. “The Company”, “Ourselves”, “We”, “Our” and “Us”, refers to our Company. “Party”, “Parties”, or “Us”, refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client\'s needs in respect of provision of the Company\'s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p>
<p>Cookies</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">We employ the use of cookies. By accessing Website Name, you agreed to use cookies in agreement with the Company Name\'s Privacy Policy.</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">Most interactive websites use cookies to let us retrieve the user\'s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p>
<p>License</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">Unless otherwise stated, Company Name and/or its licensors own the intellectual property rights for all material on Website Name. All intellectual property rights are reserved. You may access this from Website Name for your own personal use subjected to restrictions set in these terms and conditions.</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">You must not:</p>
<ul>
<li>Republish material from Website Name</li>
<li>Sell, rent or sub-license material from Website Name</li>
<li>Reproduce, duplicate or copy material from Website Name</li>
<li>Redistribute content from Website Name</li>
</ul>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">This Agreement shall begin on the date hereof.</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. Company Name does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of Company Name,its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, Company Name shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">Company Name reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">You warrant and represent that:</p>
<ul>
<li>You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;</li>
<li>The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;</li>
<li>The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy</li>
<li>The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.</li>
</ul>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">You hereby grant Company Name a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.</p>
<p>Hyperlinking to our Content</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">The following organizations may link to our Website without prior written approval:</p>
<ul>
<li>Government agencies;</li>
<li>Search engines;</li>
<li>News organizations;</li>
<li>Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and</li>
<li>System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.</li>
</ul>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party\'s site.</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">We may consider and approve other link requests from the following types of organizations:</p>
<ul>
<li>commonly-known consumer and/or business information sources;</li>
<li>dot.com community sites;</li>
<li>associations or other groups representing charities;</li>
<li>online directory distributors;</li>
<li>internet portals;</li>
<li>accounting, law and consulting firms; and</li>
<li>educational institutions and trade associations.</li>
</ul>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of Company Name; and (d) the link is in the context of general resource information.</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party\'s site.</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to Company Name. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">Approved organizations may hyperlink to our Website as follows:</p>
<ul>
<li>By use of our corporate name; or</li>
<li>By use of the uniform resource locator being linked to; or</li>
<li>By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party\'s site.</li>
</ul>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">No use of Company Name\'s logo or other artwork will be allowed for linking absent a trademark license agreement.</p>
<p>iFrames</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.</p>
<p>Content Liability</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.</p>
<p>Reservation of Rights</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it\'s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.</p>
<p>Removal of links from our website</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.</p>
<p>Disclaimer</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:</p>
<ul>
<li>limit or exclude our or your liability for death or personal injury;</li>
<li>limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li>
<li>limit any of our or your liabilities in any way that is not permitted under applicable law; or</li>
<li>exclude any of our or your liabilities that may not be excluded under applicable law.</li>
</ul>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.</p>
<p style="color:#333333;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;background-color:#ffffff;">As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p>',
                "created_at" => "2022-08-12 19:50:55",
                "updated_at" => "2022-08-12 19:56:57",
            ],
        ];

        DB::table("terms")->insert($terms);

        return 0;
    }
}
