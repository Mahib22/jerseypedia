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
        ]);

        DB::table('categories')->insert([
        	'category' => 'Jersey Bola Pria',
        ]);

        DB::table('categories')->insert([
        	'category' => 'Jersey Bola Wanita',
        ]);
    }
}
