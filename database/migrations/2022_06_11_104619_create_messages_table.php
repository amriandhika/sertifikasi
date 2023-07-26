<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('admin_id')->default(0);
            $table->text('contents')->nullable();
            $table->text('message')->nullable();
            $table->enum('type',[
                'Admin',
                'Student',
            ]);
            $table->unsignedInteger('from_id')->nullable();
            $table->unsignedInteger('student_id')->nullable();
            $table->unsignedInteger('to_id')->nullable();
            $table->dateTime('time')->nullable();
            $table->boolean('read')->nullable();
            $table->boolean('sent')->nullable();
            $table->string('attachment_path')->nullable();

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
        Schema::dropIfExists('messages');
    }
}
