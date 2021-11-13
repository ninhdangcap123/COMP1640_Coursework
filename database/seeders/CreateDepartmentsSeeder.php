<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateDepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            [
                'name' => 'Computer Science',
            ],
            [
                'name' => 'Computer Network & Communication',
            ],
            [
                'name' => 'Information Systems',
            ],

        ];
        DB::table('departments')->insert($departments);
    }
}
