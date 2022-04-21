<?php
    use PHPUnit\Framework\TestCase;
    
    require "clases/Marca.php";

    class MarcaTest extends TestCase{
        /** @test */
        
        public function prueba(){
            $marca = new Marca;
            $marca->conectar();
            $resultado = $marca->consultar();
        }
    }
?>