<?php

    class Asignar{

        public function Consultar_Estudiantes_ctr(){ //Consulta Con Las Tablas

            if(isset($_POST["Curso"])){
                $tabla = $_POST["Curso"];
                $mdl_resp = Asignar_mdl::Consultar_Estudiantes_mdl($tabla);
                return $mdl_resp;
            }
        }

        static public function listado_seccion_ctr(){
            if(isset($_POST["Curso"])){
                if($_POST["Seccion"] == "A"){
                    $tabla = $_POST["Curso"];
                    $limitador = "0,30";
                    $mdl_resp = Asignar_mdl::Listado_Seccion($tabla,$limitador);
                    $planilla = 'Listado_Seccion/index.php';
                    return $mdl_resp;
                }
            }

            if(isset($_POST["Curso"])){
                if($_POST["Seccion"] == "B"){
                    $tabla = $_POST["Curso"];
                    $limitador = "31,60";
                    $mdl_resp = Asignar_mdl::Listado_Seccion($tabla,$limitador);
                    return $mdl_resp;
                }
            }

            if(isset($_POST["Curso"])){
                if($_POST["Seccion"] == "C"){
                    $tabla = $_POST["Curso"];
                    $limitador = "61,90";
                    $mdl_resp = Asignar_mdl::Listado_Seccion($tabla,$limitador);
                    return $mdl_resp;
                }
            }
        }
    }
?>