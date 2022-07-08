<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->integer('sale');
            $table->dateTime('sale_date');
            $table->unsignedBigInteger('potion_id');
            $table->foreign('potion_id')->references('id')->on('potions')->onDelete('NO ACTION');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('users')->onDelete('NO ACTION');
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
        Schema::table('sales', function (Blueprint $table) {
          $table->dropForeign(['potion_id']);
          $table->dropColumn('potion_id');
          $table->dropForeign(['client_id']);
          $table->dropColumn('client_id');
      });
      Schema::dropIfExists('sales');
    }
}
