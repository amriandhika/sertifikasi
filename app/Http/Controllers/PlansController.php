<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PlansController extends BaseController
{
    public function calendarAction(Request $request, $action = "")
    {
        if ($this->modules && !in_array("calendar", $this->modules)) {
            abort(401);
        }

        switch ($action) {
            case "":
                $events = Calendar::where(
                    "workspace_id",
                    $this->user->workspace_id
                )->get();

                return \view("plans.calendar", [
                    "selected_navigation" => "calendar",
                    "events" => $events,
                ]);
                break;

            case "event":
                $request->validate([
                    "id" => "nullable|integer",
                ]);

                $event = false;

                if ($request->id) {
                    $event = Calendar::where(
                        "workspace_id",
                        $this->user->workspace_id
                    )
                        ->where("id", $request->id)
                        ->first();
                }

                if ($event) {
                    $date = $event->start_date;
                } else {
                    $date = $request->date ?? date("Y-m-d");
                }

                return \view("plans.event", [
                    "selected_navigation" => "calendar",
                    "event" => $event,
                    "date" => $date,
                ]);
                break;
        }
    }

    public function eventPost(Request $request)
    {
        if ($this->modules && !in_array("calendar", $this->modules)) {
            abort(401);
        }
        $request->validate([
            "title" => "required|max:150",
            "id" => "nullable|integer",
        ]);

        $event = false;

        if ($request->id) {
            $event = Calendar::where("workspace_id", $this->user->workspace_id)
                ->where("id", $request->id)
                ->first();
        }

        if (!$event) {
            $event = new Calendar();
            $event->uuid = Str::uuid();
            $event->workspace_id = $this->user->workspace_id;
        }

        $event->title = $request->title;

        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->description = $request->description;
        $event->save();

        return redirect("/calendar");
    }
}
