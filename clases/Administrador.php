<?php
    require "loginInterfaz.php";
    require "conexion.php";
    class Administrador implements LoginInterface{
        public $email;
        public $password;

        public function autenticar()
        {
            $conexion = new Conexion;
            $conexion->conectar();
            if(isset($_POST['email']) && isset($_POST['password'])){
                $this->email = $_POST['email'];
                $this->password = $_POST['password'];
                if(isset($_POST['ingresar'])){
                    $query = "SELECT email, password FROM administrador WHERE email='$this->email' AND password='$this->password'";
                    $resultado = mysqli_query($conexion->con, $query);
                    //mysqli_num_rows = cuenta las filas del select
                    $contador = mysqli_num_rows($resultado);
                    if($contador > 0){
                        header("location:menu.php");
                    }else{
                        echo "<p class=\"error\">Correo o contraseña incorrecta</p>";
                    }
                }
            }
        }
        
        public function registrarAdministrador(){
            $conexion = new Conexion;
            $conexion->conectar();
            if(isset($_POST['email'], $_POST['password'], $_POST['nombre'], $_POST['apellido'], $_POST['direccion'])){
                $this->nombre = $_POST['nombre'];
                $this->apellido = $_POST['apellido'];
                $this->direccion = $_POST['direccion'];
                $this->email = $_POST['email'];
                $this->password = $_POST['password'];
               
                if(isset($_POST['registrar'])){
                    $query = "INSERT INTO administrador(email, password, nombre, apellido, direccion) 
                                VALUES ('$this->email', '$this->password', '$this->nombre', '$this->apellido', '$this->direccion')";
                    $resultado = mysqli_query($conexion->con,$query);
                    if(!empty($resultado)){
                        header("location:../index.php");
                    }
                }
            }
        }
    }
?>