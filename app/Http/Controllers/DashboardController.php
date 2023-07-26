<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Course;
use App\Models\CourseCategory;

use App\Models\Image;
use App\Models\Note;
use App\Models\Order;
use App\Models\Projects;
use App\Models\Setting;
use App\Models\Student;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends StudentBaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function dashboard()
    {
        $ldate = date("Y-m-d H:i:s");
        $today = Carbon::now();
        $courses = Course::all()
            ->keyBy("id")
            ->all();
        $categories = CourseCategory::all()
            ->keyBy("id")
            ->all();

        return \view("dashboard", [
            "selected_navigation" => "dashboard",
            "ldate" => $ldate,
            "today" => $today,
            "courses" => $courses,
            "categories" => $categories,
        ]);
    }
}
