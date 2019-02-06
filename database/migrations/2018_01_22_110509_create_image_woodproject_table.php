<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageWoodProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_woodproject', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('wood_project_id')->unsigned()->nullable();
            $table->string('ori_name');
            $table->string('new_name');
            $table->string('size');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('image_woodproject');
    }
}
