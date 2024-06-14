<?php

use Database\Seeders\CarSeeder;
use Database\Seeders\CounterTableSeeder;
use Database\Seeders\ProcessSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\SupplierSeeder;
use Database\Seeders\UserTableSeeder;
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
        $this->call(
            [
                UserTableSeeder::class,
                CarSeeder::class,
                CounterTableSeeder::class,
                ProcessSeeder::class,
                ProductSeeder::class,
                SupplierSeeder::class,
            ]
        );
    }
}
