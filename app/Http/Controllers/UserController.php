<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $datos['users']=User::paginate(5);
        return view ('users.index', $datos);

    }


    public function create()
    {
        return view ('users.create');
    }

    public function store(Request $request)
    
    {
        $datosUsers = request()->except('_token');
        //$datosUsers = request()->all();
        User::insert($datosUsers);
        return response()->json($datosUsers);
    }



    public function edit($id)
    {
        //
        $users =User::findOrFail($id); 
        return view('users.edit', compact('users'));
        
    }



    public function update(Request $request, $id)
    {
        $datosUsers = request()->except(['_token','_method']);
        User::where('id','=',$id)->update($datosUsers);


        $users =User::findOrFail($id); 
        //return view('users.edit', compact('users'));
        return redirect('users/index');

    }


    public function destroy($id)
    {
        //
        User::destroy($id);

        
        return redirect('users');
    }
}
