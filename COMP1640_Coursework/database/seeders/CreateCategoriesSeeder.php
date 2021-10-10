<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Business',
//                'idea_id' => '1'
            ],
            [
                'name' => 'Salary',
//                'idea_id'=> '2'
            ],

        ];
        DB::table('categories')->insert($categories);
    }
}
