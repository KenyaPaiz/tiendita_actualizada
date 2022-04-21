<?php
    require "estado.php";
    class prueba extends estado{

        public function estadoActivo()
        {
            echo "activo";
        }

        public function estadoInactivo()
        {
            echo "inactivo";
        }
    }
?>