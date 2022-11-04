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
<div class="page-header">
    <h1 class="all-tittles">Administracion <small>(Constancias De Conductas)</small></h1>
</div>
<br>
    <?php include "nav_list.php"; ?>
    <div class="container-fluid"  style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="views/assets/img/checklist.png" alt="user" class="img-responsive center-box" style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Bienvenido a la seccion donde podremos generar constancias de conductas de los miembros de la institucion. En esta seccion daremos aviso si el alumno es una persona que cumplio o no las normas de convivencia de la institucion. <small><strong style="color:darkred	;">(Este proceso no cuenta con opcion de eliminacion o modificacion, solo para imprimir constancias)</strong></small>
                </div>
    </div>
<center>
<form action="" method="post">
    <table class="table primary">
  <thead>
    <tr>
      <th scope="col"><label for="">Datos Alumno:</label></th>
      <th scope="col"><input type="text" class="form-Estudiante" name="Datos_Alumno" required maxlength="50" placeholder="Apellido Y Nombre" id=""></th>
      <th scope="col"><input type="text" class="form-Estudiante" name="Cedula_Alumno" required placeholder="Cedula" maxlength="12" id=""></th>
      <th scope="col">
        <select name="Conducta" id="" required>
            <option value="" disabled="disabled" selected="selected">Conducta Del Estudiante</option>
            <option value="1">Buen Comportamiento</option>
            <option value="2">Mal Comportamiento</option>  
        </select>
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="col"><label for="">Curso:</label></th>
      <td>
        <select name="Curso" id="" required>
            <option disabled="disabled" selected="selected">Curso Academico</option>
            <option value="PRIMER">PRIMER</option>
            <option value="SEGUNDO">SEGUNDO</option>
            <option value="TERCER">TERCER</option>
            <option value="CUARTO">CUARTO</option>
            <option value="QUINTO">QUINTO</option>
            <option value="SEXTO">SEXTO</option>
        </select>
      </td>
      <td>
        <select name="Academico" required>  
            <option disabled="disabled" selected="selected">--Grado Academico--</option>
            <option value="GRADO">GRADO</option>
            <option value="AÑO">AÑO</option>       
        </select> 
      </td>
      <td>
        <select name="Nivel_Educativo" id="" required>
            <option disabled="disabled" selected="selected">Nivel De Educacion</option>
            <option value="Primaria">Primaria</option>
            <option value="Media General">Media General</option>
        </select> 
      </td>
    </tr>
    <tr>
      <th scope="col"><label for="">Fecha:</label></th>
      <td>
      <select name="Dia" id="">
                            <option disabled="disabled" selected="selected">Dia</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
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
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                        </select>
      </td>
      <td>
      <select name="Mes" id="" required="">
                            <option disabled="disabled" selected="selected">Mes</option>
                            <option value="Enero">Enero</option>
                            <option value="Febrero">Febrero</option>
                            <option value="Marzo">Marzo</option>
                            <option value="Abril">Abril</option>
                            <option value="Mayo">Mayo</option>
                            <option value="Junio">Junio</option>
                            <option value="Julio">Julio</option>
                            <option value="Agosto">Agosto</option>
                            <option value="Septiembre">Septiembre</option>
                            <option value="Octubre">Octubre</option>
                            <option value="Noviembre">Noviembre</option>
                            <option value="Diciembre">Diciembre</option>
        </select>
      </td>
      <td>
      <select name="Year" required>
                            <option disabled="disabled" selected="selected">Año</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
    </select>
      </td>
    </tr>
  </tbody>
</table>


        <a href=""><input type="submit" class="btn btn--radius btn--green" value="Procesar Datos"> </a>

        <?php
            $envio_constancia = Registro_Ctr::Imprimir_Constancia_Ctr();
            if($envio_constancia == "ok"){
                echo '<p class="alert alert-info">El Archivo esta listo para descargarse: <a href="Constancias/index.php" target="blank"><img src="views/assets/img/pdf.png" width="70"</a></p>';
            }
        ?>

    </form>
    </center>
<br><br><br><br><br>