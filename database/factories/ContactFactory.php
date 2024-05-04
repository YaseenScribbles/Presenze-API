<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'shop_name' => fake()->company(),
            'contact_name' => fake()->name(),
            'city' => fake()->city(),
            'zipcode' => fake()->numberBetween(100000,999999),
            'state' => fake()->city(),
            'district' => fake()->city(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->unique()->companyEmail(),
            'user_id' => fake()->numberBetween(1,10)
        ];
    }
}
