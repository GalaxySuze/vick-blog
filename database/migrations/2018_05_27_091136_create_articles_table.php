<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 80)->index()->comment('文章标题');
            $table->text('content')->nullable()->comment('文章内容');
            $table->text('original_content')->nullable()->comment('原始文章内容');
            $table->text('page_image')->nullable()->comment('封面');
            $table->string('desc')->default('')->comment('文章描述');
            $table->string('link')->nullable()->comment('链接');
            $table->tinyInteger('status')->default(0)->comment('文章状态：0 草稿 1 正常 2 置顶');
            $table->boolean('is_original')->default(false)->comment('是否原创');
            $table->unsignedInteger('user_id')->index()->comment('用户id');
            $table->unsignedInteger('category')->default(0)->comment('文章类别');
            $table->json('label')->nullable()->comment('文章标签');
            $table->unsignedInteger('views')->default(0)->comment('浏览量');
            $table->date('release_time')->nullable()->comment('发布时间');
            $table->unsignedInteger('share')->default(0)->comment('分享数');
            $table->string('keyword')->default('')->comment('文章关键词');
            $table->json('outline')->nullable()->comment('文章大纲');
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
        Schema::dropIfExists('articles');
    }
}
