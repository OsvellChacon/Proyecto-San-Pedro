<?php
    include "views/modules/menu_adm.php";
?>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registro De Estudiantes</h2>
                    <form method="POST">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="Nombre" value="" placeholder="Nombres" maxlength="20" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="text" name="Apellido" value="" maxlength="20" placeholder="Apellidos" required>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                        <div class="row row-space">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="Tip_Ced" id="" required>
                                    <option disabled="disabled" selected="selected" required value="">Tipo De Documento</option>
                                    <option value="V-">V-</option>
                                    <option value="E-">E-</option>
                                  </select>
                                <div class="select-dropdown"></div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="text" name="Cedula" value="" placeholder="Cedula [123.456.789]" required maxlength="10">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="Edad" value="" placeholder="Edad" required maxlength="2" required>
                                </div>
                            </div>
                            
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="text" name="Numero" value="" placeholder="Numero De Telefono" required maxlength="11">                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1 js-datepicker" type="date" placeholder="Fecha De Nacimiento" name="Nacimiento">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="Genero">
                                            <option disabled="disabled" selected="selected">Genero</option>
                                            <option value="M">Masculino</option>
                                            <option value="F">Femenino</option>
                                            <option value="Otro">Otro</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
									<input class="input--style-1" type="email" name="Correo" value="" placeholder="Correo" required>							  
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="password" name="Clave" value="" placeholder="Contraseña" required maxlength="10"></input>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="Pais" value="" placeholder="Pais De Nacimiento" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="text" name="Ciudad" value="" placeholder="Ciudad De Nacimiento" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="Estado" value="" placeholder="Estado De Nacimiento" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="text" name="Direccion" value="" placeholder="Direccion De Habitacion" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="Curso">
                                    <option disabled="disabled" selected="selected">Grado A Cursar</option>
                                    <option disabled="disabled">--Nivel Primaria--</option>
                                    <option value="1">1er Grado</option>
                                    <option value="2">2do Grado</option>
                                    <option value="3">3er Grado</option>
                                    <option value="4 ">4to Grado</option>
                                    <option value="5">5to Grado</option>
                                    <option value="6">6to Grado</option>
                                    <option disabled="disabled">--Nivel Bachillerato--</option>
                                    <option value="7">1er Año</option>
                                    <option value="8">2do Año</option>
                                    <option value="9">3er Año</option>
                                    <option value="10">4to Año</option>
                                    <option value="11">5to Año</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="Condicion">
                                    <option disabled="disabled" selected="selected">Condicion De Estudio</option>
                                    <option value="(Regular)">Regular</option>
                                    <option value="(Repitente)">Repitente</option>
                                    <option value="(Materia Pendiente)">Materia Pendiente</option>
                                    <option value="(No Es Repitiente)">Ninguna De Las Anteriores</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Siguiente</button>
                        </div>
                        <?php

                        $envio_datos = Registro_Ctr::Envio_Datos();
                                        
                        if ($envio_datos == "ok") {
                                echo		"<center><h4 class='alert alert-success'>--Paso 1/4 Listo--
                            <br>
                                <a href='index.php?action=registro_padres'>Siguiente Paso</a>
                
                            </h4></center>";
                        }
                
                    ?>
                    </form>
                </div>
            </div>
        </div>
    </div>