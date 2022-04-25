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

    public function cerrarSesion(Request $request)
    {
        session()->put('Usuario', null);
        return redirect()->route('inicio');
    }
}
