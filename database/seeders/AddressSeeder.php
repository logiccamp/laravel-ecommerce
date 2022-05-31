<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table('addresses')->insert([
            "user_id" => 3,
            "street_address" => $faker->streetAddress(),
            "city" => $faker->city(),
            "state" => "Lagos",
            'postcode' => $faker->postcode(),
            "phone" => $faker->phoneNumber(),
        ]);
    }
}
