<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderProduct;

class OrderProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_orders = [
            [
                'user_id'             => '2',
                'product_id'          => '1001',
                'order_id'            => '10001',
                'qty'                 => '50',
                'amount'              => '500',
                'isCheckout'          => '1',
                'created_at'          => date("Y-m-d H:i:s"),
                'updated_at'          => date("Y-m-d H:i:s"),
            ],
            [
                'user_id'             => '2',
                'product_id'          => '1002',
                'order_id'            => '10001',
                'qty'                 => '50',
                'amount'              => '1000',
                'isCheckout'          => '1',
                'created_at'          => date("Y-m-d H:i:s"),
                'updated_at'          => date("Y-m-d H:i:s"),
            ],
            [
                'user_id'             => '2',
                'product_id'          => '1003',
                'order_id'            => '10001',
                'qty'                 => '50',
                'amount'              => '1250',
                'isCheckout'          => '1',
                'created_at'          => date("Y-m-d H:i:s"),
                'updated_at'          => date("Y-m-d H:i:s"),
            ],
            [
                'user_id'             => '2',
                'product_id'          => '1004',
                'order_id'            => '10001',
                'qty'                 => '50',
                'amount'              => '500',
                'isCheckout'          => '1',
                'created_at'          => date("Y-m-d H:i:s"),
                'updated_at'          => date("Y-m-d H:i:s"),
            ],
            [
                'user_id'             => '2',
                'product_id'          => '1005',
                'order_id'            => '10001',
                'qty'                 => '50',
                'amount'              => '500',
                'isCheckout'          => '1',
                'created_at'          => date("Y-m-d H:i:s"),
                'updated_at'          => date("Y-m-d H:i:s"),
            ],
            
        ];

        OrderProduct::insert($product_orders);
    }
}
