<?php

require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->Image('Logo.png',10,8,25);
    $this->Image('Estudiante.png',135,8,40);
    $this->Image('Representante.png',165,8,40);
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
    $this->Cell(0,5,utf8_decode('_____________________________________________________________________________________________________________________________________________________________________________________'),0,1,'C');
    $this->Cell(0,5,utf8_decode('Notas:'),0,1,'B');
    $this->Cell(0,5,utf8_decode('(1. LA FICHA DE INSCRIPCION DEBE TENER LAS FOTOGRAFIAS INSERTADAS COMO IMAGENES || 2. DEBEN TRAER IMPRESO TRES || (3) PLANILLAS DE INSCRIPCIÓN.)'),0,1,'C');
}
}


    require "Conex.php";

    $Consulta = ("SELECT Nombre,Apellido,Edad,Cedula,Genero,Telefono,Fecha_Nacimiento,Correo,Direccion,
	
    (case 
         when Curso = 1 then '1er Grado'
         when Curso = 2 then '2do Grado'
         when Curso = 3 then '3er Grado'
         when Curso = 4 then '4to Grado'
         when Curso = 5 then '5to Grado'
         when Curso = 6 then '6to Grado'
         when Curso = 7 then '1er Año'
         when Curso = 8 then '2do Año'
         when Curso = 9 then '3er Año'
         when Curso = 10 then '4to Año'
         when Curso = 11 then '5to Año'
     end) AS Curso,Condicion,Pais,Estado,Ciudad
 
 FROM estudiantes ORDER BY id_estudiante DESC LIMIT 1");

    $resultado = $mysqli->query($Consulta);

    $Consulta2 = ("SELECT Nombre, Apellido, Edad, Cedula, Nacionalidad, Telefono, Direccion, Ocupacion, Lugar_Trabajo, Telefono_Trabajo FROM padres ORDER BY id_padres DESC LIMIT 1");

    $resultado2 = $mysqli->query($Consulta2);

    $Consulta3 = ("SELECT Nombre, Apellido, Edad, Cedula, Nacionalidad, Telefono, Direccion, Ocupacion, Lugar_Trabajo, Telefono_Trabajo FROM madres ORDER BY id_madres DESC LIMIT 1");


    $resultado3 = $mysqli->query($Consulta3);

    $Consulta4 = ("SELECT Nombre, Apellido, Edad, Cedula, Parentesco, Nacionalidad, Telefono, Direccion, Ocupacion, Lugar_Trabajo, Telefono_Trabajo, Telefono_Emergencia FROM representantes ORDER BY id_representante DESC LIMIT 1");
    $resultado4 = $mysqli->query($Consulta4);

$pdf = new PDF();
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Times','B',8);

    $pdf->Cell(80);
    $pdf->Cell(35,10,utf8_decode('Fichas De Inscripcion'),0,1,'C');
    $pdf->Ln(1);

    while($row = $resultado->fetch_assoc()){

        $pdf->Cell(30,10,'Datos Del Alumno:',0,1,'C');
        $pdf->Cell(30,10,'Apellidos',0,0,'C');
        $pdf->Cell(30,10,'Nombres',0,0,'C');
        $pdf->Cell(30,10,'Cedula',0,0,'C');
        $pdf->Cell(30,10,'Lugar Nac.',0,0,'C');
        $pdf->Cell(25,10,'Fecha Nac.',0,0,'C');
        $pdf->Cell(25,10,'Edad',0,0,'C');
        $pdf->Cell(25,10,'Estado',0,1,'C');

        $pdf->Cell(30,10,$row["Apellido"],1,0,'C');
        $pdf->Cell(30,10,$row["Nombre"],1,0,'C');
        $pdf->Cell(30,10,$row["Cedula"],1,0,'C');
        $pdf->Cell(30,10,$row["Ciudad"],1,0,'C');
        $pdf->Cell(25,10,$row["Fecha_Nacimiento"],1,0,'C');
        $pdf->Cell(25,10,$row["Edad"],1,0,'C');
        $pdf->Cell(25,10,$row["Estado"],1,0,'C');

        $pdf->Ln(10);

        $pdf->Cell(30,10,'Pais',0,0,'C');
        $pdf->Cell(30,10,'Telefono',0,0,'C');
        $pdf->Cell(80,10,'Direccion',0,0,'C');
        $pdf->Cell(25,10,'Curso',0,0,'C');
        $pdf->Cell(30,10,'Condicion',0,1,'C');

        $pdf->Cell(30,10,$row["Pais"],1,0,'C');
        $pdf->Cell(30,10,$row["Telefono"],1,0,'C');
        $pdf->Cell(80,10,$row["Direccion"],1,0,'C');
        $pdf->Cell(25,10,utf8_decode($row["Curso"]),1,0,'C');
        $pdf->Cell(30,10,$row["Condicion"],1,1,'C');
    }
    
    while($row = $resultado2->fetch_assoc()){
        $pdf->Cell(30,10,'Datos Del Padre:',0,1,'C');
        $pdf->Cell(30,10,'Apellidos',0,0,'C');
        $pdf->Cell(30,10,'Nombres',0,0,'C');
        $pdf->Cell(30,10,'Cedula',0,0,'C');
        $pdf->Cell(30,10,'Edad',0,0,'C');
        $pdf->Cell(30,10,'Nacionalidad',0,0,'C');
        $pdf->Cell(30,10,'Telefono',0,1,'C');

        $pdf->Cell(30,10,$row["Apellido"],1,0,'C');
        $pdf->Cell(30,10,$row["Nombre"],1,0,'C');
        $pdf->Cell(30,10,$row["Cedula"],1,0,'C');
        $pdf->Cell(30,10,$row["Edad"],1,0,'C');
        $pdf->Cell(30,10,$row["Nacionalidad"],1,0,'C');
        $pdf->Cell(30,10,$row["Telefono"],1,1,'C');

        $pdf->Cell(80,10,'Direccion',0,0,'C');
        $pdf->Cell(40,10,'Ocupacion',0,0,'C');
        $pdf->Cell(30,10,'Lug.Trabajo',0,0,'C');
        $pdf->Cell(30,10,'Telefono Trabajo',0,1,'C');

        $pdf->Cell(80,10,$row["Direccion"],1,0,'C');
        $pdf->Cell(40,10,$row["Ocupacion"],1,0,'C');
        $pdf->Cell(30,10,$row["Lugar_Trabajo"],1,0,'C');
        $pdf->Cell(30,10,$row["Telefono_Trabajo"],1,1,'C');     
    }

    while($row = $resultado3->fetch_assoc()){
        $pdf->Cell(30,10,'Datos De La Madre:',0,1,'C');
        $pdf->Cell(30,10,'Apellidos',0,0,'C');
        $pdf->Cell(30,10,'Nombres',0,0,'C');
        $pdf->Cell(30,10,'Cedula',0,0,'C');
        $pdf->Cell(30,10,'Edad',0,0,'C');
        $pdf->Cell(30,10,'Nacionalidad',0,0,'C');
        $pdf->Cell(30,10,'Telefono',0,1,'C');

        $pdf->Cell(30,10,$row["Apellido"],1,0,'C');
        $pdf->Cell(30,10,$row["Nombre"],1,0,'C');
        $pdf->Cell(30,10,$row["Cedula"],1,0,'C');
        $pdf->Cell(30,10,$row["Edad"],1,0,'C');
        $pdf->Cell(30,10,$row["Nacionalidad"],1,0,'C');
        $pdf->Cell(30,10,$row["Telefono"],1,1,'C');

        $pdf->Cell(80,10,'Direccion',0,0,'C');
        $pdf->Cell(40,10,'Ocupacion',0,0,'C');
        $pdf->Cell(30,10,'Lug.Trabajo',0,0,'C');
        $pdf->Cell(30,10,'Telefono Trabajo',0,1,'C');

        $pdf->Cell(80,10,$row["Direccion"],1,0,'C');
        $pdf->Cell(40,10,$row["Ocupacion"],1,0,'C');
        $pdf->Cell(30,10,$row["Lugar_Trabajo"],1,0,'C');
        $pdf->Cell(30,10,$row["Telefono_Trabajo"],1,1,'C');     
    }

    while($row = $resultado4->fetch_assoc()){
        $pdf->Cell(30,10,'Datos Del Representante:',0,1,'C');
        $pdf->Cell(30,10,'Apellidos',0,0,'C');
        $pdf->Cell(30,10,'Nombres',0,0,'C');
        $pdf->Cell(30,10,'Parentesco',0,0,'C');
        $pdf->Cell(30,10,'Cedula',0,0,'C');
        $pdf->Cell(30,10,'Edad',0,0,'C');
        $pdf->Cell(30,10,'Nacionalidad',0,1,'C');
        

        $pdf->Cell(30,10,$row["Apellido"],1,0,'C');
        $pdf->Cell(30,10,$row["Nombre"],1,0,'C');
        $pdf->Cell(30,10,$row["Parentesco"],1,0,'C');
        $pdf->Cell(30,10,$row["Cedula"],1,0,'C');
        $pdf->Cell(30,10,$row["Edad"],1,0,'C');
        $pdf->Cell(30,10,$row["Nacionalidad"],1,1,'C');

        $pdf->Cell(30,10,'Telefono',0,0,'C');
        $pdf->Cell(80,10,'Direccion',0,0,'C');
        $pdf->Cell(40,10,'Ocupacion',0,0,'C');
        $pdf->Cell(30,10,'Lug.Trabajo',0,1,'C');

        $pdf->Cell(30,10,$row["Telefono"],1,0,'C');
        $pdf->Cell(80,10,$row["Direccion"],1,0,'C');
        $pdf->Cell(40,10,$row["Ocupacion"],1,0,'C');
        $pdf->Cell(30,10,$row["Lugar_Trabajo"],1,1,'C');

        $pdf->Cell(30,10,'Telefono Trabajo',0,0,'C');
        $pdf->Cell(30,10,'Telefono Emergencia',0,0,'C');
        $pdf->Cell(70,10,'Firma Alumno',0,0,'C');
        $pdf->Cell(70,10,'Firma Representante',0,1,'C');
        $pdf->Cell(30,10,$row["Telefono_Trabajo"],1,0,'C');
        $pdf->Cell(30,10,$row["Telefono_Emergencia"],1,0,'C'); 
        $pdf->Cell(70,10,'_________________________________',0,0,'C'); 
        $pdf->Cell(70,10,'_________________________________',0,1,'C');
    }

$pdf->Output();
?>
