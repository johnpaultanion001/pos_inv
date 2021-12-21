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
                'name'            => 'Yakult',
                'description'     => 'Sample Product',
                'price'           => 10,
                'stock'           => 100,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'image'           => 'p2.png',
                'name'            => 'Mang Tomas',
                'description'     => 'Sample Product',
                'price'           => 20,
                'stock'           => 100,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'image'           => 'p3.png',
                'name'            => 'Datu Puti Soy Souce',
                'description'     => 'Sample Product',
                'price'           => 25,
                'stock'           => 100,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'image'           => 'p4.png',
                'name'            => 'Lucky Me Beef',
                'description'     => 'Sample Product',
                'price'           => 10,
                'stock'           => 100,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'image'           => 'p5.png',
                'name'            => 'Lucky Me Chicken',
                'description'     => 'Sample Product',
                'price'           => 10,
                'stock'           => 100,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            
            
        ];

        Product::insert($products);
    }
}
