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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<center><h1>[Error 404 - Pagina No Encontrada]</h1>
<br>
<img src="views/img/error404.jpg" width="150" alt="">
<br>
<p><a href="index.php">Regresar Al Menu Principal</a></p>
</center>
<br><br><br><br>