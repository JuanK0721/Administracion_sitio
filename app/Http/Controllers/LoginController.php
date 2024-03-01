<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return view('login');
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
    public function store(Request $request, Redirector $redirect)
    {
        $request->filled('remember');

        //$user = Usuario::where('email', $request->email)->first();

        if( Auth::attempt(['email' => $request->email, 'password' => $request->password]) ){
          $request->session()->regenerate();

          return $redirect->intended('/')->with('status','funco');
        }

        /*if( Hash::check($request->password, $user->password) ){
            Auth::login($user);

            $request->session()->regenerate();

            return $redirect->intended('/')->with('status','funco');
        }*/
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {  
        //
    }

    public function logout(Request $request, Redirector $redirect)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $redirect->to('/login');
    }    
}
