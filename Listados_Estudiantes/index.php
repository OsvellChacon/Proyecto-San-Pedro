<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->Image('Logo.png',35,8,30);
    // Arial bold 15
    $this->SetFont('Times','B',7);
    // Movernos a la derecha
    $this->Cell(80);//Encabezado
    $this->Cell(120,5,utf8_decode('MINISTERIO DEL PODER POPULAR PARA LA EDUCACIÓN'),0,1,'C');
    $this->Cell(80);
    $this->Cell(120,5,utf8_decode('U.E.Colegio "SAN PEDRO"'),0,1,'C');
    $this->Cell(80);
    $this->Cell(120,5,utf8_decode('CODIGO PLANTEL PD00322023'),0,1,'C');
    $this->Cell(80);
    $this->Cell(120,5,utf8_decode('SAN CRISTÓBAL EDO. TÁCHIRA'),0,1,'C');

    $this->Ln(5);

}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-20);
    // Arial italic 8
    $this->SetFont('Arial','I',6);
    // Número de página
    $this->Cell(0,5,utf8_decode('(Colegio San Pedro)'),0,1,'C');
}
}


    require "models/Conex.php";

    $Consulta = ("SELECT e.id_estudiante, e.Cedula, e.Apellido,e.Nombre,e.Ciudad,e.Estado,e.Genero,e.Fecha_Nacimiento FROM estudiantes e INNER JOIN 1er_grado x ON x.Alumno = e.Curso ORDER BY Cedula ASC LIMIT 0,5");

    $resultado = $mysqli->query($Consulta);


$pdf = new PDF('L','mm','A4');
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Times','B',8);

    $pdf->Cell(80);
    $pdf->Cell(120,5,utf8_decode('Listado De Estudiantes'),0,1,'C');
    $pdf->Ln(5);
    $pdf->Cell(10,4,utf8_decode('Nº'),1,0,'C');
    $pdf->Cell(38,4,utf8_decode('Cedula'),1,0,'C');
    $pdf->Cell(38,4,utf8_decode('Apellido'),1,0,'C');
    $pdf->Cell(38,4,utf8_decode('Nombre'),1,0,'C');
    $pdf->Cell(38,4,utf8_decode('Lugar De Nacimiento'),1,0,'C');
    $pdf->Cell(38,4,utf8_decode('Estado'),1,0,'C');
    $pdf->Cell(38,4,utf8_decode('Sexo'),1,0,'C');
    $pdf->Cell(38,4,utf8_decode('Fecha De Nacimiento'),1,1,'C');
    
    while($row = $resultado->fetch_assoc()){

        $pdf->Cell(10,4,utf8_decode($row["id_estudiante"]),1,0,'C');
        $pdf->Cell(38,4,utf8_decode($row["Cedula"]),1,0,'C');
        $pdf->Cell(38,4,utf8_decode($row["Apellido"]),1,0,'C');
        $pdf->Cell(38,4,utf8_decode($row["Nombre"]),1,0,'C');
        $pdf->Cell(38,4,utf8_decode($row["Ciudad"]),1,0,'C');
        $pdf->Cell(38,4,utf8_decode($row["Estado"]),1,0,'C');
        $pdf->Cell(38,4,utf8_decode($row["Genero"]),1,0,'C');
        $pdf->Cell(38,4,utf8_decode($row["Fecha_Nacimiento"]),1,1,'C');
    }
    
$pdf->Output();
?>
