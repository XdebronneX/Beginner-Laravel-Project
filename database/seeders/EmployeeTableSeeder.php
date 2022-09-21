<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use Faker\Factory as faker;

class EmployeeTableSeeder extends Seeder
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
            Employee::create([
                'fname' => $faker->firstName(),
                'lname' => $faker->lastName(),
                'addressline' => $faker->address(),
                'town' => $faker->city(),
                'zipcode' => $faker->postcode(),
                'phone'=> $faker->phoneNumber(),
                'email' => $faker->unique()->safeEmail(),
                'password' => bcrypt('123456'),
                'img_path' => $faker->image('public/images',80,80, null, false)
                ]);
        }
    }
}
