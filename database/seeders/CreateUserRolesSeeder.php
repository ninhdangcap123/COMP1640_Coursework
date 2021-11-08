<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateUserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_roles = [
            [
                'name'=>'Admin',
                'level'=>'1',
            ],
            [
                'name'=>'Qualitity Assurance Manager',
                'level'=>'2',
            ],
            [
                'name'=>'Quality Assurance Coordinator',
                'level'=>'3',
            ],
            [
                'name'=>'Staff',
                'level'=>'4',
            ],
            [
                'name'=>'Guest/Anonymous',
                'level'=>'5',
            ],
        ];
        DB::table('user_roles')->insert($user_roles);
    }
}
