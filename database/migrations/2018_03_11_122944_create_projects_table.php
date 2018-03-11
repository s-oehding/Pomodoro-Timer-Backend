<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('note')->nullable();
            $table->integer('client_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->unsigned();
            $table->integer('deleted_by')->unsigned();
        });

        Schema::table('projects', function(Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('deleted_by')->references('id')->on('users');
            $table->foreign('status_id')->references('id')->on('statuses');
        });

        Schema::create('project_user', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('projects');
        Schema::drop('project_user');
    }
}
