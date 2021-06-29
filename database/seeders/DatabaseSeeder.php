<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mascotas;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DefaultAdminSeeder::class);
    }
}
