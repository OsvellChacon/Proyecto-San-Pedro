<?php

    class Menu_Plantilla{

        public function plantilla(){
            include "views/template.php";
        }

        public function Enlaces_Ctr(){
            if(isset($_GET["action"])){
                $module = $_GET["action"];
            }else{
                $module = "index";
            }

            $Envio_Enlaces = Enlaces_Mdl::Redirecciones($module);

            include $Envio_Enlaces;

        }

        static public function Informacion(){
            if (isset($_POST["Not_1"])) {
                $tabla = "inf_col";
                $datos = array('Not_1' => $_POST["Not_1"] , 'Not_2' => $_POST["Not_2"] , 'Not_3' => $_POST["Not_3"] , 'Not_4' => $_POST["Not_4"]);

                $mdl_resp = Registro_Mdl::Info_Mdl($tabla, $datos);

                return $mdl_resp;

            }
        }

        static public function Vista_Tablon_Anuncios_ctr(){//Read
            $tabla = "inf_col";

            $mdl_resp = Registro_Mdl::Vista_Tablon_Anuncios_mdl($tabla);

            return $mdl_resp;
        }

    }

?>