<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request['date'] ?? null;
        // Vista de historial clinico 
        // Se obtienen los datos de la tabla appointments
        $appointments = Appointment::with('doctor', 'patient')
            ->when($data, function ($query, $d) {
                // dd($d);
                $query->where('date', 'like', '%' . Carbon::parse($d)->toDateString() . '%');
            })->get();
        // dd(Carbon::parse($request['date']));
        // dd(Carbon::parse($request['date'])->toDateString());

        // dd($appointments);
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
