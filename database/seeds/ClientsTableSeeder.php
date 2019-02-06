<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ClientsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();

		foreach (range(1,15) as $index) {
		
			DB::table('clients')->insert([
				'company_name' => $faker->company,
				'contact_name' => $faker->name,
				'address' => $faker->streetAddress,
				'city' => $faker->city,
				'state' => $faker->state,
				'zip' => $faker->postcode,
				'telephone' => $faker->phoneNumber,
				'cell' => $faker->phoneNumber,
				'fax' => $faker->phoneNumber,
				'email' => $faker->email,
				'website' => $faker->url,
				'notes' => $faker->paragraph
			]);
		}

	}
	
}
