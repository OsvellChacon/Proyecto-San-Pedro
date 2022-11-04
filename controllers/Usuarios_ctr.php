<?php

	class Registro_Ctr{

	//Ingreso Al Sistema

		public function Ingreso_Admin(){
			if (isset($_POST["ingreso_email"])) {

				$tabla = "administradores";
				$item =  "Correo";
				$valor = $_POST["ingreso_email"];

				$mdl_resp = Registro_Mdl::Vista_Datos_ADM($tabla,$item,$valor);
				
				if(is_array($mdl_resp)){

						if ($mdl_resp["Correo"] == $_POST["ingreso_email"] && $mdl_resp["Clave"] == $_POST["ingreso_password"]){
							
							$_SESSION["ValidarIngreso"] = "ok";

							echo '<script>
									if(window.history.replaceState){
										window.history.replaceState( null, null, window.location.href );
									}
										window.location = "index.php?action=index"
								</script>';
						}else{
							echo "<br><p class='alert alert-danger'>(Correo y/o contraseña no coinciden)</p>";
						}
					}else{
						echo '<script>

							if(window.history.replaceState){
								window.history.replaceState( null, null, window.location.href );
							}

						</script>';

						echo "<br><p class='alert alert-danger'>(Correo y/o contraseña no coinciden)</p>";
					}
			}
		}


///////////////////////////////////////////////////////////////Generar Asignaturas////////////////////////////////////////////////////////////////////

		static public function Generar_Materia_ctr(){
			if (isset($_POST["Asignatura"])) {
				$tabla = "materias_prueba";
				$datos = array('Asignatura' =>  $_POST["Asignatura"], 'Docente' => $_POST["Docente"], 'Curso' => $_POST["Curso"]);
				$mdl_resp = Registro_Mdl::Generar_Materia_mdl($tabla,$datos);
				return $mdl_resp;
			}
		}

		static public function Vista_Materias_ctr(){
			$tabla = "materias_prueba";
			$mdl_resp = Registro_Mdl::Vista_Materias_mdl($tabla);
			return $mdl_resp;
		}

////////////////////////////////////////////////////////////////Estudiantes//////////////////////////////////////////////////////////////////////////

		static public function Envio_Datos(){//Create

			if (isset($_POST["Nombre"])) {
					if (isset($_POST["Cedula"])) {
						$CED = $_POST["Tip_Ced"].$_POST["Cedula"];
					}
					$tabla = "estudiantes";
					$datos = array('nombre' => $_POST["Nombre"], 'apellido' => $_POST["Apellido"], 'edad' => $_POST["Edad"], 'cedula' => $CED, 'genero' => $_POST["Genero"] , 'numero' => $_POST["Numero"], 'correo' => $_POST["Correo"] , 'clave' => $_POST["Clave"] , 'nacimiento' => $_POST["Nacimiento"] , 'pais' => $_POST["Pais"] , 'ciudad' => $_POST["Ciudad"] , 'estado' => $_POST["Estado"] , 'direccion' => $_POST["Direccion"] , 'curso' => $_POST["Curso"] , 'condicion' => $_POST["Condicion"]);
	
					$mdl_resp = Registro_Mdl::Entrada_Datos($tabla,$datos);
	
					return $mdl_resp;
			}

		}

		static public function Vista_Datos($item,$valor){//Read
			$tabla = "estudiantes";

			$mdl_resp = Registro_Mdl::Vista_Datos_MDL($tabla,$item,$valor);

			return $mdl_resp;
		}

		public function Act_Datas(){//Update
			if (isset($_POST["act_nombre"])) {
				
				if ($_POST["new_clave"] != "") {
					$password = $_POST["new_clave"];
				}else{
					$password = $_POST["actual_clave"];
				}	

				$tabla = "estudiantes";
				$datos = array('id_estudiante' => $_POST["id_estudiante"] ,'nombre' => $_POST["act_nombre"] ,'Apellido' => $_POST["act_Apellido"], 'correo' => $_POST["act_correo"], 'clave' => $password, 'Edad' => $_POST["Edad"] , 'Cedula' => $_POST["act_Cedula"] , 'Telefono' => $_POST["Numero"] , 'Pais' => $_POST["Pais"] , 'Estado' => $_POST["Estado"] , 'Ciudad' => $_POST["Ciudad"] , 'Direccion' => $_POST["Direccion"]);


				$mdl_resp = Registro_Mdl::Actualizar_Datos($tabla,$datos);
				return $mdl_resp;

				if ($mdl_resp == "ok") {
					echo "Usuario Actualizado";
				}
			}
		}



		public function Eliminar_Datos(){//Delete
			if (isset($_POST["Eliminar"])) {
				$tabla = "estudiantes";
				$valor = $_POST["Eliminar"];

				$mdl_resp = Registro_Mdl::Eliminar_Datos($tabla,$valor);
			}
		}

	
//////////////////////////////////////////////////////////////////Docentes////////////////////////////////////////////////////////////////////////////

		static public function Envio_Datos_DOC(){//Create

			if (isset($_POST["Nombre"])) {

				if (isset($_POST["Cedula"])) {
					$CED = $_POST["Tip_Ced"].$_POST["Cedula"];
				}

				$tabla = "docentes";
				$datos = array('Nombre' => $_POST["Nombre"], 'Apellido' => $_POST["Apellido"], 'Edad' => $_POST["Edad"], 'Cedula' => $CED, 'Nivel_Educacion' => $_POST["Nivel_Educacion"] , 'Numero' => $_POST["Telefono"], 'Correo' => $_POST["Correo"] , 'Clave' => $_POST["Clave"] , 'Direccion' => $_POST["Direccion"]);

				$mdl_resp = Registro_Mdl::Entrada_Datos_DOC($tabla,$datos);

				return $mdl_resp;
			}

		}

		static public function Vista_Datos_DOC($item,$valor){//Read
			$tabla = "docentes";

			$mdl_resp = Registro_Mdl::Vista_Datos_DOC($tabla,$item,$valor);

			return $mdl_resp;
		}

		public function Act_Datas_DOC(){//Update
			if (isset($_POST["Nombre"])) {
				
				if ($_POST["new_clave"] != "") {
					$password = $_POST["new_clave"];
				}else{
					$password = $_POST["actual_clave"];
				}	

				$tabla = "docentes";
				$datos = array('id_docentes' => $_POST["id_docentes"] ,'Nombre' => $_POST["Nombre"], 'Apellido' => $_POST["Apellido"], 'Edad' => $_POST["Edad"], 'Cedula' => $_POST["Cedula"], 'Numero' => $_POST["Numero"], 'Correo' => $_POST["Correo"] , 'Clave' => $password , 'Direccion' => $_POST["Direccion"]);


				$mdl_resp = Registro_Mdl::Actualizar_Datos_DOC($tabla,$datos);
				return $mdl_resp;
			}
		}



		public function Eliminar_Datos_Docente(){//Delete
			if(isset($_POST["Eliminar"])){
				$tabla = "docentes";
				$valor = $_POST["Eliminar"];

				$mdl_resp = Registro_Mdl::Eliminar_Datos_Docente_mdl($tabla,$valor);
			}
		}

///////////////////////////////////////////////////////////////Administrador//////////////////////////////////////////////////////////////////////////

		static public function Envio_Datos_ADM(){//Create

				if (isset($_POST["Nombre"])) {

					if (isset($_POST["Cedula"])) {
					$CED = $_POST["Tip_Ced"].$_POST["Cedula"];
					}

					$tabla = "administradores";
					$datos = array('nombre' => $_POST["Nombre"], 'apellido' => $_POST["Apellido"], 'cedula' => $CED, 'Telefono' => $_POST["Telefono"], 'correo' => $_POST["Correo"] , 'clave' => $_POST["Clave"]);

					$mdl_resp = Registro_Mdl::Entrada_Datos_ADM($tabla,$datos);
					return $mdl_resp;
				}
		}


		static public function Vista_Datos_ADM($item,$valor){//Read
			$tabla = "administradores";

			$mdl_resp = Registro_Mdl::Vista_Datos_ADM($tabla,$item,$valor);

			return $mdl_resp;
		}

		public function Act_Datas_ADM(){//Update
			if (isset($_POST["act_nombre"])) {
				
				if ($_POST["new_clave"] != "") {
					$password = $_POST["new_clave"];
				}else{
					$password = $_POST["actual_clave"];
				}

				$tabla = "administradores";
				$datos = array('id_admin' => $_POST["id_admin"] ,'nombre' => $_POST["act_nombre"] ,'Apellido' => $_POST["act_Apellido"] , 'Correo' => $_POST["act_Correo"], 'clave' => $password, 'Cedula' => $_POST["act_Cedula"] , 'Telefono' => $_POST["Numero"]);

				$mdl_resp = Registro_Mdl::Actualizar_Datos_ADM($tabla,$datos);
				return $mdl_resp;

				if ($mdl_resp == "ok") {
					echo "Usuario Actualizado";
				}
			}
		}

		public function Eliminar_Datos_ADM(){//Delete
			if (isset($_POST["Eliminar"])) {
				$tabla = "administradores";
				$valor = $_POST["Eliminar"];

				$mdl_resp = Registro_Mdl::Eliminar_Datos_ADM($tabla,$valor);
			}
		}


//////////////////////////////////////////////////////////////////////Padres//////////////////////////////////////////////////////////////////////////

		static public function Envio_Padre(){//Create

			if (isset($_POST["Nombre_Padre"])) {

				if (isset($_POST["Cedula_Padre"])) {
					$CED = $_POST["Tip_Ced"].$_POST["Cedula_Padre"];
				}


				$tabla = "padres";
				$datos = array('Nombre' => $_POST["Nombre_Padre"] , 'Apellido' => $_POST["Apellido_Padre"] , 'Edad' => $_POST["Edad_Padre"] , 'Cedula' => $CED , 'Nacionalidad' => $_POST["Nacionalidad_Padre"] , 'Telefono' => $_POST["Telefono_Padre"] , 'Direccion' => $_POST["Direccion_Padre"] , 'Ocupacion' => $_POST["Ocupacion_Padre"] , 'Lugar_Trabajo' => $_POST["Lug_Trabajo_Padre"] , 'Telefono_Trabajo' => $_POST["Telefono_Trabajo_Padre"]);

				$mdl_resp = Registro_Mdl::Envio_Padre_mdl($tabla,$datos);

				return $mdl_resp;
			}

		}

//////////////////////////////////////////////////////////////////////Madres//////////////////////////////////////////////////////////////////////////

		static public function Envio_Madre(){//Create

			if (isset($_POST["Nombre_Madre"])) {

				if (isset($_POST["Cedula_Madre"])) {
					$CED = $_POST["Tip_Ced"].$_POST["Cedula_Madre"];
				}

				$tabla = "madres";
				$datos = array('Nombre' => $_POST["Nombre_Madre"] , 'Apellido' => $_POST["Apellido_Madre"] , 'Edad' => $_POST["Edad_Madre"] , 'Cedula' =>  $CED, 'Nacionalidad' => $_POST["Nacionalidad_Madre"] , 'Telefono' => $_POST["Telefono_Madre"] , 'Direccion' => $_POST["Direccion_Madre"] , 'Ocupacion' => $_POST["Ocupacion_Madre"] , 'Lugar_Trabajo' => $_POST["Lug_Trabajo_Madre"] , 'Telefono_Trabajo' => $_POST["Telefono_Trabajo_Madre"]);

				$mdl_resp = Registro_Mdl::Envio_Madre_mdl($tabla,$datos);

				return $mdl_resp;
			}

		}

//////////////////////////////////////////////////////////////Representantes//////////////////////////////////////////////////////////////////////////

			static public function Envio_Representantes(){//Create

			if (isset($_POST["Nombre_Representante"])) {

				if (isset($_POST["Cedula_Representante"])) {
					$CED = $_POST["Tip_Ced"].$_POST["Cedula_Representante"];
				}

				$tabla = "representantes";
				$datos = array('Nombre' => $_POST["Nombre_Representante"], 'Apellido' => $_POST["Apellido_Representante"], 'Cedula' => $CED,'Edad' => $_POST["Edad_Representante"], 'Parentesco' => $_POST["Parentesco"], 'Nacionalidad' => $_POST["Nacionalidad_Representante"], 'Direccion' => $_POST["Direccion_Representante"], 'Telefono' => $_POST["Telefono_Representante"], 'Ocupacion' => $_POST["Ocupacion_Representante"], 'Lug_Trabajo' => $_POST["Lug_Trabajo_Representante"], 'Telefono_Trabajo' => $_POST["Telefono_Trabajo_Representante"], 'Numero_Emergencia' => $_POST["Numero_Emergencia"]);
				$mdl_resp = Registro_Mdl::Envio_Representante_mdl($tabla,$datos);

				return $mdl_resp;
			}

		}


////////////////////////////////////////////////////////Constancia_Conducta////////////////////////////////////////////////////////

		static public function Imprimir_Constancia_Ctr(){
			if (isset($_POST["Datos_Alumno"])) {
				$tabla = "constancias";
				$datos = array('Datos_Alumno' => $_POST["Datos_Alumno"], 'Cedula_Alumno' => $_POST["Cedula_Alumno"], 'Curso' => $_POST["Curso"], 'Academico' => $_POST["Academico"],'Nivel_Educativo' => $_POST["Nivel_Educativo"], 'Conducta' => $_POST["Conducta"], 'Dia' => $_POST["Dia"], 'Mes' => $_POST["Mes"], 'Year' => $_POST["Year"]);
				$mdl_resp = Registro_Mdl::Constancia_mdl($tabla,$datos);
				return $mdl_resp;
			}
		}


		static public function Visualizar_Cursos_ctr(){
			$tabla = 'cursos';
			$mdl_resp = Registro_mdl::Visualizar_Cursos_mdl($tabla);
			return $mdl_resp;
		}

	}
?>