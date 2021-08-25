<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id'            => 1,
                'name'          => 'Fast Food',
                'slug'          => 'fast-food',
                'category_id'   => null,
            ],
            [
                'id'            => 2,
                'name'          => 'Pizza',
                'slug'          => 'pizza',
                'category_id'   => 1,
            ],
            [
                'id'            => 3,
                'name'          => 'Burger',
                'slug'          => 'burger',
                'category_id'   => 1,
            ],
            [
                'id'            => 4,
                'name'          => 'Pepperoni Pizza',
                'slug'          => 'pepperoni-pizza',
                'category_id'   => 2,
            ],
            [
                'id'            => 5,
                'name'          => 'Margherita Pizza',
                'slug'          => 'margherita-pizza',
                'category_id'   => 2,
            ],
            [
                'id'            => 6,
                'name'          => 'Beef Burger',
                'slug'          => 'beef-burger',
                'category_id'   => 3,
            ],
            [
                'id'            => 7,
                'name'          => 'Veggie Burger',
                'slug'          => 'veggie-burger',
                'category_id'   => 3,
            ],

        ]);
    }
}
