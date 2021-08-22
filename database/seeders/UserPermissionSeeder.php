<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_permissions')->insert([
            [
                'user_permission_group_id'      => 1, //User
                'name'                          => 'User View Any',
                'slug'                          => 'user-view-any',
            ],
            [
                'user_permission_group_id'      => 1, //User
                'name'                          => 'User View',
                'slug'                          => 'user-view',
            ],
            [
                'user_permission_group_id'      => 1, //User
                'name'                          => 'User Create',
                'slug'                          => 'user-create',
            ],
            [
                'user_permission_group_id'      => 1, //User
                'name'                          => 'User Update',
                'slug'                          => 'user-Update',
            ],
            [
                'user_permission_group_id'      => 1, //User
                'name'                          => 'User Delete',
                'slug'                          => 'user-delete',
            ],
            [
                'user_permission_group_id'      => 2, //User Group
                'name'                          => 'User Group View Any',
                'slug'                          => 'user-group-view-any',
            ],
            [
                'user_permission_group_id'      => 2, //User Group
                'name'                          => 'User Group View',
                'slug'                          => 'user-group-view',
            ],
            [
                'user_permission_group_id'      => 2, //User Group
                'name'                          => 'User Group Create',
                'slug'                          => 'user-group-create',
            ],
            [
                'user_permission_group_id'      => 2, //User Group
                'name'                          => 'User Group Update',
                'slug'                          => 'user-group-Update',
            ],
            [
                'user_permission_group_id'      => 2, //User Group
                'name'                          => 'User Group Delete',
                'slug'                          => 'user-group-delete',
            ],
            [
                'user_permission_group_id'      => 3, //Category
                'name'                          => 'Category View Any',
                'slug'                          => 'category-view-any',
            ],
            [
                'user_permission_group_id'      => 3, //Category
                'name'                          => 'Category View',
                'slug'                          => 'category-view',
            ],
            [
                'user_permission_group_id'      => 3, //Category
                'name'                          => 'Category Create',
                'slug'                          => 'category-create',
            ],
            [
                'user_permission_group_id'      => 3, //Category
                'name'                          => 'Category Update',
                'slug'                          => 'category-Update',
            ],
            [
                'user_permission_group_id'      => 3, //Category
                'name'                          => 'Category Delete',
                'slug'                          => 'category-delete',
            ],
            [
                'user_permission_group_id'      => 4, //Product
                'name'                          => 'Product View Any',
                'slug'                          => 'product-view-any',
            ],
            [
                'user_permission_group_id'      => 4, //Product
                'name'                          => 'Product View',
                'slug'                          => 'product-view',
            ],
            [
                'user_permission_group_id'      => 4, //Product
                'name'                          => 'Product Create',
                'slug'                          => 'product-create',
            ],
            [
                'user_permission_group_id'      => 4, //Product
                'name'                          => 'Product Update',
                'slug'                          => 'product-Update',
            ],
            [
                'user_permission_group_id'      => 4, //Product
                'name'                          => 'Product Delete',
                'slug'                          => 'product-delete',
            ],
            [
                'user_permission_group_id'      => 5, //Order
                'name'                          => 'Order View Any',
                'slug'                          => 'order-view-any',
            ],
            [
                'user_permission_group_id'      => 5, //Order
                'name'                          => 'Order View',
                'slug'                          => 'order-view',
            ],
            [
                'user_permission_group_id'      => 5, //Order
                'name'                          => 'Order Create',
                'slug'                          => 'order-create',
            ],
            [
                'user_permission_group_id'      => 5, //Order
                'name'                          => 'Order Update',
                'slug'                          => 'order-Update',
            ],
            [
                'user_permission_group_id'      => 5, //Order
                'name'                          => 'Order Delete',
                'slug'                          => 'order-delete',
            ],
        ]);
    }
}
