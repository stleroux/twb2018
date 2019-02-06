<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Client;

class InvoicesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();

		// following line retrieve all the user_ids from DB
		$clients = Client::all()->pluck('id');

		foreach (range(1,25) as $index) {

			$amount_charged = $faker->numberBetween($min = 1000, $max = 9000);
			$hst = $amount_charged * 0.13;
			$sub_total = $amount_charged + $hst;
			$wsib = $amount_charged * 0.06;
			$income_taxes = $amount_charged * 0.26;
			$total_deductions = $wsib + $income_taxes;
			$total = $amount_charged - $wsib - $income_taxes;

			DB::table('invoices')->insert([
				'client_id' => $faker->randomElement($clients),
				// 'work_date' => $faker->dateTimeThisYear($max = 'now', $timezone = null),
				'notes' => $faker->paragraph,
				'status' => $faker->randomElement($array = array ('logged','invoiced','paid')),
				'amount_charged' => $amount_charged,
				'hst' => $hst,
				'sub_total' => $sub_total,
				'wsib' => $wsib,
				'income_taxes' => $income_taxes,
				'total_deductions' => $total_deductions,
				'total' => $total,
				'created_at' => $faker->dateTimeThisYear($max = 'now', $timezone = null),
				'updated_at' => $faker->dateTimeThisYear($max = 'now', $timezone = null)
			]);
		}
	}
}
