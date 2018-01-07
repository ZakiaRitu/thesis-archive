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
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->string('phone_num')->nullable();
            $table->string('interest')->nullable();
            $table->string('status')->nullable(); # STUDENT/FACULTY
            $table->string('designation')->nullable(); #only for teacher
            $table->string('reg_num')->nullable();  #student field
            $table->string('session_year')->nullable();  #student field
            $table->text('bio')->nullable();  #student field
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
