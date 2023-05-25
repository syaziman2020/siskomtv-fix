<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
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
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'password' => bcrypt('rahasia123'),
                'roles' => 'ADMIN',

            ],
            [
                'name' => 'Ikhwan Ruslianto',
                'email' => 'ikhwan@mail.com',
                'password' => bcrypt('rahasia123'),
                'roles' => 'USER',

            ],
            [
                'name' => 'Rahmi',
                'email' => 'rahmi@mail.com',
                'password' => bcrypt('rahasia123'),
                'roles' => 'USER',
            ],

        ];

        DB::table('users')->insert($user);
    }
}
