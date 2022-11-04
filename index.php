<?php

    require_once "controllers/Menu_Inicio.php";
    require_once "controllers/Usuarios_ctr.php";
    require_once "controllers/Calificaciones_ctr.php";
    require_once "controllers/Asignacion_ctr.php";

    require_once "models/Usuarios_mdl.php";
    require_once "models/Enlaces_mdl.php";
    require_once "models/Calificaciones_mdl.php";
    require_once "models/Asignacion_mdl.php";

    $ADM = new Menu_Plantilla();
    $ADM -> plantilla();


?>