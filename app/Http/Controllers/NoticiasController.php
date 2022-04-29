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

        if ($flag != null) {

            $this->validate($request, ['titulo' => 'required', 'descripcion' => 'required', 'enlace' => 'required', 'imagen' => 'required|mimes:png,jpg,jpeg', 'fecha' => 'required']);

            $noticia = new Noticia();

            $noticia->Titulo = $request->titulo;
            $noticia->Descripcion = $request->descripcion;
            $noticia->Enlace = $request->enlace;
            $imagen = $_FILES['imagen']['name'];
            if (!is_dir("/imagesNoticias/$request->titulo")) {
                mkdir("imagesNoticias/$request->titulo", 0755, true);
                if ($imagen != "" || $imagen != null) {
                    move_uploaded_file($_FILES['imagen']['tmp_name'], "imagesNoticias/$request->titulo/$imagen");
                    $noticia->Imagen = "https://feedcreation.eligeplus.com/imagesNoticias/$request->titulo/$imagen";
                }
            } else {
                move_uploaded_file($_FILES['imagen']['tmp_name'], "imagesNoticias/$request->titulo/$imagen(2)");
                $noticia->Imagen = "https://feedcreation.eligeplus.com/imagesNoticias/$request->titulo/$imagen";
            }


            $noticia->Fecha = $request->fecha;

            if ($noticia->save()) {
                session()->put('Mensaje', 'Noticia registrada con éxito.');
            } else {
                session()->put('Mensaje', 'Ha habido algún problema en registrar la noticia.');
            }


            return redirect()->route('formulario');
        } else {
            return redirect()->route('inicio');
        }
    }

    public function actualizarNoticia(Request $request)
    {
        $flag = session('Usuario');

        if ($flag != null) {

            $this->validate($request, ['titulo' => 'required', 'descripcion' => 'required', 'enlace' => 'required', 'imagen' => 'sometimes|mimes:png,jpg,jpeg', 'fecha' => 'required']);

            //, 'imagen' => 'sometimes|mimes:png,jpg,jpeg'

            $noticia = Noticia::find($request->Id);

            $nombre = explode(".com/", $noticia->Imagen);
            $carpeta = explode("/", $nombre[1]);

            if($noticia->Titulo != $request->titulo){
                rename("imagesNoticias/$carpeta[1]", "imagesNoticias/$request->titulo");
            }

            $noticia->Titulo = $request->titulo;
            $noticia->Descripcion = $request->descripcion;
            $noticia->Enlace = $request->enlace;

            $imagen = $_FILES['imagen']['name'];
            if (!is_dir("imagesNoticias/$request->titulo")) {
                mkdir("imagesNoticias/$request->titulo", 0755, true);
                if ($imagen != "" || $imagen != null) {
                    move_uploaded_file($_FILES['imagen']['tmp_name'], "imagesNoticias/$request->titulo/$imagen");
                    $noticia->Imagen = "https://feedcreation.eligeplus.com/imagesNoticias/$request->titulo/$imagen";
                }
            } else {
                if($imagen != $carpeta[2]){
                    unlink("imagesNoticias/$request->titulo/$carpeta[2]");
                    move_uploaded_file($_FILES['imagen']['tmp_name'], "imagesNoticias/$request->titulo/$imagen");
                    $noticia->Imagen = "https://feedcreation.eligeplus.com/imagesNoticias/$request->titulo/$imagen";
                }
                else{
                    move_uploaded_file($_FILES['imagen']['tmp_name'], "imagesNoticias/$request->titulo/$imagen(2)");
                    $noticia->Imagen = "https://feedcreation.eligeplus.com/imagesNoticias/$request->titulo/$imagen";
                }
            }

            $noticia->Fecha = $request->fecha;

            if ($noticia->save()) {
                session()->put('Mensaje', 'Noticia actualizada con éxito.');
            } else {
                session()->put('Mensaje', 'Ha habido algún problema en actualizar la noticia.');
            }


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

        if ($flag != null) {
            return view('Formulario.formulario');
        }
    }

    public function edicion(Request $request)
    {
        $flag = session('Usuario');

        if ($flag != null) {

            $noticia = Noticia::find($request->Id);

            return view('Formulario.edicion', compact("noticia"));
        }
    }

    public function noticias(Request $request)
    {
        $flag = session('Usuario');

        if ($flag != null) {

            $noticias = Noticia::orderBy("Fecha", "DESC")->get();

            return view('Formulario.noticias', compact("noticias"));
        }
    }
}
