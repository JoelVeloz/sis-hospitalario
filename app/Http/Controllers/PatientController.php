<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use COM;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
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
            'birthdate' => 'required|date',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'gender' => 'required|in_array:Masculino,Femenino',
            'age' => 'required|integer'
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
        return response()->json($patient, 200);
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
            'identification' => 'required|unique:patients',
            'birthdate' => 'required|date',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'gender' => 'required|in_array:Masculino,Femenino',
            'age' => 'required|integer'
        ]);
        // Se actualiza
        $patient->update($request->all());
        // Se retorna
        return response()->json($patient, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        // D
        // Se elimina
        $patient->delete();
        // Se retorna
        return response()->json(null, 204);
    }
}
