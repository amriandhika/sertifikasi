<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("products", function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid");
            $table->unsignedInteger("workspace_id");
            $table->unsignedInteger("admin_id");
            $table->unsignedInteger("category_id")->default(0);
            $table->unsignedInteger("course_id")->default(0);
            $table->unsignedInteger("lesson_id")->default(0);
            $table->unsignedDecimal("price")->nullable();
            $table->text("outcomes")->nullable();
            $table->string("language")->nullable();
            $table->text("summary")->nullable();
            $table->string("name");
            $table->string("author_name");
            $table->string("author_photo")->nullable();
            $table->text("description")->nullable();
            $table->text("author_description")->nullable();
            $table->string("image")->nullable();
            $table->string("slug")->nullable();
            $table->string("file")->nullable();
            $table->string("video")->nullable();
            $table
                ->enum("type", ["Subscription", "Free", "Onetime"])
                ->default("Free");

            $table
                ->enum("status", ["Draft", "Publish", "Unpublished"])
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
        Schema::dropIfExists("products");
    }
}
