<?php

use Illuminate\Database\Seeder;
use App\User;

use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'user1',
            'email' => 'user1@example.com',
            'password' => bcrypt('user1')  ,
            'role_id' => 1
        ]);

        User::create([
            'name' => 'user2',
            'email' => 'user2@example.com',
            'password' => bcrypt('user2'),
            'role_id' => 2
        ]);

        $faker = Faker::create();

        foreach (range(1,8) as $index) {
            $name = $faker->unique()->userName();
            User::create([
                'name' => $name,
                'password' => $faker->unique()->password(),
                'email' => $name . '@example.com',
                'role_id' => 2
            ]);
        }

    }
}
