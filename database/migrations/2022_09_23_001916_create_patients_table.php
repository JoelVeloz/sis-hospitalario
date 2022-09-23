<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // MODELO Paciente 

        // Nombres
        // Apellidos
        // Cedula
        // Fecha de nacimiento
        // Telefono
        // Direccion
        // Email
        // Genero
        // Edad

        Schema::create('patients', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('lastname');
            $table->string('identification');
            $table->date('birthdate');
            $table->string('phone');
            $table->string('address');
            $table->string('email');
            $table->string('gender');

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
        Schema::dropIfExists('patients');
    }
};
