<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
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
            ?>
            <h1>Actualizar Marca</h1>
            <form method="POST">
                <?php $marca->obtenerId(); ?>
                <input type="submit" class="btn btn-dark" name="actualizar" value="Actualizar Marca">
            </form>
            <?php $marca->actualizar(); ?>
        </div>
    </center>
</body>
</html>