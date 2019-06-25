<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('catalog_id');
            $table->string('name');
            $table->decimal('price');
            $table->integer('discount');
            $table->string('img_link');
            $table->string('img_list');
            $table->integer('amount_view');
            $table->text('content');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('catalog_id')
      ->references('id')->on('catalog')
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
        Schema::dropIfExists('goods');
    }
}
