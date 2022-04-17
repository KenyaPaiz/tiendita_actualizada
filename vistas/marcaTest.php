<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require('../clases/Marca.php');

        $marca = new Marca;
        $datos = $marca->consultarTest();

        while($imp = mysqli_fetch_array($datos)){
            echo $imp['nombre'];
        }
    ?>
</body>
</html>