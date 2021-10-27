<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class MovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $files = Storage::allFiles('/public/images');
        $randomFile = $files[rand(0, count($files) - 1)];

        return [
            'status' => $this->faker->numberBetween(1,2),
            'name' => $this->faker->city(),
            'rating' => $this->faker->randomFloat(2,1,10),
            'description' => $this->faker->paragraph(3),
           // 'image' => $this->faker->image('public/images', 140, 207, null, false),
            'image' => basename($randomFile)
        ];
    }
}
