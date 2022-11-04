<?php

require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->Image('Logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Times','B',8);
    // Movernos a la derecha
    $this->Cell(80);//Encabezado
    $this->Cell(30,5,utf8_decode('REPÚBLICA BOLIVARIANA DE VENEZUELA'),0,1,'C');
    $this->Cell(80);
    $this->Cell(30,5,utf8_decode('MINISTERIO DEL PODER POPULAR PARA LA EDUCACIÓN'),0,1,'C');
    $this->Cell(80);
    $this->Cell(30,5,utf8_decode('U.E.Colegio "SAN PEDRO"'),0,1,'C');
    $this->Cell(80);
    $this->Cell(30,5,utf8_decode('CODIGO PD00321523'),0,1,'C');
    $this->Cell(80);
    $this->Cell(30,5,utf8_decode('SAN CRISTÓBAL EDO. TÁCHIRA'),0,0,'C');

    $this->Ln(15);

}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-20);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,5,utf8_decode('________________________________________________________________________________________________________________________________'),0,1,'C');
    $this->Cell(0,5,utf8_decode('Dirección: ubicado en la carrera 11 Nº 12-11 sector de Barrio San Carlos de la Ciudad de San Cristóbal Estado Táchira'),0,1,'C');
    $this->Cell(0,5,utf8_decode('Teléfono: (0276) 3422481'),0,1,'C');
    $this->Cell(0,5,utf8_decode('________________________________________________________________________________________________________________________________'),0,0,'C');
}
}


    require "Conex.php";

    $Consulta = "SELECT Datos_Alumno, Cedula_Alumno, Curso,Academico,
    
    (case
        when Conducta = 1 then 'EL CUMPLIMIENTO DE LAS NORMAS DE CONVIVENCIA ESTABLECIDAS'
        when Conducta = 2 then 'NO CUMPLIO CON LAS NORMAS DE CONVIVENCIA ESTABLECIDAS'
    end) AS Conducta, Nivel_Educativo, Dia,Mes,Year_School FROM constancias ORDER BY id_constancia DESC LIMIT 1";

    $resultado = $mysqli->query($Consulta);



$pdf = new PDF();
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Times','B',12);

    $pdf->Cell(80);
    $pdf->Cell(40,10,utf8_decode('Constancia'),1,1,'C');
    $pdf->Cell(80);
    $pdf->Ln(10);

    while($row = $resultado->fetch_assoc()){

    $pdf->Cell(190,20,utf8_decode('Quien suscribe, Prof. Johan Manuel Fernandez, Titular de la Cédula de Identidad N o. V.14.873.829,'),0,0,'C');
    $pdf->Ln(10);
    $pdf->Cell(80); 
    $pdf->Cell(30,15,utf8_decode('Director  de la U.E. Colegio "SAN PEDRO" ubicado en la carrera 11 Nº 12-11 sector de Barrio Obrero'),0,0,'C');
    $pdf->Ln(10);
    $pdf->Cell(80);
    $pdf->Cell(30,15,utf8_decode('de la Ciudad de San Cristóbal Estado Táchira, por medio de la presente hace constar que el (la) estudiante,'),0,0,'C');
    $pdf->Ln(10);
        $pdf->Cell(30,15,$row["Datos_Alumno"].utf8_decode(' Cédula De Identidad Nº ').$row["Cedula_Alumno"].utf8_decode(' cursó el ').$row["Curso"]. " " .utf8_decode($row["Academico"]).utf8_decode(" de Educación "), 0,0,'B',0);
        $pdf->Ln(10);
        $pdf->Cell(80);
        $pdf->Cell(30,15,$row["Nivel_Educativo"]. " en este plantel,".utf8_decode(" año escolar 2022-2023 y se observó:") ,0,1,'C',0);
        $pdf->Ln(10);
        $pdf->Cell(80);
        $pdf->Cell(30,10,$row["Conducta"] , 0,0,'C',0);
        $pdf->Ln(15);
        $pdf->Cell(80);
        $pdf->Cell(30,15,utf8_decode('Se expide la presente constancia a petición de parte interesada para los fines legales'),0,0,'C');
        $pdf->Ln(10);
        $pdf->Cell(80);
        $pdf->Cell(30,10,utf8_decode('En San Cristóbal').' a los '.$row["Dia"].utf8_decode(" días del mes de ").$row["Mes"]. " de ".$row["Year_School"], 0,0,'C',0);
        $pdf->Ln(60);
        $pdf->Cell(80);
        $pdf->Cell(30,10,utf8_decode('_________________________________________________________'),0,0,'C');
        $pdf->Ln(10);
        $pdf->Cell(80);
        $pdf->Cell(30,10,utf8_decode('PROF. JOHAN FERNANDEZ'),0,0,'C');
        $pdf->Ln(5);
        $pdf->Cell(80);
        $pdf->Cell(30,10,utf8_decode('Director Academico'),0,0,'C');
    }

$pdf->Output();

?>