<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../recursos/css/estilo-nav.css">
    <link rel="stylesheet" href="../recursos/css/estilo-categorias.css">
    <title>Marca</title>
</head>
<body>
    <header class="encabezado">
        <?php include 'nav.php'; ?>
    </header>
    <center>
    <div class="container">
        <?php
            require('../clases/Marca.php');
            $marca = new Marca();
            $datos = $marca->consultar();
            $cont = 1;
        ?>
        <h1>Registro de Marcas</h1>
        <form action="" method="POST">
            <label class="label-marca" for=""><b>Marca:</b></label>
            <input type="text" class="input-marca" name="marca" placeholder="Nombre de la marca" required><br>
            <input type="submit" id="btn-registrar" class="btn btn-dark" name="registrar" value="Registrar Marca">
        </form>
        <?php $marca->registrar(); ?>
        <!--- Tabla de consultas -->
        <!-- <br> -->
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
                        <form action="ver_marca.php" method="post">
                            <button type="submit" class="btn btn-outline-success" name="idmarca" value="<?php echo $dato['id']; ?>">Actualizar</button>
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
        <?php $marca->eliminar(); ?>
    </div>
    </center>
</body>
</html>