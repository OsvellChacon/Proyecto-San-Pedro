<?php
    if(isset($_SESSION["ValidarIngreso"])){
        if($_SESSION["ValidarIngreso"] != "ok"){
            echo "<script>window.location='index.php?action=ingreso'</script>";
            return;
        }
    }else{
        echo "<script>window.location='index.php?action=ingreso'</script>";
        return;
    }

    $ingreso = Registro_Ctr::Ingreso_Admin();
?>
<?php
    include "views/modules/menu_adm.php";
?>
<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registro De Administradores</h2>
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
                                    <option disabled="disabled" selected="selected" value="">Tipo De Documento</option>
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
                                        <input class="input--style-1" type="text" name="Telefono" value="" placeholder="Numero De Telefono" required maxlength="11">                                    </div>
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
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Siguiente</button>
                        </div>
						<?php

$envio_datos = Registro_Ctr::Envio_Datos_ADM();

if ($envio_datos == "ok") {
	echo '<script>

			if( window.history.replaceState ){
				window.history.replaceState( null, null, window.location.href );
			}

			window.location = "index.php?action=listadmin";

		</script>';
}

?>
                    </form>
                </div>
            </div>
        </div>
    </div>