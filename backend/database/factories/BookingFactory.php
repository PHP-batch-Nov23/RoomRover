<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Booking;
use \App\Models\User;
use \App\Models\Hotel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    protected $model = Booking::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'hotel_id' => Hotel::factory(),
            'customer_name' =>fake()->name,
            'no_people' => fake()->numberBetween(1, 10),
            'start_date' => fake()->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'end_date' => fake()->dateTimeBetween('+2 days', '+2 months')->format('Y-m-d'),
            'rooms_book' => fake()->numberBetween(1, 5),
        ];
    }
}
