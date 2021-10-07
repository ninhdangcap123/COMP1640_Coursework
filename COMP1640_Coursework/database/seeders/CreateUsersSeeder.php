<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'is_admin' => '1',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Staff',
                'email' => 'staff@staff.com',
                'is_admin' => '0',
                'password' => bcrypt('12345678'),
            ],
        ];

        DB::table('users')->insert($user);


    }
}
