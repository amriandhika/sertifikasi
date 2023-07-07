<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Setting;

use App\Models\Student;
use App\Models\Workspace;
use Doctrine\Inflector\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SettingController extends BaseController
{
    public function settings()
    {
        $workspace = Workspace::find($this->user->workspace_id);

        return \view("settings.settings", [
            "selected_navigation" => "settings",
            "workspace" => $workspace,
        ]);
    }

    public function settingsPost(Request $request)
    {
        $request->validate([
            "logo" => "nullable|file|mimes:jpg,png",
            "favicon" => "nullable|file|mimes:jpg,png",
            "currency" => "nullable|string|size:3",
            "landingpage" => "nullable",
        ]);

        $workspace = Workspace::find($this->user->workspace_id);

        $workspace->save();

        Setting::updateSettings(
            $this->workspace->id,
            "currency",
            $request->currency
        );
        Setting::updateSettings(
            $this->workspace->id,
            "landingpage",
            $request->landingpage
        );
        Setting::updateSettings(
            $this->workspace->id,
            "custom_script",
            $request->custom_script
        );
        Setting::updateSettings(
            $this->workspace->id,
            "meta_description",
            $request->meta_description
        );

        if ($request->logo) {
            $path = $request->file("logo")->store("media", "uploads");
            Setting::updateSettings($this->workspace->id, "logo", $path);
        }
        if ($request->favicon) {
            $path = $request->file("favicon")->store("media", "uploads");
            Setting::updateSettings($this->workspace->id, "favicon", $path);
        }

        return redirect("/settings");
    }

    public function settingsStore(Request $request, $action)
    {
        switch ($action) {
            case "save-twilio-config":
                $request->validate([
                    "twilio_account_sid" => "required|string",
                    "twilio_api_key" => "required|string",
                    "twilio_api_secret" => "required|string",
                ]);

                Setting::updateSettings(
                    $this->workspace->id,
                    "twilio_account_sid",
                    $request->twilio_account_sid
                );
                Setting::updateSettings(
                    $this->workspace->id,
                    "twilio_api_key",
                    $request->twilio_api_key
                );
                Setting::updateSettings(
                    $this->workspace->id,
                    "twilio_api_secret",
                    $request->twilio_api_secret
                );

                return redirect("/settings");

                break;

            case "save-pusher-config":
                $request->validate([
                    "pusher_app_id" => "required|string",
                    "pusher_app_key" => "required|string",
                    "pusher_app_secret" => "required|string",
                    "pusher_app_cluster" => "required|string",
                ]);

                Setting::updateSettings(
                    $this->workspace->id,
                    "pusher_app_id",
                    $request->pusher_app_id
                );
                Setting::updateSettings(
                    $this->workspace->id,
                    "pusher_app_key",
                    $request->pusher_app_key
                );
                Setting::updateSettings(
                    $this->workspace->id,
                    "pusher_app_secret",
                    $request->pusher_app_secret
                );
                Setting::updateSettings(
                    $this->workspace->id,
                    "pusher_app_cluster",
                    $request->pusher_app_cluster
                );

                return redirect("/settings");

                break;

            case "save-recaptcha-config":
                $request->validate([
                    "recaptcha_api_key" => "required|string",
                    "recaptcha_api_secret" => "required|string",
                ]);

                $config_recaptcha_in_user_login = $request->config_recaptcha_in_user_login
                    ? 1
                    : 0;
                $config_recaptcha_in_admin_login = $request->config_recaptcha_in_admin_login
                    ? 1
                    : 0;
                $config_recaptcha_in_user_signup = $request->config_recaptcha_in_user_signup
                    ? 1
                    : 0;

                Setting::updateSettings(
                    $this->workspace->id,
                    "recaptcha_api_key",
                    $request->recaptcha_api_key
                );
                Setting::updateSettings(
                    $this->workspace->id,
                    "recaptcha_api_secret",
                    $request->recaptcha_api_secret
                );
                Setting::updateSettings(
                    $this->workspace->id,
                    "config_recaptcha_in_user_login",
                    $config_recaptcha_in_user_login
                );
                Setting::updateSettings(
                    $this->workspace->id,
                    "config_recaptcha_in_admin_login",
                    $config_recaptcha_in_admin_login
                );
                Setting::updateSettings(
                    $this->workspace->id,
                    "config_recaptcha_in_user_signup",
                    $config_recaptcha_in_user_signup
                );

                return redirect("/settings");

                break;
        }
    }
}
