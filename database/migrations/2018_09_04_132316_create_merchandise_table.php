<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchandiseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchandise', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('user_id');

            $table->string('status',1)->default('1');

            $table->string('name',80)->nullable();

            $table->string('name_en',80)->nullable();

            $table->text('introduction');

            $table->text('introduction_en');

            $table->string('photo',50)->nullable();

            $table->integer('price')->default(0);

            $table->string('remain_count',1)->default(0);


            $table->timestamps();

            //索引設定
            $table->index(['status'],'merchandise_status_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchandise');
    }
}
