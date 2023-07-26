<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificate_templates', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedInteger('admin_id')->default(0);
            $table->unsignedInteger('workspace_id')->default(0);
            $table->unsignedInteger('course_id')->default(0);
            $table->string('title')->nullable();
            $table->string('signature')->nullable();
            $table->string('logo')->nullable();
            $table->string('border_color')->nullable();
            $table->string('background_color')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('certificate_templates');
    }
}
