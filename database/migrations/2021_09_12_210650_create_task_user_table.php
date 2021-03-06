<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_user', function (Blueprint $table) {
            $table->id();

            // $table->integer('user_id')->unsigned();
            // $table->foreign('user_id')->references('id')->on('users');

            // $table->integer('task_id')->unsigned();
            // $table->foreign('task_id')->references('id')->on('tasks');

            $table->integer('task_id')->constrained()->onDelete('cascade');
            $table->integer('user_id')->constrained()->onDelete('cascade');
            $table->integer('asigned_id')->constrained()->onDelete('cascade')->nullable();
            $table->timestamps();

            // $table->unsignedBigInteger('task_id');
            // $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade')->onUpdate('cascade');

            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            // $table->primary(['task_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_user');
    }
}
