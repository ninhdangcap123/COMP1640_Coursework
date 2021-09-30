<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('idea_id')->nullable();
            $table->unsignedInteger('comment_id')->nullable();
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
        Schema::dropIfExists('comment_comments');
    }
}
