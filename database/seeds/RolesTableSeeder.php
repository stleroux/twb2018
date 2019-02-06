<?php

use Illuminate\Database\Seeder;


class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' => 10,
            'name' => 'superadmin',
            'display_name' => 'Super Administrator',
            'description' => 'All privileges',
        ]);

        DB::table('roles')->insert([
            'id' => 20,
            'name' => 'admin',
            'display_name' => 'Administrator',
            'description' => 'Administrator of the site',
        ]);

        DB::table('roles')->insert([
            'id' => 30,
            'name' => 'manager',
            'display_name' => 'Manager',
            'description' => 'Profile, View, Create, Edit, Publish, Import/Export, Delete',
        ]);

        DB::table('roles')->insert([
            'id' => 40,
            'name' => 'publisher',
            'display_name' => 'Publisher',
            'description' => 'Profile, View, Create, Edit, Publish, Import/Export',
        ]);

        DB::table('roles')->insert([
            'id' => 50,
            'name' => 'editor',
            'display_name' => 'Editor',
            'description' => 'Profile, View, Create, Edit',
        ]);

        DB::table('roles')->insert([
            'id' => 55,
            'name' => 'timeTracker',
            'display_name' => 'Special - Luc',
            'description' => 'Special',
        ]);

        DB::table('roles')->insert([
            'id' => 60,
            'name' => 'author',
            'display_name' => 'Author',
            'description' => 'Profile, View, Create',
        ]);

        DB::table('roles')->insert([
            'id' => 70,
            'name' => 'user',
            'display_name' => 'User',
            'description' => 'Profile, View',
        ]);

        DB::table('roles')->insert([
            'id' => 80,
            'name' => 'guest',
            'display_name' => 'Authenticated User',
            'description' => 'Guest -> View only',
        ]);
    }
}
