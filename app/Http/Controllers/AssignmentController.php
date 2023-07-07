<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\AssignmentMark;
use App\Models\AssignmentSubmission;
use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AssignmentController extends BaseController
{
    public function assignments()
    {
        $assignments = Assignment::where(
            "workspace_id",
            $this->user->workspace_id
        )->get();

        $students = Student::all()
            ->keyBy("id")
            ->all();
        $courses = Course::all()
            ->keyBy("id")
            ->all();

        return \view("assignments.assignments", [
            "selected_navigation" => "assignments",
            "assignments" => $assignments,
            "students" => $students,
            "courses" => $courses,
        ]);
    }
    public function createAssignment(Request $request)
    {
        $request->validate([
            "id" => "nullable|integer",
        ]);

        $assignment = false;
        $members = [];

        if ($request->id) {
            $assignment = Assignment::find($request->id);
        }

        $students = Student::all()
            ->keyBy("id")
            ->all();
        $courses = Course::all()
            ->keyBy("id")
            ->all();

        if ($assignment && $assignment->members) {
            $members = json_decode($assignment->members, true);
        }

        return \view("assignments.create-assignment", [
            "selected_navigation" => "assignments",
            "assignment" => $assignment,
            "students" => $students,
            "courses" => $courses,
            "members" => $members,
        ]);
    }

    public function viewAssignment(Request $request)
    {
        $request->validate([
            "id" => "required|integer",
            "submission_id" => "nullable|integer",
        ]);

        $assignment = Assignment::find($request->id);

        $users = User::all()
            ->keyBy("id")
            ->all();

        $students = Student::all()
            ->keyBy("id")
            ->all();

        $student_submissions = AssignmentSubmission::where(
            "assignment_id",
            $assignment->id
        )
            ->get()
            ->keyBy("id")
            ->all();

        return \view("assignments.view-assignment", [
            "selected_navigation" => "assignments",
            "assignment" => $assignment,
            "student_submissions" => $student_submissions,

            "students" => $students,
            "users" => $users,
        ]);
    }

    public function checkAssignment(Request $request)
    {
        $request->validate([
            "id" => "required|integer",
        ]);

        $assignment_submission = AssignmentSubmission::find($request->id);

        if ($assignment_submission) {
            $assignment = Assignment::find(
                $assignment_submission->assignment_id
            );

            if ($assignment) {
                $assignment_mark = AssignmentMark::find($assignment->id);

                return \view("assignments.check-assignment", [
                    "selected_navigation" => "assignments",
                    "assignment_submission" => $assignment_submission,
                    "assignment_mark" => $assignment_mark,
                ]);
            }
        }

        abort(404);
    }

    public function assignmentPost(Request $request)
    {
        $request->validate([
            "title" => "required|max:150",
            "id" => "nullable|integer",
            "members" => "required",
            "status" => "nullable|boolean",
        ]);

        $status = "Draft";

        if ($request->status) {
            $status = "Published";
        }

        $assignment = false;
        $members = [];
        if ($request->members) {
            $members = json_encode($request->members);
        }

        if ($request->id) {
            $assignment = Assignment::where(
                "workspace_id",
                $this->user->workspace_id
            )
                ->where("id", $request->id)
                ->first();
        }

        if (!$assignment) {
            $assignment = new Assignment();
            $assignment->uuid = Str::uuid();
            $assignment->workspace_id = $this->user->workspace_id;
        }

        $assignment->title = $request->title;
        $assignment->start_date = $request->start_date;
        $assignment->end_date = $request->end_date;
        $assignment->course_id = $request->course_id;
        $assignment->marks = $request->marks;
        $assignment->members = $members;
        $assignment->status = $status;
        $assignment->description = clean($request->description);
        $assignment->save();

        return redirect("/assignments");
    }

    public function assignmentMarkPost(Request $request)
    {
        $request->validate([
            "id" => "nullable|integer",
        ]);

        $assignment_mark = false;

        if ($request->id) {
            $assignment_mark = AssignmentMark::where(
                "id",
                $request->id
            )->first();
        }

        if (!$assignment_mark) {
            $assignment_mark = new AssignmentMark();
            $assignment_mark->uuid = Str::uuid();
        }

        $assignment_mark->marks = $request->marks;
        $assignment_mark->assignment_id = $request->assignment_id;

        $assignment_mark->admin_id = $this->user->id;
        $assignment_mark->student_id = $request->student_id;
        $assignment_mark->comments = clean($request->comments);
        $assignment_mark->save();

        return redirect()->back();
    }
}
