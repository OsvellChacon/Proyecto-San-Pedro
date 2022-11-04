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
?>
<?php
    include "views/modules/menu_adm.php";
?>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Administracion <small>(Docentes)</small></h1>
            </div>
        </div>
            <?php
                include "nav_adm.php";
            ?>
        <div class="container-fluid"  style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="views/assets/img/user02.png" alt="user" class="img-responsive center-box" style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Bienvenido a la sección donde se encuentra el listado de docente de la institución, podrás buscar a los docente por sección o nombre. Puedes actualizar o eliminar los datos del docente.<br>
                    <strong class="text-danger"><i class="zmdi zmdi-alert-triangle"></i> &nbsp; ¡Importante! </strong>Si eliminas al docente del sistema se borrarán todos los datos relacionados con él.
                </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                        <li><a href="index.php?action=Doc_Reg">Nuevo docente</a></li>
                        <li class="active">listado de docente</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <form class="pull-right" style="width: 30% !important;" autocomplete="off">
                <div class="group-material">
                    <input type="search" style="display: inline-block !important; width: 70%;" class="material-control tooltips-general" placeholder="Buscar Docente" required="" pattern="[a-zA-ZáéíóúÁÉÍÓÚ ]{1,50}" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe el Numero De Cedula">
                    <button class="btn" style="margin: 0; height: 43px; background-color: transparent !important;">
                        <i class="zmdi zmdi-search" style="font-size: 25px;"></i>
                    </button>
                </div>
            </form>
            <h2 class="text-center all-tittles" style="clear: both; margin: 25px 0;">Listado de Docentes</h2>
            <table class="div-table">
                <thead>
                    <tr class="div-table-row div-table-head">
                        <th class="div-table-cell">Nº</th>
                        <th class="div-table-cell">Nombre</th>
                        <th class="div-table-cell">Apellido</th>
                        <th class="div-table-cell">Cedula</th>
                        <th class="div-table-cell">Edad</th>
                        <th class="div-table-cell">Nivel De Educacion</th>
                        <th class="div-table-cell">Correo</th>
                        <th class="div-table-cell">Clave</th>
                        <th class="div-table-cell">Direccion</th>
                        <th class="div-table-cell">Telefono</th>
                        <th class="div-table-cell">Editar</th>
                        <th class="div-table-cell">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuario as $key => $value): ?>
                        <tr>
                            <td class="div-table-cell"><?php echo ($key + 1); ?></td>
                            <td class="div-table-cell"><?php echo $value["Nombre"]; ?></td>
                            <td class="div-table-cell"><?php echo $value["Apellido"]; ?></td>
                            <td class="div-table-cell"><?php echo $value["Cedula"]; ?></td>
                            <td class="div-table-cell"><?php echo $value["Edad"]; ?></td>
                            <td class="div-table-cell"><?php echo $value["Nivel_Educacion"]; ?></td>
                            <td class="div-table-cell"><?php echo $value["Correo"]; ?></td>
                            <td class="div-table-cell"><?php echo $value["Clave"]; ?></td>
                            <td class="div-table-cell"><?php echo $value["Direccion"]; ?></td>
                            <td class="div-table-cell"><?php echo $value["Telefono"]; ?></td>
                            <div >
                                <td class="div-table-cell"><a href="index.php?action=editar_doc&id=<?php echo $value["id_docentes"];  ?>" class="btn btn-success"><i class="zmdi zmdi-refresh"></i></a></td>
                                <form method="post">
                                    <input type="hidden" name="Eliminar" value="<?php echo $value["id_docentes"]; ?>">
                                     <td class="div-table-cell"><button class="btn btn-danger" type="submit"><i class="zmdi zmdi-delete"></button></td>
                                            <?php
                                                  $eliminar = new Registro_Ctr();
                                                  $eliminar -> Eliminar_Datos_Docente();
                                            ?>
                                </form>
                            </div>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            </div>                  
        </div>
        <br>