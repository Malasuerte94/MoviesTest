<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movie::factory()->has(Artist::factory()->count(5))
        ->count(10)
        ->create();
    }
}
