<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('workspace_id');
            $table->uuid('uuid');
            $table->unsignedInteger('admin_id')->default(0);
            $table->unsignedInteger('course_id')->default(0);
            $table->string('title')->nullable();
            $table->string('marks')->nullable();
            $table->string('file')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('status',[
                'Draft',
                'Published',
            ])->default('Draft');
            $table->text('description')->nullable();
            $table->text('notes')->nullable();
            $table->longText('message')->nullable();
            $table->text('members')->nullable();
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
        Schema::dropIfExists('assignments');
    }
}
