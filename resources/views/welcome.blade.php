@extends('layouts.plantilla')

@section('contenido')
    <div class="container-fluid d-flex" style="height: 100%;" id="div">
        <form class="d-inline-block mx-auto my-auto text-white" action="/login" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-9">
                    <label for="usuario" class="fw-bold required" style="font-size: 19px;">Usuario</label>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <input required class="form-control" type="text" name="usuario" id="usuario">
                </div>
            </div>
            <div class="row">
                <div class="col-9">
                    <label for="contrasena" class="fw-bold required" style="font-size: 19px;">Contraseña</label>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <input required class="form-control" type="password" name="contrasena" id="contrasena">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button class="btn btn-outline-light my-3 d-block mx-auto" type="submit">Login</button>
                </div>
            </div>
        </form>
    </div>
@endsection
