<?php

namespace Database\Factories;

use App\Models\Patient;
use App\Models\Record;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $r  = random_int(0, 1);
        return [
            'status' => ['Pendiente', 'Atendido'][$r],
            'date' => $this->faker->date,
            'patient_id' => Patient::all('id')->random(),
            'doctor_id' => 1,
        ];
    }
}
