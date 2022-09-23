<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    // FUNCIONES  DE FICHA MEDICA 

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
