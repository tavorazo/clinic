<html>
<head>
<title></title>
</head>
<body>

<div class="wrapper">
<form action="nuevo_usuario.php" method="POST" enctype="multipart/form-data">

<label>Nombre(s):</label> <input type="text" name="nombre"><br><br>
<label>Apellido Paterno: </label><input type="text" name="a_pat" value=""><br><br>
<label>Apellido Materno: </label><input type="text" name="a_mat"value=""><br><br>
<label>Rol: </label><select name="rol">
	<option value="recepcionista">Recepcionista</option>
	<option value="dentista">Dentista</option>
	<option value="secretaria">Secretaria</option>

</select><br><br>
<label>Nickname</label><input type="text" name="nickname"><br><br>
<label>Contraseña</label><input type="password" name="contra"><br><br>
<input type="submit" value="Guardar"><input type="reset" value="Resetear">
 
</form>
</div>
</body>
</html>
