<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "category_id" => Category::factory(),
            "brand_id" => Brand::factory(),
            "name" => $this->faker->name(),
            "desc" => $this->faker->sentence(),
            "content" => $this->faker->sentence(),
            "price" => $this->faker->randomNumber(6),
            "status" => 1,
            "qty" => $this->faker->randomNumber(2),
            "sold_qty" => 0
        ];
    }
}
