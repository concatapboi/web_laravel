<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('transaction', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('status');
            $table->unsignedInteger('user_id');
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_phone');
            $table->text('payment_info');
            $table->decimal('price');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('user_id')
      ->references('id')->on('users')
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
        Schema::dropIfExists('transaction');
    }
}
