<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;
use App\ProductImage;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	factory(Category::class, 5)->create();
       	factory(Product::class, 50)->create();
       	factory(ProductImage::class, 120)->create();
    }
}
