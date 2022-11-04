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
    $usuario = Registro_Ctr::Vista_Datos_DOC(null,null);
	$materias = Registro_Ctr::Visualizar_materias_ctr();
?>
<?php
    include "views/modules/menu_adm.php";
?>
<center>
<form method="post">
<select class="custom-select" style="width:200px;" name="Curso">
        <option disabled="disabled" selected="selected">Curso</option>
        <option disabled="disabled">--Nivel Primaria--</option>
        <option value="1er_grado">1er Grado</option>
        <option value="2do_Grado">2do Grado</option>
        <option value="3er_Grado">3er Grado</option>
        <option value="4to_Grado">4to Grado</option>
        <option value="5to_Grado">5to Grado</option>
        <option value="6to_Grado">6to Grado</option>
        <option disabled="disabled">--Nivel Bachillerato--</option>
        <option value="1er_Año">1er Año</option>
        <option value="2do_Año">2do Año</option>
        <option value="3er_Año">3er Año</option>
        <option value="4to_Año">4to Año</option>
        <option value="5to_Año">5to Año</option>
</select>
            <br>
			<input type="text" name="Asignatura" placeholder="Nombre De La Asignatura" id="">
            <select class="barra form-control" name="Docente">
                <option disabled="disabled" selected="selected">-Docente A Asignar-</option>
            <?php foreach ($usuario as $key => $value): ?>
					<option><?php echo $value["Nombre"] . " " .$value["Apellido"];?></option>
        	<?php endforeach ?>

            </select>
			<input type="submit" value="Crear Asignatura">
			<table class="div-table">
                <thead>
                    <tr class="div-table-row div-table-head">
                        <th class="div-table-cell">Asignatura</th>
                        <th class="div-table-cell">Docente Asignado</th>
                        <th class="div-table-cell">Curso Asignado</th>
                        <th class="div-table-cell">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($materias as $key => $value): ?>
                        <tr>
                            <td class="div-table-cell"><?php echo $value["nombre_materia"]; ?></td>
                            <td class="div-table-cell"><?php echo $value["Nombre"]." ".$value["Apellido"]; ?></td>
                            <td class="div-table-cell"><?php echo $value["Nombre"]?></td>
                        </tr>
                  <?php endforeach ?>;                
                </tbody>
            </table>        
			<?php

				$envio_datos = Registro_Ctr::Asignaturas_ctr();

				if ($envio_datos == "ok") {
					echo '<script>
				
							if( window.history.replaceState ){
								window.history.replaceState( null, null, window.location.href );
							}
				
							window.location = "index.php?action=crear_aula";
				
						</script>';
				}
			?>
	</form>
</center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php
    include "views/modules/footer.php";
?>