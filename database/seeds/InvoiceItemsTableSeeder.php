<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Invoice;
use App\Product;

class InvoiceItemsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();

		// following line retrieve all the invoice_ids from DB
		$invoices = Invoice::all()->pluck('id');
		// following line retrieve all the product_ids from DB
		$products = Product::all()->pluck('id');

		foreach (range(1,90) as $index) {

			$quantity =  $faker->numberBetween($min = 1, $max = 5);
			$price =  $faker->numberBetween($min = 100, $max = 1000);

			DB::table('invoiceItems')->insert([
				'invoice_id' => $faker->randomElement($invoices),
				'product_id' => $faker->randomElement($products),
				'quantity' => $quantity,
				'price' => $price,
				'total' => ($quantity * $price)
			]);
		}
	}
}
