<?php

use Illuminate\Database\Seeder;
use App\Models\Lot;
use App\Models\Image;
use Faker\Factory as Faker;

use Illuminate\Support\Facades\File;

class LotsTableSeeder extends Seeder
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

        $filepath = public_path('storage/images');

        if(!File::exists($filepath)){
            File::makeDirectory($filepath);  //follow the declaration to see the complete signature
        }

        foreach (range(1,16) as $index) {

            Lot::insert([
                'title' => $faker->unique()->sentence($nbWords = 15 , $variableNbWords = true),
                'description' => $faker->realText($maxNbChars = 1000, $indexSize = 2),
                'deadline' => $faker->dateTimeBetween($startDate = '2 days', $endDate = '30 days', $timezone = null),
                'starting_price' => 1000,
                //'image' => $faker->image($filepath,200,300, null, false)
                'category_id' => $faker->numberBetween(1, 4),
                'thumbnail' => strval($index).'.png'
            ]);

            Image::insert([
                'lot_id' => $index,
                'name' => strval($index).'.png'
            ]);

        }

        foreach (range(1,35) as $index) {

            $name = $faker->image($filepath,400,300, null, false);
            //$preview = $faker->image($filepath,200,300, null, false);

            Lot::insert([
                'title' => $faker->unique()->sentence($nbWords = 15 , $variableNbWords = true),
                'description' => $faker->realText($maxNbChars = 1000, $indexSize = 2),
                'deadline' => $faker->dateTimeBetween($startDate = '2 days', $endDate = '30 days', $timezone = null),
                'starting_price' => 1000,
                'category_id' => $faker->numberBetween(1, 4),
                'thumbnail' => $name
            ]);

            Image::insert([
                'lot_id' => $index,
                'name' => $name
            ]);

        }

    }
}
