<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Consultation;
use Faker\Factory as faker;

class ConsultTableSeeder extends Seeder
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
            Consultation::create([
                'disease_id' => $faker->numberBetween($min = 1, $max = 5),
                'pet_id' => $faker->numberBetween($min = 1, $max = 73),
                'emp_id' => $faker->numberBetween($min = 1, $max = 54),
                'observation' => $faker->unique()->word(),
                'consult_cost'   =>  $faker->numberBetween($min = 1000, $max = 9000)
                ]);
        }
    }
    
}
