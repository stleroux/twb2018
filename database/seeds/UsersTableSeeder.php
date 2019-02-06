<?php

use Illuminate\Database\Seeder;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'username' => 'admin',
            'role_id' => 10,
            'email' => 'admin@TheWoodBarn.ca',
            'password' => bcrypt('E@Sports'),
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'username' => 'lerouxs',
            'role_id' => 20,
            'public_email' => 1,
            'email' => 'stleroux@hotmail.ca',
            'password' => bcrypt('E@Sports'),
        ]);

        DB::table('users')->insert([
            'id' => 3,
            'username' => 'hayness',
            'role_id' => 60,
            'email' => 'stacie.Haynes@hotmail.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'id' => 4,
            'username' => 'lerouxh',
            'role_id' => 60,
            'email' => 'hugues.leroux@hotmail.ca',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'id' => 5,
            'username' => 'leveillel',
            'role_id' => 55,
            'email' => 'luc.leveille@hotmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
