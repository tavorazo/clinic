
<?php include("../+/header3.php"); ?>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script language="JavaScript" type="text/javascript" src="ajax.js"></script>
<link rel="stylesheet" type="text/css" href="filtros.css"/>
<p>Buscar lista de pacientes </p>
<div><br>Escriba en uno o más filtros de búsqueda</div>
<form id="form" action="#" class="ajax" method="post" accept-charset="utf-8" style="position: relative;" >  	
	Edad <input type='number' name='edad' class='campoT' placeholder='Años'>
	Ciudad <input type='text' class='campoT' name='ciudad' placeholder='Ej. Morelia'>
	Estado <input type='text' class='campoT' name='estado' placeholder='Ej. Michoacán'>
	Genero <select name="sexo" class="campoT" >
			<option value ="A">Ambos</option>
			<option value="M">Masculino</option>
			<option value="F">Femenino</option>
	</select>
	Ultima consulta: <input type='date' name='fecha' class='campoT'>
	<hr>
	Filtrado por semana: <input type='week' name='semana' class='campoT'>
	Filtrado por mes <input type='month' name='mes' class='campoT'>
	<hr>
	Ordenados por: 
	<p style="margin-left:30px;">Nombre<input name="orden" type="Radio" value="apellido_paterno" checked="checked"></p>
	<p style="margin-left:30px;">Edad<input type="Radio" name="orden" value="edad"></p>
	<input type="submit" id="form" name="lista" value="Buscar"  />
</form>

<div class="return" style="display: none;">
  [ - - Lista de pacientes Clinica Dental Endoperio - - ]
  <!-- La tabla de regreso es invisible -->
</div>
<a href="#" class="export"></a>
<?php include("../+/footer.php"); ?>
