<?php
    require('../PDF/fpdf.php');
    require('conexion.php');

    class PDF extends FPDF{

        function header(){
            $fecha_actual = date("d-m-Y");
            $this->SetFont('Arial','B',15);
            $this->SetTextColor(26, 82, 118);
            //Movernos hacia a la derecha
            $this->Cell(70);
            $this->Cell(70,10,'REPORTE DE INVENTARIO','C');
            $this->Ln();
            $this->SetTextColor(0, 0, 0);
            $this->Cell(30,10,'Fecha: '.$fecha_actual);
            //Salto de linea
            $this->Ln(5);
        }

        function verProductos(){
            $conexion = new Conexion;
            $conexion->conectar();
            $query = "SELECT nombre, cantidad, precio FROM producto WHERE idestado=1";
            $resultado = mysqli_query($conexion->con, $query);
            $contador = 1;
            while($imprimir = mysqli_fetch_array($resultado)){
                $this->Cell(20,10,$contador,1,0);
                $this->Cell(70,10,$imprimir['nombre'],1,0);
                $this->Cell(40,10,$imprimir['cantidad'],1,0);
                $this->Cell(40,10,'$'.$imprimir['precio'],1,1);
                $contador++;
            }
        }

    }

    //Creando el reporte
    $pdf = new PDF;
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Ln();
    $pdf->Cell(20,10,"#",1,0);
    $pdf->Cell(70,10,"Producto",1,0);
    $pdf->Cell(40,10,"Cantidad",1,0);
    $pdf->Cell(40,10,"Precio",1,1);
    $pdf->verProductos();
    $pdf->Output();
?>