<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePomodorosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pomodoros', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('status_id')->unsigned();
            $table->integer('task_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('deleted_by')->unsigned()->nullable();
        });

        Schema::table('pomodoros', function($table) {
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pomodoros');
    }
}
