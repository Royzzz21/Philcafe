<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_replies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comment_srl');
            $table->integer('user_id');
            $table->string('user_name');
            $table->string('email');
            $table->text('content');
            $table->integer('likes')->default(0);
            $table->integer('dislike')->default(0);
            $table->timestamps();


            $table->foreign('comment_srl')->reference('comment_srl')->on('xe_comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_replies');
    }
}
