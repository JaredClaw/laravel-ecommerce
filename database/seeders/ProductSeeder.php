<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    Product::create([
    'name' => 'Sample Product',
    'description' => 'This is a test product.',
    'price' => 19.99,
    'image_url' => 'hanako.png/300x200',
    ]);
}
}
