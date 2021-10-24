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
              'description' => 'nen hop tac',
//              'thumb_points' => '10',
              'views' => '10',
              'user_id' => '4',
              'category_id'=>'1',
              'uuid'=>'1',
//              'comment_id'=>'1',
              'created_at' => now(),


          ],
            [
                'title' => 'Idea2',
                'description' => 'nen tang luong',
//                'thumb_points' => '11',
                'views' => '12',
                'user_id' => '4',
                'category_id'=>'2',
                'uuid'=>'1',
//                'comment_id'=>'1',
                'created_at' => now(),


            ],
            [
                'title' => 'Idea2',
                'description' => 'nen tang luong',
//                'thumb_points' => '11',
                'views' => '12',
                'user_id' => '4',
                'category_id'=>'2',
                'uuid'=>'1',
//                'comment_id'=>'1',
                'created_at' => now(),


            ],
            [
                'title' => 'Idea2',
                'description' => 'nen tang luong',
//                'thumb_points' => '11',
                'views' => '12',
                'user_id' => '4',
                'category_id'=>'2',
                'uuid'=>'1',
//                'comment_id'=>'1',
                'created_at' => now(),


            ],
            [
                'title' => 'Idea2',
                'description' => 'nen tang luong',
//                'thumb_points' => '11',
                'views' => '12',
                'user_id' => '4',
                'category_id'=>'2',
                'uuid'=>'1',
//                'comment_id'=>'1',
                'created_at' => now(),


            ],[
                'title' => 'Idea2',
                'description' => 'nen tang luong',
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
