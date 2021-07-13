<?php

namespace Database\Factories;

use App\Models\Reservaciones;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservacionesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservaciones::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            $dt = $this->faker->dateTimeBetween($startDate = '+2 days', $endDate = '+1 week');
        $date = $dt->format("Y-m-d"); // 1994-09-24

        return [
            "fecha"=>$date,
            "hora"=>$this->faker->time(), // Horas
            "comentario"=> $this->faker->randomElement(["0","1","2","3"])
        ];
    }
}
