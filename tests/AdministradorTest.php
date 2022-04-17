<?php 
namespace App\Tests;

use App\Administrador;
use PHPUnit\Framework\TestCase;

class AdministradorTest extends TestCase {
    public function testaccederAdministrador()
    {
        $autenticar = new Administrador();

        $this->assertEquals('administrador@gmail.com', $autenticar->accederAdministrador());
    }
}