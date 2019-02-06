<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('posts')->delete();
        
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'First Post',
                'body' => 'Body of first post',
                'slug' => 'first_post',
                'image' => '1495544253.png',
                'views' => 0,
                'category_id' => 1,
                'user_id' => 2,
                'created_at' => '2017-12-28 13:10:28',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Second blog',
                'body' => 'Content of second blog Content of second blog Content of second blog Content of second blog Content of second blog Content of second blog ',
                'slug' => 'second_blog',
                'image' => '1495544315.png',
                'views' => 0,
                'category_id' => 1,
                'user_id' => 2,
                'created_at' => '2017-12-28 13:20:18',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 5,
                'title' => 'aaaaasdsadsdasd jkash jshjkh sjkh jkh jhsd kjah dakjdhkjdh kdjh',
                'body' => '<p>sadasdasd sadasdasd sadasdasd sadasdasd sadasdasd sadasdasd sadasdasd sadasdasd sadasdasd sadasdasd sadasdasd </p>',
                'slug' => 'aaaaaaaaaaaaaaa',
                'image' => '1483551182.jpg',
                'views' => 1,
                'category_id' => 2,
                'user_id' => 3,
                'created_at' => '2017-01-04 11:55:50',
                'updated_at' => '2017-10-16 13:05:00',
            ),
            3 => 
            array (
                'id' => 21,
                'title' => 'vfvfvfvffffffffffffffffffffffffffffffffffff',
                'body' => '<p>111111111111111</p>',
                'slug' => '11111111111111',
                'image' => '1496342208.jpg',
                'views' => 3,
                'category_id' => 2,
                'user_id' => 1,
                'created_at' => '2017-06-01 12:53:01',
                'updated_at' => '2017-06-13 12:50:45',
            ),
            4 => 
            array (
                'id' => 23,
                'title' => 'New post qwerty',
                'body' => '<p>Body of new post</p>',
                'slug' => 'new_post',
                'image' => '1496335034.png',
                'views' => 2,
                'category_id' => 38,
                'user_id' => 1,
                'created_at' => '2017-06-21 13:01:19',
                'updated_at' => '2017-07-28 14:58:46',
            ),
            5 => 
            array (
                'id' => 25,
                'title' => 'Post test',
                'body' => '<p>klj j ljklkj klj klj klj klj lkj klj kl jklj klj</p>',
                'slug' => 'post-test',
                'image' => '1498587512.jpg',
                'views' => 4,
                'category_id' => 2,
                'user_id' => 2,
                'created_at' => '2017-08-08 09:16:08',
                'updated_at' => '2017-08-08 09:16:08',
            ),
        ));
        
        
    }
}