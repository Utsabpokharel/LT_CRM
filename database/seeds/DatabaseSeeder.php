<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call([
            RoleSeeder::class,            
            DepartmentSeeder::class,
            TitleSeeder::class,
            LevelSeeder::class,
            EmployeeSeeder::class,
            UserSeeder::class,
        ]);
    }
}