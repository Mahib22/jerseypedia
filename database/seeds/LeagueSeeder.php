<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeagueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('leagues')->insert([
        	'name' => 'Bundes Liga',
        	'country' => 'Jerman',
        	'img' => 'bundesliga.png',
        ]);

        DB::table('leagues')->insert([
        	'name' => 'Premier League',
        	'country' => 'Inggris',
        	'img' => 'premierleague.png',
        ]);

        DB::table('leagues')->insert([
        	'name' => 'La Liga',
        	'country' => 'Spanyol',
        	'img' => 'laliga.png',
        ]);

        DB::table('leagues')->insert([
        	'name' => 'Serie A',
        	'country' => 'Italia',
        	'img' => 'seriea.png',
        ]);
    }
}
