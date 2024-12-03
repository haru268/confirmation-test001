<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id(); // 主キー
            $table->unsignedBigInteger('category_id'); // 外部キー
            $table->string('first_name'); // 姓
            $table->string('last_name');  // 名
            $table->tinyInteger('gender'); // 性別（1:男性, 2:女性, 3:その他）
            $table->string('email'); // メールアドレス
            $table->string('tel');   // 電話番号
            $table->string('address'); // 住所
            $table->string('building')->nullable(); // 建物名 (任意)
            $table->text('detail'); // お問い合わせ内容
            $table->timestamps(); // 作成日時と更新日時
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
