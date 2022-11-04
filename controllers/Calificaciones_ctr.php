<?php
	class Calificaciones_ctr{
		static public function Envio_Calificaciones_ctr(){
			if (isset($_POST["Nota_1"])) {

				$Promedio = ($_POST["Nota_1"] + $_POST["Nota_2"] + $_POST["Nota_3"] + $_POST["Nota_4"]) / 4;

				$tabla = "calificaciones";
				$datos = array('Alumno' => $_POST["Alumno"],'Curso'=>$_POST["Curso"],'Nota_1' => $_POST["Nota_1"], 'Nota_2' => $_POST["Nota_2"], 'Nota_3' => $_POST["Nota_3"], 'Nota_4' => $_POST["Nota_4"], 'Promedio' => $Promedio);
				$mdl_resp = Calificaciones_mdl::Envio_Calificaciones_mdl($tabla,$datos);
				return $mdl_resp;
			}
		}

		static public function Visualizar_Calificaciones_ctr($item){
			$tabla = 'materias_prueba';
			$mdl_resp = Calificaciones_mdl::Visualizar_Calificaciones_mdl($tabla);
			return $mdl_resp;
		}
	}
?>