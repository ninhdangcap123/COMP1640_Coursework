<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email',100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
//            $table->string('dob')->nullable();
//            $table->unsignedInteger('comment_id')->nullable();
            $table->integer('user_role_id')->unsigned()->nullable();
//            $table->foreign('user_role_id')->references('id')->on('user_roles');
            $table->rememberToken();
            $table->unsignedInteger('department_id')->nullable();
            $table->timestamps();

        });
//        Schema::create('users' , function (Blueprint $table){
//           $table->unique(['user_role_id']);
//           $table->foreign('user_role_id')->references('id')->on('user_roles');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
