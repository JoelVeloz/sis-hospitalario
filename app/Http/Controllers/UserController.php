<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
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
        // Crud 
        // Se valida 
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        // Se crea un paciente en DB 
        User::create($request->all());
        // Se redirecciona a la vista de pacientes
        return redirect()
            ->route('user.index')
            ->with('success', 'Paciente creado con exito');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // cRud 
        //Se retorna la vista de un paciente realizando casting
        return view('user.show', compact('user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // crUd 
        // Se valida 
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        // Se actualiza  
        $user->update($request->all());

        // Se redirecciona a la vista de los pacientes
        return redirect()
            ->route('user.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    public function destroy(User $user)
    {
        // cruD
        // Se elimina el paciente
        $user->delete();
        // Se redirecciona a la vista de los pacientes
        return redirect()
            ->route('user.index')
            ->with('success', 'User deleted successfully');
    }
}
