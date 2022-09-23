<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Vista de historial clinico 

        // Se obtienen los datos de la tabla appointments
        $appointments = Appointment::all();
        // Se retorna la vista con los datos
        return Inertia::render('Appointments/Index', compact('appointments'));
    }
    public function show(Patient $patient)
    {
        // Vista de historial clinico 

        // Se obtienen los datos de la tabla appointments
        $appointments = Appointment::where('patient_id', $patient)->get();
        // Se retorna la vista con los datos
        return Inertia::render('Appointments/Index', compact('appointments'));
    }
}
