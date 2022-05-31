<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $title = $faker->sentence(rand(2, 3));
        $price = $faker->numberBetween(100, 500);
        $old_price = $faker->numberBetween(500, 850);


        $decrease = $old_price - $price;
        $discount = $decrease / $old_price * 100;

        DB::table('products')->insert([
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $faker->paragraph(4),
            'price' => $price,
            "image_link" => "product-" . $faker->numberBetween(1, 12) . ".jpg",
            'isInstock' => true,
            'isFeatured' => $faker->boolean(),
            'old_price' => $old_price > $price ? $old_price : 0,
            'discount' => $old_price > $price ? $discount : 0,
            'category_id' => $faker->numberBetween(1, 6),
        ]);
    }
}
