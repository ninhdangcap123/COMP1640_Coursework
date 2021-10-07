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
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'user_role_id' => '1',
                'password' => $password,
            ],
            [
                'name' => 'Staff',
                'email' => 'staff@staff.com',
                'user_role_id' => '4',
                'password' => $password,
            ],
            [
                'name' => 'Qualitity Assurance Manager',
                'email' => 'qam@qam.com',
                'user_role_id' => '2',
                'password' => $password,
            ],
            [
                'name' => 'Quality Assurance Coordinator',
                'email' => 'qac@qac.com',
                'user_role_id' => '4',
                'password' => $password,
            ],
            [
                'name' => 'Guest',
                'email' => 'guest@guest.com',
                'user_role_id' => '5',
                'password' => $password,
            ],
        ];

        DB::table('users')->insert($user);


    }
}
