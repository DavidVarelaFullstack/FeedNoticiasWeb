<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>

<body>
    <div class="mx-auto my-auto">
        <form action="/insertarNoticia" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <label>Titulo</label><br>
            <input type="text" name="titulo" id="titulo"><br>
            <label>Descripción</label><br>
            <textarea cols="40" rows="8" name="descripcion" id="descripcion"></textarea><br>
            <label>Enlace</label><br>
            <input type="text" name="enlace" id="enlace"><br>
            <label>Imagen</label><br>
            <input accept="image/png" type="file" name="imagen" id="imagen"><br>
            <label>Fecha</label><br>
            <input type="date" name="fecha" id="fecha"><br>
            <button type="submit">Enviar noticia</button>
        </form>
    </div>
</body>

</html>
