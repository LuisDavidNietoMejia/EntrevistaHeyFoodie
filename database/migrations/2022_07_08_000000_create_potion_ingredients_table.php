<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePotionIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('potion_ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('amount');
            $table->integer('price');
            $table->unsignedBigInteger('potion_id');
            $table->foreign('potion_id')->references('id')->on('potions')->onDelete('NO ACTION');
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
        Schema::table('potion_ingredients', function (Blueprint $table) {
          $table->dropForeign(['potion_id']);
          $table->dropColumn('potion_id');
      });
      Schema::dropIfExists('potion_ingredients');
    }
}
