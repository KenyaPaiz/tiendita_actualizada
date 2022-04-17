<?php
require('conexion.php');
//Responsabilidad unica
class Marca extends Conexion{
    public $id;
    public $nombre;

    public function registrar(){
        $this->conectar();
        if(isset($_POST['marca'])){
            $this->nombre = $_POST['marca'];
            if(isset($_POST['registrar'])){
                $query = "INSERT INTO marca(nombre) VALUES ('$this->nombre')";
                $resultado = mysqli_query($this->con,$query);
                if(!empty($resultado)){
                    header("location:marca.php");
                }
            }
        }
    }

    public function consultar(){
        $this->conectar();
        $query = "SELECT * FROM marca";
        $resultado = mysqli_query($this->con, $query);
        
        return $resultado;
    }
    
    public function obtenerId(){
        $this->conectar();
        if(isset($_POST['idmarca'])){
            $this->id = $_POST['idmarca'];
            $query = "SELECT * FROM marca WHERE id=$this->id";
            $resultado = mysqli_query($this->con, $query);
            
            return $resultado;
        }
    }

    public function actualizar(){
        $this->conectar();
        if(isset($_POST['id'])){
            if(isset($_POST['actualizar'])){
                $this->id = $_POST['id'];
                $this->nombre = $_POST['nombre_marca'];
                $query = "UPDATE marca SET nombre='$this->nombre' WHERE id=$this->id";
                $resultado = mysqli_query($this->con, $query);
                if(!empty($resultado)){
                    header("location:marca.php");
                }
                else{
                    echo "Error al actualizar la marca";
                }
            }
        }
    }

    public function eliminar(){
        $this->conectar();
        if(isset($_POST['delete_id'])){
            $this->id = $_POST['delete_id'];
            $query= "DELETE FROM marca WHERE id=$this->id";
            $resultado = mysqli_query($this->con, $query);
            if(!empty($resultado)){
                echo "";
            }
        }
    }

    
}
?>