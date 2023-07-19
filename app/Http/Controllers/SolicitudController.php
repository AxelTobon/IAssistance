<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use App\Models\Adscripcion;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;
use DB;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;




use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;



class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view ('solicitud.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $users = User::all();
        $adscripcions = Adscripcion::pluck('adscripcion', 'id');
        return view('solicitud.create', compact('users', 'adscripcions'));
        
    }
    public function getUserName(Request $request)
{
    $employeeId = $request->input('employee_id');
    $user = User::where('employee_number', $employeeId)->first();
    $employeeName = $user->name;

    return response()->json($employeeName);
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //SE REGISTRARA Y SE ACTUALIZARA EL ACUMULADOR Y LA ADSCRIPCION DE LAS SOLICITUDES
        //VALIDA QUE EL EMPLEADO EXISTA EN LA TABLA USERS

     
        //Validación de los campos de entrada
//         $request->validate([
//             'nombre_empleado' => 'required|string',
//             'numero_empleado' => 'required|numeric',
//             'adscripcion' => 'required|string',
//         ]);

//         // Verificar si el usuario existe en la tabla 'users'
//         $existingUser = User::where('nempleado', $request->numero_empleado)->first();

//         if (!$existingUser) {
//             // Si el usuario no existe, retorna un mensaje de error
//             return response()->json(['error' => 'El número de empleado no corresponde a ningún usuario existente.'], 404);
//         }


// // Verificar si el acumulador es menor o igual a 14
//         if ($request->acumulador <= 14) {
//             // Verificar si ya existe un registro de solicitud para el usuario autenticado
//             $existingSolicitud = Solicitud::where('numero_empleado', $request->numero_empleado)->first();

//             if ($existingSolicitud) {
//                 // Si existe un registro, se actualiza la adscripción, se incrementa el acumulador y se actualiza la fecha de actualización
//                 $existingSolicitud->adscripcion = $request->adscripcion;
//                 $existingSolicitud->acumulador += 1;
//                 $existingSolicitud->updated_at = now();
//                 $existingSolicitud->save();

//                 // Realizar cambios adicionales si el acumulador es mayor a 14
//                 if ($existingSolicitud->acumulador > 14) {
//                     // Realizar los cambios adicionales aquí
//                     // ...
//                 }
//             } else {
//                 // Si no existe un registro, se crea uno nuevo
//                 $solicitud = new Solicitud();
//                 $solicitud->nombre_empleado = $request->nombre_empleado;
//                 $solicitud->numero_empleado = $request->numero_empleado;
//                 $solicitud->adscripcion = $request->adscripcion;
//                 $solicitud->acumulador = 1;
//                 $solicitud->created_at = now();
//                 $solicitud->save();
//             }

//             // Respuesta de éxito
//             return response()->json(['message' => 'Solicitud registrada actualizada correctamente.']);
//         } else {
//             // Respuesta de error cuando el acumulador es mayor a 14
//             return response()->json(['error' => 'El acumulador debe ser menor o igual a 14 para insertar o actualizar la solicitud.'], 403);
//         }    







             //TERMINA PRIMER CODIGO///////////




             ///EMPIEZA SEGUNDO CODIGO//

             $validatedData = $request->validate([
                'numero_empleado' => 'required|numeric',
                'nombre_empleado' => 'required|string',
                'adscripcion' => 'required|string',
            ]);
        
            // Verificar si existe el empleado en la tabla 'users'
            $user = DB::table('users')
                ->where('name', $validatedData['nombre_empleado'])
                ->where('nempleado', $validatedData['numero_empleado'])
                ->first();
        
            if ($user) {
                $existingRecord = DB::table('solicituds')
                    ->where('numero_empleado', $validatedData['numero_empleado'])
                    ->orderByDesc('id')
                    ->first();
        
                if ($existingRecord) {
                    $acumulador = $existingRecord->acumulador + 1;
                } else {
                    $acumulador = 1;
                }
        
                $validatedData['acumulador'] = $acumulador;
                $validatedData['created_at'] = now();
        
                if ($acumulador <= 14) {
                    DB::table('solicituds')->insert($validatedData);
                    // Resto de la lógica de tu controlador
                    // Redireccionar o devolver una respuesta apropiada
                    
                                // Mensaje de confirmación
            $successMessage = 'La solicitud ha sido realizada con éxito.';
            Session::flash('success', $successMessage);

            return Redirect::route('solicitud.create')->with('success', $successMessage);
                } else {
                    // Lógica para manejar la inserción rechazada
                    // por exceder el límite del acumulador
                    $errorMessage = 'Se ha excedido el límite solicitudes.';
                    Session::flash('error', $errorMessage);
        
                    return Redirect::route('solicitud.create')->withErrors($errorMessage);

                }
            } else {
                // Lógica para manejar la inserción rechazada
                // cuando las columnas no coinciden en la tabla 'users'
                $errorMessage = 'No se encontró un empleado válido.';
                Session::flash('error', $errorMessage);
        
                return Redirect::route('solicitud.create')->withErrors($errorMessage);

            }
                


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitud $solicitud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitud $solicitud)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitud $solicitud)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitud $solicitud)
    {
        //
    }


    public function showEmployeeView()
    {
        $users = User::all();
    
        return view('employee', compact('users'));
    }


}
