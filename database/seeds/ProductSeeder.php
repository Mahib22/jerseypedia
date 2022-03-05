<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            'name' => 'CHELSEA 3RD 2018-2019',
            'price' => 150000,
            'weight' => 0.25,
            'img' => 'chelsea.png',
            'description' => 'Jersey Grade Ori kualitas bintang lima',
            'category_id' => 1,
            'league_id' => 2,
            'slug' => 'chelsea-3rd-2018-2019',
        ]);

        DB::table('products')->insert([
            'name' => 'LEICESTER CITY HOME 2018-2019',
            'price' => 150000,
            'weight' => 0.25,
            'img' => 'leicester.png',
            'description' => 'Jersey Grade Ori kualitas bintang lima',
            'category_id' => 1,
            'league_id' => 2,
            'slug' => 'leicester-city-home-2018-2019',
        ]);

        DB::table('products')->insert([
            'name' => 'MAN. UNITED AWAY 2018-2019',
            'price' => 150000,
            'weight' => 0.25,
            'img' => 'mu.png',
            'description' => 'Jersey Grade Ori kualitas bintang lima',
            'category_id' => 1,
            'league_id' => 2,
            'slug' => 'man-united-away-2018-2019'
        ]);

        DB::table('products')->insert([
            'name' => 'LIVERPOOL AWAY 2018-2019',
            'price' => 150000,
            'weight' => 0.25,
            'img' => 'liverpool.png',
            'description' => 'Jersey Grade Ori kualitas bintang lima',
            'category_id' => 1,
            'league_id' => 2,
            'slug' => 'liverpool-away-2018-2019'
        ]);

        DB::table('products')->insert([
            'name' => 'TOTTENHAM 3RD 2018-2019',
            'price' => 150000,
            'weight' => 0.25,
            'img' => 'tottenham.png',
            'description' => 'Jersey Grade Ori kualitas bintang lima',
            'category_id' => 1,
            'league_id' => 2,
            'slug' => 'tottenham-3rd-2018-2019'
        ]);

        DB::table('products')->insert([
            'name' => 'DORTMUND AWAY 2018-2019',
            'price' => 150000,
            'weight' => 0.25,
            'img' => 'dortmund.png',
            'description' => 'Jersey Grade Ori kualitas bintang lima',
            'category_id' => 2,
            'league_id' => 1,
            'slug' => 'dortmund-away-2018-2019'
        ]);

        DB::table('products')->insert([
            'name' => 'BAYERN MUNCHEN 3RD 2018 2019',
            'price' => 150000,
            'weight' => 0.25,
            'img' => 'munchen.png',
            'description' => 'Jersey Grade Ori kualitas bintang lima',
            'category_id' => 2,
            'league_id' => 1,
            'slug' => 'bayern-munchen-3rd-2018-2019'
        ]);

        DB::table('products')->insert([
            'name' => 'JUVENTUS AWAY 2018-2019',
            'price' => 150000,
            'weight' => 0.25,
            'img' => 'juve.png',
            'description' => 'Jersey Grade Ori kualitas bintang lima',
            'category_id' => 2,
            'league_id' => 4,
            'slug' => 'juventus-away-2018-2019'
        ]);

        DB::table('products')->insert([
            'name' => 'AS ROMA HOME 2018-2019',
            'price' => 150000,
            'weight' => 0.25,
            'img' => 'asroma.png',
            'description' => 'Jersey Grade Ori kualitas bintang lima',
            'category_id' => 2,
            'league_id' => 4,
            'slug' => 'as-roma-home-2018-2019'
        ]);

        DB::table('products')->insert([
            'name' => 'AC MILAN HOME 2018 2019',
            'price' => 150000,
            'weight' => 0.25,
            'img' => 'acmilan.png',
            'description' => 'Jersey Grade Ori kualitas bintang lima',
            'category_id' => 3,
            'league_id' => 4,
            'slug' => 'ac-milan-home-2018-2019'
        ]);

        DB::table('products')->insert([
            'name' => 'LAZIO HOME 2018-2019',
            'price' => 150000,
            'weight' => 0.25,
            'img' => 'lazio.png',
            'description' => 'Jersey Grade Ori kualitas bintang lima',
            'category_id' => 3,
            'league_id' => 4,
            'slug' => 'lazio-home-2018-2019'
        ]);

        DB::table('products')->insert([
            'name' => 'REAL MADRID 3RD 2018-2019',
            'price' => 150000,
            'weight' => 0.25,
            'img' => 'madrid.png',
            'description' => 'Jersey Grade Ori kualitas bintang lima',
            'category_id' => 2,
            'league_id' => 3,
            'slug' => 'real-madrid-3rd-2018-2019'
        ]);
    }
}
