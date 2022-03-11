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
            CategoryTableSeeder::class,
            UserTableSeeder::class,
            TypeTableSeeder::class,
            FoodTableSeeder::class,
            TagTableSeeder::class,
            OrderTableSeeder::class,
        ]);
    }
}
