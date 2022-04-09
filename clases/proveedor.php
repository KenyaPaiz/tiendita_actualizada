<?php
require('conexion.php');
//Respons0abilidad unica
class Proveedor extends Conexion{
    public $id;
    public $nombre;
    public $direccion;
    public $telefono;

    public function registrar(){
        $this->conectar();
        if(isset($_POST['nombre']) && isset($_POST['direccion']) && isset($_POST['telefono'])){
            $this->nombre = $_POST['nombre'];
            $this->direccion = $_POST['direccion'];
            $this->telefono = $_POST['telefono'];
            if(isset($_POST['registrar'])){
                $query = "INSERT INTO proveedor(nombre, direccion, telefono) 
                            VALUES ('$this->nombre','$this->direccion','$this->telefono')";
                $resultado = mysqli_query($this->con,$query);
                if(!empty($resultado)){
                    header("location:proveedor.php");;
                }
            }
        }
    }

    public function consultar(){
        $this->conectar();
        $query = "SELECT * FROM proveedor";
        $resultado = mysqli_query($this->con, $query);
        $cont = 1;
        while($imprimir = mysqli_fetch_array($resultado)){
            $tabla = "<tr>";
                $tabla .= "<td>$cont</td>";
                $tabla .= "<td>".$imprimir['nombre']."</td>";
                $tabla .= "<td>".$imprimir['direccion']."</td>";
                $tabla .= "<td>".$imprimir['telefono']."</td>";
                $tabla .= "<form action='act_proveedor.php' method='POST'>";
                $tabla .= "<td><button type='submit' id='btn-act' class='btn btn-dark' name='idproveedor' value='".$imprimir['id']."'>Actualizar</button></td>";
                $tabla .= "</form>";
                $tabla .= "<form method='POST'>";
                $tabla .= "<td class='td-cat'><button type='submit' class='btn btn-outline-danger' name='delete_id' value='".$imprimir['id']."'>Eliminar</button></td>";
                $tabla .= "</form>";
            $tabla .= "</tr>";
            echo $tabla;
            $cont++;
        } 
    
    }

    public function obtenerId(){
        //esta es la para conexion de base de datos
        $this->conectar();
        if(isset($_POST['idproveedor'])){
            $this->id = $_POST['idproveedor'];
            $query = "SELECT * FROM proveedor WHERE id=$this->id";
            $resultado = mysqli_query($this->con, $query);
            while($imprimir = mysqli_fetch_array($resultado)){
                $form = "<label>Nombre: </label>";
                $form .= "<input type='hidden' name='id' value='".$imprimir['id']."'>";
                $form .= "<input type='text' name='nombre' value='".$imprimir['nombre']."'>";
                $form .= "<input type='text' name='direccion' value='".$imprimir['direccion']."'>";
                $form .= "<input type='text' name='telefono' value='".$imprimir['telefono']."'>";
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
                $this->direccion = $_POST['direccion'];
                $this->telefono = $_POST['telefono'];
                $query = "UPDATE proveedor SET nombre='$this->nombre', direccion='$this->direccion', telefono='$this->telefono' WHERE id=$this->id";
                $resultado = mysqli_query($this->con, $query);
                if(!empty($resultado)){
                    header("location:proveedor.php");
                }
                else{
                    echo "Error al actualizar el proveedor";
                }
            }
        }
    }
    
    public function eliminar(){
        $this->conectar();
        if(isset($_POST['delete_id'])){
            $this->id = $_POST['delete_id'];
            $query= "DELETE FROM proveedor WHERE id=$this->id";
            $resultado = mysqli_query($this->con, $query);
            if(!empty($resultado)){
                // header("location:proveedor.php");
                echo "";
            }
        }
    }
}
?>
