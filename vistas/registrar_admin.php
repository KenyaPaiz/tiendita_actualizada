<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../recursos/css/estilo-registrar-usuario.css">
    <link rel="stylesheet" href="../recursos/css/estilo-nav.css">
    <title>Registrar Administrador</title>
</head>
<body>
    <main>
        <?php
            require('../clases/Administrador.php');
            $registrar_admin = new Administrador();
        ?>
        <center>
        <div class="container">
        <form class="h1-contenedor" action="" method="post">
            <label class="label-admin" for="">Nombre</label>
            <input class="label-admin" type="text" name="nombre" id="">

            <label class="label-admin" for="">Apellido</label>
            <input class="subtitulos"  type="text" name="apellido">

            <label class="label-admin" for="">Dirección</label>
            <input class="subtitulos"  type="text" name="direccion">

            <label class="label-admin" for="">Email</label>
            <input class="subtitulos"  type="email" name="email" id="">

            <label class="label-admin" for="">Contraseña</label>
            <input class="subtitulos"  type="password" name="password">

            <input id="btn-registrar" class="btn btn-dark" type="submit" name="registrar" value="registrar">
        </form>
        
        <?php $registrar_admin->registrarAdministrador(); ?>
        </div>
        </center>
    </main>
</body>
</html>