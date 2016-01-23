
<?php include("../+/header3.php"); ?>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script language="JavaScript" type="text/javascript" src="ajax.js"></script>
<link rel="stylesheet" type="text/css" href="filtros.css"/>
<p>Buscar lista de pacientes </p>
<div><br>Escriba en uno o más filtros de búsqueda</div>
<form action="query.php" class="ajax" method="post" accept-charset="utf-8" >  	
	Edad <input type='number' name='edad' class='campoT' placeholder='Años'>
	Ciudad <input type='text' class='campoT' name='ciudad' placeholder='Ej. Morelia'>
	Estado <input type='text' class='campoT' name='estado' placeholder='Ej. Michoacán'>
	Genero <select name="sexo" class="campoT" >
			<option value ="A">Ambos</option>
			<option value="M">Masculino</option>
			<option value="F">Femenino</option>
	</select>
	Fecha de consulta: <input type='date' name='fecha' class='campoT'>
	O semana <input type='week' name='semana' class='campoT'>
	O Mes <input type='month' name='mes' class='campoT'>
	Ordenados por: 
	Nombre<input name="orden" type="Radio" value="apellido_paterno" checked="checked">Edad<input type="Radio" name="orden" value="edad">
	<input type="submit" id="form" name="lista" value="Buscar"  />
</form>

<?php include("../+/footer.php"); ?>
