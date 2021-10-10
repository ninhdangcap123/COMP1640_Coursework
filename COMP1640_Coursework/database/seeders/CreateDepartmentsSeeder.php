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
                'name' => 'Cơ sở A',
            ],
            [
                'name' => 'Công Nghệ thông tin',
            ],
            [
                'name' => 'Quản trị Kinh doanh',
            ],

        ];
        DB::table('departments')->insert($departments);
    }
}
