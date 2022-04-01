<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SalesReport;

class SalesReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sales_reports = [
            [
                'product_id'          => '1',
                'order_id'            => '1',
                'profit'              => '100',
                'amount'              => '500',
                'sold'                => '50',

                'created_at'          => date("Y-m-d H:i:s"),
                'updated_at'          => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'          => '2',
                'order_id'            => '1',
                'profit'              => '250',
                'amount'              => '1000',
                'sold'                => '50',

                'created_at'          => date("Y-m-d H:i:s"),
                'updated_at'          => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'          => '3',
                'order_id'            => '1',
                'profit'              => '300',
                'amount'              => '1250',
                'sold'                => '50',

                'created_at'          => date("Y-m-d H:i:s"),
                'updated_at'          => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'          => '4',
                'order_id'            => '1',
                'profit'              => '100',
                'amount'              => '500',
                'sold'                => '50',

                'created_at'          => date("Y-m-d H:i:s"),
                'updated_at'          => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'          => '5',
                'order_id'            => '1',
                'profit'              => '100',
                'amount'              => '500',
                'sold'                => '50',
                
                'created_at'          => date("Y-m-d H:i:s"),
                'updated_at'          => date("Y-m-d H:i:s"),
            ],
            
        ];

        SalesReport::insert($sales_reports);
    }
}
