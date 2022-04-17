<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../recursos/css/estilo-categorias.css">
    <link rel="stylesheet" href="../recursos/css/estilo-nav.css">
    <title>Categoria</title>
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
                require('../clases/Categoria.php');
                $categoria = new Categoria();
                $datos = $categoria->consultar();
                $cont = 1;
            ?>
            <div class="h1-contenedor">
                <h1>Registro de Categorias</h1>
            </div>
            <form action="" method="POST">
                <label class="label-categoria" for=""><b>Categoria:</b></label>
                <input type="text" class="input-categoria" name="categoria" placeholder="Categoria" required> </br>
                <input type="submit" id="btn-registrar" class="btn btn-dark" name="registrar" value="Registrar categoria">
            </form>
            <?php $categoria->registrar(); ?>
            <br>
            
            <table class="table table-sm">
                <thead>
                    <th >#</th>
                    <th >Nombre</th>
                    <th colspan="2">Accion</th>
                </thead>
                <tbody>
                    <?php foreach($datos as $dato) { ?>
                    <tr>
                        <td><?php echo $cont; ?></td>
                        <td><?php echo $dato['nombre']; ?></td>
                        <td>
                            <form action="ver_categoria.php" method="post">
                                <button type="submit" class="btn btn-outline-success" name="id" value="<?php echo $dato['id']; ?>">Actualizar</button>
                            </form>
                        </td>
                        <td>
                            <form method="post">
                                <button type="submit" class="btn btn-outline-danger" name="delete_id" value="<?php echo $dato['id']; ?>">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                        $cont++; 
                        } 
                    ?>
                </tbody>
            </table>
            <?php $categoria->eliminar(); ?>
        </div>
    </center>
</body>
</html>