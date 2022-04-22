<?php
    use PHPUnit\Framework\TestCase;
    require "clase.php";

    class productoTest extends TestCase{
        /** @test */
        public function test(){
            $product = new pruebaProducto;

            $product->insertar("Aceite",2.50,9);

            $product->actualizar(9,"Refri Mabe");

            //$product->eliminar(10);

            $array = $product->consultar();
            foreach($array as $arr){
                //El 4 refleja los campos de mi tabla testproducto(db)
                $this->assertEquals(count($arr),4);
            }
        }
    }
?>