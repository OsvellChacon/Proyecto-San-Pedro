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

	if (isset($_GET["id"])) {

		$item = "id_admin";
		$valor = $_GET["id"];

		$Usuario = Registro_Ctr::Vista_Datos_ADM($item,$valor);

	}
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
                                    <input class="input--style-1" type="text" value="<?php echo $Usuario["Nombre"] ?>" name="act_nombre" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="text" value="<?php echo $Usuario["Apellido"] ?>" name="act_Apellido" placeholder="Apellido">
                                    </div>
                                </div>
                            </div>
                        </div>                        
                        <div class="row row-space">
							<div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" value="<?php echo $Usuario["Telefono"] ?>" name="Numero" value="" placeholder="Numero De Telefono"  maxlength="11">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="text" value="<?php echo $Usuario["Cedula"] ?>" name="act_Cedula" placeholder="Cedula">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
									<input class="input--style-1" type="email" value="<?php echo $Usuario["Correo"] ?>" name="act_Correo" placeholder="Correo">							  
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="input--style-1" type="password" value="<?php echo $Usuario["Clave"] ?>" name="new_clave" placeholder="Clave">
										<input type="hidden" value="<?php echo $Usuario["Clave"] ?>" name="actual_clave" placeholder="">					
                                    </div>
                                </div>
                            </div>
                        <div class="p-t-20">
						<input class="barra form-control" type="hidden" value="<?php echo $Usuario["id_admin"] ?>" name="id_admin">
						<button class="btn btn--radius btn--green" type="submit">Siguiente</button>

						</div>
	<?php

		$Actualizar = new Registro_Ctr();
		$Actualizar->Act_Datas_ADM();

		if ($Actualizar == "ok") {
			echo "Usuario Actualizado";
		}

	?>

</form>
                </div>
            </div>
        </div>
    </div>