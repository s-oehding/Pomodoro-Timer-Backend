<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserProfilesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('facebook', 128)->nullable();
            $table->string('twitter', 128)->nullable();
            $table->string('googleplus', 128)->nullable();
            $table->string('linkedin', 128)->nullable();
            $table->text('about')->nullable();
            $table->string('website', 256)->nullable();
            $table->string('phone', 24)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedInteger('deleted_by')->nullable();
        });

        Schema::table('user_profiles', function(Blueprint $table) {
            $table->foreign('id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_profiles');
    }
}
