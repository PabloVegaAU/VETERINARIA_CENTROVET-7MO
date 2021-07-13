<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservaciones', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->time('hora', $precision = 0);
            $table->enum('estado',[0,1,2,3])->default(0);
            #FOREING KEY CLIENTES_ID
            $table->unsignedBigInteger('clientes_id')->nullable();
            $table->foreign('clientes_id')->references('id')->on('clientes')->onDelete('cascade');
            #FOREING KEY USERS_ID
            $table->unsignedBigInteger('users_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('comentario',50);
            #TIEMPOS CREATE - UPDATE
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
        Schema::dropIfExists('reservaciones');
    }
}
