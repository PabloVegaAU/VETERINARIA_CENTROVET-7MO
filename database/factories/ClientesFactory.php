<?php

namespace Database\Factories;

use App\Models\Clientes;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Clientes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $dt = $this->faker->dateTimeBetween($startDate = '-60 years', $endDate = '-18 years');
        $date = $dt->format("Y-m-d"); // 1994-09-24

        return [
            'nombre' => $this->faker->lastName,
            'apellido' => $this->faker->lastName,
            'dni' => $this->faker->randomNumber(8),
            'email' => $this->faker->unique()->safeEmail(),
            'celular' => $this->faker->randomNumber(9),
            'fecha_nac' => $date,
            'edad' => $this->faker->randomNumber(2),
            'sexo' => $this->faker->randomElement(["m","f"]),
            'domicilio' => $this->faker->lastName,
        ];
    }
}
