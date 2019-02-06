<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
			$table->increments('id');
			// $table->string('name');
			// $table->string('email');
			$table->integer('user_id')->unsigned();
			$table->text('comment', 65535);
			$table->boolean('approved');
			$table->string('commentable_type');
			$table->integer('commentable_id');			
			// $table->integer('post_id')->unsigned()->index('comments_post_id_foreign');
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
		Schema::drop('comments');
	}

}
