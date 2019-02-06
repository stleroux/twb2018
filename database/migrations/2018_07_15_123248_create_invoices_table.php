<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoices', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('client_id')->unsigned();
			$table->text('notes')->nullable();
			$table->string('status');
			$table->decimal('amount_charged')->unsigned()->nullable();
			$table->decimal('hst')->unsigned()->nullable();
			$table->decimal('sub_total')->unsigned()->nullable();
			$table->decimal('wsib')->unsigned()->nullable();
			$table->decimal('income_taxes')->unsigned()->nullable();
			$table->decimal('total_deductions')->unsigned()->nullable();
			$table->decimal('total')->unsigned()->nullable();
			$table->timestamp('invoiced_at');
			$table->timestamp('paid_at');
			$table->timestamps();

			// Add foreign key in the database manually
			$table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::disableForeignKeyConstraints();
		Schema::dropIfExists('invoices');
	}
}
