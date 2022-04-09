<?php
    require "conexion.php";
    class Administrador extends Conexion{
        public $email;
        public $password;

        function accederAdministrador(){
            $this->conectar();
            if(isset($_POST['email']) && isset($_POST['password'])){
                $this->email = $_POST['email'];
                $this->password = $_POST['password'];
                if(isset($_POST['ingresar'])){
                    $query = "SELECT email, password FROM administrador WHERE email='$this->email' AND password='$this->password'";
                    $resultado = mysqli_query($this->con, $query);
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
    }
?>