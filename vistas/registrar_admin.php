<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Administrador</title>
</head>
<body>
    <main>
        <?php
            require('../clases/Administrador.php');
            $registrar_admin = new Administrador();
        ?>
        <form action="" method="post">
            <label for="">Nombre</label>
            <input type="text" name="nombre" id="">

            <label for="">Apellido</label>
            <input type="text" name="apellido">

            <label for="">Dirección</label>
            <input type="text" name="direccion">

            <label for="">Email</label>
            <input type="email" name="email" id="">

            <label for="">Contraseña</label>
            <input type="password" name="password">

            <input type="submit" name="registrar" value="registrar" id="">
        </form>
        <?php $registrar_admin->registrarAdministrador(); ?>
    </main>
</body>
</html>