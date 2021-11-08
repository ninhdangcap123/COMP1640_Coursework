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

//        DB::table('comments')->insert($comments);
        foreach ((range(1, 6)) as $index) {
            DB::table('comments')->insert(
                [
                    'user_id' => rand(1, 6),
                    'content' => 'test',
                    'commentable_id' => rand(1, 6),
                    'commentable_type' => rand(0, 1) == 1 ? 'App\Models\Idea' : 'App\Models\User',
                    'created_at' => now(),
                ]
            );
    }}
}
