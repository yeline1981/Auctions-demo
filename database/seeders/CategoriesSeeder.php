<?php

use Illuminate\Database\Seeder;

use App\Models\categories;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        categories::create([
            'category' => 'Muebles'
        ]);

        categories::create([
            'category' => 'Pinturas Decorativas'
        ]);

        categories::create([
            'category' => 'Relojes'
        ]);

        categories::create([
            'category' => 'Alhajas'
        ]);
    }
}
