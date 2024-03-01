<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Rol;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = \DB::table('roles')->select('roles.*')->where('estado','A')->orderby('id','ASC')->get();
        return view('roles')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
          'nombreRol' => ['required', 'min:3', 'max:150'],        
        ]);
        
        if( $validator->fails() ){
          return back()->withInput()->with('ErrorInsert','Error de Ingreso')->withErrors($validator);
        }else{
            //validar que no exista el rol//
            $existeRol = \DB::table('roles')
                          ->where([
                            ['nombreRol', '=', $request->nombreRol],
                            ['estado', '=','A']
                          ])->exists();
            //fin validar que no exista el rol//

            if(!$existeRol){
                $roles = Rol::create([
                  'nombreRol' => $request->nombreRol,                
                  'estado'    => 'A',
                  'usuarioCreacion' => Auth::user()->login,
                  'fechaCreacion'   => date("Y-m-d H:i:s")
                ]);
                return back()->withInput()->with('Listo','Se ha creado corectamente.');

            }else{
              return back()->withInput()->with('ErrorInsert','Error de Ingreso')->withErrors(['message1'=>'El rol ya existe']);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rol = Rol::find($id);

        $validator = Validator::make($request->all(),[
          'nombreRol' => ['required', 'min:3', 'max:150'],        
        ]);
        
        if( $validator->fails() ){
          return back()->withInput()->with('ErrorInsert','Error al Modificar')->withErrors($validator);
        }else{          
            $rol->nombreRol = $request->nombreRol;
            $rol->usuarioModificacion = Auth::user()->login;
            $rol->fechaModificacion   = date("Y-m-d H:i:s");
            $rol->save();

            return back()->withInput()->with('Listo','Se ha Modificado corectamente.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $rol = Rol::find($id);
      $rol->estado = 'X';
      $rol->save();

      return back()->withInput()->with('Listo','Se ha Eliminado corectamente.');
    }
}
