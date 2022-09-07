<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


    $faker = \Faker\Factory::create('id_ID');
    for ($i = 0; $i < 5; $i++) {
        DB::table('users')->insert([
            'name'      => $faker->name(),
            'email'       => $faker->safeEmail(),
            'password'       => bcrypt('password')
        ]);
    }

    for ($i = 0; $i < 5; $i++) {
        DB::table('stores')->insert([
            'name'  => $faker->company(),
            'user_id' => $faker->numberBetween(1,5)
        ]);
    }

    for ($i = 0; $i < 5; $i++) {
        DB::table('products')->insert([
            'name'  => $faker->word(),
            'slug' => $faker->slug(),
            'price' => $faker->randomNumber(6,true),
            'description' => $faker->sentence(),
            'photo' => $faker->url(),
            'store_id' => $faker->numberBetween(1,5),
            'user_id' => $faker->numberBetween(1,5)
        ]);
    }

    // for ($i = 0; $i < 5; $i++) {
    //     DB::table('product_reviews')->insert([
    //         'score'  => $faker->randomDigitNotNull(),
    //         'review' => $faker->sentence(),
    //         'user_id' => $faker->numberBetween(1,5),
    //         'product_id' => $faker->numberBetween(1,5)
    //     ]);
    // }


    }
}
