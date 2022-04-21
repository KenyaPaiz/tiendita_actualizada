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
        <?php include 'nav.php'; ?>
    </header>
    <center>
    <div class="container">
        <?php 
            require "../clases/producto.php";
            $producto = new Producto();
            $datos = $producto->consultar();
            $cont=1;
                
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
        <table class="table table-sm">
            <thead>
                <th>#</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Proveedor</th>
                    <th>Marca</th>
                    <th>Categoría</th>
                    <th></th>
                    <th></th>
                </thead>
                    <tbody>
                        <?php foreach($datos as $dato){ ?>
                            <tr>
                                <td> <?php echo $cont; ?></td>
                                <td> <?php echo $dato['nombre']; ?></td>
                                <td> <?php echo $dato['descripcion']; ?></td>
                                <td> <?php echo $dato['precio']; ?></td>
                                <td> <?php echo $dato['cantidad']; ?></td>
                                <td> <?php echo $dato['proveedor']; ?></td>
                                <td> <?php echo $dato['marca']; ?></td>
                                <td> <?php echo $dato['categoria']; ?></td>
                                <form action='actualizar_producto.php' method='POST'>
                                    <td><button type='submit' id='btn-act' class='btn btn-dark' name='idproducto' value="<?php echo $dato['id']; ?>">Actualizar</button>
                                </form>
                                <form action='estado_producto.php' method='POST'>
                                    <td><button type='submit' id='btn-act' class='btn btn-dark' name='idestado' value="<?php echo $dato['id']; ?>">Eliminar</button>
                                </form>
                            </tr>
                                <?php $cont++;} ?>
                    </tbody>
        </table>
            <?php $producto->totalProductos(); ?>
    </div>
    </center>
</body>
</html>