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
        // MODELO DE CITAS MEDICAS

        // Estado  (pendiente, confirmada, cancelada)
        // Fecha de inicio (date)
        // ficha medica (la ficha medica a la que se le asigna la cita)

        Schema::create('appointments', function (Blueprint $table) {
            $table->id();

            $table->string('status');
            $table->timestamp('date');
            $table->foreignId('record_id')->constrained('records');
            $table->foreignId('patient_id')->constrained('patients');
            $table->foreignId('doctor_id')->constrained('users');

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
        Schema::dropIfExists('appointments');
    }
};
