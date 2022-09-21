<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pet;
use Faker\Factory as faker;

class PetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
        $faker = Faker::create();
        foreach(range(1,10) as $index) {
            Pet::create([
                'customer_id' => $faker->numberBetween($min = 1, $max = 10),
                'pname' => $faker->lastName(),
                'age' => $faker->numberBetween($min = 1, $max = 5),
                'gender' => $faker->randomElement(['male', 'female']),
                'petb_id' => $faker->numberBetween($min = 1, $max = 7),
                'img_path' => $faker->image('public/images',80,80, null, false)
                ]);
        }
    }
}
