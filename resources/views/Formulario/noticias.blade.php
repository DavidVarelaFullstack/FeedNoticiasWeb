@extends('layouts.plantilla')


@section('contenido')
    <div class="row container-fluid">
        <div class="row mt-5 ms-5">
            <div class="col-2">
                <a href="/formulario" style="text-decoration: none">
                    <button class="d-block mx-auto btn btn-outline-light" type="button">
                        Volver al formulario
                    </button>
                </a>
            </div>
        </div>
        <div class="col-1"></div>
        <div class="col-10">
            <table class="mx-auto my-auto table-responsive text-white" style="width: 100%;">
                <thead>
                    <th>Título</th>
                    <th></th>
                    <th>Descripción</th>
                    <th></th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach ($noticias as $noticia)
                        <tr>
                            <td style="padding-top: 15px;" VALIGN="TOP">{{ $noticia->Titulo }}</td>
                            <td class="px-2"></td>
                            <td style="padding-top: 15px;" VALIGN="TOP">{{ $noticia->Descripcion }}</td>
                            <td class="px-2"></td>
                            <td style="padding-top: 15px;" VALIGN="TOP">
                                <form action="/edicion" method="GET">
                                    <input type="hidden" name="Id" id="Id" value="{{ $noticia->id }}">
                                    <button class="d-block mx-auto btn btn-outline-light">Editar noticia</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- <div class="container-fluid d-flex" style="height: 100%;" id="div">
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

            <input type="hidden" name="Id" id="Id" value="{{ $noticia->id }}">

            <label class="fw-bold required" style="font-size: 19px;">Titulo</label><br>
            <input class="form-control" required type="text" name="titulo" id="titulo" value="{{ $noticia->Titulo }}"><br>
            <label class="fw-bold required" style="font-size: 19px;">Descripción</label><br>
            <textarea maxlength="255" cols="40" rows="8" name="descripcion" id="descripcion">{{ $noticia->Descripcion }}</textarea><br>
            <label class="fw-bold required" style="font-size: 19px;">Enlace</label><br>
            <input class="form-control" required type="text" name="enlace" id="enlace" value="{{ $noticia->Enlace }}"><br> --}}
    {{-- <label class="fw-bold" style="font-size: 19px;">Imagen (<span class="text-decoration-underline">200x200 para mayor calidad</span>)</label><br>
            <input class="form-control" accept="image/png,image/jpg,image/jpeg" type="file" name="imagen" id="imagen"><br> --}}
    {{-- <label class="fw-bold required" style="font-size: 19px;">Fecha</label><br>
            <input class="form-control" required class="form-control" required type="date" name="fecha" id="fecha"
                value="{{ $noticia->Fecha }}"><br>
            <button class="d-block mx-auto btn btn-outline-light" type="submit">Actualizar noticia</button>
        </form>
    </div> --}}
@endsection
