<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Usuario;
use Hash;
use Illuminate\Support\Facades\Auth;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $usuarios = \DB::table('usuarios')->select('usuarios.*')->where('estado','A')->orderby('id','ASC')->get();
        return view('usuarios')->with('usuarios',$usuarios);
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
            'nombres'   => ['required', 'min:3', 'max:150'],
            'apellidos' => ['required', 'min:3', 'max:150'],
            'email'     => ['required', 'min:3', 'email'],
            'login'     => ['required', 'min:3', 'max:50'],
            'foto'      => ['image','mimes:jpeg,png,jpg,gif','max:2048'],
            'password'  => ['required', 'min:3', 'required_with:confirmar_password', 'same:confirmar_password'],
            'confirmar_password' => ['required', 'min:3'],
        ]);
        if( $validator->fails() ){
          return back()->withInput()->with('ErrorInsert','Error de Ingreso')->withErrors($validator);
        }else{
          //validar que no exista el usuario//
            $existeUser = \DB::table('usuarios')
                          ->where([
                            ['nombres', '=', $request->nombres],
                            ['apellidos', '=', $request->apellidos],
                            ['estado', '=', 'A']
                          ])->exists();
          //fin validar que no exista el usuario//

          //validar que no exista el login del usuario//
            $existeLogin = \DB::table('usuarios')->where('login','=',$request->login)->exists();
          //fin validar que no exista el login del usuario//

          if(!$existeUser){
            if(!$existeLogin){
              $pathImagen = '(NULL)';
              if($request->hasFile('foto')){
                $foto = $request->file('foto')->store('imgUser','public');    
                $pathImagen = 'imgUser/'. $request->file('foto')->getClientOriginalName();
              }

              $usuario = Usuario::create([
                'nombres'   => $request->nombres,
                'apellidos' => $request->apellidos,
                'email'     => $request->email,
                'login'     => $request->login,
                'password'  => Hash::make($request->password),
                'estado'    => 'A',
                'foto'      => $pathImagen,
                'usuarioCreacion' => Auth::user()->login,
                'fechaCreacion'   => date("Y-m-d H:i:s")
              ]);
              return back()->withInput()->with('Listo','Se ha creado corectamente.');
            }else{
              return back()->withInput()->with('ErrorInsert','Error de Ingreso')->withErrors(['message1'=>'El login ya existe']);
            }            
          }else{
            return back()->withInput()->with('ErrorInsert','Error de Ingreso')->withErrors(['message1'=>'El usuario ya existe']);
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
        $usuario = Usuario::find($id);
        $validator = Validator::make($request->all(),[
            'nombres'   => ['required', 'min:3', 'max:150'],
            'apellidos' => ['required', 'min:3', 'max:150'],
            'email'     => ['required', 'min:3', 'email'],
            'login'     => ['required', 'min:3', 'max:50'],
            'foto'      => ['image','mimes:jpeg,png,jpg,gif','max:2048'],
        ]);
        if( $validator->fails() ){
            return back()->withInput()->with('ErrorInsert','Error de Actualizacion')->withErrors($validator);
        }else{
            //validar que no exista el login del usuario//
            $existeLogin = \DB::table('usuarios')->where('login','=',$request->login)->count();
            //fin validar que no exista el login del usuario//

            if($existeLogin == 1){
              if($request->hasFile('foto')){
                $foto = $request->file('foto')->store('imgUser','public');          
                $usuario->foto  = 'imgUser/'. $request->file('foto')->getClientOriginalName();          
              }
              
              $usuario->nombres   = $request->nombres;
              $usuario->apellidos = $request->apellidos;
              $usuario->email     = $request->email;
              $usuario->login     = $request->login;
              $usuario->usuarioModificacion = Auth::user()->login;
              $usuario->fechaModificacion   = date("Y-m-d H:i:s");

              $validator2 = Validator::make($request->all(),[                  
                  'password'  => [ 'required_with:confirmar_password', 'same:confirmar_password'],
              ]);
              
              if( !$validator2->fails() ){
                  $usuario->password = Hash::make($request->password);
              }else{
                  return back()->withInput()->with('ErrorInsert','Error de Actualizacion')->withErrors($validator2);
              }

              $usuario->save();
          
              return back()->withInput()->with('Listo','Se ha Actualizado corectamente.');
            }else{
              return back()->withInput()->with('ErrorInsert','Error de Actualizacion')->withErrors(['message1'=>'El login ya existe']);
            }  
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = Usuario::find($id);
        $usuario->estado = 'X';
        $usuario->save();

        return back()->withInput()->with('Listo','Se ha Eliminado corectamente.');
    }
}
