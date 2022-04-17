<?php

use PHPUnit\Framework\TestCase;
require('clases/Marca.php');

class MarcaTest extends TestCase{
    /** @test */
    public function registrarTest(){

        $marca = new Marca;
        $marca->conectar();
        $cadena = 'otra_prueba';
        $marca->nombre = 'otra_prueba';
        $this->assertEquals($cadena, $marca->registrar());
    }
}

?>