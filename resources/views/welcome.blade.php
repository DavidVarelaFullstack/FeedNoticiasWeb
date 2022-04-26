<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid mx-auto my-auto">
        <form action="/login" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-2">
                    <label>Usuario</label>
                </div>
                <div class="col-4">
                    <input type="text" name="usuario" id="usuario">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label>Contraseña</label>
                </div>
                <div class="col-4">
                    <input type="password" name="contrasena" id="contrasena">
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <button type="submit">Login</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
