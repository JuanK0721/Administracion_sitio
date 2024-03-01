<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermisosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permisos = \DB::table('permisos')->select('permisos.*')->where('estado', '=', 'A')->orderby('id','ASC')->get();
        return view('permisos')->with('permisos',$permisos);
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
        'nombrePermiso' => ['required', 'min:3', 'max:150'],        
      ]);
      
      if( $validator->fails() ){
        return back()->withInput()->with('ErrorInsert','Error de Ingreso')->withErrors($validator);
      }else{
          //validar que no exista el rol//
          $existePermiso = \DB::table('permisos')
                        ->where([
                          ['nombrePermiso', '=', $request->nombreRol],
                          ['estado', '=','A']
                        ])->exists();
          //fin validar que no exista el rol//

          if(!$existePermiso){
              $permiso = Permiso::create([
                'nombrePermiso' => $request->nombrePermiso,                
                'estado'        => 'A',           
                'usuarioCreacion' => Auth::user()->login,             
                'fechaCreacion'   => date("Y-m-d H:i:s")
              ]);
              return back()->withInput()->with('Listo','Se ha creado corectamente.');

          }else{
            return back()->withInput()->with('ErrorInsert','Error de Ingreso')->withErrors(['message1'=>'El permiso ya existe']);
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
      $permiso = Permiso::find($id);

      $validator = Validator::make($request->all(),[
        'nombrePermiso' => ['required', 'min:3', 'max:150'],        
      ]);
      
      if( $validator->fails() ){
        return back()->withInput()->with('ErrorInsert','Error al Modificar')->withErrors($validator);
      }else{          
          $permiso->nombrePermiso = $request->nombrePermiso;
          $permiso->usuarioModificacion = Auth::user()->login;
          $permiso->fechaModificacion   = date("Y-m-d H:i:s");
          $permiso->save();

          return back()->withInput()->with('Listo','Se ha Modificado corectamente.');
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $permiso = Permiso::find($id);
      $permiso->estado = 'X';
      $permiso->save();

      return back()->withInput()->with('Listo','Se ha Eliminado corectamente.');
    }
}
