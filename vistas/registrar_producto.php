<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../recursos/css/estilo-registrar-producto.css">
    <link rel="stylesheet" href="../recursos/css/estilo-nav.css">
    <title>Registro de Producto</title>
</head>
<body>
    <header class="encabezado">
        <nav >

                <div class="div-nav">
                    <a class="nav" href="../menu.php">Menu</a>
                </div>

                <div class="div-nav">
                    <a class="nav" href="categoria.php">Categoria</a>
                </div>

                <div class="div-nav">
                    <a class="nav" href="marca.php">Marca</a>
                </div>

                <div class="div-nav">
                    <a class="nav" href="ver_producto.php">Producto</a>
                </div>

                <div class="div-nav">
                    <a class="nav" href="proveedor.php">Proveedor</a>
                </div>

                <div class="div-nav">
                    <a class="nav" href="registrar_producto.php">Registrar producto</a>
                </div>
                <div class="div-nav">
                    <a class="nav" href="../index.php">Cerra Sesion</a>
                </div>
            
        </nav>
    </header>
    <center>
    <div class="container">
        <?php
            require('../clases/producto.php');
            $producto = new Producto();
        ?>
        <form class="h1-contenedor" action="" method="POST">
            <h1>Registrar Producto</h1>

            <label class="label-producto" for="producto_nombre">Nombre:</label>
            <input type="text" class="subtitulos" name="nombre" placeholder="Nombre del producto..." required><br>

            <label class="label-producto" for="descripcion">Descripción:</label>
            <input type="text" class="subtitulos" name="descripcion" placeholder="descripcion" required><br>

            <label class="label-producto" for="precio">Precio:</label>
            <input type="text" class="subtitulos" name="precio" placeholder="Precio..." required><br>

            <label class="label-producto" for="categoria">Categoria:</label>
            <select class="subtitulos" name="categoria">
                <?php $producto->selectCategoria();?>
            </select><br>

            <label class="label-producto" for="marca">Marca:</label>
            <select class="subtitulos-marc" name="marca">
                <?php $producto->selectMarcas(); ?>
            </select><br>

            <label class="label-producto" for="proveedor">Proveedor:</label>
            <select class="subtitulos-prov" name="proveedor">
                <?php $producto->selectProveedor(); ?>
            </select><br>
            <label class="label-producto" for="">Existencias</label>
            <input type="number" class="subtitulos" name="existencias" required><br><br>
            <input type="submit" id="btn-registrar" class="btn btn-dark" name="registrar" value="Registrar Producto">
        </form>
        <?php $producto->registrar(); ?>
    </div>
    </center>
</body>
</html>