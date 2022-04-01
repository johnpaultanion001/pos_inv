<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        $products = [
            [
                'image'           => 'p1.png',
                'name'            => '555 TUNA',
                'category_id'     => '1',
                'description'     => 'Sample Product',
                'price'           => 10,
                'profit'          => 2,
                'stock'           => 100,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'image'           => 'p2.png',
                'name'            => 'Idol Cheese Dog',
                'category_id'     => '2',
                'description'     => 'Sample Product',
                'price'           => 20,
                'profit'          => 5,
                'stock'           => 100,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'image'           => 'p3.png',
                'name'            => 'Piatos',
                'category_id'     => '3',
                'description'     => 'Sample Product',
                'price'           => 25,
                'profit'          => 6,
                'stock'           => 100,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'image'           => 'p4.png',
                'name'            => 'Lucky Me Beef',
                'category_id'     => '4',
                'description'     => 'Sample Product',
                'price'           => 10,
                'profit'          => 2,
                'stock'           => 100,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'image'           => 'p5.png',
                'name'            => 'Lucky Me Chicken',
                'category_id'     => '4',
                'description'     => 'Sample Product',
                'price'           => 10,
                'profit'          => 2,
                'stock'           => 100,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            
            
        ];

        Product::insert($products);
    }
}
