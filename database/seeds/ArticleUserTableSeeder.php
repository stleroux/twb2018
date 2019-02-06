<?php

use Illuminate\Database\Seeder;

class ArticleUserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('article_user')->delete();
        
        
        
    }
}