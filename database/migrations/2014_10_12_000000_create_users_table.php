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
            $table->tinyInteger('status')->default(0)->comment('状态');
            $table->boolean('is_admin')->default(false)->comment('是否管理员');
            $table->enum('email_notify_enabled', ['yes',  'no'])->default('yes')->comment('启用电子邮件通知');
            $table->rememberToken();
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
