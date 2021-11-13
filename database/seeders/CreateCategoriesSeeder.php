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

            ],
            [
                'name' => 'IT',

            ],
            [
                'name' => 'Marketing',

            ],

        ];
        DB::table('categories')->insert($categories);
    }
}
