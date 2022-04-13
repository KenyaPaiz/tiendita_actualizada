<?php

use PHPUnit\Framework\TestCase;
require('clases/Marca.php');

class MarcaTest extends TestCase{
    /** @test */
    public function registrarTest(){
        $marcaTest = new Marca;
        $marcaTest->nombre = 'prueba3';
        $marcaTest->registrar();
        $this->assertEquals('prueba3', $marcaTest->nombre);
    }
}

?>