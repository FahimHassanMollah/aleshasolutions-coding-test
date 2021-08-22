<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_groups')->insert([
            [
                'id'            => 1,
                'name'          => 'Admin',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'id'            => 2,
                'name'          => 'Viewer',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],

        ]);
    }
}
