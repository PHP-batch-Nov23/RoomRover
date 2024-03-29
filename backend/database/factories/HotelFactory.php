<?php

namespace Database\Factories;
use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HotelFactory extends Factory
{
    protected $model = Hotel::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->company,
            'city' => fake()->city,
            'address' => fake()->address,
            'rooms' => fake()->numberBetween(10, 100),
            'price'=>fake()->numberBetween(100, 50000) / 100
        ];
    }
}
