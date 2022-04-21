<?php
    require "clases/conexion.php";

    class pruebaProducto extends Conexion{

        public function insertar($nom, $prec, $cant){
            $this->conectar();
            $insert = "INSERT INTO testproducto(nombre,precio,cantidad) VALUES('$nom',$prec,$cant)";
            $result = mysqli_query($this->con, $insert);

            return $result;
        }

        public function consultar(){
            $this->conectar();
            $consulta = "SELECT * FROM testproducto";
            $result = mysqli_query($this->con, $consulta);

            return $result;
        }

        public function eliminar($id){
            $this->conectar();
            $eliminar = "DELETE FROM testproducto WHERE id=$id";
            $result = mysqli_query($this->con, $eliminar);

            return $result;
        }
    }

?>