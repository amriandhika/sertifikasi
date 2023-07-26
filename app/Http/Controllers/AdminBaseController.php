<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AdminBaseController extends Controller
{
    protected $settings;
    protected $user;
    protected $workspace;
    protected $modules;
    protected $workspace_id;
    public function __construct()
    {
        parent::__construct();
        $this->middleware("auth");

        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            $settings_data = Setting::get();
            $settings = [];

            foreach ($settings_data as $setting) {
                $settings[$setting->key] = $setting->value;
            }
            $this->settings = $settings;
            View::share("settings", $settings);
            View::share("user", $this->user);

            $this->modules = null;

            $this->workspace_id = $this->user->workspace_id ?? 0;

            View::share("modules", $this->modules);

            if (!$this->user) {
                header("location: " . config("app.url") . "/admin/");
                exit();
            }

            $language = $this->user->language ?? "en";
            \App::setLocale($language);

            return $next($request);
        });
    }
}
