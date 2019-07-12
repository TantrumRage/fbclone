<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->text('workplace')->nullable();
            $table->text('edu_degree')->nullable();
            $table->text('edu_school')->nullable();
            $table->text('current_city')->nullable();
            $table->text('hometown')->nullable();
            $table->text('phone')->nullable();
            $table->text('email');
            $table->text('birthday')->nullable();
            $table->text('gender')->nullable();
            $table->text('nickname');
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
        Schema::dropIfExists('profiles');
    }
}
