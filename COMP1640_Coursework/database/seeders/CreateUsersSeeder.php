<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('123');
        $user = [
            [
                'name' => 'Ninh',
                'email' => 'admin@admin.com',
                'user_role_id' => '1',
                'password' => $password,
                'department_id' => '1',
            ],

            [
                'name' => 'Qualitity Assurance Manager',
                'email' => 'qam@qam.com',
                'user_role_id' => '2',
                'password' => $password,
                'department_id' => '1',
            ],
            [
                'name' => 'Quality Assurance Coordinator',
                'email' => 'qac@qac.com',
                'user_role_id' => '3',
                'password' => $password,
                'department_id' => '2',
            ],
            [
                'name' => 'Staff',
                'email' => 'staff@staff.com',
                'user_role_id' => '4',
                'password' => $password,
                'department_id' => '2',
            ],
            [
                'name' => 'Guest',
                'email' => 'guest@guest.com',
                'user_role_id' => '5',
                'password' => $password,
                'department_id' => '2',
            ],
        ];

        DB::table('users')->insert($user);


    }
}
