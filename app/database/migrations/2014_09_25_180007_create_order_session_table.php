<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderSessionTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('order_session', function(Blueprint $table)
    {
      $table->increments('id');
      $table->timestamp('date');
      $table->timestamp('start');
      $table->timestamp('end');
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
    Schema::drop('order_session');
  }

}
