<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

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

        return [
            'status' => $this->faker->numberBetween(1,2),
            'name' => $this->faker->city() . ' ' . $this->faker->companySuffix(),
            'rating' => $this->faker->randomFloat(2,1,10),
            'description' => $this->faker->paragraph(3),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
