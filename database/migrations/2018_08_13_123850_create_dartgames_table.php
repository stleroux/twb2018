<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDartGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dartgames', function (Blueprint $table) {
            $table->increments('id');
            $table->text('type');
            $table->integer('t1_players')->unsigned()->comment('Number of players on Team 1');
            $table->integer('t2_players')->unsigned()->comment('Number of players on Team 2');
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
        Schema::dropIfExists('dartgames');
    }
}
