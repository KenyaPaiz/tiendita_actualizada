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
        $cont = 1;
        while($imprimir = mysqli_fetch_array($resultado)){
            $tabla = "<tr>";
                $tabla .= "<td>$cont</td>";
                $tabla .= "<td>".$imprimir['nombre']."</td>";
                $tabla .= "<form action='ver_marca.php' method='POST'>";
                    $tabla .= "<td><button type='submit' class='btn btn-outline-success' name='idmarca' value='".$imprimir['id']."'>Actualizar</button></td>";
                $tabla .= "</form>";
                $tabla .= "<form  method='POST'>";
                    $tabla .= "<td><button type='submit' class='btn btn-outline-danger' name='delete_id' value='".$imprimir['id']."'>Eliminar</button></td>";
                $tabla .= "</form>";
            $tabla .= "</tr>";
            echo $tabla;
            $cont++;
        } 
    }
    
    public function obtenerId(){
        //esta es la para conexion de base de datos
        $this->conectar();
        if(isset($_POST['idmarca'])){
            $this->id = $_POST['idmarca'];
            $query = "SELECT * FROM marca WHERE id=$this->id";
            $resultado = mysqli_query($this->con, $query);
            while($imprimir = mysqli_fetch_array($resultado)){
                $form = "<label>Nombre: </label>";
                $form .= "<input type='hidden' name='id' value='".$imprimir['id']."'>";
                $form .= "<input type='text' name='nombre_marca' value='".$imprimir['nombre']."'>";
                echo $form;
            }
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
            // if(!empty($resultado)){
            //     header("location:marca.php");
            // }
            if(!empty($resultado)){
                echo "";
            }
        }
    }

    
}
?>