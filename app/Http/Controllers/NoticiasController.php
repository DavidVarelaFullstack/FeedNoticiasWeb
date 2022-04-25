<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
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

            $noticia = new Noticia();

            $noticia->Titulo = $request->titulo;
            $noticia->Descripcion = $request->descripcion;
            $noticia->Enlace = $request->enlace;
            $noticia->Imagen = $request->imagen;
            $noticia->Fecha = $request->fecha;

            $noticia->save();

            session()->put('Mensaje', 'Noticia registrada con éxito');
            return redirect()->route('formulario');
        } else {
            return redirect()->route('inicio');
        }
    }

    public function cerrarSesion()
    {
        session()->put('Usuario', null);
        return redirect()->route('inicio');
    }

    public function formulario()
    {
        $flag = session('Usuario');

        if($flag != null){
            return view('formulario');
        }
    }
}
