<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="recursos/img/logo-carrito.png">
    <link rel="stylesheet" href="recursos/css/style-menu.css">
    <script src="https://kit.fontawesome.com/36d396a1fc.js" crossorigin="anonymous"></script>
    <title>Menú</title>
</head>
<body>
    <main>
        <!--IMPUT CATEGORÍA-->
       <div class=formulario>
            <form action="vistas/Categoria.php" method="POST" >
                    <img class="imagen" src="recursos/img/logo-carrito.png" alt="Logo TienditaShop" width = "60" height = "60">
                    <h1>¿Qué desea hacer?</h1>
                    <div class="input-contenedor">
                        <i class="fa-solid fa-layer-group" class="icon"></i>
                        <input type="submit" name="categoria" value="Ver Categoria" class="button">
                    </div>
                </form>
                <!--IMPUT MARCA-->
                <form action="vistas/Marca.php" method="POST">
                    <div class="input-contenedor">
                        <i class="fa-solid fa-splotch" class="icon"></i>
                        <input type="submit" name="marca" value="Ver Marcas" class="button">
                    </div>
                </form>
                <!--IMPUT PROVEEDOR-->
                <form action="vistas/proveedor.php" method="POST">
                    <div class="input-contenedor">
                        <i class="fa-solid fa-address-book" class="icon"></i>
                        <input type="submit" name="proveedor" value="Ver Proveedor" class="button">
                    </div>
                </form>
                <!--IMPUT PRODUCTO-->
                <form action="vistas/ver_producto.php" method="POST">
                    <div class="input-contenedor">
                    <i class="fa-solid fa-basket-shopping" class="icon"></i>
                        <input type="submit" name="producto" value="Ver Productos" class="button">
                    </div>
                </form>
        </div>
    </main>
</body>
</html>
