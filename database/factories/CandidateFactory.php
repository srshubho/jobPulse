<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidate>
 */
class CandidateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => fake()->name(),
            'father_name' => fake()->name(),
            'mother_name' => fake()->name(),
            'date_of_birth' => fake()->date(),
            'gender' => fake()->randomElement(['male', 'female']),
            'phone' => fake()->phoneNumber(),
            'present_address' => fake()->address(),
            'status' => 'active',
            'summary' => fake()->text(1000),
            'skills' => implode(',', fake()->words(5)),
            'website' => fake()->url(),
            'user_id' => User::factory()->state(['user_type' => 'candidate']),

        ];
    }
}
