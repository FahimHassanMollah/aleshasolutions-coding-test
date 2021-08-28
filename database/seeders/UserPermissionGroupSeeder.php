<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserPermissionGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_permission_groups')->insert([
            [
                'id'            => 1,
                'name'          => 'User',
            ],
            [
                'id'            => 2,
                'name'          => 'User Group',
            ],
            [
                'id'            => 3,
                'name'          => 'Category',
            ],
            [
                'id'            => 4,
                'name'          => 'Product',
            ],
            [
                'id'            => 5,
                'name'          => 'Order',
            ],
            [
                'id'            => 6,
                'name'          => 'Customer',
            ],

        ]);
    }
}
