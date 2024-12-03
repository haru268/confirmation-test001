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
            $table->id();// 主キー
            $table->string('name');// ユーザー名
            $table->string('email')->unique();// メールアドレス (一意)
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');// パスワード
            $table->rememberToken();
            $table->timestamps();// 作成日時と更新日時
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
