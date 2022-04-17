<?php
 require('conexion.php');

 class categoria extends Conexion{
     public $id;
     public $nombre;

     public function registrar (){
         $this->conectar();
         if(isset($_POST['categoria'])){
             $this->nombre = $_POST['categoria'];
             if(isset($_POST['registrar'])){
                 $query= "INSERT INTO categoria(nombre) VALUES ('$this->nombre')";
                 $resultado = mysqli_query($this->con,$query);
                 if(!empty($resultado)){
                     header("location:categoria.php");
                 } 
             }
         }
     }

     public function consultar(){
         $this->conectar();
         $query ="SELECT * FROM categoria";
         $resultado = mysqli_query($this->con,$query);

         return $resultado;
     }
    
     public function obtenerId(){
        $this->conectar();
        if(isset($_POST['id'])){
            $this->id = $_POST['id'];
            $query = "SELECT * FROM categoria WHERE id=$this->id";
            $resultado = mysqli_query($this->con, $query);
            
            return $resultado;
        }
    }

    public function actualizar(){
        $this->conectar();
        if(isset($_POST['id'])){
            if(isset($_POST['actualizar'])){
                $this->id = $_POST['id'];
                $this->nombre = $_POST['nombre_categoria'];
                $query = "UPDATE categoria SET nombre='$this->nombre' WHERE id=$this->id";
                $resultado = mysqli_query($this->con, $query);
                if(!empty($resultado)){
                    header("location:categoria.php");
                }
                else{
                    echo "Error al actualizar categoría";
                }
            }
        }
    }

    public function eliminar(){
        $this->conectar();
        if(isset($_POST['delete_id'])){
            $this->id = $_POST['delete_id'];
            $query= "DELETE FROM categoria WHERE id=$this->id";
            $resultado = mysqli_query($this->con, $query);
            if(!empty($resultado)){
                // header("location:categoria.php");
                echo "";
            }
        }
    }
 }

?>