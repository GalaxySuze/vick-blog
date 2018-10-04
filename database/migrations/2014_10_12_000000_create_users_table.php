<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name', 20)->unique()->comment('用户名');
            $table->string('nickname', 20)->nullable()->comment('昵称');
            $table->text('avatar')->nullable()->comment('头像');
            $table->string('email')->unique();
            $table->string('password');
            $table->tinyInteger('status')->default(1)->comment('状态');
            $table->boolean('is_admin')->default(false)->comment('是否管理员');
            $table->boolean('email_notify_enabled')->default(true)->comment('启用电子邮件通知');
            $table->integer('role_id')->default(1)->comment('用户角色');
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
