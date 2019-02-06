<?php

use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('profiles')->delete();
        
        \DB::table('profiles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'first_name' => 'Admin',
                'last_name' => 'Istrator',
                'telephone' => NULL,
                'image' => NULL,
                'frontendStyle' => 'slate',
                'backendStyle' => 'bootstrap',
                'date_format' => 1,
                'landing_page_id' => '41',
                'rows_per_page' => 15,
                'display_size' => 'normal',
                'action_buttons' => '1',
                'author_format' => '1',
                'alert_fade_time' => 5000,
                'created_at' => '2017-12-28 10:27:35',
                'updated_at' => '2017-12-28 10:27:35',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 2,
                'first_name' => 'Stephane',
                'last_name' => 'Leroux',
                'telephone' => '613-370-0275',
                'image' => '1517413947.jpg',
                'frontendStyle' => 'slate',
                'backendStyle' => 'bootstrap',
                'date_format' => 1,
                'landing_page_id' => '41',
                'rows_per_page' => 15,
                'display_size' => 'normal',
                'action_buttons' => '1',
                'author_format' => '1',
                'alert_fade_time' => 5000,
                'created_at' => '2017-12-28 10:28:06',
                'updated_at' => '2017-12-28 10:28:06',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 3,
                'first_name' => 'Stacie',
                'last_name' => 'Haynes',
                'telephone' => '613-327-4722',
                'image' => NULL,
                'frontendStyle' => 'slate',
                'backendStyle' => 'bootstrap',
                'date_format' => 1,
                'landing_page_id' => '41',
                'rows_per_page' => 15,
                'display_size' => 'normal',
                'action_buttons' => '1',
                'author_format' => '1',
                'alert_fade_time' => 5000,
                'created_at' => '2017-12-28 10:28:26',
                'updated_at' => '2017-12-28 10:28:26',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 4,
                'first_name' => 'Hugues',
                'last_name' => 'Leroux',
                'telephone' => '613-71-1454',
                'image' => NULL,
                'frontendStyle' => 'slate',
                'backendStyle' => 'bootstrap',
                'date_format' => 1,
                'landing_page_id' => '41',
                'rows_per_page' => 15,
                'display_size' => 'normal',
                'action_buttons' => '1',
                'author_format' => '1',
                'alert_fade_time' => 5000,
                'created_at' => '2017-12-28 10:28:26',
                'updated_at' => '2017-12-28 10:28:26',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 5,
                'first_name' => 'Luc',
                'last_name' => 'Leveille',
                'telephone' => '613-123-4567',
                'image' => NULL,
                'frontendStyle' => 'slate',
                'backendStyle' => 'bootstrap',
                'date_format' => 1,
                'landing_page_id' => '41',
                'rows_per_page' => 15,
                'display_size' => 'normal',
                'action_buttons' => '1',
                'author_format' => '1',
                'alert_fade_time' => 5000,
                'created_at' => '2017-12-28 10:28:26',
                'updated_at' => '2017-12-28 10:28:26',
            ),
        ));
        
        
    }
}