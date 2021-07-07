<?php

namespace Database\Factories;

use App\Models\Contactos;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contactos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'apellido' => $this->faker->lastName,
            'telefono' => $this->faker->randomNumber(9),
            'email' => $this->faker->unique()->safeEmail(),
            'comentario' => $this->faker->lastName
        ];
    }
}
