<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nickname', 20)->comment('游客昵称');
            $table->string('email', 30)->comment('游客邮箱');
            $table->text('content')->comment('评论内容');
            $table->unsignedInteger('target')->default(0)->comment('评论目标：0:站内留言, >0:文章，');
            $table->unsignedBigInteger('reply_comment_id')->default(0)->comment('回复的评论');
            $table->tinyInteger('comment_type')->default(1)->comment('评论类型：1 文章评论，2 站内留言');
            $table->string('ip', 50)->comment('ip地址');
            $table->unsignedBigInteger('thumb')->default(0)->comment('赞同数');
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
        Schema::dropIfExists('comments');
    }
}
