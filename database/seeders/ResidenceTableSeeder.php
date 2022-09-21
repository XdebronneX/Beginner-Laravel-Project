<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use Faker\Factory as faker;

class ResidenceTableSeeder extends Seeder
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
            Customer::create([
                'title' => $faker->title($gender = 'others'|'male'|'female'),
                'lname' => $faker->lastName(),
                'fname' => $faker->firstName($gender = 'others'|'male'|'female'),
                'addressline' => $faker->address(),
                'town' => $faker->city(),
                'zipcode' => $faker->postcode(),
                'phone'=> $faker->phoneNumber(),
                'img_path' => $faker->image('public/images',80,80, null, false)
                ]);
        }
    }
}
