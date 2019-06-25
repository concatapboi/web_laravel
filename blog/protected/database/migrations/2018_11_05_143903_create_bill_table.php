<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bill', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->unsignedInteger('trans_id');
            $table->unsignedInteger('goods_id');
            $table->text('content');
            $table->integer('amount');
            $table->decimal('price');
            $table->tinyInteger('status');
            $table->rememberToken();
            $table->timestamps();            
            $table->foreign('trans_id')
      ->references('id')->on('transaction')
      ->onDelete('cascade');
      $table->foreign('goods_id')
      ->references('id')->on('goods')
      ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('bill');
    }
}
