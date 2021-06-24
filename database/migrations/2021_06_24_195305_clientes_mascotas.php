<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClientesMascotas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes_mascotas', function (Blueprint $table) {
            $table->unsignedBigInteger('clientes_id');
            $table->unsignedBigInteger('mascotas_id');

            $table->primary(["clientes_id", "mascotas_id"]);

            $table->foreign('clientes_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('mascotas_id')->references('id')->on('mascotas')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes_mascotas');
    }
}
