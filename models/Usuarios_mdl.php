<?php

require_once "Conex.php";

	class Registro_Mdl{


///////////////////////////////////////////////////////////////Generar Asignaturas////////////////////////////////////////////////////////////////////

		static public function Generar_Materia_mdl($tabla,$datos){
			$stmt = Conexion::Conectar()->prepare("INSERT INTO $tabla (nombre_materia,docente,curso_asignado) VALUES (:nombre_materia,:docente,:curso_asignado)");

			$stmt->bindParam(':nombre_materia' , $datos["Asignatura"], PDO::PARAM_STR);
			$stmt->bindParam(':docente', $datos["Docente"], PDO::PARAM_INT);
			$stmt->bindParam(':curso_asignado', $datos["Curso"], PDO::PARAM_INT);

			if ($stmt->execute()) {
				return "ok";
			}else{
				print_r(Conexion::Conectar()->errorInfo());
			}
		}

		static public function Vista_Materias_mdl($tabla){
			$stmt = Conexion::Conectar()->prepare("SELECT m.nombre_materia,d.Nombre,d.Apellido, c.curso FROM materias_prueba m INNER JOIN docentes d ON m.docente = d.id_docentes INNER JOIN cursos c ON m.curso_asignado = c.id_curso");
			$stmt->execute();

			return $stmt->fetchAll();
		}

////////////////////////////////////////////////////////////////Estudiantes//////////////////////////////////////////////////////////////////////////

		static public function Entrada_Datos($tabla,$datos){ //Create 
			$stmt = Conexion::Conectar()->prepare("INSERT INTO $tabla (Nombre, Apellido, Edad, Cedula, Genero, Telefono, Fecha_Nacimiento, Correo, Clave, Direccion, Curso, Condicion, Pais, Estado, Ciudad) VALUES (:Nombre, :Apellido, :Edad, :Cedula, :Genero, :Telefono, :Fecha_Nacimiento, :Correo, :Clave, :Direccion, :Curso, :Condicion, :Pais, :Estado, :Ciudad)");

			$stmt->bindParam(":Nombre",$datos["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":Apellido",$datos["apellido"], PDO::PARAM_STR);
			$stmt->bindParam(":Edad",$datos["edad"], PDO::PARAM_STR);
			$stmt->bindParam(":Cedula",$datos["cedula"], PDO::PARAM_STR);
			$stmt->bindParam(":Genero",$datos["genero"], PDO::PARAM_STR);
			$stmt->bindParam(":Telefono",$datos["numero"], PDO::PARAM_STR);
			$stmt->bindParam(":Fecha_Nacimiento",$datos["nacimiento"], PDO::PARAM_STR);
			$stmt->bindParam(":Correo",$datos["correo"], PDO::PARAM_STR);
			$stmt->bindParam(":Clave",$datos["clave"], PDO::PARAM_STR);
			$stmt->bindParam(":Direccion",$datos["direccion"], PDO::PARAM_STR);
			$stmt->bindParam(":Curso",$datos["curso"], PDO::PARAM_STR);
			$stmt->bindParam(":Condicion",$datos["condicion"], PDO::PARAM_STR);
			$stmt->bindParam(":Pais",$datos["pais"], PDO::PARAM_STR);
			$stmt->bindParam(":Estado",$datos["estado"], PDO::PARAM_STR);
			$stmt->bindParam(":Ciudad",$datos["ciudad"], PDO::PARAM_STR);

			if ($stmt->execute()) {
				return "ok";
			}else{
				print_r(Conexion::Conectar()->errorInfo());
			}
		}

		static public function Vista_Datos_MDL($tabla,$item,$valor){//Read
			
			if ($item == null && $valor == null) {
				$stmt = Conexion::Conectar()->prepare("SELECT id_estudiante, Nombre,Apellido,Edad,Cedula,Genero,Telefono,Fecha_Nacimiento,Correo,Direccion,
	
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
			 
			 FROM $tabla");

				$stmt->execute();

				return $stmt->fetchAll();
			}else{
				$stmt = Conexion::Conectar()->prepare("SELECT * FROM $tabla WHERE $item = :item");

				$stmt->bindParam(":item",$valor, PDO::PARAM_STR);

				$stmt->execute();

				return $stmt->fetch();
			}

		}


		static public function Actualizar_Datos($tabla,$datos){//Update
		$stmt = Conexion::Conectar()->prepare("UPDATE $tabla SET Nombre= :Nombre, Apellido = :Apellido, Correo= :Correo, Clave= :Clave , Edad = :Edad, Cedula = :Cedula, Telefono = :Telefono, Pais = :Pais, Estado = :Estado, Ciudad = :Ciudad, Direccion = :Direccion WHERE id_estudiante = :id_estudiante");
			$stmt->bindParam(":Nombre",$datos["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":Apellido",$datos["Apellido"], PDO::PARAM_STR);
			$stmt->bindParam(":Correo",$datos["correo"], PDO::PARAM_STR);
			$stmt->bindParam(":Clave",$datos["clave"], PDO::PARAM_STR);
			$stmt->bindParam(":Edad",$datos["Edad"], PDO::PARAM_STR);
			$stmt->bindParam(":Cedula",$datos["Cedula"], PDO::PARAM_STR);
			$stmt->bindParam(":Telefono",$datos["Telefono"], PDO::PARAM_STR);
			$stmt->bindParam(":Pais",$datos["Pais"], PDO::PARAM_STR);
			$stmt->bindParam(":Estado",$datos["Estado"], PDO::PARAM_STR);
			$stmt->bindParam(":Ciudad",$datos["Ciudad"], PDO::PARAM_STR);
			$stmt->bindParam(":Direccion",$datos["Direccion"], PDO::PARAM_STR);
			$stmt->bindParam(":id_estudiante",$datos["id_estudiante"], PDO::PARAM_STR);

			if($stmt->execute()){
				return "ok";
			}

		}



		static public function Eliminar_Datos($tabla,$valor){//Delete

			$stmt = Conexion::Conectar()->prepare("DELETE FROM $tabla WHERE id_estudiante = :id_estudiante");

			$stmt->bindParam(":id_estudiante",$valor, PDO::PARAM_INT);

			if($stmt->execute()){
				return "ok";
			}

		}

/////////////////////////////////////////////////////////////////Docentes/////////////////////////////////////////////////////////////////////////////
		
		static public function Entrada_Datos_DOC($tabla,$datos){ //Create 
			$stmt = Conexion::Conectar()->prepare("INSERT INTO $tabla(Nombre, Apellido, Cedula, Edad, Nivel_Educacion, Correo, Clave, Direccion, Telefono) VALUES (:Nombre, :Apellido, :Cedula, :Edad, :Nivel_Educacion, :Correo, :Clave, :Direccion, :Telefono)");

			$stmt->bindParam(":Nombre",$datos["Nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":Apellido",$datos["Apellido"], PDO::PARAM_STR);
			$stmt->bindParam(":Edad",$datos["Edad"], PDO::PARAM_STR);
			$stmt->bindParam(":Cedula",$datos["Cedula"], PDO::PARAM_STR);
			$stmt->bindParam(":Nivel_Educacion",$datos["Nivel_Educacion"], PDO::PARAM_STR);
			$stmt->bindParam(":Telefono",$datos["Numero"], PDO::PARAM_STR);
			$stmt->bindParam(":Correo",$datos["Correo"], PDO::PARAM_STR);
			$stmt->bindParam(":Clave",$datos["Clave"], PDO::PARAM_STR);
			$stmt->bindParam(":Direccion",$datos["Direccion"], PDO::PARAM_STR);

			if ($stmt->execute()) {
				return "ok";
			}else{
				print_r(Conexion::Conectar()->errorInfo());
			}
		}

		static public function Vista_Datos_DOC($tabla,$item,$valor){//Read
			
			if ($item == null && $valor == null) {
				$stmt = Conexion::Conectar()->prepare("SELECT * FROM $tabla");

				$stmt->execute();

				return $stmt->fetchAll();
			}else{
				$stmt = Conexion::Conectar()->prepare("SELECT * FROM $tabla WHERE $item = :item");

				$stmt->bindParam(":item",$valor, PDO::PARAM_STR);

				$stmt->execute();

				return $stmt->fetch();
			}

		}


		static public function Actualizar_Datos_DOC($tabla,$datos){//Update
		$stmt = Conexion::Conectar()->prepare("UPDATE $tabla SET Nombre= :Nombre,Apellido= :Apellido, Cedula= :Cedula,Edad= :Edad, Correo= :Correo,Clave= :Clave ,Direccion= :Direccion,Telefono= :Telefono WHERE id_docentes = :id_docentes");

			$stmt->bindParam(":Nombre",$datos["Nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":Apellido",$datos["Apellido"], PDO::PARAM_STR);
			$stmt->bindParam(":Edad",$datos["Edad"], PDO::PARAM_STR);
			$stmt->bindParam(":Cedula",$datos["Cedula"], PDO::PARAM_STR);
			$stmt->bindParam(":Telefono",$datos["Numero"], PDO::PARAM_STR);
			$stmt->bindParam(":Correo",$datos["Correo"], PDO::PARAM_STR);
			$stmt->bindParam(":Clave",$datos["Clave"], PDO::PARAM_STR);
			$stmt->bindParam(":Direccion",$datos["Direccion"], PDO::PARAM_STR);
			$stmt->bindParam(":id_docentes",$datos["id_docentes"], PDO::PARAM_STR);

			if($stmt->execute()){
				return "ok";
			}

		}

			public function Eliminar_Datos_Docente_mdl($tabla,$valor){//Delete
			
			$stmt = Conexion::Conectar()->prepare("DELETE FROM $tabla WHERE id_docentes = :id_docentes");

			$stmt->bindParam(":id_docentes",$valor, PDO::PARAM_INT);

			if($stmt->execute()){
				return "ok";
			}

		}

///////////////////////////////////////////////////////////////Administrador//////////////////////////////////////////////////////////////////////////

			static public function Entrada_Datos_ADM($tabla,$datos){ //Create 
			$stmt = Conexion::Conectar()->prepare("INSERT INTO $tabla (Nombre, Apellido, Cedula, Correo, Clave, Telefono) VALUES (:Nombre, :Apellido, :Cedula, :Correo, :Clave, :Telefono)");

			$stmt->bindParam(":Nombre",$datos["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":Apellido",$datos["apellido"], PDO::PARAM_STR);
			$stmt->bindParam(":Cedula",$datos["cedula"], PDO::PARAM_STR);
			$stmt->bindParam(":Telefono",$datos["Telefono"], PDO::PARAM_STR);
			$stmt->bindParam(":Correo",$datos["correo"], PDO::PARAM_STR);
			$stmt->bindParam(":Clave",$datos["clave"], PDO::PARAM_STR);

			if ($stmt->execute()) {
				return "ok";
			}else{
				print_r(Conexion::Conectar()->errorInfo());
			}
		}

			static public function Vista_Datos_ADM($tabla,$item,$valor){//Read
				
				if ($item == null && $valor == null) {
					$stmt = Conexion::Conectar()->prepare("SELECT * FROM $tabla");

					$stmt->execute();

					return $stmt->fetchAll();
				}else{
					$stmt = Conexion::Conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

					$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

					$stmt->execute();

					return $stmt->fetch();
				}

			}

			static public function Actualizar_Datos_ADM($tabla,$datos){//Update
			$stmt = Conexion::Conectar()->prepare("UPDATE $tabla SET Nombre= :Nombre,Apellido= :Apellido,Cedula= :Cedula,Correo= :Correo, Clave=:Clave, Telefono= :Telefono WHERE id_admin= :id_admin");
			$stmt->bindParam(":Nombre",$datos["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":Apellido",$datos["Apellido"], PDO::PARAM_STR);
			$stmt->bindParam(":Correo",$datos["Correo"], PDO::PARAM_STR);
			$stmt->bindParam(":Clave",$datos["clave"], PDO::PARAM_STR);
			$stmt->bindParam(":Cedula",$datos["Cedula"], PDO::PARAM_STR);
			$stmt->bindParam(":Telefono",$datos["Telefono"], PDO::PARAM_STR);
			$stmt->bindParam(":id_admin",$datos["id_admin"], PDO::PARAM_STR);

			if($stmt->execute()){
				return "ok";
			}

		}

		public function Eliminar_Datos_ADM($tabla,$valor){//Delete
			$stmt = Conexion::Conectar()->prepare("DELETE FROM $tabla WHERE id_admin = :id_admin");

			$stmt->bindParam(":id_admin",$valor, PDO::PARAM_INT);

			if($stmt->execute()){
				return "ok";
			}

		}

//////////////////////////////////////////////////////////////////////Padres//////////////////////////////////////////////////////////////////////////

		static public function Envio_Padre_mdl($tabla,$datos){ //Create 
			$stmt = Conexion::Conectar()->prepare("INSERT INTO $tabla(Nombre, Apellido, Edad, Cedula, Nacionalidad, Telefono, Direccion, Ocupacion, Lugar_Trabajo, Telefono_Trabajo) VALUES (:Nombre, :Apellido, :Edad, :Cedula, :Nacionalidad, :Telefono, :Direccion, :Ocupacion, :Lugar_Trabajo, :Telefono_Trabajo)");

			$stmt->bindParam(":Nombre",$datos["Nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":Apellido",$datos["Apellido"], PDO::PARAM_STR);
			$stmt->bindParam(":Edad",$datos["Edad"], PDO::PARAM_STR);
			$stmt->bindParam(":Cedula",$datos["Cedula"], PDO::PARAM_STR);
			$stmt->bindParam(":Nacionalidad",$datos["Nacionalidad"], PDO::PARAM_STR);
			$stmt->bindParam(":Telefono",$datos["Telefono"], PDO::PARAM_STR);
			$stmt->bindParam(":Direccion",$datos["Direccion"], PDO::PARAM_STR);
			$stmt->bindParam(":Ocupacion",$datos["Ocupacion"], PDO::PARAM_STR);
			$stmt->bindParam(":Lugar_Trabajo",$datos["Lugar_Trabajo"], PDO::PARAM_STR);
			$stmt->bindParam(":Telefono_Trabajo",$datos["Telefono_Trabajo"], PDO::PARAM_STR);

			if ($stmt->execute()) {
				return "ok";
			}else{
				print_r(Conexion::Conectar()->errorInfo());
			}
		}

///////////////////////////////////////////////////////////////////Madres/////////////////////////////////////////////////////////////////////////////


		static public function Envio_Madre_mdl($tabla,$datos){ //Create 
			$stmt = Conexion::Conectar()->prepare("INSERT INTO $tabla(Nombre, Apellido, Edad, Cedula, Nacionalidad, Telefono, Direccion, Ocupacion, Lugar_Trabajo, Telefono_Trabajo) VALUES (:Nombre, :Apellido, :Edad, :Cedula, :Nacionalidad, :Telefono, :Direccion, :Ocupacion, :Lugar_Trabajo, :Telefono_Trabajo)");

			$stmt->bindParam(":Nombre",$datos["Nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":Apellido",$datos["Apellido"], PDO::PARAM_STR);
			$stmt->bindParam(":Edad",$datos["Edad"], PDO::PARAM_STR);
			$stmt->bindParam(":Cedula",$datos["Cedula"], PDO::PARAM_STR);
			$stmt->bindParam(":Nacionalidad",$datos["Nacionalidad"], PDO::PARAM_STR);
			$stmt->bindParam(":Telefono",$datos["Telefono"], PDO::PARAM_STR);
			$stmt->bindParam(":Direccion",$datos["Direccion"], PDO::PARAM_STR);
			$stmt->bindParam(":Ocupacion",$datos["Ocupacion"], PDO::PARAM_STR);
			$stmt->bindParam(":Lugar_Trabajo",$datos["Lugar_Trabajo"], PDO::PARAM_STR);
			$stmt->bindParam(":Telefono_Trabajo",$datos["Telefono_Trabajo"], PDO::PARAM_STR);

			if ($stmt->execute()) {
				return "ok";
			}else{
				print_r(Conexion::Conectar()->errorInfo());
			}
		}


//////////////////////////////////////////////////////////////Representantes//////////////////////////////////////////////////////////////////////////


		static public function Envio_Representante_mdl($tabla,$datos){ //Create 
			$stmt = Conexion::Conectar()->prepare("INSERT INTO $tabla(Nombre, Apellido, Edad, Cedula, Parentesco, Nacionalidad, Telefono, Direccion, Ocupacion, Lugar_Trabajo, Telefono_Trabajo, Telefono_Emergencia) VALUES (:Nombre, :Apellido, :Edad, :Cedula, :Parentesco, :Nacionalidad, :Telefono, :Direccion, :Ocupacion, :Lugar_Trabajo, :Telefono_Trabajo, :Telefono_Emergencia)");

			$stmt->bindParam(":Nombre",$datos["Nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":Apellido",$datos["Apellido"], PDO::PARAM_STR);
			$stmt->bindParam(":Edad",$datos["Edad"], PDO::PARAM_STR);
			$stmt->bindParam(":Cedula",$datos["Cedula"], PDO::PARAM_STR);
			$stmt->bindParam(":Parentesco",$datos["Parentesco"], PDO::PARAM_STR);
			$stmt->bindParam(":Nacionalidad",$datos["Nacionalidad"], PDO::PARAM_STR);
			$stmt->bindParam(":Telefono",$datos["Telefono"], PDO::PARAM_STR);
			$stmt->bindParam(":Direccion",$datos["Direccion"], PDO::PARAM_STR);
			$stmt->bindParam(":Ocupacion",$datos["Ocupacion"], PDO::PARAM_STR);
			$stmt->bindParam(":Lugar_Trabajo",$datos["Lug_Trabajo"], PDO::PARAM_STR);
			$stmt->bindParam(":Telefono_Trabajo",$datos["Telefono_Trabajo"], PDO::PARAM_STR);
			$stmt->bindParam(":Telefono_Emergencia",$datos["Numero_Emergencia"], PDO::PARAM_STR);

			if ($stmt->execute()) {
				return "ok";
			}else{
				print_r(Conexion::Conectar()->errorInfo());
			}
		}

///////////////////////////////////////////////////////Constancia//////////////////////////////////////////////////////////////
		
		static public function Constancia_mdl($tabla,$datos){//Create
			$stmt = Conexion::Conectar()->prepare("INSERT INTO $tabla(Datos_Alumno, Cedula_Alumno, Curso, Academico, Nivel_Educativo, Conducta, Dia, Mes, Year_School) VALUES (:Datos_Alumno, :Cedula_Alumno, :Curso, :Academico, :Nivel_Educativo, :Conducta, :Dia, :Mes, :Year_School)");

			$stmt->bindParam(':Datos_Alumno', $datos["Datos_Alumno"], PDO::PARAM_STR);
			$stmt->bindParam(':Cedula_Alumno', $datos["Cedula_Alumno"], PDO::PARAM_STR);
			$stmt->bindParam(':Curso', $datos["Curso"], PDO::PARAM_STR);
			$stmt->bindParam(':Academico', $datos["Academico"], PDO::PARAM_STR);
			$stmt->bindParam(':Nivel_Educativo', $datos["Nivel_Educativo"], PDO::PARAM_STR);
			$stmt->bindParam(':Conducta', $datos["Conducta"], PDO::PARAM_STR);
			$stmt->bindParam(':Dia', $datos["Dia"], PDO::PARAM_STR);
			$stmt->bindParam(':Mes', $datos["Mes"], PDO::PARAM_STR);
			$stmt->bindParam(':Year_School', $datos["Year"], PDO::PARAM_STR);

			if($stmt->execute()){
				return "ok";
			}else{
				print_r(Conexion::Conectar()->errorInfo());
			}
		}

		static public function Visualizar_Cursos_mdl($tabla){
			$stmt = Conexion::Conectar()->prepare("SELECT * FROM $tabla");
			$stmt->execute();
			return $stmt->fetchAll();
		}

	}

?>