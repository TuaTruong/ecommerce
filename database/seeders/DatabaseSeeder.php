<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::factory()->create();
        $brand = Brand::factory()->create();

        Product::factory(20)->create([
            "category_id" => $category->id,
            "brand_id" => $brand->id,
            "image" => "gallery18729.jpg"
        ]);

    }
}
