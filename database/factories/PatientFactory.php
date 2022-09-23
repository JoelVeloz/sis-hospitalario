<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'lastname' => $this->faker->lastname,
            'identification' => random_int(1000000, 9999999),
            'birthdate' => $this->faker->date,
            'phone' => random_int(1000000, 9999999),
            'address' => $this->faker->address,
            'email' => $this->faker->email,
            'gender' => "Masculino",
        ];
    }
}
