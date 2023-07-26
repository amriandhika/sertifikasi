<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("lessons", function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("workspace_id");
            $table->unsignedInteger("course_id");
            $table->string("title");
            $table->text("summary")->nullable();
            $table->text("description")->nullable();
            $table->string("image")->nullable();
            $table->string("duration")->nullable();
            $table->string("file")->nullable();
            $table->string("slug")->nullable();
            $table->string("video")->nullable();
            $table->string("youtube_video")->nullable();
            $table->string("vimeo_video")->nullable();
            $table->unsignedInteger("order")->default(0);
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
        Schema::dropIfExists("lessons");
    }
}
