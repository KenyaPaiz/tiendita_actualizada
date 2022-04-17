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
     <?php include 'nav.php'; ?>
    </header>
    <center>
        <div class="container">
            <?php 
                require('../clases/Categoria.php');
                $categoria = new Categoria();
                $datos = $categoria->obtenerId(); 
            ?>
            <h1>Actualizar Categoria</h1>
            <form method="POST">
                <?php foreach($datos as $dato){ ?>
                    <input type="hidden" name="id" value="<?php echo $dato['id']; ?>">
                    <input type="text" name="nombre_categoria" value="<?php echo $dato['nombre']; ?>">
                    <input type="submit" class="btn btn-dark" name="actualizar" value="Actualizar Categoria">
                <?php } ?>
            </form>
            <?php $categoria->actualizar(); ?>
        </div>
    </center>
</body>
</html>