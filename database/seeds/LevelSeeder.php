<?php

use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('levels')->insert([
            'levelname' => 'Super Admin',
            'description' => 'Super Admin Level',            
            'created_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
