<?php

use Illuminate\Database\Seeder;

use App\Models\roles;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        roles::create([
            'role' => 'Administrador'
        ]);

        roles::create([
            'role' => 'Regular'
        ]);
    }
}
