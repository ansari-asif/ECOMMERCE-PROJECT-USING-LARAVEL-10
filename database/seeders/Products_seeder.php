<?php

namespace Database\Seeders;

use App\Models\Product_category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class Products_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker=Faker::create();
        $products=[];
        $categoryIds=Product_category::pluck('id')->toArray();
        for ($i=0; $i < 20; $i++) { 
            $products[]=[
                "name"=>$faker->sentence(2),
                "short_description"=>$faker->paragraph,
                "long_description"=>$faker->paragraph,
                "price"=>$faker->randomFloat(2,10,100),
                'quantity' => $faker->numberBetween(1, 100),
                'image_url' => $faker->imageUrl(),
                'category_id' => $faker->randomElement($categoryIds),
            ];
        }
        DB::table('products')->insert($products);
    }
}
