<?php
    include "views/modules/menu_adm.php";
?>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registro Representates</h2>
                    <form method="POST">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="Nombre_Representante" value="" placeholder="Nombre" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="text" name="Apellido_Representante" value="" placeholder="Apellido" required>
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
                                        <input class="input--style-1" type="text" name="Cedula_Representante" value="" placeholder="Cedula" maxlength="10" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="Edad_Representante" value="" placeholder="Edad" maxlength="2" required>
                                </div>
                            </div>
                            
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="Nacionalidad_Representante" value="" placeholder="Nacionalidad" required>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="Parentesco" id="" required>
                                    <option value="">Parentesco</option>
									<option value="Padre">Padre</option>
									<option value="Madre">Madre</option>
									<option value="Hermano">Hermano</option>
									<option value="Hermana">Hermana</option>
									<option value="Tio">Tio</option>
									<option value="Tia">Tia</option>
									<option value="Primo">Primo</option>
									<option value="Prima">Prima</option>
									<option value="Abuelo">Abuelo</option>
									<option value="Abuela">Abuela</option>
									<option value="Tutor">Tutor</option>
                                  </select>
                                <div class="select-dropdown"></div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="text" name="Direccion_Representante" value="" placeholder="Direccion" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="Telefono_Representante" value="" placeholder="Numero De Telefono" maxlength="11" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="Ocupacion_Representante" value="" placeholder="Ocupacion" required>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="Lug_Trabajo_Representante" value="" placeholder="Lugar De Trabajo" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="text" name="Telefono_Trabajo_Representante" value="" placeholder="Telefono Del Trabajo" maxlength="15" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="Numero_Emergencia" value="" placeholder="En Caso De Emergencia Llamar:" maxlength="11" required>
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
                            <button class="btn btn--radius btn--green" type="submit">Finalizar Inscripcion</button>
                        </div>
                        <?php

                        $envio_datos = Registro_Ctr::Envio_Representantes();
                
                        if ($envio_datos == "ok") {
                                echo "<center class='alert alert-success'><h3>--Felicitaciones ya formas parte de nuestra familia, ahora imprime tu planilla y formaliza tu inscripcion:--</h3>
                                <a href='Planillas/index.php'><img src='views/assets/img/pdf.png' width='70'</a>;               
                            </h3></center>";
                        }
                
                    ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
