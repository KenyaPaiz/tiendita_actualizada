<?php
    require "conexion.php";
    class Producto extends Conexion{
        public $id;
        public $nombre;
        public $descripcion;
        public $precio;
        public $idCategoria;
        public $idMarca;
        public $idProveedor;
        public $idEstado;
        public $cantidad;

        //Obteniendo todas las marcas para el registro del producto
        public function selectMarcas(){
            $this->conectar();
            $query = "SELECT * FROM marca";
            $resultado = mysqli_query($this->con, $query);
            while($imprimir = mysqli_fetch_array($resultado)){
                $select = "<option value='".$imprimir['id']."'>";
                    $select .= $imprimir['nombre'];
                $select .= "</option>";
                echo $select;
            }
        }

        //Obteniendo todas las categorias para el registro del producto
        public function selectCategoria(){
            $this->conectar();
            $query = "SELECT * FROM categoria";
            $resultado = mysqli_query($this->con, $query);
            while($imprimir = mysqli_fetch_array($resultado)){
                $select = "<option value='".$imprimir['id']."'>";
                    $select .= $imprimir['nombre'];
                $select .= "</option>";
                echo $select;
            }
        }

        //Obteniendo todas los proveedores para el registro del producto
        public function selectProveedor(){
            $this->conectar();
            $query = "SELECT * FROM proveedor";
            $resultado = mysqli_query($this->con, $query);
            while($imprimir = mysqli_fetch_array($resultado)){
                $select = "<option value='".$imprimir['id']."'>";
                    $select .= $imprimir['nombre'];
                $select .= "</option>";
                echo $select;
            }
        }

        //Obteniendo los estados para actualizar el producto
        public function selectEstado(){
            $this->conectar();
            $query = "SELECT * FROM estado";
            $resultado = mysqli_query($this->con, $query);
            while($imprimir = mysqli_fetch_array($resultado)){
                $select = "<option value='".$imprimir['id']."'>";
                    $select .= $imprimir['nombre'];
                $select .= "</option>";
                echo $select;
            }
        }

        public function registrar(){
            $this->conectar();
            if(isset($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['categoria'], $_POST['marca'], $_POST['proveedor'], $_POST['existencias'])){
                $this->nombre = $_POST['nombre'];
                $this->descripcion = $_POST['descripcion'];
                $this->precio = $_POST['precio'];
                $this->idCategoria = $_POST['categoria'];
                $this->idMarca = $_POST['marca'];
                $this->idProveedor = $_POST['proveedor'];
                $this->idEstado = 1;
                $this->cantidad = $_POST['existencias'];

                if(isset($_POST['registrar'])){
                    $query = "INSERT INTO producto(nombre, descripcion, precio, idcategoria, idmarca, idproveedor, idestado, cantidad) 
                                VALUES ('$this->nombre', '$this->descripcion','$this->precio',$this->idCategoria,$this->idMarca,$this->idProveedor,$this->idEstado,$this->cantidad)";
                    $resultado = mysqli_query($this->con,$query);
                    if(!empty($resultado)){
                        header("location:ver_producto.php");
                    }
                }
            }
        }

        public function consultar(){
            $this->conectar();
            //Ver todo los productos con estado activo
            $query = "SELECT p.id, p.nombre, p.descripcion, p.precio, p.cantidad, c.nombre AS categoria, m.nombre AS marca, pv.nombre AS proveedor FROM producto AS p INNER JOIN categoria AS c ON p.idcategoria=c.id INNER JOIN marca AS m ON p.idmarca=m.id INNER JOIN proveedor AS pv ON p.idproveedor=pv.id WHERE p.idestado=1 ORDER BY p.id ASC";
            $resultado = mysqli_query($this->con, $query);
            $cont = 1;
            while($imprimir = mysqli_fetch_array($resultado)){
                $tabla = "<tr>";
                    $tabla .= "<td>".$cont."</td>";
                    $tabla .= "<td>".$imprimir['nombre']. "</td>";
                    $tabla .= "<td>".$imprimir['descripcion']. "</td>";
                    $tabla .= "<td> $".$imprimir['precio']. "</td>";
                    $tabla .= "<td>".$imprimir['cantidad']. "</td>";
                    $tabla .= "<td>".$imprimir['proveedor']. "</td>";
                    $tabla .= "<td>".$imprimir['marca']. "</td>";
                    $tabla .= "<td>".$imprimir['categoria']. "</td>";
                    $tabla .= "<form action='actualizar_producto.php' method='POST'>";
                        $tabla .= "<td><button type='submit' id='btn-act' class='btn btn-dark' name='idproducto' value='".$imprimir['id']."'>Actualizar</button></td>";
                    $tabla .= "</form>";
                    $tabla .= "<form action='estado_producto.php' method='POST'>";
                        $tabla .= "<td><button type='submit' id='btn-act' class='btn btn-dark' name='idestado' value='".$imprimir['id']."'>Estado</button></td>";
                    $tabla .= "</form>";
                $tabla .= "</tr>";
                echo $tabla;
                $cont++;
            } 
        }

        //Obteniendo el Id del producto seleccionado de la tabla
        public function obtenerId(){
            $this->conectar();
            if(isset($_POST['idproducto'])){
                $this->id = $_POST['idproducto'];
                $query = "SELECT * FROM producto WHERE id=$this->id";
                $resultado = mysqli_query($this->con, $query);
                while($imprimir = mysqli_fetch_array($resultado)){
                    $form = "<input type='hidden' name='id' value='".$imprimir['id']."'>";
                    $form .= "<div>";
                    $form .= "<label>Nombre:</label>";
                    $form .= " <input type='text' name='nombre' value='".$imprimir['nombre']."'><br>";
                    $form .= "</div>";
                    $form .= "<div>";
                    $form .= "<label>Descripcion:</label>";
                    $form .= " <input type='text' name='descripcion' value='".$imprimir['descripcion']."'><br>";
                    $form .= "</div>";
                    $form .= "<div>";
                    $form .= "<label>Precio:</label>";
                    $form .= " <input type='text' name='precio' value='".$imprimir['precio']."'><br>";
                    $form .= "</div>";
                    $form .= "<div>";
                    $form .= "<label>Cantidad:</label>";
                    $form .= " <input type='number' name='cantidad' value='".$imprimir['cantidad']."'><br>";        
                    $form .= "</div>";
                    echo $form;
                }
            }
        }

        public function actualizar(){
            $this->conectar();
            if(isset($_POST['id'])){
                if(isset($_POST['actualizar'])){
                    $this->id = $_POST['id'];
                    $this->nombre = $_POST['nombre'];
                    $this->descripcion = $_POST['descripcion'];
                    $this->precio = $_POST['precio'];
                    $this->idCategoria = $_POST['categoria'];
                    $this->idMarca = $_POST['marca'];
                    $this->idProveedor = $_POST['proveedor'];
                    $this->cantidad = $_POST['cantidad'];
                    $query = "UPDATE producto SET nombre='$this->nombre', descripcion='$this->descripcion', precio='$this->precio', cantidad='$this->cantidad', idcategoria=$this->idCategoria, idmarca=$this->idMarca, idproveedor=$this->idProveedor WHERE id=$this->id";         
                    $resultado = mysqli_query($this->con, $query);
                    if(!empty($resultado)){
                        header("location:ver_producto.php");
                    }
                    else{
                        echo "Error al actualizar la marca";
                    }
                }
            }
        }

        //Sumando todas las existencias de los productos con estado activo
        public function totalProductos(){
            $this->conectar();
            $query = "SELECT SUM(cantidad) AS total FROM producto WHERE idestado=1";
            $resultado = mysqli_query($this->con, $query);
            $total = mysqli_fetch_assoc($resultado);
            echo "<b>Total de productos: </b>" . $total['total'];
        }

        //Obteniendo el estado del producto
        public function obtenerEstado(){
            $this->conectar();
            if(isset($_POST['idestado'])){
                $this->id = $_POST['idestado'];
                $query = "SELECT estado.nombre AS estado, producto.nombre AS producto, producto.id FROM producto INNER JOIN estado ON producto.idestado=estado.id WHERE producto.id=$this->id";
                $resultado = mysqli_query($this->con, $query);
                while($imprimir = mysqli_fetch_array($resultado)){
                    $form = "<input type='hidden' name='idproducto' value='".$imprimir['id']."'>";
                    $form .= "<b>Nombre del producto: </b>". $imprimir['producto']."<br>";
                    $form .= "<b>Estado: </b>". $imprimir['estado']."<br>";
                    echo $form;
                }

            }
        }

        //Actualizando el estado del producto
        public function cambiarEstado(){
            $this->conectar();
            if(isset($_POST['idproducto'])){
                if(isset($_POST['cambiarEstado'])){
                    $this->id = $_POST['idproducto'];
                    $this->idEstado = $_POST['estado'];
                    $query = "UPDATE producto SET idestado=$this->idEstado WHERE id=$this->id";         
                    $resultado = mysqli_query($this->con, $query);
                    if(!empty($resultado)){
                        header("location:ver_producto.php");
                    }
                    else{
                        echo "Error al actualizar el estado";
                    }
                }
            }
        }

        //Busqueda de filtro por nombre del producto
        public function busqueda(){
            $this->conectar();
            if(isset($_POST['busqueda'])){
                if(isset($_POST['buscar'])){
                    $buscar = $_POST['busqueda'];
                    //Ver todo los productos con estado activo
                    $query = "SELECT p.id, p.nombre, p.descripcion, p.precio, p.cantidad, c.nombre AS categoria, m.nombre AS marca, pv.nombre AS proveedor FROM producto AS p INNER JOIN categoria AS c ON p.idcategoria=c.id INNER JOIN marca AS m ON p.idmarca=m.id INNER JOIN proveedor AS pv ON p.idproveedor=pv.id WHERE p.idestado=1 AND p.nombre LIKE '%$buscar%' ORDER BY p.id ASC";
                    $resultado = mysqli_query($this->con, $query);
                    $cont = 1;
                    while($imprimir = mysqli_fetch_array($resultado)){
                        $tabla = "<tr>";
                            $tabla .= "<td>".$cont."</td>";
                            $tabla .= "<td>".$imprimir['nombre']. "</td>";
                            $tabla .= "<td>".$imprimir['descripcion']. "</td>";
                            $tabla .= "<td> $".$imprimir['precio']. "</td>";
                            $tabla .= "<td>".$imprimir['cantidad']. "</td>";
                            $tabla .= "<td>".$imprimir['proveedor']. "</td>";
                            $tabla .= "<td>".$imprimir['marca']. "</td>";
                            $tabla .= "<td>".$imprimir['categoria']. "</td>";
                            $tabla .= "<form action='actualizar_producto.php' method='POST'>";
                                $tabla .= "<td><button type='submit' id='btn-act' class='btn btn-dark' name='idproducto' value='".$imprimir['id']."'>Actualizar</button></td>";
                            $tabla .= "</form>";
                            $tabla .= "<form action='estado_producto.php' method='POST'>";
                                $tabla .= "<td><button type='submit' id='btn-act' class='btn btn-dark' name='idestado' value='".$imprimir['id']."'>Estado</button></td>";
                            $tabla .= "</form>";
                        $tabla .= "</tr>";
                        echo $tabla;
                        $cont++;
                    } 
                }
            }
        }
    }
?>

