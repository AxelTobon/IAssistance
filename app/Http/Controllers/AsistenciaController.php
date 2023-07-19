<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view ('asistencia.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $datos['asistencias'] = Asistencia::paginate(20);
        

        return view ('asistencia.create',$datos);
        //return view ('asistencia.create');

        // $asistencia =User::findOrFail($id); 
        // return view('asistencia.create', compact('asistencia'));
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
         //

         //Validacion para insertar solo entrada
         //
        //  $validData = $request->validate([
        //     'name' => 'required|min:3',
        // ]);
        // $asistencias = new Asistencia();
        // $asistencias->name = $validData ['name'];
        // $asistencias->datetime_in = Carbon::now();
        // $asistencias->save();
        //return redirect('/asistencia/create');


        $empleadoId = $request->input('name');


        // Obtener el usuario por su nombre
        $user = DB::table('users')->where('name', $empleadoId)->first();
        
        // Verificar si el usuario existe y su estado es activo
if (!$user || $user->status == 'Inactivo') {
    //return redirect()->route('asistencia.create')->with('success', 'El empleado no existe o está inactivo.');


    $errorMessage = 'El empleado no existe o está inactivo.';
    Session::flash('error', $errorMessage);

    return Redirect::route('asistencia.create')->withErrors($errorMessage);

}
      
        $user_id = DB::table('users')->where('name', $empleadoId)->first();

        if (!$user_id) {

            $errorMessage = 'El empleado no existe.';
            Session::flash('error', $errorMessage);
        
            return Redirect::route('asistencia.create')->withErrors($errorMessage);

            //return redirect()->route('asistencia.create')->with('error', 'El empleado no existe.');
        }


        // Verificar si hay registros de asistencia para el empleado
        $asistencia = Asistencia::where('name', $empleadoId)->latest()->first();

        if ($asistencia) {
            // Si ya hay una entrada y una salida registradas, no hacer nada
            if ($asistencia->datetime_in && $asistencia->datetime_out) {
                //return response()->json(['message' => 'Ya se ha registrado la asistencia completa.']);
                
                //return redirect('/asistencia/create');

                $errorMessage = 'Ya se ha registrado la asistencia completa.';
                Session::flash('error', $errorMessage);
            
                return Redirect::route('asistencia.create')->withErrors($errorMessage);
                //return redirect()->route('asistencia.create')->with('error', 'Ya se ha registrado la asistencia completa.');
                
            }

            // Si hay una entrada registrada pero no una salida, insertar la hora de salida
            if ($asistencia->datetime_in && !$asistencia->datetime_out) {
                $asistencia->datetime_out = Carbon::now();
                $asistencia->save();

                // return response()->json(['message' => 'Se ha registrado la hora de salida.']);
           
                // return redirect('/asistencia/create');
                $successMessage = 'Se ha registrado la hora de salida.';
                Session::flash('success', $successMessage);
    
                return Redirect::route('asistencia.create')->with('success', $successMessage);
                //return redirect()->route('asistencia.create')->with('success', 'Se ha registrado la hora de salida.');
            }
        }

        // Si no hay registros de asistencia o no hay una entrada registrada, insertar la hora de entrada
        $asistenciaNueva = new Asistencia();
        $asistenciaNueva->name = $empleadoId;
        $asistenciaNueva->datetime_in = Carbon::now();
        $asistenciaNueva->save();

        // return response()->json(['message' => 'Se ha registrado la hora de entrada.']);
      
        // return redirect('/asistencia/create');
        $successMessage = 'Se ha registrado la hora de entrada.';
        Session::flash('success', $successMessage);

        return Redirect::route('asistencia.create')->with('success', $successMessage);
        //return redirect()->route('asistencia.create')->with('success', 'Se ha registrado la hora de entrada.');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function show(Asistencia $asistencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Asistencia $asistencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asistencia $asistencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asistencia $asistencia)
    {
        //
    }
}
