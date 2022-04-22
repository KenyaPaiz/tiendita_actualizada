<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="recursos/img/logo-carrito.png">
    <link rel="stylesheet" href="recursos/css/error-main.css">
    <link rel="stylesheet" href="recursos/css/style-main.css">
    <script src="https://kit.fontawesome.com/36d396a1fc.js" crossorigin="anonymous"></script>
    <title>TienditaShop</title>
</head>
<body>
<?php 
    require "clases/Administrador.php";
    require "clases/autenticar.php";
    $tipoUsuario = new autenticar();
 ?>
    <main>
        <div class="form_container">
            <form action="" class="formulario" method="POST">
                <img class="imagen" src="recursos/img/logo-carrito.png" alt="Logo TienditaShop" width = "60" height = "70">

                <h1>Iniciar Sesión</h1>
                
                <div class="contenedor">
                    <div class="input-contenedor">
                        <i class="fa-solid fa-user icono" class="icon"></i>
                        <input type="text" name="email" placeholder="Correo Electrónico">
                    </div>
                </div>

                <div class="contenedor">
                    <div class="input-contenedor">
                        <i class="fa-solid fa-key icono" class="icon"></i>
                        <input type="password" name="password" placeholder="Contraseña">
                    </div>
                </div>
                
                <input type="submit" name="ingresar" value="Ingresar" class="btn">
                <a href="vistas/registrar_admin.php" class="registrar btn">
                    Registrar
                </a>
                <?php 
                    $tipoUsuario->login(new Administrador);
                ?> 
            </form>
        </div>
    </main>
</body>
</html>
