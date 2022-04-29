@extends('layouts.plantilla')


@section('contenido')
    <div class="container-fluid d-flex" style="height: 100%;">
        <div class="row mt-5 ms-5">
            <div class="col-2">
                <a href="/noticias" style="text-decoration: none">
                    <button class="d-block mx-auto btn btn-outline-light" type="button">
                        Volver a noticias
                    </button>
                </a>
            </div>
        </div>
        <form class="mx-auto my-auto text-white fw-bold" action="/actualizarNoticia" method="POST"
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

            <input type="hidden" name="Id" id="Id" value="{{$noticia->id}}">

            <label class="fw-bold required" style="font-size: 19px;">Titulo</label><br>
            <input class="form-control" required type="text" name="titulo" id="titulo" value="{{$noticia->Titulo}}"><br>
            <label class="fw-bold required" style="font-size: 19px;">Descripción</label><br>
            <textarea maxlength="255" cols="80" rows="8" name="descripcion" id="descripcion">{{$noticia->Descripcion}}</textarea><br>
            <label class="fw-bold required" style="font-size: 19px;">Enlace</label><br>
            <input class="form-control" required type="text" name="enlace" id="enlace" value="{{$noticia->Enlace}}"><br>
            <label class="fw-bold required" style="font-size: 19px;">Imagen (<span class="text-decoration-underline">que sea cuadrada para mayor calidad, ejemplo: 800x800</span>)</label><br>
            <input class="form-control" accept="image/png,image/jpg,image/jpeg" type="file" name="imagen" id="imagen"><br>
            <label class="fw-bold required" style="font-size: 19px;">Fecha</label><br>
            <input class="form-control" required class="form-control" required type="date" name="fecha" id="fecha" value="{{$noticia->Fecha}}"><br>
            <button class="d-block mx-auto btn btn-outline-light" type="submit">Actualizar noticia</button>
        </form>
    </div>
@endsection
