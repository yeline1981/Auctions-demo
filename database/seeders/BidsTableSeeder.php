<?php

use Illuminate\Database\Seeder;

use App\Models\Bid;

use Faker\Factory as Faker;

class BidsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();

        $articlesIDs = DB::table('lots')->pluck('id');
        $usersIDs = DB::table('users')->pluck('id');

        foreach (range(1,20) as $index) {
            try{
                Bid::insert([
                    'lot_id' => $faker->randomElement($articlesIDs),
                    'user_id' => $faker->randomElement($usersIDs),
                    'max_bid' => $faker->numberBetween($min = 1001, $max = 9000)
                ]);
            }
            catch(\Exception $e){
                continue;
            }

        }
    }
}
