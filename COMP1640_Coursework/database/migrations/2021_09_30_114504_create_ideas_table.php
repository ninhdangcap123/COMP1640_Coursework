<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdeasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ideas', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('content');
            $table->Integer('thumb_points')->nullable();
            $table->integer('views')->nullable();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('tag_id');
            $table->unsignedInteger('category');
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
        Schema::dropIfExists('ideas');
    }
}
