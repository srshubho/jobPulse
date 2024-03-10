<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'context' => fake()->text(1000),
            'deadline' => now()->addDays(7),
            'status' => 'approved',
            'approved_at' => now(),
            'location' => fake()->city(),
            'educational_requirement' => fake()->sentences(1000),
            'experience_requirement' => fake()->sentences(1000),
            'additional_requirement' => fake()->sentences(1000),
            'benefits' => fake()->sentences(1000),
            'type' => fake()->randomElement(['full-time', 'part-time', 'internship', 'contract']),
            'salary' => fake()->randomNumber(5, true),
            'skills' => implode(',', fake()->words(5)),


        ];
    }
}
