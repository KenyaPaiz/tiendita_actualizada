<?php
    class autenticar{
        public function login(LoginInterface $usuario){
            $usuario->autenticar();
        }
    }
?>