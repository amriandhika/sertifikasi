<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_submissions', function (Blueprint $table) {
            $table->id();

            $table->uuid('uuid');
            $table->unsignedInteger('admin_id')->default(0);
            $table->unsignedInteger('course_id')->default(0);
            $table->unsignedInteger('assignment_id')->default(0);
            $table->unsignedInteger('student_id')->default(0);
            $table->string('title')->nullable();
            $table->string('marks')->nullable();
            $table->string('file')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('status',[
                'Marked',
                'Unmarked',
            ])->default('Marked');
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
        Schema::dropIfExists('assignment_submissions');
    }
}
