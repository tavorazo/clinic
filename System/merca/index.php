
<?php include("../+/header3.php"); ?>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script language="JavaScript" type="text/javascript" src="ajax.js"></script>
<link rel="stylesheet" type="text/css" href="filtros.css"/>
<p>Buscar lista de pacientes </p>
<form action="query.php" class="ajax" method="post" accept-charset="utf-8" >
  <select name="by" class="campoT" >
    <option>Selecciona el filtro...</option>
    <option value="nombres">Nombre</option>
	<option value="apellido_paterno">Apellido paterno</option>
	<option value="apellido_materno">Apellido materno</option>
	<option value="estado">Estado</option>
	<option value="ciudad">Ciudad</option>
    <option value="fecha_nacimiento">Fecha de nacimiento</option>
	<option value="edad">Edad</option>
    <option value="sexo">Genero</option>
	<option value="fecha">Ultima consulta</option>
  </select>
  <div class="sel">Seleccione...</div>
  	<input type="submit" id="form" name="lista" value="Buscar"  />
</form>


<div class="return">
  [ - - La lista se descargará en formato XML - - ]
</div>





<?php include("../+/footer.php"); ?>
