<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'module_id' => 1,
                'name' => 'assyst',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'module_id' => 2,
                'name' => 'site',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'module_id' => 1,
                'name' => 'windows',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'module_id' => 3,
                'name' => 'cakes',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'module_id' => 3,
                'name' => 'pies',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'module_id' => 3,
                'name' => 'entrees',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'module_id' => 1,
                'name' => 'EKME',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'module_id' => 4,
                'name' => 'furniture',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'module_id' => 4,
                'name' => 'shelving',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'module_id' => 8,
                'name' => 'Sequoia',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'module_id' => 8,
                'name' => 'red mohagony',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'module_id' => 5,
                'name' => 'White Pine',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2018-02-14 08:13:56',
            ),
            12 => 
            array (
                'id' => 13,
                'module_id' => 5,
                'name' => 'maple',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'module_id' => 6,
                'name' => 'softwood',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'module_id' => 6,
                'name' => 'hardwood',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'module_id' => 7,
                'name' => 'Oil based',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'module_id' => 7,
                'name' => 'Water based',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 28,
                'module_id' => 9,
                'name' => 'matte',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 29,
                'module_id' => 9,
                'name' => 'low luster',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 30,
                'module_id' => 9,
                'name' => 'gloss',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 31,
                'module_id' => 9,
                'name' => 'semi gloss',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 32,
                'module_id' => 10,
                'name' => 'polycrylic',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 33,
                'module_id' => 10,
                'name' => 'verathane',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 34,
                'module_id' => 10,
                'name' => 'urethane',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 35,
                'module_id' => 10,
                'name' => 'varnish',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 36,
                'module_id' => 11,
                'name' => 'semi gloss',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 37,
                'module_id' => 11,
                'name' => 'gloss',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 38,
                'module_id' => 11,
                'name' => 'high gloss',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 41,
                'module_id' => 14,
                'name' => '/',
            'value' => 'homepage (Default)',
                'deleted_at' => NULL,
                'created_at' => '2018-01-26 14:04:54',
                'updated_at' => '2018-01-26 14:04:54',
            ),
            29 => 
            array (
                'id' => 42,
                'module_id' => 14,
                'name' => '/backend/dashboard',
                'value' => 'dashboard',
                'deleted_at' => NULL,
                'created_at' => '2018-01-26 14:35:54',
                'updated_at' => '2018-01-29 08:29:39',
            ),
            30 => 
            array (
                'id' => 43,
                'module_id' => 14,
                'name' => '/recipes',
                'value' => 'recipes',
                'deleted_at' => NULL,
                'created_at' => '2018-01-26 14:52:35',
                'updated_at' => '2018-01-26 14:52:35',
            ),
            31 => 
            array (
                'id' => 44,
                'module_id' => 14,
                'name' => '/backend/recipes',
                'value' => NULL,
                'deleted_at' => '2018-01-29 08:24:49',
                'created_at' => '2018-01-29 08:23:40',
                'updated_at' => '2018-01-29 08:24:49',
            ),
            32 => 
            array (
                'id' => 45,
                'module_id' => 14,
                'name' => '/backend/recipes',
            'value' => 'recipes (BE)',
                'deleted_at' => NULL,
                'created_at' => '2018-01-29 08:25:03',
                'updated_at' => '2018-01-29 08:25:03',
            ),
            33 => 
            array (
                'id' => 46,
                'module_id' => 14,
                'name' => '/articles',
                'value' => 'Articles',
                'deleted_at' => NULL,
                'created_at' => '2018-01-29 08:57:12',
                'updated_at' => '2018-01-29 08:57:50',
            ),
            34 => 
            array (
                'id' => 47,
                'module_id' => 5,
                'name' => 'Eastern Hemlock',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2018-02-14 08:13:22',
                'updated_at' => '2018-02-14 08:13:22',
            ),
            35 => 
            array (
                'id' => 48,
                'module_id' => 5,
                'name' => 'Red Pine',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2018-02-14 08:13:45',
                'updated_at' => '2018-02-14 08:13:45',
            ),
            36 => 
            array (
                'id' => 49,
                'module_id' => 5,
                'name' => 'Ash',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2018-02-14 08:14:07',
                'updated_at' => '2018-02-14 08:14:07',
            ),
            37 => 
            array (
                'id' => 50,
                'module_id' => 4,
                'name' => 'Other',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2018-02-14 08:22:21',
                'updated_at' => '2018-02-14 08:22:21',
            ),
            38 => 
            array (
                'id' => 51,
                'module_id' => 4,
                'name' => 'Decorative',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2018-02-14 08:22:37',
                'updated_at' => '2018-02-14 08:22:37',
            ),
            39 => 
            array (
                'id' => 52,
                'module_id' => 4,
                'name' => 'Household Item',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2018-02-14 08:23:10',
                'updated_at' => '2018-02-14 08:23:10',
            ),
            40 => 
            array (
                'id' => 53,
                'module_id' => 11,
                'name' => 'Matte',
                'value' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2018-02-14 08:25:32',
                'updated_at' => '2018-02-14 08:27:45',
            ),
        ));
        
        
    }
}