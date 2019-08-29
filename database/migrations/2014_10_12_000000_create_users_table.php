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
            //id
            $table->increments('id');
            //email
            $table->string('email',150);
            //password
            $table->string('hash',60);
            //狀態
            $table->string('status',1,'1');
            //權限
            $table->string('admin',1)->defalut('0');

            $table->string('nickname',50);

            //自動建立create_at,updated_at欄位
            $table->timestamps();

            //唯一鍵(陣列，鍵值名稱)
            $table->unique(['email'],'user_email_uk');
//            $table->unique(['email','transaction_id'],'user_email_uk');
//            //主鍵索引鍵
//            $table->primary(['id'],'user_pk');
            //索引鍵
            $table->index(['nickname'],'user_nickname_idx');
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
