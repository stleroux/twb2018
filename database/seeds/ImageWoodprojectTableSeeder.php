<?php

use Illuminate\Database\Seeder;

class ImageWoodprojectTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('image_woodproject')->delete();
        
        \DB::table('image_woodproject')->insert(array (
            0 => 
            array (
                'id' => 18,
                'wood_project_id' => 12,
                'ori_name' => 'Chrysanthemum',
                'new_name' => 'Chrysanthemum_1517502104.jpg',
                'size' => '879394',
                'description' => NULL,
                'created_at' => '2018-02-01 11:21:44',
                'updated_at' => '2018-02-01 11:21:44',
            ),
            1 => 
            array (
                'id' => 19,
                'wood_project_id' => 12,
                'ori_name' => 'Hydrangeas',
                'new_name' => 'Hydrangeas_1517502118.jpg',
                'size' => '595284',
                'description' => NULL,
                'created_at' => '2018-02-01 11:21:58',
                'updated_at' => '2018-02-01 11:21:58',
            ),
        ));
        
        
    }
}