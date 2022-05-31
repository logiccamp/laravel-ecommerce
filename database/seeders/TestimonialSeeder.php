<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // message, name, post, photo
        DB::table('testimonials')->insert([
            'message' => $faker->sentence(rand(15, 22)),
            'name' => $faker->name(),
            'post' => $faker->sentence(2),
            'photo' => "http://i.pravatar.cc/300",
        ]);
    }
}
