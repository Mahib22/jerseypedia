<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            'category' => 'Jersey Bola Anak',
            'slug' => 'jersey-bola-anak',
        ]);

        DB::table('categories')->insert([
            'category' => 'Jersey Bola Pria',
            'slug' => 'jersey-bola-pria',
        ]);

        DB::table('categories')->insert([
            'category' => 'Jersey Bola Wanita',
            'slug' => 'jersey-bola-wanita',
        ]);
    }
}
