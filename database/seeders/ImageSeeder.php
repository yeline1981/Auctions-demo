<?php

use Illuminate\Database\Seeder;
use ZanySoft\Zip\Zip;
use App\Models\Image;
use Faker\Factory as Faker;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $to = public_path('storage/images');
        $from = base_path('tests/Images');

        $zip = Zip::open($from.'/test.zip');
        $zip->extract($to);
        $zip->close();


        $faker = Faker::create();

        $articlesIDs = DB::table('lots')->pluck('id');

        foreach (range(1,70) as $index) {
            try{
                Image::insert([
                    'lot_id' => $faker->randomElement($articlesIDs),
                    'name' => $faker->image($to, 400,300, null, false),
                ]);
            }
            catch(\Exception $e){
                continue;
            }

        }

    }

}
