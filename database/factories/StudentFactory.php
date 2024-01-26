<?php

namespace Database\Factories;

use App\Enums\Semester;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'image' => $this->faker->imageUrl(),
            'email' => fake()->unique()->safeEmail(),
            'semester' => $this->faker->randomElement(Semester::values()),
            'session' => $this->faker->numberBetween('2019', '2024'),
            'admission_date' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'contact_number' => $this->faker->phoneNumber,
            'portal_username' => $this->faker->url,
        ];
    }
}