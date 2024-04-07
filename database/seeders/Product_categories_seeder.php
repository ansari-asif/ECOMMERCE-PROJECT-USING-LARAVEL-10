<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class Product_categories_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker=Faker::create();

        $categories=[];
        for ($i=0; $i < 10; $i++) { 
            $categories[]=[
                'name'=>$faker->unique()->word(3),
                'description'=>$faker->sentence(5),
            ];
        }
        DB::table('product_categories')->insert($categories);
    }
}
