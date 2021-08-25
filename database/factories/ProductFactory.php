<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name'          => $this->faker->name,
            'description'   => $this->faker->realText('350'),
            'price'         => $this->faker->numberBetween(100, 500),
            'slug'          => $this->faker->slug('5'),
            'status'        => 1
        ];
    }
}
