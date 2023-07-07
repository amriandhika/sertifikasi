<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class AppRouteController extends Controller
{
    protected $user = null;
    protected $settings;
    protected $base_url;
    protected $plugin_directory;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->base_url = config("app.url");
            $this->settings = config("settings");
            View::share("settings", $this->settings);
            View::share("base_url", $this->base_url);
            return $next($request);
        });
    }

    public function handle(Request $request, $plugin, $method = "", $page = "")
    {
        $plugin_class = $plugin . "Controller";
        $plugin_class = ucfirst($plugin_class);
        $this->plugin_directory = base_path("plugins/" . $plugin);
        $plugin_controller_file_path =
            $this->plugin_directory . "/" . $plugin_class . ".php";


        if (file_exists($plugin_controller_file_path)) {
            View::addNamespace($plugin, $this->plugin_directory . "/views");

            require $plugin_controller_file_path;

            $plugin_controller = new $plugin_class();

            $method = Str::camel($method);

            if (method_exists($plugin_controller, $method)) {
                return $plugin_controller->$method($request, $page);
            }

        } else {
            abort(404);
        }
    }

    public function store(Request $request, $plugin, $method = "", $page = "")
    {
        $plugin_class = $plugin . "Controller";
        $plugin_class = ucfirst($plugin_class);
        $this->plugin_directory = base_path("plugins/" . $plugin);
        $plugin_controller_file_path =
            $this->plugin_directory . "/" . $plugin_class . ".php";

        if (file_exists($plugin_controller_file_path)) {
            View::addNamespace($plugin, $this->plugin_directory . "/views");

            require $plugin_controller_file_path;

            $plugin_controller = new $plugin_class();

            $method = $method . "Store";
            $method = Str::camel($method);

            if (method_exists($plugin_controller, $method)) {
                return $plugin_controller->$method($request, $page);
            }
        } else {
            abort(404);
        }
    }
}
