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
    $listado = Asignar::listado_seccion_ctr();

?>
<?php
    include "views/modules/menu_adm.php";
?>
       <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Administracion <small>(Boletines)</small></h1>
            </div>
        </div>  
    <div class="container-fluid"  style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="views/assets/img/flat-book.png" alt="user" class="img-responsive center-box" style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                <h3>Bienvenido a la seccion donde se calificaran a los estudiantes. Para empezar a calificar selecciona un curso y sección. Acto seguido elija a un estudiante y oprima el boton <strong style="color: green; text-decoration: underline;">"Calificar"</strong></h3>
                <br>
                <strong style="color: darkblue; text-decoration: underline;">Seleccione un curso y seccion:</strong>                
                <hr>
                <form action="" method="post">
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
    <select class="custom-select" style="width:200px;" name="Seccion">
        <option disabled="disabled" selected="selected">Seccion</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
        <option value="E">E</option>
        <option value="U">U</option>
    </select>
                </div>
        </div>
        <br>  
    <center>
    <h2><?php 
        if(isset($_POST["Curso"]) && isset($_POST["Seccion"])){
            echo "<p class='alert alert-info'>".$_POST["Curso"]. " " .'seccion "'.$_POST["Seccion"].'"'. '</p>';
        }else{
            echo "<p style='font-size: 20px ;' class='alert alert-danger'>-No Hay Cursos Seleccionados-</p>";
        }
    ?></h2>
    </center>

<table class="div-table">
                <thead>
                    <tr class="div-table-row div-table-head">
                        <th class="div-table-cell">Nº</th>
                        <th class="div-table-cell">Cedula</th>
                        <th class="div-table-cell">Apellido</th>
                        <th class="div-table-cell">Nombre</th>
                        <th class="div-table-cell">Calificaciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(isset($_POST["Curso"])){?>
                                <?php foreach ($listado as $key => $value): ?>
                                    <tr>
                                        <td class="div-table-cell"><?php echo ($key + 1); ?></td>
                                        <td class="div-table-cell"><?php echo $value["Cedula"]; ?></td>
                                        <td class="div-table-cell"><?php echo $value["Apellido"]; ?></td>
                                        <td class="div-table-cell"><?php echo $value["Nombre"]; ?></td>
                                        <td class="div-table-cell"><a href="index.php?action=boletin&id=<?php echo $value["id_estudiante"];  ?>" class="btn btn-success"><i class="zmdi zmdi-check"></i></a></td>
                                    </tr>
                                <?php endforeach ?>;
                            <?php } ?>
                </tbody>
</table>
<input type="submit" class="btn btn--radius btn--green" value="Preparar Boletines">
</form> 