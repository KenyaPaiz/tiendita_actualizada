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
         
        return $resultado;
    }

    public function obtenerId(){
        //esta es la para conexion de base de datos
        $this->conectar();
        if(isset($_POST['idproveedor'])){
            $this->id = $_POST['idproveedor'];
            $query = "SELECT * FROM proveedor WHERE id=$this->id";
            $resultado = mysqli_query($this->con, $query);
            
            return $resultado;
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
                echo "";
            }
        }
    }
}
?>
