<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PokemonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * List of Pokemon / Teir Level
         */
        $pokemon = [
            "Machamp"    => 3,
            "Gengar"     => 3,
            "Alakazam"   => 3,
            "Vaporeon"   => 3,
            "Flareon"    => 3,
            "Jolteon"    => 3,
            "Tyranitar"  => 4,
            "Snorlax"    => 4,
            "Lapras"     => 4,
            "Venasaur"   => 4,
            "Blastoise"  => 4,
            "Charizard"  => 4,
        ];

        foreach ($pokemon as $mon => $tier) {
            DB::table('pokemon')->insert([
                'name' => $mon,
                'tier' => $tier,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

    }
}
