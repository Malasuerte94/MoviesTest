<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artist::factory()->has(Movie::factory()->count(3))
        ->count(30)
        ->create();
    }
}
