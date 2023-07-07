<?php

namespace App\Http\Controllers;

use App\Models\Course;

use App\Models\CourseCategory;
use App\Models\CourseComment;
use App\Models\Lesson;
use App\Models\Product;
use App\Models\Quiz;
use App\Models\QuizAnswer;
use App\Models\Student;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CourseController extends BaseController
{
    public function courses()
    {
        $courses = Course::all();
        $categories = CourseCategory::all()
            ->keyBy("id")
            ->all();

        return \view("admin.courses", [
            "selected_navigation" => "courses",
            "courses" => $courses,
            "categories" => $categories,
        ]);
    }
    public function lessons(Request $request)
    {
        $course = false;
        if ($request->id) {
            $course = Course::where("workspace_id", $this->user->workspace_id)
                ->where("id", $request->id)
                ->first();
        }
        $categories = CourseCategory::all()
            ->keyBy("id")
            ->all();
        $lessons = Lesson::where("course_id", $request->id)->get();

        return \view("lessons.lessons", [
            "selected_navigation" => "courses",
            "course" => $course,
            "categories" => $categories,
            "lessons" => $lessons,
        ]);
    }

    public function createCourse(Request $request)
    {
        $course = false;
        $outcomes = [];

        if ($request->id) {
            $course = Course::find($request->id);

            if ($course->outcomes) {
                $outcomes = json_decode($course->outcomes);
            }
        }

        $categories = CourseCategory::all();
        $lessons = Lesson::all();

        return \view("admin.create-course", [
            "selected_navigation" => "courses",
            "course" => $course,
            "categories" => $categories,
            "lesson" => $lessons,
            "outcomes" => $outcomes,
        ]);
    }

    public function coursePost(Request $request)
    {
        $request->validate([
            "name" => "required|max:150",
            "id" => "nullable|integer",
            "slug" => ["required", "max:150"],
            "image" => "nullable|file|mimes:jpeg,png,jpg,gif,svg",
            "certificate_background" => "nullable|file|mimes:jpeg,png,jpg,gif,svg",
            "outcomes" => "nullable|array",
            "video" =>
                "nullable|mimes:mp4,mov,ogg,qt,mp3,wav,flac,aac,wma,wmv,webm",
        ]);

        $course = false;

        if ($request->id) {
            $course = Course::where("workspace_id", $this->user->workspace_id)
                ->where("id", $request->id)
                ->first();
        }

        if (!$course) {
            $request->validate([
                "slug" => ["unique:courses,slug"],
            ]);

            $course = new Course();
            $course->uuid = Str::uuid();
            $course->workspace_id = $this->user->workspace_id;
        }
        $cover_path = null;

        if ($request->image) {
            $cover_path = $request->file("image")->store("media", "uploads");
        }

        if($request->certificate_background)
        {
            $certificate_background_path = $request->file("certificate_background")->store("media", "uploads");
            $course->certificate_background = $certificate_background_path;
        }

        if (!empty($cover_path)) {
            $course->image = $cover_path;
        }

        $video_path = null;

        if ($request->video) {
            $video_path = $request->file("video")->store("media", "uploads");
        }

        if (!empty($video_path)) {
            $course->video = $video_path;
        }
        $outcomes = [];

        foreach ($request->outcomes as $outcome) {
            if (!empty($outcome)) {
                $outcomes[] = $outcome;
            }
        }

        if (!empty($outcomes)) {
            $course->outcomes = json_encode($outcomes);
        }

        $duration_seconds = 0;

        if ($request->duration) {
            //Convert hh:mm:ss to seconds
            $duration_a = explode(":", $request->duration);

            if(count($duration_a) == 2) {
                $duration_seconds = $duration_a[0] * 60 + $duration_a[1];
            } else if(count($duration_a) == 3) {
                $duration_seconds = $duration_a[0] * 3600 + $duration_a[1] * 60 + $duration_a[2];
            }
            else{
                $duration_seconds = $duration_a[0];
            }
        }

        $course->name = $request->name;
        $course->price = $request->price;
        $course->slug = $request->slug;
        $course->level = $request->level;
        $course->status = $request->status;
        $course->certificate = $request->certificate;
        $course->deadline = $request->deadline;
        $course->duration = $request->duration;
        $course->duration_seconds = $duration_seconds;
        $course->admin_id = $this->user->id;
        $course->category_id = $request->category_id;
        $course->summary = clean($request->summary);
        $course->description = clean($request->description);
        $course->is_free = $request->is_free ? 1 : 0;
        $course->save();

        return redirect("/create-course?id=" . $course->id);
    }

    public function viewCourse(Request $request)
    {
        $course = false;
        $users = User::all()
            ->keyBy("id")
            ->all();
        $lessons = Lesson::where("course_id", $request->id)->get();

        if ($request->id) {
            $course = Course::where("workspace_id", $this->user->workspace_id)
                ->where("id", $request->id)
                ->first();
        }
        $categories = CourseCategory::all()
            ->keyBy("id")
            ->all();
        $total_lessons = Lesson::where("course_id", $request->id)->count();

        return \view("admin.view-course", [
            "selected_navigation" => "courses",
            "course" => $course,
            "users" => $users,
            "categories" => $categories,
            "lessons" => $lessons,
            "total_lessons" => $total_lessons,
        ]);
    }
    public function courseDiscussion(Request $request)
    {
        $course = false;
        $users = User::all()
            ->keyBy("id")
            ->all();
        $lessons = Lesson::where("course_id", $request->id)->get();

        if ($request->id) {
            $course = Course::where("workspace_id", $this->user->workspace_id)
                ->where("id", $request->id)
                ->first();
        }
        $categories = CourseCategory::all()
            ->keyBy("id")
            ->all();
        $students = Student::all()
            ->keyBy("id")
            ->all();
        $total_lessons = Lesson::where("course_id", $request->id)->count();

        $comments = CourseComment::where("course_id", $request->id)
            //            ->where("workspace_id", $this->user->workspace_id)
            ->get();

        return \view("admin.course-discussions", [
            "selected_navigation" => "courses",
            "course" => $course,
            "users" => $users,
            "categories" => $categories,
            "lessons" => $lessons,
            "comments" => $comments,
            "students" => $students,
            "total_lessons" => $total_lessons,
        ]);
    }

    public function categories()
    {
        $users = User::all();
        $categories = CourseCategory::all();

        $workspaces = Workspace::all()
            ->keyBy("id")
            ->all();

        return \view("admin.course-categories", [
            "selected_navigation" => "course-categories",
            "users" => $users,
            "categories" => $categories,
            "workspaces" => $workspaces,
        ]);
    }

    public function categoryPost(Request $request)
    {
        $request->validate([
            "name" => "required|max:150",
            "category_id" => "nullable|integer",
        ]);

        $category = false;

        if ($request->category_id) {
            $category = CourseCategory::find($request->category_id);
        }

        if (!$category) {
            $category = new CourseCategory();
        }

        $category->name = $request->name;

        $category->save();

        return redirect()->back();
    }
    public function categoryEdit(Request $request)
    {
        $request->validate([
            "id" => "required|integer",
        ]);

        $category = CourseCategory::find($request->id);

        if ($category) {
            return response($category);
        }
    }

    public function createLesson(Request $request)
    {
        $request->validate([
            "id" => "nullable|integer",
            "course_id" => "required|integer",
        ]);

        $course = false;
        $lesson = false;

        if ($request->course_id) {
            $course = Course::find($request->course_id);
        }
        if ($request->id) {
            $lesson = Lesson::find($request->id);
        }
        $categories = CourseCategory::all();

        $quizzes = [];
        $answers = [];

        if(config('app.has_quizzes')){
            if($lesson)
            {
                $quizzes = Quiz::where('lesson_id', $lesson->id)->get();
                $answers = QuizAnswer::where('lesson_id', $lesson->id)->get()->groupBy('quiz_id')->all();
            }
        }

        return \view("lessons.create-lesson", [
            "selected_navigation" => "courses",
            "course" => $course,
            "categories" => $categories,
            "lesson" => $lesson,
            "quizzes" => $quizzes,
            "answers" => $answers,
        ]);
    }

    public function lessonPost(Request $request)
    {
        $request->validate([
            "title" => "required|max:150",
            "id" => "nullable|integer",
            "course_id" => "required|integer",
            "slug" => ["required", "max:150", "unique:courses,slug"],
            "file" => "nullable|file|mimes:pdf,doc,docx,txt,rtf",
            "video" =>
                "nullable|mimes:mp4,mov,ogg,qt,mp3,wav,flac,aac,wma,wmv,webm",
            "youtube_video" => "nullable|string",
            "vimeo_video" => "nullable|string",
        ]);

        $course_id = $request->course_id;

        $lesson = false;

        if ($request->id) {
            $lesson = Lesson::where("workspace_id", $this->user->workspace_id)
                ->where("id", $request->id)
                ->first();
        }

        if (!$lesson) {
            $lesson = new Lesson();

            $lesson->workspace_id = $this->user->workspace_id;
        }
        $cover_path = null;

        if ($request->video) {
            $cover_path = $request->file("video")->store("media", "uploads");
        }

        if (!empty($cover_path)) {
            $lesson->video = $cover_path;
        }
        $path = null;
        if ($request->file) {
            $path = $request->file("file")->store("media", "uploads");
        }
        if (!empty($path)) {
            $lesson->file = $path;
        }

        $duration_seconds = 0;

        if ($request->duration) {
            //Convert hh:mm:ss to seconds
            $duration_a = explode(":", $request->duration);

            if(count($duration_a) == 2) {
                $duration_seconds = $duration_a[0] * 60 + $duration_a[1];
            } else if(count($duration_a) == 3) {
                $duration_seconds = $duration_a[0] * 3600 + $duration_a[1] * 60 + $duration_a[2];
            }
            else{
                $duration_seconds = $duration_a[0];
            }
        }

        $duration_seconds = (int) $duration_seconds;

        $lesson->title = $request->title;
        $lesson->duration = $request->duration;
        $lesson->duration_seconds = $duration_seconds;
        $lesson->slug = $request->slug;
        $lesson->course_id = $request->course_id;
        $lesson->youtube_video = $request->youtube_video;
        $lesson->vimeo_video = $request->vimeo_video;
        $lesson->summary = clean($request->summary);
        $lesson->description = clean($request->description);
        $lesson->save();

        $lesson_id = $lesson->id;

       // ray($request->all());

        if(config('app.has_quizzes')){

            if($request->add_quiz)
            {
                $quiz = new Quiz();
                $quiz->lesson_id = $lesson_id;
                $quiz->save();

                $quiz_id = $quiz->id;

                // Add 4 quiz answers

                for($i = 0; $i < 4; $i++)
                {
                    $quiz_answer = new QuizAnswer();
                    $quiz_answer->quiz_id = $quiz_id;
                    $quiz_answer->lesson_id = $lesson_id;
                    $quiz_answer->save();
                }

            }

            if($request->delete_quiz)
            {
                $quiz = Quiz::find($request->delete_quiz);
                if($quiz)
                {
                    QuizAnswer::where('quiz_id', $quiz->id)->delete();
                    $quiz->delete();
                }
            }

            if($request->quiz_title)
            {
                foreach ($request->quiz_title as $key => $value) {
                    $quiz = Quiz::find($key);
                    if($quiz)
                    {
                        $quiz->title = $value;
                        $quiz->save();
                    }
                }
            }

            if($request->quiz_answer)
            {
                foreach ($request->quiz_answer as $key => $value) {
                    $quiz_answer = QuizAnswer::find($key);
                    if($quiz_answer)
                    {
                        $quiz_answer->answer = $value;
                        $quiz_answer->save();
                    }
                }
            }

          //  ray($request->quiz_correct);

            if($request->quiz_correct)
            {
                foreach ($request->quiz_correct as $quiz_id => $answer_id) {
                    $quiz_answers = QuizAnswer::where('quiz_id', $quiz_id)->get();
                    foreach($quiz_answers as $quiz_answer)
                    {
                        if($quiz_answer->id == $answer_id)
                        {
                            $quiz_answer->is_correct = 1;
                        }
                        else
                        {
                            $quiz_answer->is_correct = 0;
                        }
                        $quiz_answer->save();
                    }
                }
            }

            if($request->quiz_mark)
            {
                foreach ($request->quiz_mark as $key => $value) {
                    $quiz = Quiz::find($key);
                    if($quiz)
                    {
                        $quiz->mark = $value;
                        $quiz->save();
                    }
                }
            }


        }

        return redirect("/create-lesson?course_id=$course_id&id=$lesson_id");
    }

    public function viewLesson(Request $request)
    {
        $users = User::all()
            ->keyBy("id")
            ->all();

        $lesson = false;

        if ($request->id) {
            $lesson = Lesson::find($request->id);
        }

        $lessons = Lesson::where("course_id", $lesson->course_id)->get();

        $categories = CourseCategory::all()
            ->keyBy("id")
            ->all();

        return \view("lessons.view-lesson", [
            "selected_navigation" => "courses",

            "users" => $users,
            "categories" => $categories,
            "lessons" => $lessons,
            "lesson" => $lesson,
        ]);
    }
}
