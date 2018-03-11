<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTasksTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('note', 300)->nullable();
            $table->integer('status_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('project_id')->unsigned()->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->dateTime('completed_on')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedInteger('deleted_by')->nullable();
        });

        Schema::table('tasks', function(Blueprint $table) {
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('user_id')->references('id')->on('users');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tasks');
    }
}
