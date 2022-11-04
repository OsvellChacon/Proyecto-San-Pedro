<?php

require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->Image('Logo.png',10,8,25);
    // Arial bold 15
    $this->SetFont('Times','B',7);
    // Movernos a la derecha
    $this->Cell(80);//Encabezado
    $this->Cell(30,5,utf8_decode('REPÚBLICA BOLIVARIANA DE VENEZUELA'),0,1,'C');
    $this->Cell(80);
    $this->Cell(30,5,utf8_decode('MINISTERIO DEL PODER POPULAR PARA LA EDUCACIÓN'),0,1,'C');
    $this->Cell(80);
    $this->Cell(30,5,utf8_decode('U.E.Colegio "SAN PEDRO"'),0,1,'C');
    $this->Cell(80);
    $this->Cell(30,5,utf8_decode('INSCRITO EN EL M.E. Nº-0167 PD-00322001'),0,1,'C');
    $this->Cell(80);
    $this->Cell(30,5,utf8_decode('RIF-J-30437623-5'),0,1,'C');
    $this->Cell(80);
    $this->Cell(30,5,utf8_decode('SAN CRISTÓBAL EDO. TÁCHIRA'),0,1,'C');
    $this->Cell(80);
    $this->Cell(30,5,utf8_decode('0276-3423481'),0,0,'C');

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
    $this->Cell(0,5,utf8_decode('(Unidad Educativa Colegio San Pedro)'),0,1,'C');
}
}


    require "Conex.php";

    $Consulta = ("SELECT c.id_nota, e.Nombre,e.Apellido,e.Cedula,m.nombre_materia,f.curso,c.Nota_1,c.Nota_2,c.Nota_3,c.Nota_4,c.Promedio FROM estudiantes e INNER JOIN calificaciones c ON c.Alumno = e.id_estudiante INNER JOIN materias_prueba m ON m.id_materia = c.Materia AND m.curso_asignado = c.curso INNER JOIN cursos f ON f.id_curso = e.Curso;");

    $resultado = $mysqli->query($Consulta);

    $Consulta2 = ("SELECT c.id_nota, e.Nombre,e.Apellido,e.Cedula,m.nombre_materia,f.Curso,c.Nota_1,c.Nota_2,c.Nota_3,c.Nota_4,c.Promedio FROM estudiantes e INNER JOIN calificaciones c ON c.Alumno = e.id_estudiante INNER JOIN materias_prueba m ON m.id_materia = c.Materia AND m.curso_asignado = c.curso INNER JOIN cursos f ON f.id_curso = e.Curso LIMIT 1");

    $resultado2 = $mysqli->query($Consulta2);

$pdf = new PDF();
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Times','B',8);

    $pdf->Cell(80);
    $pdf->Cell(35,10,utf8_decode('Boletin Academico'),0,1,'C');
    $pdf->Cell(80,10,'Datos Del Alumno',0,0,'C');
    $pdf->Cell(30,10,'Curso',0,1,'C');
    $pdf->Ln(1);

    while($row = $resultado2->fetch_assoc()){
        $pdf->Cell(80,10,$row["Apellido"]." ".$row["Nombre"]." (".$row["Cedula"].")",1,0,'C');    
        $pdf->Cell(30,10,$row["Curso"],1,1,'C');     
    }

    $pdf->Cell(80);
    $pdf->Ln(1);
    $pdf->Cell(50,10,'Asignatura',0,0,'C');
    $pdf->Cell(50,10,'1er Lapso',0,0,'C');
    $pdf->Cell(50,10,'2do Lapso',0,0,'C');
    $pdf->Cell(50,10,'3er Lapso',0,1,'C');

    while($row = $resultado->fetch_assoc()){
        $pdf->Cell(50,10,$row["nombre_materia"],1,0,'C');
        $pdf->Cell(50,10,$row["Promedio"],1,1,'C');

    }
$pdf->Output();
?>
