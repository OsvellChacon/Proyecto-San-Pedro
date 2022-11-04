<div class="container-fluid">
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
              	<?php if ($_GET["action"] == "lista_estudiantes"): ?>
					<ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
           				<li role="presentation" class="active"><a href="index.php?action=lista_estudiantes">Estudiantes</a></li>
           				<li role="presentation"><a href="index.php?action=Lista_Docentes">Docentes</a></li>
            			<li role="presentation"><a href="index.php?action=listadmin">Administradores</a></li>
        			</ul>
				<?php endif ?>
				<?php if ($_GET["action"] == "Lista_Docentes"): ?>
					<ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
           				<li role="presentation"><a href="index.php?action=lista_estudiantes">Estudiantes</a></li>
           				<li role="presentation" class="active"><a href="index.php?action=Lista_Docentes">Docentes</a></li>
            			<li role="presentation"><a href="index.php?action=listadmin">Administradores</a></li>
        			</ul>
				<?php endif ?>
				<?php if ($_GET["action"] == "listadmin"): ?>
					<ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
           				<li role="presentation"><a href="index.php?action=lista_estudiantes">Estudiantes</a></li>
           				<li role="presentation"><a href="index.php?action=Lista_Docentes">Docentes</a></li>
            			<li role="presentation" class="active"><a href="index.php?action=listadmin">Administradores</a></li>
        			</ul>
				<?php endif ?>
            </ul>
</div>