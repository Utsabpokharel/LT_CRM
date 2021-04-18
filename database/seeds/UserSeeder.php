<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('all_users')->insert([
            'username' => 'Super Admin',
            'email' => 'super@admin.com',
            'password' => bcrypt('super123'),
            'role' => '1',
            'status' => '1',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
    }
}