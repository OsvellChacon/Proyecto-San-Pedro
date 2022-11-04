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
    $docentes = Registro_Ctr::Vista_Datos_DOC(null,null);
    $materias = Registro_Ctr::Vista_Materias_ctr(null);
    $cursos = Registro_Ctr::Visualizar_Cursos_ctr(null);

?>
<?php
    include "views/modules/menu_adm.php";
?>
<div class="page-header">
    <h1 class="all-tittles">Administracion <small>(Generar Asignaturas)</small></h1>
</div>
<br>
    <?php include "nav_list.php"; ?>
    <div class="container-fluid"  style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="views/assets/img/checklist.png" alt="user" class="img-responsive center-box" style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Bienvenido a la seccion donde podremos crear las materias que necesitemos para nuestro plan educativo, a continuacion contara con un sencillo formulario donde podremos crear una materia, asignarle un <strong style="color:blue;">Docente</strong> y asignarlo a un curso
                </div>
    </div>
    <center>
	<form method="post" accept-charset="utf-8">
		<table>
			<thead>
				<tr>
					<input type="text" name="Asignatura" placeholder="Nombre De La Asignatura" required>
				</tr>
			</thead>
			<tbody>
            <select name="Docente" required>
                <option disabled="disabled" selected="selected">-Docente A Asignar-</option>
            <?php foreach ($docentes as $key => $value): ?>
					<option><?php echo $value["id_docentes"].". " .$value["Nombre"] . " " .$value["Apellido"];?></option>
        	<?php endforeach ?>
            </select>
            <select name="Curso" required>
                <option disabled="disabled" selected="selected">-Curso A Asignar-</option>
                    <?php foreach ($cursos as $key => $value): ?>
					<option><?php echo $value["curso"]?></option>
        	<?php endforeach ?>
            </select>
			</tbody>
		</table>
        <br>
		<input type="submit" class="btn btn--radius btn--green" value="Generar Asignatura">

		<?php
			$Generar_Asignatura = Registro_Ctr::Generar_Materia_ctr();
			if ($Generar_Asignatura == "ok") {
				echo "<script>window.location='index.php?action=asignaturas'</script>";			
			}
		?>
		
	</form>
			<table class="div-table">
                <thead>
                    <tr class="div-table-row div-table-head">
                        <th class="div-table-cell">Nombre Asignatura</th>
                        <th class="div-table-cell">Docente A Cargo</th>
                        <th class="div-table-cell">Curso Asignado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($materias as $key => $value): ?>
                        <tr>
                            <td class="div-table-cell"><?php echo $value["nombre_materia"]; ?></td>
                            <td class="div-table-cell"><?php echo $value["Nombre"] . " " . $value["Apellido"]; ?></td>
                            <td class="div-table-cell"><?php echo $value["curso"]; ?></td>
                        </tr>
                  <?php endforeach ?>        
                </tbody>
		</table>
</center>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>