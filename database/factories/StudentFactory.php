<?php

namespace Database\Factories;
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
    public function definition()
    {
        return [
            'name_student' => fake()->name(),
            'surname_student' => fake()->lastName(),
            'dni_student' => fake()->numberBetween(11111111,99999999),
            'course_student' => 1
        ];
    }
}
