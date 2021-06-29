<?php

namespace Database\Factories;

use App\Models\Consultas;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConsultasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Consultas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $dt = $this->faker->dateTimeBetween($startDate = '-3 days', $endDate = 'now');
        $date = $dt->format("Y-m-d"); // 1994-09-24
        return [
            'fecha' => $date,
            'sintomas' => $this->faker->lastName,
            'diagnostico' => $this->faker->lastName
        ];
    }
}
