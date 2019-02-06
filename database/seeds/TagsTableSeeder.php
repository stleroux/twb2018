<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tags')->delete();
        
        \DB::table('tags')->insert(array (
            0 => 
            array (
                'id' => 6,
                'name' => 'tytytytytyeee',
                'created_at' => '2017-03-27 10:27:17',
                'updated_at' => '2017-10-17 08:27:11',
            ),
            1 => 
            array (
                'id' => 7,
                'name' => 'test',
                'created_at' => '2017-04-06 12:31:17',
                'updated_at' => '2017-04-06 12:31:17',
            ),
            2 => 
            array (
                'id' => 8,
                'name' => 'test1123',
                'created_at' => '2017-04-06 12:34:17',
                'updated_at' => '2017-04-06 12:34:17',
            ),
            3 => 
            array (
                'id' => 9,
                'name' => 'qwerty1234567890',
                'created_at' => '2017-05-04 14:53:33',
                'updated_at' => '2017-05-04 14:53:33',
            ),
        ));
        
        
    }
}