@extends('layouts.plantilla')


@section('contenido')
    <div class="container-fluid d-flex" style="height: 100%;" id="div">
        <form class="mx-auto my-auto text-white fw-bold" action="/insertarNoticia" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <label class="fw-bold required" style="font-size: 19px;">Titulo</label><br>
            <input class="form-control" required type="text" name="titulo" id="titulo"><br>
            <label class="fw-bold required" style="font-size: 19px;">Descripción</label><br>
            <textarea cols="40" rows="8" name="descripcion" id="descripcion"></textarea><br>
            <label class="fw-bold required" style="font-size: 19px;">Enlace</label><br>
            <input class="form-control" required type="text" name="enlace" id="enlace"><br>
            <label class="fw-bold" style="font-size: 19px;">Imagen</label><br>
            <input class="form-control" accept="image/png" type="file" name="imagen" id="imagen"><br>
            <label class="fw-bold required" style="font-size: 19px;">Fecha</label><br>
            <input class="form-control" required class="form-control" required type="date" name="fecha" id="fecha"><br>
            <button class="d-block mx-auto btn btn-outline-light" type="submit">Enviar noticia</button>
        </form>
    </div>
@endsection
