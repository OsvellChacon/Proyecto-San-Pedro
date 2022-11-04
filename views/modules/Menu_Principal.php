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
<?php include "views/modules/menu_adm.php";?>
<div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Administracion <small>(Inicio)</small></h1>
            </div>
        </div>
        <section class="full-reset text-center" style="padding: 40px 0;">
            <article class="tile">
                <div class="tile-icon full-reset"><a href="index.php?action=listadmin"><i class="zmdi zmdi-face"></i></a></div>
                <div class="tile-name all-tittles"><strong><a href="index.php?action=listadmin" style="color: black;">administradores</a></strong></div>
                <div class="tile-num full-reset">
                <?php 
                    $link = new PDO("mysql:host=localhost;dbname=colegio" , "root" , "");
                    $count = current($link->query("SELECT COUNT(id_admin) FROM administradores;")->fetch());
                    echo $count;
                ?>
                </div>
            </article>
            <article class="tile">
                <div class="tile-icon full-reset"><a href="index.php?action=lista_estudiantes"><i class="zmdi zmdi-accounts"></i></a></div>
                <div class="tile-name all-tittles"><strong><a href="index.php?action=lista_estudiantes" style="color: black;">estudiantes</a></strong></div>
                <div class="tile-num full-reset">
                    <?php 
                        $link = new PDO("mysql:host=localhost;dbname=colegio" , "root" , "");
                        $count = current($link->query("SELECT COUNT(id_estudiante) FROM estudiantes;")->fetch());
                        echo $count;
                    ?>
                </div>
            </article>
            <article class="tile">
                <div class="tile-icon full-reset"><a href="index.php?action=Lista_Docentes"><i class="zmdi zmdi-male-alt"></a></i></div>
                <div class="tile-name all-tittles"><strong><a href="index.php?action=Lista_Docentes"style="color: black;">docentes</a></strong></a></div>
                <div class="tile-num full-reset">
                <?php 
                    $link = new PDO("mysql:host=localhost;dbname=colegio" , "root" , "");
                    $count = current($link->query("SELECT COUNT(id_docentes) FROM docentes;")->fetch());
                    echo $count;
                ?>
                </div>
            </article>
            <hr>
            <article class="tile">
                <div class="tile-icon full-reset"><a href="index.php?action=asignar_grupos"><i class="zmdi zmdi-male-female"></i></a></div>
                <div class="tile-name all-tittles" style="width: 90%;"><a href="index.php?action=asignar_grupos" style="color: black;"><strong>Asignar Grupos</strong></a></div>
                <div class="tile-num full-reset"></div>
            </article>
            <article class="tile">
                <div class="tile-icon full-reset"><a href="index.php?action=Carga_Notas"><i class="zmdi zmdi-book"></i></a></div>
                <div class="tile-name all-tittles"><strong><a href="index.php?action=Carga_Notas" style="color: black;">Boletines</a></strong></div>
                <div class="tile-num full-reset"></div>
            </article>
            <article class="tile">
                <div class="tile-icon full-reset"><a href="horario/index.php" target="_black"><i class="zmdi zmdi-calendar"></i></a></div>
                <div class="tile-name all-tittles"><a href="horario/index.php" target="_black" style="color: black;"><strong>Horarios</strong></a></div>
                <div class="tile-num full-reset"></div>
            </article>
            <article class="tile">
                <div class="tile-icon full-reset"><a href="index.php?action=carta_conducta"><i class="zmdi zmdi-assignment-account"></i></a></div>
                <div class="tile-name all-tittles"><a href="index.php?action=carta_conducta" style="color: black;"><strong>Carta De Conducta</strong></a></div>
                <div class="tile-num full-reset"></div>
            </article>
        </section>
        <br><br><br><br><br><br><br>
<?php include "views/modules/footer.php"; ?>