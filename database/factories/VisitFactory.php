<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visit>
 */
class VisitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'shop_id' => \App\Models\Contact::inRandomOrder()->first()->id,
            'purpose' => fake()->sentence(),
            'location' => fake()->streetAddress(),
            'user_id' => fake()->numberBetween(1,10)
        ];
    }
}
