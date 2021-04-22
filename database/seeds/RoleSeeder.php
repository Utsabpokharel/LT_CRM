<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([array(
            'name' => 'SuperAdmin',
            'description' => 'This is superadmin who controls all roles'),
            array(
                'name' => 'Admin',
                'description' => 'This is Admin who controls all roles except Super-Admin'),
                array(
                    'name' => 'Employee',
                    'description' => 'This is Employee who are controlled by admin and super-admin'),  
               array(
                    'name' => 'Customer',
                    'description' => 'This is Customer who takes our services'),           
        ]);
    }
}
