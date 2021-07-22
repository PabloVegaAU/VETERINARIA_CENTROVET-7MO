<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Mascotas;
use App\Models\Clientes;
use App\Models\Vacunas;
use App\Models\Consultas;
use App\Models\Productos;
use App\Models\Contactos;
use App\Models\Reservaciones;
use DateTime;
class DefaultAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = new DateTime("1998-06-12");
        $admin = User::create([
            "name" => "Veterinario",
            "password" => bcrypt("password"),
            "apellido" => "Veterinario Veterinario",
            "tipo"=>"ADMIN",
            "dni" => "74741985",
            "email" => "Veterinario@Veterinario.com",
            "celular" => "980254132",
            "fecha_nac" => $date,
            "edad" => "18",
            "sexo" => "M",
            "domicilio"=>"Casa"
            ]);

        //Crear 4 usuarios
        $users = User::factory(4)->create();

        //Crear 8 clientes
        $clientes = Clientes::factory(8)->create();

        //Crear 8 Mascotas
        foreach ($clientes as $cliente) {
            $mascotas = Mascotas::factory()->create([
                "clientes_id" =>$cliente->id
            ]);
            //Crear Vacuna para cada mascota
            $vacunas = Vacunas::factory()->create([
                "mascotas_id" =>$mascotas->id
                ]);
            //Crear Consulta para cada mascota
            $consultas = Consultas::factory()->create([
            "mascotas_id" =>$mascotas->id
                ]);
        }

        //Crear 8 Mascotas
        foreach ($clientes as $cliente) {

        }

        //Crear 8 Productos
        $productos = Productos::factory(8)->create();

        //Crear 8 Contactos
        $contactos = Contactos::factory(8)->create();
    }
}
