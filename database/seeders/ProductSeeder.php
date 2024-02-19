<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
