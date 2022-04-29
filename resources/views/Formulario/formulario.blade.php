@extends('layouts.plantilla')


@section('contenido')

    <div class="container-fluid d-flex" style="height: 100%;" id="div">
        <div class="row">
            <div class="col-2">
                <a href="/noticias" style="text-decoration: none">
                    <button class="d-block mx-auto btn btn-outline-light" type="button">
                        Ver noticias
                    </button>
                </a>
            </div>
        </div>
        <form class="mx-auto my-auto text-white fw-bold" action="/insertarNoticia" method="POST"
            enctype="multipart/form-data">
            {{ csrf_field() }}
            @if (session('Mensaje') != null || session('Mensaje') != '')
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-info my-3">{{ session('Mensaje') }}</div>
                    </div>
                </div>

                @php
                    session()->put('Mensaje', null);
                @endphp
            @endif
            <label class="fw-bold required" style="font-size: 19px;">Titulo (Evitar escribir un título ya escrito previamente)</label><br>
            <input class="form-control" required type="text" name="titulo" id="titulo"><br>
            <label class="fw-bold required" style="font-size: 19px;">Descripción</label><br>
            <textarea maxlength="255" cols="40" rows="8" name="descripcion" id="descripcion"></textarea><br>
            <label class="fw-bold required" style="font-size: 19px;">Enlace</label><br>
            <input class="form-control" required type="text" name="enlace" id="enlace"><br>
            <label class="fw-bold required" style="font-size: 19px;">Imagen (<span class="text-decoration-underline">que sea cuadrada para mayor calidad, ejemplo: 800x800</span>)</label><br>
            <input required class="form-control" accept="image/png,image/jpg,image/jpeg" type="file" name="imagen" id="imagen"><br>
            <label class="fw-bold required" style="font-size: 19px;">Fecha</label><br>
            <input class="form-control" required class="form-control" required type="date" name="fecha" id="fecha"><br>
            <button class="d-block mx-auto btn btn-outline-light" type="submit">Enviar noticia</button>
        </form>
    </div>
@endsection
