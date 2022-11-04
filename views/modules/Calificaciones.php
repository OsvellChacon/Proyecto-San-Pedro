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

if (isset($_GET["id"])) {
	$item = "id_estudiante";
	$valor = $_GET["id"];
	$Usuario = Registro_Ctr::Vista_Datos($item,$valor);
}


$ingreso = Registro_Ctr::Ingreso_Admin();


?>
<?php include "views/modules/menu_adm.php";?>
<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
    <div class="wrapper wrapper--w680">
        <div class="card card-1">
            <div class="card-heading"></div>
                <div class="card-body">
                	<h2>Calificaciones</h2>
                	<hr>
            <form method="POST">
                        <div class="p-t-20">
                <center>             	
                	<table class=div-table>
                		<thead>
                			<tr class="div-table-row div-table-head">
                				<th class="div-table-cell">Nota 1</th>
                				<th class="div-table-cell">Nota 2</th>
                			</tr>
                		</thead>
                		<tbody>
                				<tr class="div-table-row"> 
								<td>
									<center>
									<select name="Nota_1" id="">
										<option value="0" selected="Selected" disabled="disabled">0</option>
										<option value="1">01</option>
										<option value="2">02</option>
										<option value="3">03</option>
										<option value="4">04</option>
										<option value="5">05</option>
										<option value="6">06</option>
										<option value="7">07</option>
										<option value="8">08</option>
										<option value="9">09</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
										<option value="13">13</option>
										<option value="14">14</option>
										<option value="15">15</option>
										<option value="16">16</option>
										<option value="17">17</option>
										<option value="18">18</option>
										<option value="19">19</option>
										<option value="20">20</option>
									</select>
									</center>
								</td>
								<td>
									<center>
									<select name="Nota_2" id="">
									<option value="0" selected="Selected" disabled="disabled">0</option>
										<option value="1">01</option>
										<option value="2">02</option>
										<option value="3">03</option>
										<option value="4">04</option>
										<option value="5">05</option>
										<option value="6">06</option>
										<option value="7">07</option>
										<option value="8">08</option>
										<option value="9">09</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
										<option value="13">13</option>
										<option value="14">14</option>
										<option value="15">15</option>
										<option value="16">16</option>
										<option value="17">17</option>
										<option value="18">18</option>
										<option value="19">19</option>
										<option value="20">20</option>
									</select>
									</center>
								</td>
								</tr>
								<tr class="div-table-row div-table-head">
                				<th class="div-table-cell">Nota 3</th>
                				<th class="div-table-cell">Nota 4</th>							
							</tr>
								<tr>								
								<td>
								<center>
								<select name="Nota_3" id="">
								<option value="0" selected="Selected" disabled="disabled">0</option>
										<option value="1">01</option>
										<option value="2">02</option>
										<option value="3">03</option>
										<option value="4">04</option>
										<option value="5">05</option>
										<option value="6">06</option>
										<option value="7">07</option>
										<option value="8">08</option>
										<option value="9">09</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
										<option value="13">13</option>
										<option value="14">14</option>
										<option value="15">15</option>
										<option value="16">16</option>
										<option value="17">17</option>
										<option value="18">18</option>
										<option value="19">19</option>
										<option value="20">20</option>
									</select>
								</center>
								</td>
								<td>
									<center>
									<select name="Nota_4" id="">
										<option value="0" selected="Selected" disabled="disabled">0</option>
										<option value="1">01</option>
										<option value="2">02</option>
										<option value="3">03</option>
										<option value="4">04</option>
										<option value="5">05</option>
										<option value="6">06</option>
										<option value="7">07</option>
										<option value="8">08</option>
										<option value="9">09</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
										<option value="13">13</option>
										<option value="14">14</option>
										<option value="15">15</option>
										<option value="16">16</option>
										<option value="17">17</option>
										<option value="18">18</option>
										<option value="19">19</option>
										<option value="20">20</option>
									</select>
									</center>
								</td>									
                				</tr>
								<tr>
								<td><input type="text" value="<?php echo $Usuario["id_estudiante"] ?>" name="Alumno"></td>
								<td><input type="text" value="<?php echo $Usuario["Curso"] ?>" name="Curso"></td>
								</tr>
                		</tbody>
                	</table>
                </center>		
                        <center><button class="btn btn--radius btn--green" type="submit">Calificar</button></center>
                        </div>
                        	<?php
		$Envio_Calificaciones = Calificaciones_ctr::Envio_Calificaciones_ctr();
		if ($Envio_Calificaciones == "ok") {
			echo "<center><p>Estudiante Calificado Con Exito</p></center>";
		}
	?>
                    </form>
                </div>
            </div>
        </div>
    </div>	