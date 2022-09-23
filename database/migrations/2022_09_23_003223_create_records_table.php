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

        // Bajo logica de un sistema administrativo 
        // MODELO DE FICHA MEDICA 

        // Titulo )
        // Descripcion (se redactan los medicamentos a tomar)
        // Doctor a cargo (el usuario logeado)
        // Paciente (el usuario que se le asigna la ficha medica)


        Schema::create('records', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('description');
            $table->foreignId('doctor_id')->constrained('users');
            $table->foreignId('patient_id')->constrained('patients');
            
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
        Schema::dropIfExists('records');
    }
};
