<?php
    use PHPUnit\Framework\TestCase;
    require "clases/Categoria.php";

    class PruebaTest extends TestCase{
        /** @test */

        public function pruebaConsultar(){
            $cat = new categoria;
            $result = $cat->consultar();

            foreach($result as $res){
                $this->assertEquals(count($res),2);
            }
        }

    }
?>