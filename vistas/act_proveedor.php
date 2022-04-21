<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../recursos/css/estilo-nav.css">
    <link rel="stylesheet" href="../recursos/css/estilo-act-proveedor.css">
    
    <title>Proveedores</title>
</head>
<body>
    <header class="encabezado">
        <?php include 'nav.php'; ?>
    </header>
    <center>
        <main class="contenedor">
            <?php 
                require('../clases/proveedor.php');
                $proveedor = new Proveedor();
                $datos = $proveedor->obtenerId(); 
            ?>
            <div class="h1-contenedor">
                <h1>Actualizar Proveedor</h1>
            </div>
            <form method="POST">
                <div class="informacion">
                    <?php foreach($datos as $dato){ ?>
                        <input type="hidden" name="id" value="<?php echo $dato['id']; ?>">
                        <label><b>Nombre:</b></label>
                        <input type="text" name="nombre" value="<?php echo $dato['nombre']; ?>"><br>
                        <label><b>Direccion:</b></label>
                        <input type="text" name="direccion" value="<?php echo $dato['direccion']; ?>"><br>
                        <label><b>Telefono:</b></label>
                        <input type="text" name="telefono" value="<?php echo $dato['telefono']; ?>"><br>
                </div>
                <div class="input-contenedor">
                    <input type="submit" name="actualizar" class="btn btn-dark" value="Actualizar Proveedor" id="button">
                    <?php } ?>
                </div>
            </form>
        </main>
        <?php $proveedor->actualizar(); ?>
    </center>
</body>
</html>