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
            $table->string('title');
            $table->string('description');
            $table->Integer('thumb_points')->nullable();
            $table->integer('views')->nullable()->default(0);
            $table->uuid('uuid')->nullable();
            $table->unsignedInteger('user_id')->nullable();
//            $table->unsignedInteger('tag_id')->nullable();
            $table->unsignedInteger('category_id')->nullable();
//            $table->unsignedInteger('comment_id')->nullable();
            $table->string('document')->nullable();
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
