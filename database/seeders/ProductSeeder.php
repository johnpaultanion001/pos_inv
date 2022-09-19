<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductSizePrice;

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
                'id'              => '1',
                'image'           => 'plate.jpg',
                'name'            => 'Sample Product',
                'category_id'     => '1',
                'description'     => 'Sample Product',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [   
                'id'              => '2',
                'image'           => 'plate.jpg',
                'name'            => 'Sample Product',
                'category_id'     => '1',
                'description'     => 'Sample Product',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [   
                'id'              => '3',
                'image'           => 'plate.jpg',
                'name'            => 'Sample Product',
                'category_id'     => '1',
                'description'     => 'Sample Product',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [   
                'id'              => '4',
                'image'           => 'plate.jpg',
                'name'            => 'Sample Product',
                'category_id'     => '1',
                'description'     => 'Sample Product',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [   
                'id'              => '5',
                'image'           => 'plate.jpg',
                'name'            => 'Sample Product ',
                'category_id'     => '1',
                'description'     => 'Sample Product',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [   
                'id'              => '6',
                'image'           => 'plate.jpg',
                'name'            => 'Sample Product',
                'category_id'     => '1',
                'description'     => 'Sample Product',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [   
                'id'              => '7',
                'image'           => 'plate.jpg',
                'name'            => 'Sample Product',
                'category_id'     => '1',
                'description'     => 'Sample Product',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [   
                'id'              => '8',
                'image'           => 'plate.jpg',
                'name'            => 'Sample Product',
                'category_id'     => '1',
                'description'     => 'Sample Product',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],

        ];

        $productssizesprices = [
            [
                'product_id'           => '1',
                'size_id'           => '1',
                'price'           => '210',
                'stock'            => '200',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '1',
                'size_id'           => '2',
                'price'           => '240',
                'stock'            => '200',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '1',
                'size_id'           => '3',
                'price'           => '310',
                'stock'            => '200',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],

            [
                'product_id'           => '2',
                'size_id'           => '1',
                'price'           => '210',
                'stock'            => '200',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '2',
                'size_id'           => '2',
                'price'           => '240',
                'stock'            => '200',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '2',
                'size_id'           => '3',
                'price'           => '310',
                'stock'            => '200',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],

            [
                'product_id'           => '3',
                'size_id'           => '1',
                'price'           => '210',
                'stock'            => '200',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '3',
                'size_id'           => '2',
                'price'           => '240',
                'stock'            => '200',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '3',
                'size_id'           => '3',
                'price'           => '310',
                'stock'            => '200',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],

            [
                'product_id'           => '4',
                'size_id'           => '1',
                'price'           => '210',
                'stock'            => '200',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '4',
                'size_id'           => '2',
                'price'           => '240',
                'stock'            => '200',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '4',
                'size_id'           => '3',
                'price'           => '310',
                'stock'            => '200',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],

            [
                'product_id'           => '5',
                'size_id'           => '1',
                'price'           => '210',
                'stock'            => '200',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '5',
                'size_id'           => '2',
                'price'           => '240',
                'stock'            => '200',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '5',
                'size_id'           => '3',
                'price'           => '310',
                'stock'            => '200',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],

            [
                'product_id'           => '6',
                'size_id'           => '1',
                'price'           => '210',
                'stock'            => '200',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '6',
                'size_id'           => '2',
                'price'           => '240',
                'stock'            => '200',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '6',
                'size_id'           => '3',
                'price'           => '310',
                'stock'            => '200',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],

            [
                'product_id'           => '7',
                'size_id'           => '1',
                'price'           => '210',
                'stock'            => '200',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '7',
                'size_id'           => '2',
                'price'           => '240',
                'stock'            => '200',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '7',
                'size_id'           => '3',
                'price'           => '310',
                'stock'            => '200',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],

            [
                'product_id'           => '8',
                'size_id'           => '1',
                'price'           => '210',
                'stock'            => '200',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '8',
                'size_id'           => '2',
                'price'           => '240',
                'stock'            => '200',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '8',
                'size_id'           => '3',
                'price'           => '310',
                'stock'           => '200',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],

          
        ];

        
        Product::insert($products);
        ProductSizePrice::insert($productssizesprices);
    }
}
