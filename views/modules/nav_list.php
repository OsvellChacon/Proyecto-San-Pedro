<div class="container-fluid">
    <nav class="nav nav-tabs nav-justified"  style="font-size: 17px;">
    <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
    <?php if ($_GET["action"] == "asignar_grupos"): ?>
					<ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
           				<li role="presentation" class="active"><a href="index.php?action=asignar_grupos">Listado General</a></li>
           				<li role="presentation"><a href="index.php?action=lista_salones">Curso Y Seccion</a></li>
        			</ul>
				<?php endif ?>
				<?php if ($_GET["action"] == "lista_salones"): ?>
					<ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
           				<li role="presentation"><a href="index.php?action=asignar_grupos">Listado General</a></li>
           				<li role="presentation" class="active"><a href="index.php?action=lista_salones">Curso Y Seccion</a></li>
        			</ul>
				<?php endif ?>
            </ul>
    </nav>
</div>