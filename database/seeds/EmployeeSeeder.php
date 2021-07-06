<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'staff_id' => '001',
            'firstname' => 'Super-',
            'lastname' => 'Admin',
            'email' => 'super@admin.com',
            'pan' => '12345rt678uy',
            'contact_number' => '9876543210',
            'level' => 'Super Admin',
            'title' => 1,
            'department' => 'Super Department',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
