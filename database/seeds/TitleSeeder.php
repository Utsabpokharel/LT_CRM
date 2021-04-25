<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('titles')->insert([
            'titlename' => 'Super Admin',
            'description' => 'Super Admin Title',            
            'created_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
