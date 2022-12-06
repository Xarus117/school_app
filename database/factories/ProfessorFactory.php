<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProfessorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name_prof' => fake()->name(),
            'surname_prof' => fake()->lastName(),
            'dni_Prof' => fake()->numberBetween(11111111,99999999)
        ];
    }
}
