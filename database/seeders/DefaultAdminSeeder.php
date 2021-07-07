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
        $date = new DateTime("2001-06-12");
        $admin = User::create([
            "name" => "Pablo",
            "password" => bcrypt("password"),
            "apellido" => "Vega Valverde",
            "dni" => "74741985",
            "email" => "pablo@gmail.com",
            "celular" => "980251512",
            "fecha_nac" => $date,
            "edad" => "20",
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
        //Crear 8 Productos
        $productos = Productos::factory(8)->create();

        //Crear 8 Contactos
        $contactos = Contactos::factory(8)->create();
    }
}
