<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoticiasController extends Controller
{

    public function inicioSesion(Request $request)
    {

        $usuario = $request->usuario;

        $password = $request->contrasena;

        if ($usuario == "dg2BVDdsWdds" && $password == "daS232dv2€#?das+dsfs428fNsFsugv*+TrUb") {
            session()->put('Usuario', 'Valido');
            return redirect()->route('formulario');
        } else {
            session()->put('Mensaje', 'Credenciales no válidas');
            return redirect()->route('inicio');
        }
    }

    public function insertarNoticia(Request $request)
    {
        $flag = session('Usuario');

        if($flag != null){

            $this->validate($request, ['titulo' => 'required', 'descripcion' => 'required', 'enlace' => 'required', 'imagen' => 'required', 'fecha' => 'required']);
            session()->put('Mensaje', 'Noticia registrada con éxito');
            return redirect()->route('formulario');
        } else {
            return redirect()->route('inicio');
        }
    }

    public function cerrarSesion(Request $request)
    {
        session()->put('Usuario', null);
        return redirect()->route('inicio');
    }

    public function formulario(Request $request)
    {
        $flag = session('Usuario');

        if($flag != null){
            return view('formulario');
        }
    }
}
