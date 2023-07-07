<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("job_applications");
    }
}
