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
            [
                'id'            => 8,
                'name'          => 'Biriyani',
                'slug'          => 'biriyani',
                'category_id'   => null,
            ],
            [
                'id'            => 9,
                'name'          => 'Kacchi Biriyani',
                'slug'          => 'kacchi-biriyani',
                'category_id'   => 8,
            ],
            [
                'id'            => 10,
                'name'          => 'Tehari',
                'slug'          => 'tehari',
                'category_id'   => 8,
            ],
            [
                'id'            => 11,
                'name'          => 'Morog Polaw',
                'slug'          => 'morog-polaw',
                'category_id'   => 8,
            ],
            [
                'id'            => 12,
                'name'          => 'Rejala Polaw',
                'slug'          => 'rejala-polaw',
                'category_id'   => 8,
            ],
            [
                'id'            => 13,
                'name'          => 'Kabab',
                'slug'          => 'kabab',
                'category_id'   => null,
            ],
            [
                'id'            => 14,
                'name'          => 'Gorur Chap',
                'slug'          => 'gorur-chap',
                'category_id'   => 13,
            ],
            [
                'id'            => 15,
                'name'          => 'Boti Kabab',
                'slug'          => 'boti-kabab',
                'category_id'   => 13,
            ],
            [
                'id'            => 16,
                'name'          => 'Murgi Chap',
                'slug'          => 'murgi chap',
                'category_id'   => 13,
            ],
            [
                'id'            => 17,
                'name'          => 'Chicken Grill',
                'slug'          => 'chicken-grill',
                'category_id'   => 13,
            ],
            [
                'id'            => 18,
                'name'          => 'Shik Kabab',
                'slug'          => 'shik-kabab',
                'category_id'   => 13,
            ],
        ]);
    }
}
