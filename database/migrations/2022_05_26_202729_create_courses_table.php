<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("courses", function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid");
            $table->unsignedInteger("workspace_id");
            $table->unsignedInteger("admin_id")->default(0);
            $table->unsignedInteger("category_id")->default(0);

            $table->unsignedDecimal("price")->nullable();
            $table->unsignedDecimal("price_monthly")->nullable();
            $table->unsignedDecimal("price_yearly")->nullable();
            $table->unsignedDecimal("price_two_years")->nullable();
            $table->unsignedDecimal("price_three_years")->nullable();
            $table->date("deadline")->nullable();
            $table->text("outcomes")->nullable();

            $table->string("language")->nullable();
            $table->string("slug")->nullable();
            $table->text("summary")->nullable();
            $table->string("duration")->nullable();
            $table->string("name");

            $table->text("description")->nullable();
            $table->string("image")->nullable();
            $table->string("video")->nullable();

            $table
                ->enum("certificate", ["No", "Yes", "Optional"])
                ->default("No");
            $table
                ->enum("status", ["Draft", "Published", "Unpublished"])
                ->default("Draft");

            $table
                ->enum("level", ["Beginner", "Intermediate", "Advanced"])
                ->default("Beginner");

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
        Schema::dropIfExists("courses");
    }
}
