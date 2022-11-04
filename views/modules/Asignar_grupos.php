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
    $seccion = Asignar::Consultar_Estudiantes_ctr();
?>
<br>
<?php
    include "views/modules/menu_adm.php";
?>
<br>
<div class="page-header">
    <h1 class="all-tittles">Administracion <small>(Listado General)</small></h1>
</div>
<br>
    <?php include "nav_list.php"; ?>
    <div class="container-fluid"  style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="views/assets/img/lista.png" alt="user" class="img-responsive center-box" style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Bienvenido a la seccion donde se encuentran los listados de los estudiantes del colegio divididos por sus respectivos cursos academicos, puede revisar los datos por medio de un vistazo general o puede ir a la seccion <a href="index.php?action=lista_salones"><strong>"Curso Y Seccion"</strong></a> para ver los salones y donde estan asignados los estudiantes <br>
                    <br>
                    <center><strong class="text-danger"><i class="zmdi zmdi-alert-triangle"></i> &nbsp; (¡OJO! No se pueden modificar ni eliminar a los estudiantes desde este modulo.) </strong></center>
                </div>
    </div>
<form action="" method="post">  
<select class="form-select" name="Curso">
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
<center>
    <h2><?php 
        if(isset($_POST["Curso"])){
            echo "<p class='alert alert-info'>".$_POST["Curso"].'</p>';
        }else{
            echo "<p style='font-size: 20px ;' class='alert alert-danger'>-No Hay Cursos Seleccionados-</p>";
        }
    ?></h2>
</center>
<table class="div-table">
                <thead>
                    <tr class="div-table-row div-table-head">
                        <th class="div-table-cell">Cedula</th>
                        <th class="div-table-cell">Apellido</th>
                        <th class="div-table-cell">Nombre</th>
                        <th class="div-table-cell">Ciudad</th>
                        <th class="div-table-cell">Estado</th>
                        <th class="div-table-cell">Genero</th>
                        <th class="div-table-cell">Fecha De Nacimiento</th>
                    </tr>
                </thead>
                <tbody>
                         <?php if(isset($_POST["Curso"])){?>
                                <?php foreach ($seccion as $key => $value): ?>
                                    <tr>
                                        <td class="div-table-cell"><?php echo $value["Cedula"]; ?></td>
                                        <td class="div-table-cell"><?php echo $value["Apellido"]; ?></td>
                                        <td class="div-table-cell"><?php echo $value["Nombre"]; ?></td>
                                        <td class="div-table-cell"><?php echo $value["Ciudad"]; ?></td>
                                        <td class="div-table-cell"><?php echo $value["Estado"]; ?></td>
                                        <td class="div-table-cell"><?php echo $value["Genero"]; ?></td>
                                        <td class="div-table-cell"><?php echo $value["Fecha_Nacimiento"]; ?></td>
                                    </tr>
                                <?php endforeach ?>;
                            <?php } ?>

                           
                </tbody>
</table>
<input type="submit" class="btn btn--radius btn--green" value="Comenzar Ahora">
<?php
    $consulta = new Asignar();
    $consulta -> Consultar_Estudiantes_ctr();
    
    if($consulta == "ok"){
        echo "Alumnos Asignados Correctamente";
    }


?>
</form> 

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>