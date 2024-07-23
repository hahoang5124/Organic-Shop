<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i=0; $i < 50; $i++) { 
            Product::create([
                'name' =>$faker->word,
                'img' =>'hinh'.$i.'.png',
                'price' => $faker->numberBetween(100, 1000),
                'description' => $faker->sentence,
                'categoryid' => $faker->numberBetween(0, 11),
            ]);
        }
    }
}
