<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // for ($i = 0; $i < 30; $i++) {
        //     $this->call([
        //         ProductSeeder::class,
        //     ]);
        // }
        $this->call([AddressSeeder::class]);
        // for ($i = 0; $i < 7; $i++) {
        //     $this->call([
        //         TestimonialSeeder::class,
        //     ]);
        // }
    }
}
