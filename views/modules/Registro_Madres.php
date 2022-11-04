<?php
    include "views/modules/menu_adm.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <title>Colegio San Pedro - Registro</title>
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <link href="css/Formulario.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registro Madres</h2>
                    <form method="POST">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="Nombre_Madre" value="" placeholder="Nombre" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="text" name="Apellido_Madre" value="" placeholder="Apellido" required>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                        <div class="row row-space">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="Tip_Ced" id="" required>
                                    <option value="" disabled="disabled" selected="selected">Tipo De Documento</option>
                                    <option value="V-">V-</option>
                                    <option value="E-">E-</option>
                                  </select>
                                <div class="select-dropdown"></div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="text" name="Cedula_Madre" value="" placeholder="Cedula" maxlength="10" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="Edad_Madre" value="" placeholder="Edad" maxlength="2" required>
                                </div>
                            </div>
                            
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="Nacionalidad_Madre" value="" placeholder="Nacionalidad" required>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="Telefono_Madre" value="" placeholder="Numero De Telefono" maxlength="11" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="Direccion_Madre" value="" placeholder="Direccion" required>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="Ocupacion_Madre" value="" placeholder="Ocupacion" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="text" name="Lug_Trabajo_Madre" value="" placeholder="Lugar De Trabajo" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="Telefono_Trabajo_Madre" value="" placeholder="Telefono Del Trabajo" maxlength="15" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Siguiente</button>
                        </div>
                        <?php

                        $envio_datos = Registro_Ctr::Envio_Madre();
                
                        if ($envio_datos == "ok") {
                                echo		"<center><h4 class='alert alert-success'>--Paso 3/4 Listo--
                            <br>
                                <a href='index.php?action=registro_representantes'>Siguiente Paso</a>
                
                            </h4></center>";
                        }
                
                    ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
