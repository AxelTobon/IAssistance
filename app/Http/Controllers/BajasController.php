<?php

namespace App\Http\Controllers;

use App\Models\Bajas;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class BajasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('bajas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        
        return view('bajas.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


        $nombre_empleado = $request->input('nombre_empleado');
        $numero_empleado = $request->input('numero_empleado');
        $describaja = $request->input('describaja');
        $durabaja = $request->input('durabaja');

        // Verificar si existen los campos en la tabla 'users'
        if (User::where('name', $nombre_empleado)
            ->where('nempleado', $numero_empleado)
            ->exists()) {
                  // Verificar si ya existe una baja registrada con los mismos datos
            if (Bajas::where('nombre_empleado', $nombre_empleado)
            ->where('numero_empleado', $numero_empleado)
            ->exists()) {

            // return response()->json(['message' => 'Ya existe una baja registrada con los mismos datos']);

            $errorMessage = 'Ya existe una baja registrada con los mismos datos';
            Session::flash('error', $errorMessage);
            return Redirect::route('bajas.create')->withErrors( $errorMessage);
        }

            
            $bajas = new Bajas();
            $bajas->nombre_empleado = $nombre_empleado;
            $bajas->numero_empleado = $numero_empleado;
            $bajas->fecha = now(); // Fecha actual
            $bajas->describaja = $describaja;
            $bajas->durabaja = $durabaja;

            $bajas->save();

            // Resto de la lógica que desees agregar después de guardar la baja

            // return response()->json(['message' => 'Baja registrada correctamente']);


            $successMessage = 'Baja registrada correctamente';
            Session::flash('success', $successMessage);
            return Redirect::route('bajas.create')->with('success', $successMessage);
        }

        // return response()->json(['message' => 'Los campos nombre empleado y número empleado no existen en la tabla de usuarios.']);

        $errorMessage = 'Los campos nombre empleado y número empleado no existen en la tabla de usuarios.';
        Session::flash('error', $errorMessage);
        return Redirect::route('bajas.create')->withErrors($errorMessage);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bajas  $bajas
     * @return \Illuminate\Http\Response
     */
    public function show(Bajas $bajas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bajas  $bajas
     * @return \Illuminate\Http\Response
     */
    public function edit(Bajas $bajas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bajas  $bajas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bajas $bajas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bajas  $bajas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bajas $bajas)
    {
        //
    }
}
