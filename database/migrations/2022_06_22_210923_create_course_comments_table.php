<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("course_comments", function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid");
            $table->unsignedInteger("visitor_id")->default(0);
            $table->unsignedInteger("admin_id")->default(0);
            $table->unsignedInteger("student_id")->default(0);
            $table->unsignedInteger("agent_id")->default(0);
            $table->unsignedInteger("course_id")->default(0);
            $table->text("message")->nullable();
            $table->enum("type", ["Admin", "Student"]);
            $table->boolean("is_private")->default(0);
            $table->boolean("agent_can_view")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("course_comments");
    }
}
