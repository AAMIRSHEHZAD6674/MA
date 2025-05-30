<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inspection>
 */
class InspectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'school_id' => \App\Models\School::factory(),
            'inspected_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'FineAmount' => $this->faker->numberBetween(0, 5000),
            'FineCollectedDate' => $this->faker->optional()->dateTime(),
            'ChallanNo' => $this->faker->optional()->numerify('CHL###'),
            'TransectionId' => $this->faker->optional()->uuid,
            'BankName' => $this->faker->optional()->company,
            'BranchCode' => $this->faker->optional()->numerify('BR###'),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
        ];
    }
}
