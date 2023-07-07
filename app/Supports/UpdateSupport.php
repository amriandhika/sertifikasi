<?php
namespace App\Supports;
use App\Models\Blog;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class UpdateSupport
{
    public static function updateSchema()
    {
        try {
            if (!Schema::hasColumn("lessons", "duration")) {
                Schema::table("lessons", function (Blueprint $table) {
                    $table->string("duration")->nullable();
                    $table->string("file")->nullable();
                    $table->string("slug");
                });
                $lessons = Lesson::all();

                foreach ($lessons as $lesson) {
                    $lesson->slug = Str::slug($lesson->name);
                    $lesson->save();
                }
            }
            if (!Schema::hasColumn("lessons", "summary")) {
                Schema::table("lessons", function (Blueprint $table) {
                    $table->text("summary")->nullable();
                });
                //                $lessons = Lesson::all();
                //
                //                foreach ($lessons as $lesson) {
                //                    $lesson->slug = Str::slug($lesson->name);
                //                    $lesson->save();
                //                }
            }
            if (!Schema::hasColumn("courses", "slug")) {
                Schema::table("courses", function (Blueprint $table) {
                    $table->string("slug");
                });

                $courses = Course::all();

                foreach ($courses as $course) {
                    $course->slug = Str::slug($course->name);
                    $course->save();
                }
            }
            if (!Schema::hasColumn("users", "description")) {
                Schema::table("users", function (Blueprint $table) {
                    $table->string("description");
                    $table->string("timezone")->nullable();
                });
            }
            if (!Schema::hasColumn("blogs", "slug")) {
                Schema::table("blogs", function (Blueprint $table) {
                    $table->string("slug");
                });

                $blogs = Blog::all();

                foreach ($blogs as $blog) {
                    $blog->slug = Str::slug($blog->name);
                    $blog->save();
                }
            }
            if (!Schema::hasTable("job_applications")) {
                Schema::create("job_applications", function (Blueprint $table) {
                    $table->id();
                    $table->uuid("uuid");
                    $table->unsignedInteger("student_id")->default(0);

                    $table->unsignedInteger("job_id")->default(0);
                    $table->string("first_name")->nullable();
                    $table->string("last_name")->nullable();
                    $table->string("email")->nullable();
                    $table->string("phone")->nullable();
                    $table->text("description")->nullable();
                    $table->string("cover_letter")->nullable();
                    $table->string("resume")->nullable();
                    $table->timestamps();
                });
            }

            if (!Schema::hasTable("product_categories")) {
                Schema::create("product_categories", function (
                    Blueprint $table
                ) {
                    $table->id();
                    $table->string("name");
                    $table->string("slug")->nullable();
                    $table->unsignedSmallInteger("sort_order")->default(0);
                    $table->text("description")->nullable();
                    $table->timestamps();
                });
            }

            if (!Schema::hasColumn("users", "uuid")) {
                Schema::table("users", function (Blueprint $table) {
                    $table
                        ->uuid("uuid")
                        ->after("id")
                        ->nullable();
                });

                $users = User::all();
                foreach ($users as $user) {
                    $user->uuid = Str::uuid();
                    $user->save();
                }
            }

            if (!Schema::hasColumn("lessons", "youtube_video")) {
                Schema::table("lessons", function (Blueprint $table) {
                    $table->string("youtube_video")->nullable();
                    $table->string("vimeo_video")->nullable();
                });
            }
            if (!Schema::hasTable("cookie_policies")) {
                Schema::create("cookie_policies", function (Blueprint $table) {
                    $table->id();
                    $table->unsignedInteger("admin_id")->default(0);
                    $table->string("title")->nullable();
                    $table->date("date")->nullable();
                    $table->text("description")->nullable();
                    $table->timestamps();
                });
            }

            if (!Schema::hasColumn("students", "uuid")) {
                Schema::table("students", function (Blueprint $table) {
                    $table
                        ->uuid("uuid")
                        ->after("id")
                        ->nullable();
                });

                $students = Student::all();
                foreach ($students as $student) {
                    $student->uuid = Str::uuid();
                    $student->save();
                }
            }

            if (!Schema::hasTable("quizzes")) {
                Schema::create("quizzes", function (Blueprint $table) {
                    $table->id();
                    $table->unsignedInteger('lesson_id')->nullable();
                    $table->unsignedInteger('user_id')->nullable();
                    $table->text('title')->nullable();
                    $table->text('description')->nullable();
                    $table->string('slug')->nullable();
                    $table->string('type')->nullable();
                    $table->string('status')->nullable();
                    $table->string('image')->nullable();
                    $table->string('video')->nullable();
                    $table->string('audio')->nullable();
                    $table->unsignedInteger('sort_order')->default(0);
                    $table->timestamps();
                });
            }

            if (!Schema::hasTable("quiz_answers")) {


                Schema::create("quiz_answers", function (Blueprint $table) {
                    $table->id();
                    $table->unsignedInteger('quiz_id');
                    $table->unsignedInteger('lesson_id');
                    $table->text('answer')->nullable();
                    $table->boolean('is_correct')->default(false);
                    $table->unsignedInteger('sort_order')->default(0);
                    $table->timestamps();
                });

                Schema::create("lesson_completes", function (Blueprint $table) {
                    $table->id();
                    $table->unsignedInteger('lesson_id');
                    $table->unsignedInteger('course_id')->default(0);
                    $table->unsignedInteger('student_id');
                    $table->timestamps();
                });

            }

            if (!Schema::hasColumn("quizzes", "mark")) {

                Schema::table("quizzes", function (Blueprint $table) {
                    $table
                        ->unsignedInteger("mark")
                        ->after("description")
                        ->nullable();
                });

                Schema::table("courses", function (Blueprint $table) {
                    $table
                        ->boolean('is_free')
                        ->after("category_id")
                        ->default(0);
                    $table->boolean('is_featured')
                        ->after("level")
                        ->default(0);
                    $table->unsignedInteger('duration_seconds')
                        ->after("duration")
                        ->default(0);
                    $table->longText('certificate_template')
                        ->after("description")
                        ->nullable();
                    $table->string('certificate_title')
                        ->after("certificate_template")
                        ->nullable();
                    $table->string('certificate_subtitle')
                        ->after("certificate_title")
                        ->nullable();
                    $table->text('certificate_description')
                        ->after("certificate_subtitle")
                        ->nullable();
                    $table->string('certificate_footer')
                        ->after("certificate_description")
                        ->nullable();
                    $table->string('certificate_background')
                        ->after("certificate_footer")
                        ->nullable();
                });

                Schema::table("lessons", function (Blueprint $table) {
                    $table
                        ->boolean('is_free')
                        ->after('order')
                        ->default(0);
                    $table->unsignedInteger('duration_seconds')
                        ->after('duration')
                        ->default(0);
                });

            }

            if (!Schema::hasTable("quiz_attempts")) {

                Schema::create("quiz_attempts", function (Blueprint $table) {
                    $table->id();
                    $table->unsignedInteger('lesson_id')->default(0);
                    $table->unsignedInteger('course_id')->default(0);
                    $table->unsignedInteger('student_id')->default(0);
                    $table->unsignedInteger('total_quiz_questions')->default(0);
                    $table->unsignedInteger('total_answers_given')->default(0);
                    $table->unsignedInteger('total_correct_answers')->default(0);
                    $table->unsignedInteger('total_skipped_questions')->default(0);
                    $table->unsignedInteger('total_obtained_marks')->default(0);
                    $table->timestamps();
                });

                Schema::table("certificate_receives", function (Blueprint $table) {
                    $table->unsignedInteger('course_id')
                        ->after('student_id')
                        ->default(0);
                });

            }


        } catch (\Exception $e) {
            ray($e->getMessage());
            return false;
        }
    }
}
