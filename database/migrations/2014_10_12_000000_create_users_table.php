<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->unsigned()->default(70);

            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->boolean('public_email')->default(0);
            $table->string('password');
            $table->integer('login_count')->unsigned()->default(0);
            $table->dateTime('last_login_date')->default('0000-00-00 00:00:00');
            
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            //$table->foreign('role_id')->references('id')->on('roles');
            //->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
