<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $this->createNewUsers();
    }
    public function createNewUsers()
    {
        $password = Hash::make('123'); // Default user password

        $d = [

            ['name' => 'TGMA',
                'email' => 'tgma@tgma.com',
                'username' => 'TGMA',
                'password' => $password,
                'user_role' => 'super_admin',

                'remember_token' => Str::random(10),
            ],

            ['name' => 'Admin KORA',
                'email' => 'admin@admin.com',
                'password' => $password,
                'user_role' => 'admin',
                'username' => 'admin',

                'remember_token' => Str::random(10),
            ],

            ['name' => 'Teacher Chike',
                'email' => 'teacher@teacher.com',
                'user_role' => 'teacher',
                'username' => 'teacher',
                'password' => $password,

                'remember_token' => Str::random(10),
            ],

            ['name' => 'Parent Kaba',
                'email' => 'parent@parent.com',
                'user_role' => 'parent',
                'username' => 'parent',
                'password' => $password,

                'remember_token' => Str::random(10),
            ],

            ['name' => 'Accountant Jeff',
                'email' => 'accountant@accountant.com',
                'user_role' => 'accountant',
                'username' => 'accountant',
                'password' => $password,

                'remember_token' => Str::random(10),
            ],
        ];
        DB::table('users')->insert($d);
    }
}
