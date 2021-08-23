<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id'                => 1,
                'user_group_id'     => null,
                'title'             => 'Mr',
                'first_name'        => 'Test Supper',
                'last_name'         => 'Admin',
                'email'             => 'tsa@example.com',
                'avatar'            => null,
                'password'          => Hash::make('tsa@123'),
                'status'            => 1, // active
                'super_admin'       => 1, // super admin
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'id'                => 2,
                'user_group_id'     => null,
                'title'             => 'Mr',
                'first_name'        => 'Moshiur Rahman',
                'last_name'         => 'Pattander',
                'email'             => 'mrbd1012@gmail.com',
                'avatar'            => null,
                'password'          => Hash::make('admin@123'),
                'status'            => 1, // active
                'super_admin'       => 1, // super admin
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'id'                => 3,
                'user_group_id'     => 1, // admin
                'title'             => 'Mr',
                'first_name'        => 'Test',
                'last_name'         => 'Admin',
                'email'             => 'ta@example.com',
                'avatar'            => null,
                'password'          => Hash::make('admin@123'),
                'status'            => 1, // active
                'super_admin'       => 0, // others
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'id'                => 4,
                'user_group_id'     => 1, // admin
                'title'             => 'Mr',
                'first_name'        => 'Another Test',
                'last_name'         => 'Admin',
                'email'             => 'ata@example.com',
                'avatar'            => null,
                'password'          => Hash::make('ata@123'),
                'status'            => 1, // active
                'super_admin'       => 0, // others
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ]);
    }
}
