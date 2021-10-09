<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments = [
            [
                'content'=>'Hay vl',
                'user_id'=>'4',

            ]
        ];
        DB::table('comments')->insert($comments);
    }
}
