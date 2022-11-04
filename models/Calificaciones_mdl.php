<?php

	require_once "Conex.php";

	class Calificaciones_Mdl{
		static public function Envio_Calificaciones_mdl($tabla,$datos){
			$stmt = Conexion::Conectar()->prepare("INSERT INTO $tabla (Alumno,Curso,Nota_1,Nota_2,Nota_3,Nota_4,Promedio) VALUES (:Alumno,:Curso,:Nota_1,:Nota_2,:Nota_3,:Nota_4,:Promedio)");
			
			$stmt->bindParam(':Alumno', $datos["Alumno"], PDO::PARAM_INT);
			$stmt->bindParam(':Curso', $datos["Curso"], PDO::PARAM_INT);
			$stmt->bindParam(':Nota_1', $datos["Nota_1"], PDO::PARAM_INT);
			$stmt->bindParam(':Nota_2', $datos["Nota_2"], PDO::PARAM_INT);
			$stmt->bindParam(':Nota_3', $datos["Nota_3"], PDO::PARAM_INT);
			$stmt->bindParam(':Nota_4', $datos["Nota_4"], PDO::PARAM_INT);
			$stmt->bindParam(':Promedio', $datos["Promedio"], PDO::PARAM_INT);

			if ($stmt->execute()) {
				return "ok";
			}else{
				echo "<center><h3 class='alert alter-danger'>-(Error Al Calificar Al Estudiante)-</h3></center>";
			}
		}

		static public function Visualizar_Calificaciones_mdl($tabla){
			$stmt = Conexion::Conectar()->prepare("SELECT c.id_nota, e.Nombre,e.Apellido,m.nombre_materia,m.curso_asignado,c.Nota_1,c.Nota_2,c.Nota_3,c.Nota_4,c.Promedio FROM estudiantes e INNER JOIN calificaciones c ON c.Alumno = e.id_estudiante INNER JOIN materias_prueba m ON m.id_materia = c.Materia AND m.curso_asignado = c.curso;");
			$stmt->execute();
			return $stmt->fetchAll();
		}
	}
?>