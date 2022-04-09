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
        <main class="contenedor">
            <?php 
                require('../clases/proveedor.php');
                $proveedor = new Proveedor(); 
            ?>
            <div class="h1-contenedor">
                <h1>Actualizar Proveedor</h1>
            </div>
                <form method="POST">
                    <div class="informacion">
                        <?php $proveedor->obtenerId(); ?>
                    </div>
                    <div class="input-contenedor">
                        <input type="submit" name="actualizar" class="btn btn-dark" value="Actualizar Proveedor" id="button">
                    </div>
                </form>
        </main>
        <?php $proveedor->actualizar(); ?>
    </center>
</body>
</html>