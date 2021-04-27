<?php

use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'code' => 'DEP-1',
            'name' => 'Super Department',
            'shortname' => 'S-Dept',
            'description' => 'Super Admin Department',            
            'created_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
