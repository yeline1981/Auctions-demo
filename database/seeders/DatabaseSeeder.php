<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(3)->create();

        $this->call([
            RolesSeeder::class,
            UserSeeder::class,
            CategoriesSeeder::class,
            LotsTableSeeder::class,
            BidsTableSeeder::class,
            ImageSeeder::class,
        ]);
    }
}
