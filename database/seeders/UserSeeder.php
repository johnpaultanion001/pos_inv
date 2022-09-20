<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Employee;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896' ,//password
                'remember_token' => null,
                'role' => 'manager',
                'employee_id' => '1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 2,
                'email'          => 'user@user.com',
                'password'       => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896',//password
                'remember_token' => null,
                'role' => 'cashier',
                'employee_id' => '2',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
               
            ],
            
        ];

      
        $employess = [
            [
                'id'             => 1,
                'name'           => 'Sample Manager',
                'contact_number' => '091234567',
                'address'        => 'Test Address',
                'gender'         => 'Male',
                'position'       => 'Manager',
                'isUser'         => '1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 2,
                'name'           => 'Sample Cashier',
                'contact_number' => '091234567',
                'address'        => 'Test Address',
                'gender'         => 'Male',
                'position'       => 'Cashier',
                'isUser'         => '1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];
        Employee::insert($employess);
        User::insert($users);
    }
}
