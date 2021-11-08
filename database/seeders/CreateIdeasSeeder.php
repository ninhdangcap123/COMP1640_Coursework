<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateIdeasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ideas = [
          [
              'title' => 'Idea1',
              'description' => 'Test1',
//              'thumb_points' => '10',
              'views' => '10',
              'user_id' => '1',
              'category_id'=>'1',
              'uuid'=>'1',
//              'comment_id'=>'1',
              'created_at' => now(),


          ],
            [
                'title' => 'Idea2',
                'description' => 'Test2',
//                'thumb_points' => '11',
                'views' => '12',
                'user_id' => '2',
                'category_id'=>'2',
                'uuid'=>'1',
//                'comment_id'=>'1',
                'created_at' => now(),


            ],
            [
                'title' => 'Idea3',
                'description' => 'Test3',
//                'thumb_points' => '11',
                'views' => '12',
                'user_id' => '3',
                'category_id'=>'1',
                'uuid'=>'1',
//                'comment_id'=>'1',
                'created_at' => now(),


            ],
            [
                'title' => 'Idea4',
                'description' => 'Test4',
//                'thumb_points' => '11',
                'views' => '12',
                'user_id' => '4',
                'category_id'=>'2',
                'uuid'=>'1',
//                'comment_id'=>'1',
                'created_at' => now(),


            ],
            [
                'title' => 'Idea5',
                'description' => 'Test5',
//                'thumb_points' => '11',
                'views' => '12',
                'user_id' => '4',
                'category_id'=>'2',
                'uuid'=>'1',
//                'comment_id'=>'1',
                'created_at' => now(),


            ],[
                'title' => 'Idea6',
                'description' => 'Test6',
//                'thumb_points' => '11',
                'views' => '12',
                'user_id' => '4',
                'category_id'=>'2',
                'uuid'=>'1',
//                'comment_id'=>'1',
                'created_at' => now(),


            ],

        ];
        DB::table('ideas')->insert($ideas);
    }
}
