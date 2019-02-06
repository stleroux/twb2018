<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
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
      
         DB::table('products')->insert([
            'code' => $faker->word,
            'details' => $faker->sentence,
         ]);
      }

   }
   
}