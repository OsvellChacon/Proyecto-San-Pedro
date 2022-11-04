<?php

    class Asignar_mdl{
        static public function Consultar_Estudiantes_mdl($tabla){
            $stmt = Conexion::Conectar()->prepare("SELECT e.Cedula, e.Apellido,e.Nombre,e.Ciudad,e.Estado,e.Genero,e.Fecha_Nacimiento FROM estudiantes e INNER JOIN $tabla x ON x.Alumno = e.Curso ORDER BY Cedula ASC");
            $stmt->execute();

            return $stmt->fetchAll();

        }

        static public function Listado_Seccion($tabla,$limitador){
            $stmt = Conexion::Conectar()->prepare("SELECT e.id_estudiante, e.Cedula, e.Apellido,e.Nombre,e.Ciudad,e.Estado,e.Genero,e.Fecha_Nacimiento FROM estudiantes e INNER JOIN $tabla x ON x.Alumno = e.Curso ORDER BY Cedula ASC LIMIT $limitador");
            $stmt->execute();

            return $stmt->fetchAll();
        }


    }

?>