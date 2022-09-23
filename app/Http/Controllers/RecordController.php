<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class RecordController extends Controller
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






    // FUNCIONES CRUD DE FICHA MEDICA 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valido 
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'patient_id' => 'required',
        ]);
        // Obtengo datos de realciones 
        $payload = $request->all();
        $payload['doctor_id'] = auth()->user()->id;
        $record = Record::create($payload);

        return redirect()->route('patients.show', $record->patient_id);
    }

}
