<?php

namespace Database\Factories;

use App\Models\Mascotas;
use Illuminate\Database\Eloquent\Factories\Factory;

class MascotasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mascotas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->Name,
            'especie' => $this->faker->lastName,
            'raza' => $this->faker->lastName,
            'sexo' => $this->faker->randomElement(["m","h"])
        ];
    }
}
