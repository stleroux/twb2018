<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Profiles table will store info/settings that users can modify themselves
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('telephone')->nullable();
            $table->string('image')->nullable();
            $table->string('frontendStyle')->default('slate');
            $table->string('backendStyle')->default('bootstrap');
            $table->integer('date_format')->default(1);
            $table->string('landing_page_id')->default(41);
            $table->unsignedinteger('rows_per_page')->default(15);
            $table->string('display_size')->default('normal');
            $table->string('action_buttons')->default(1);
            $table->string('author_format')->default(1);
            $table->unsignedinteger('alert_fade_time')->default(5000);
            $table->unsignedinteger('layout')->default(1);
            $table->softDeletes();

            // address
            // country
            // dob
            //etc

            // With the cascading delete option in place, deleting a user from the database will automatically result in the deletion of the user's corresponding profile.
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
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
        Schema::dropIfExists('profiles');
    }
}
