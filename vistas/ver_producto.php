<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../recursos/css/estilo-ver-producto.css">
    <link rel="stylesheet" href="../recursos/css/estilo-nav.css">
    <link rel="stylesheet" href="../recursos/css/ver_producto.css">
    <title>Producto</title>
</head>
<body>
    <header class="encabezado">
        <nav>

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
            require "../clases/producto.php";
            $producto = new Producto();
        ?>
        <h1 class="titulo">Listado de productos</h1>
        <!-- <a href="registrar_producto.php">Registrar Producto</a><br> -->
        <form action="" method="post" class="formulario">
            <div class="busqueda">
                <b>Busqueda: </b>
                <input type="text" name="busqueda" class="busqueda">
                <input type="submit" name="buscar" value="Buscar">
                
            </div>
        </form>
        <!--- Tabla de consultas -->
        <br>
        <div class="tabla-contenedor">
            <table id="tabla" class="table table-sm">
                <thead>
                    <th class="th">#</th>
                    <th class="th">Nombre</th>
                    <th class="th">Descripción</th>
                    <th class="th">Precio</th>
                    <th class="th">Cantidad</th>
                    <th class="th">Proveedor</th>
                    <th class="th">Marca</th>
                    <th class="th">Categoria</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    <?php
                        if(isset($_POST['buscar'])){
                            $producto->busqueda();
                        }
                        else{
                            $producto->consultar();
                        }
                    ?>
                </tbody>
            </table>
            <?php $producto->totalProductos(); ?>
        </div>
    </div>
    </center>
</body>
</html>