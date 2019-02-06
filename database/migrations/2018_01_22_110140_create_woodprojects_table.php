<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWoodProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('woodprojects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('name');
            $table->text('description');
            $table->string('main_image');
            $table->integer('views')->unsigned()->default(0);
            $table->integer('time_invested')->unsigned()->nullable();;
            $table->integer('price')->unsigned()->nullable();
            $table->string('wood_specie_id')->nullable();
            $table->string('wood_type_id')->nullable();
            $table->integer('width')->unsigned()->nullable();
            $table->integer('depth')->unsigned()->nullable();
            $table->integer('height')->unsigned()->nullable();
            $table->string('stain_type_id')->nullable();
            $table->string('stain_color_id')->nullable();
            $table->string('stain_sheen_id')->nullable();
            $table->string('finish_type_id')->nullable();
            $table->string('finish_sheen_id')->nullable();
            $table->integer('weight')->unsigned()->nullable();
            $table->timestamps();
            $table->dateTime('completed_at')->nullable();

            // Add foreign key in the database manually
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('woodprojects');
    }
}
