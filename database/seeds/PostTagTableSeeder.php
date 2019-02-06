<?php

use Illuminate\Database\Seeder;

class PostTagTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('post_tag')->delete();
        
        \DB::table('post_tag')->insert(array (
            0 => 
            array (
                'id' => 2,
                'post_id' => 25,
                'tag_id' => 6,
            ),
            1 => 
            array (
                'id' => 3,
                'post_id' => 25,
                'tag_id' => 8,
            ),
        ));
        
        
    }
}