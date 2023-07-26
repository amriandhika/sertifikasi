<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class StudentBaseController extends Controller
{
    protected $student;
    protected $settings;
    protected $workspace;

    protected $modules;
    public function __construct()
    {
        parent::__construct();
        $this->middleware(function ($request, $next) {
            if (session("student_id")) {
                $this->student = Student::find(session("student_id"));
                View::share("student", $this->student);
            }
            $settings_data = Setting::all();
            foreach ($settings_data as $setting) {
                $this->settings[$setting->key] = $setting->value;
            }
            View::share("settings", $this->settings);
            $language = $this->student->language ?? "en";
            \App::setLocale($language);
            return $next($request);
        });
    }

    public function auth()
    {
        if ($this->student) {
            return true;
        }
        header("Location: " . config("app.url") . "/student/login");
        exit();
    }
}
