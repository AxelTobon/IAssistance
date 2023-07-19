<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Omisiones;
use App\Models\Bajas;
use App\Models\Solicitud;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Adscripcion;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class OmisionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('omisiones.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $adscripcions = Adscripcion::pluck('adscripcion', 'id');
        return view('omisiones.create', compact('users', 'adscripcions'));
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

        $validatedData = $request->validate([
            'numero_empleado' => 'required|numeric',
            'nombre_empleado' => 'required|string',
            'adscripcion' => 'required|string',
            'puesto' => 'required|string',
            'incidencia' => 'required|array', // Asegurarse de que se envíe un array
            'fecha' => 'required|date',
            'motivo' => 'required|string',
        ],[
            'numero_empleado.required' => 'El campo numero_empleado es obligatorio.',
            'nombre_empleado.required' => 'El campo nombre es obligatorio.',
            'adscripcion.required' => 'El campo adscripcion es obligatorio.',
            'puesto.required' => 'El campo puesto es obligatorio.',
            'incidencia.required' => 'El campo incidencia es obligatorio.',
            'fecha.required' => 'El campo fecha es obligatorio.',
            'motivo.required' => 'El campo motivo es obligatorio.',



        ]);

        // Validación y manejo de archivos
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $nombreArchivo = uniqid().'.'.$archivo->getClientOriginalExtension();
            $archivo->move(public_path('uploads'), $nombreArchivo);
        }


       // dd($request->all());

        // Obtener el valores de inputs
        $numero_empleado  = $request->input('numero_empleado');
        $nombre_empleado  = $request->input('nombre_empleado');
        $adscripcion  = $request->input('adscripcion');
        $puesto  = $request->input('puesto');
        $incidencia  = $request->input('incidencia');
        $fecha = $request->input('fecha');
        $motivo  = $request->input('motivo');
        $notas = $request->input('notas');



          // Almacenar la fecha en la base de datos
          $usuario = new Omisiones();
          $usuario->numero_empleado = $numero_empleado;
          $usuario->nombre_empleado = $nombre_empleado;
          $usuario->adscripcion =$adscripcion ;
          $usuario->puesto = $puesto;
          $usuario->incidencia =  json_encode($request->incidencia);
          $usuario->fecha = $fecha;
          $usuario->motivo = $motivo;
          $usuario->notas = $notas;
          $usuario->archivo = $nombreArchivo ?? null;
          
          


          // Guardar el usuario en la base de datos
        $usuario->save();
        $successMessage = 'La omision ha sido realizada con éxito.';
        Session::flash('success', $successMessage);

        return Redirect::route('omisiones.create')->with('success', $successMessage);
        

        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Omisiones  $omisiones
     * @return \Illuminate\Http\Response
     */
    public function show(Omisiones $omisiones)
    {
      
        $user = Auth::user();
        $omisionesA = Omisiones::where('nombre_empleado', $user->name)->get();
        $bajasA = Bajas::where('nombre_empleado', $user->name)->get();
        $solicitudesA = Solicitud::where('nombre_empleado', $user->name)->get();


        $omisiones = Omisiones::all();
        $bajas = Bajas::all();
        $solicitudes = Solicitud::all();
        
        return view('omisiones.show', compact('omisionesA', 'bajasA','solicitudesA','omisiones', 'bajas','solicitudes',));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Omisiones  $omisiones
     * @return \Illuminate\Http\Response
     */
    public function edit(Omisiones $omisiones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Omisiones  $omisiones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Omisiones $omisiones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Omisiones  $omisiones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Omisiones $omisiones)
    {
        //
    }
}
