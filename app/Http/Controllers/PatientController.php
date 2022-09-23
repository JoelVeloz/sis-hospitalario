<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use COM;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Patients/Index', [
            'patients' => Patient::all()
        ]);
    }


    // FUNCIONES CRUD DE PACIENTES
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // C 
        // Se valida
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'identification' => 'required|unique:patients',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required|email',
        ]);
        // Se crea
        $patient = Patient::create($request->all());
        // Se retorna
        return response()->json($patient, 201);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        // R 
        // Se cargan las fichas medicas del paciente 
        $patient->load('records', 'records.doctor');
        // Se retorna
        // return response()->json($patient, 200);
        return Inertia::render('Patients/Show', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //U

        // Se valida
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'identification' => 'required|unique:patients,identification,' . $patient->id,
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required|email',
        ]);
        // dd($request->all());

        // Se actualiza
        $patient->update($request->all());

        // Se retorna
        // return response()->json($patient, 200);
        return redirect()->route('patients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        // dd($patient);
        // D
        // Se elimina
        $patient->records()->delete();
        $patient->appointments()->delete();
        $patient->delete();

        // Se retorna
        // return response()->json(null, 204);
        return redirect()->route('patients.index');
    }
}
