<?php
    use PHPUnit\Framework\TestCase;

    class MarcaTest extends TestCase{
        /** @test */
        public function prueba(){
            $num = 2;

            $this->assertEquals(2, $num);
        }
    }
?>