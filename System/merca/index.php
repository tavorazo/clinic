
<?php include("../+/header3.php"); ?>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script language="JavaScript" type="text/javascript" src="ajax.js"></script>
<link rel="stylesheet" type="text/css" href="filtros.css"/>

<p>Buscar lista de pacientes </p>
<form action="filtros.php" class="ajax" method="post" accept-charset="utf-8" >
  <input type="number" class="campoT" name="size" value="" placeholder="Cuantos pacientes quieres buscar?"  min="1" />
  <select name="by"class="campoT" >
    <option >Selecciona el filtro...</option>
    <option value="apellido_paterno">Nombre</option>
    <option value="fecha_nacimiento">Fecha de nacimiento</option>
    <option value="sexo">Genero</option>
    <option value="">Ultima_cita</option>
  </select>
  	<input type="submit" id="form" name="lista" value="Buscar"  />
</form>


<form action="topdf.php"  method="POST" accept-charset="utf-8" style="margin-left:450px">
  <input type="number"  class="campoT" name="size" value="0" placeholder="Cuantos pacientes quieres buscar?"   />
  <select name="by" class="campoT" >
    <option >Selecciona el filtro...</option>
    <option value="apellido_paterno">Nombre</option>
    <option value="fecha_nacimiento">Fecha de nacimiento</option>
    <option value="sexo">Genero</option>
    <option value="">Ultima_cita</option>
  </select>
 	<input type="submit"  name="pdf"  value="Download PDF"/>
</form>
<div class="return">
  [ - - Lista de pacientes Clinica Dental Endoperio - - ]
</div>





<?php include("../+/footer.php"); ?>
