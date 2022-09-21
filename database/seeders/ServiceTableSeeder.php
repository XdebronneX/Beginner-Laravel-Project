<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GroomingService;
use Faker\Factory as faker;

class ServiceTableSeeder extends Seeder
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
            Groomingservice::create([
                'service_name' => $faker->unique()->word(),
                'service_cost'   =>  $faker->numberBetween($min = 1000, $max = 9000),
                'img_path' => $faker->image('public/images',80,80, null, false)
                // 'img_path' => $faker->image(storage_path('app/images/service'),80,80, null, false),
                ]);
        }
    }
    
}
