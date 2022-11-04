<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Colegio San Pedro - Horarios</title>
    <link rel="Shortcut Icon" type="image/x-icon" href="images/Logo.png" />
    <link href='https://fonts.googleapis.com/css?family=Maven+Pro' rel='stylesheet' type='text/css'>
    <link href="Horario.css" rel="stylesheet">
  </head>
  <body>

    <div id="menu" class="col-md-12 text-right">
      <div class="container">
          <a class="btn btn-primary" href="lista.php"><i class="fa fa-calendar" aria-hidden="true"></i> Lista de Horarios</a>
          <button class="btn btn-warning" data-toggle="modal" data-target="#myModal"><i class="fa fa-calendar-check-o"></i> Nuevo Horario</button>
      </div>
    </div>
      <div class="container">
       <div id="clockindex" class="col-sm-12 text-center">
         <i class="fa fa-calendar-plus-o icon-clock-index animated infinite pulse" aria-hidden="true"></i>
         <h3 style="color:aliceblue;">Horarios Academicos</h3>
       </div>
       <div id="mynew" class="col-sm-12">
          
       </div>
      </div>
<div class="modal fade animated bounceInLeft" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close cancel-new" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-calendar"></i> Nuevo Horario</h4>
      </div>
      <div class="modal-body">
        
         <form id="horariofrm">
            <label>Curso Y Seccion:</label>
            <input class="form-control" type="text" name="nombre" >
            <label>Descripción:</label>
            <textarea class="form-control" name="descripcion" rows="3"></textarea>
            <label>Dias:</label>
            <div id="days-list" class="col-sm-12">
               <a data-day="1" class="day-option">Lunes</a>
               <a data-day="2" class="day-option">Martes</a>
               <a data-day="3" class="day-option">Miercoles</a>
               <a data-day="4" class="day-option">Jueves</a>
               <a data-day="5" class="day-option">Viernes</a>
               <a data-day="6" class="day-option">Sabado</a>
               <a data-day="7" class="day-option">Domingo</a>
            </div>
            <input id="days-chose" class="form-control" type="text" name="days" >
            <label>Inicio:</label>
            <input class="form-control" type="text" id="time1" name="tiempo1">
            <label>Final:</label>
            <input class="form-control" type="text" id="time2" name="tiempo2">
            <label>Dividir En Bloques De:</label>
            <select class="form-control" name="minutos">
                <option></option>
                <option value="35">35 Minutos</option>
                <option value="45">45 minutos</option>
                <option value="60">1 Hora</option>
            </select>
         </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="create-horario btn btn-success"><i class="fa fa-calendar-check-o"></i> Crear</button>
        <button type="button" class="cancel-new btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
      </div>
    </div>
  </div>
</div>
    <div class="modal fade" id="DataEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close canceltask" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-thumb-tack"></i> Agregar Materia</h4>
      </div>
      <div class="modal-body">
        
        <form id="taskfrm">
           <label>Materia Y Docente</label>
           <input class="form-control" type="text" id="nametask" >
           <label>Color:</label>
           <select class="form-control" id="idcolortask">
              <option value="purple-label">Purpura</option>
              <option value="cian-label">Cyan</option>
              <option value="red-label">Rojo</option>
              <option value="blue-label">Azul</option>
              <option value="pink-label">Rosa</option>
              <option value="green-label">Verde</option>
              <option value="crema-label">Crema</option>
              <option value="orange-label">Naranja</option>
              <option value="gold-label">Dorado</option>
              <option value="darkblue-label">Azul Oscuro</option>
              <option value="gray-label">Gris</option>
           </select> 
          <input id="tede" type="hidden" name="tede" >
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="savetask btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
        <button type="button" class="canceltask btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
      </div>
    </div>
  </div>
</div>
<div id="alert-error"><i class="fa fa-times fa-2x"></i></div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/moment-with-locales.js"></script>
    <script src="js/bootstrap-datetimepicker.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/additional-methods.min.js"></script>
    <script src="js/script.js"></script>

  </body>
</html>