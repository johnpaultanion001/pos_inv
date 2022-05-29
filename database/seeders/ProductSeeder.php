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
                'image'           => 'WINTERMELON.jpg',
                'name'            => 'WINTERMELON',
                'category_id'     => '1',
                'description'     => 'Sample Product',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [   
                'id'              => '2',
                'image'           => 'OKINAWA.jpg',
                'name'            => 'OKINAWA',
                'category_id'     => '1',
                'description'     => 'Sample Product',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [   
                'id'              => '3',
                'image'           => 'HOKKAIDO.jpg',
                'name'            => 'HOKKAIDO',
                'category_id'     => '1',
                'description'     => 'Sample Product',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [   
                'id'              => '4',
                'image'           => 'MATCHA.jpg',
                'name'            => 'MATCHA',
                'category_id'     => '1',
                'description'     => 'Sample Product',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [   
                'id'              => '5',
                'image'           => 'CHOCOLATE.jpg',
                'name'            => 'CHOCOLATE ',
                'category_id'     => '1',
                'description'     => 'Sample Product',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [   
                'id'              => '6',
                'image'           => 'DARK BEL CHOCO.jpg',
                'name'            => 'DARK BEL CHOCO',
                'category_id'     => '1',
                'description'     => 'Sample Product',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [   
                'id'              => '7',
                'image'           => 'CARAMEL SUGAR.jpg',
                'name'            => 'CARAMEL SUGAR',
                'category_id'     => '1',
                'description'     => 'Sample Product',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [   
                'id'              => '8',
                'image'           => 'SALTED CARAMEL.jpg',
                'name'            => 'SALTED CARAMEL',
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
                'price'           => '50',
                'stock'           => '50',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '1',
                'size_id'           => '2',
                'price'           => '70',
                'stock'           => '50',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '1',
                'size_id'           => '3',
                'price'           => '50',
                'stock'           => '90',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],

            [
                'product_id'           => '2',
                'size_id'           => '1',
                'price'           => '50',
                'stock'           => '50',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '2',
                'size_id'           => '2',
                'price'           => '70',
                'stock'           => '50',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '2',
                'size_id'           => '3',
                'price'           => '50',
                'stock'           => '90',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],

            [
                'product_id'           => '3',
                'size_id'           => '1',
                'price'           => '50',
                'stock'           => '50',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '3',
                'size_id'           => '2',
                'price'           => '70',
                'stock'           => '50',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '3',
                'size_id'           => '3',
                'price'           => '50',
                'stock'           => '90',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],

            [
                'product_id'           => '4',
                'size_id'           => '1',
                'price'           => '50',
                'stock'           => '50',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '4',
                'size_id'           => '2',
                'price'           => '70',
                'stock'           => '50',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '4',
                'size_id'           => '3',
                'price'           => '50',
                'stock'           => '90',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],

            [
                'product_id'           => '5',
                'size_id'           => '1',
                'price'           => '50',
                'stock'           => '50',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '5',
                'size_id'           => '2',
                'price'           => '70',
                'stock'           => '50',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '5',
                'size_id'           => '3',
                'price'           => '50',
                'stock'           => '90',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],

            [
                'product_id'           => '6',
                'size_id'           => '1',
                'price'           => '50',
                'stock'           => '50',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '6',
                'size_id'           => '2',
                'price'           => '70',
                'stock'           => '50',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '6',
                'size_id'           => '3',
                'price'           => '50',
                'stock'           => '90',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],

            [
                'product_id'           => '7',
                'size_id'           => '1',
                'price'           => '50',
                'stock'           => '50',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '7',
                'size_id'           => '2',
                'price'           => '70',
                'stock'           => '50',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '7',
                'size_id'           => '3',
                'price'           => '50',
                'stock'           => '90',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],

            [
                'product_id'           => '8',
                'size_id'           => '1',
                'price'           => '50',
                'stock'           => '50',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '8',
                'size_id'           => '2',
                'price'           => '70',
                'stock'           => '50',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'           => '8',
                'size_id'           => '3',
                'price'           => '50',
                'stock'           => '90',
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],

          
        ];

        
        Product::insert($products);
        ProductSizePrice::insert($productssizesprices);
    }
}
