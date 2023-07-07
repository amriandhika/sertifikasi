<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("invites", function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid");
            $table->unsignedInteger("student_id")->default(0);
            $table->unsignedInteger("admin_id")->default(0);
            $table->unsignedInteger("course_id")->default(0);
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
        Schema::dropIfExists("invites");
    }
}
