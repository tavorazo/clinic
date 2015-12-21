<?php
include("php/functions.php"); 
 
if(isset($_POST['put'])){
   $datos = array(	0	=>  $_POST["remitente"], 
   					1	=>	$_POST["asunto"],
   					2	=> 	$_POST["msj"]);

   //print_r($datos);
   put_felicitacion($datos);
}
?>

<html>
	<head>
	<title>Editar Enviar Felicitacion</title>		
	<style>
		body 	{ background: #fafafa;}
		form 	{ background: #fff; width: 800px; min-height: 350px; margin: auto; padding: 45px; position:relative; }
		a 		{ font-size:14px; }
		label 	{  display: block; float: left; font-weight: bold; min-width:150px;}
		p 		{ font-size: 12px; font-weight: lighter; padding-bottom:0px;}
		img 	{ width: 600px; position: relative; left:50%; margin-left:-300px; margin-top:50px; margin-bottom: 100px;}
		input 	{ width:50%; padding:10px 10px; }
		input[type="submit"] { height:35px; width: 100%; background: #fff; border:1px solid #999; cursor:pointer;}
		textarea{ width:100%; min-height:150px;}
	</style>
  	<link rel="shortcut icon" type="x-icon" href="images/icon.png" /><!--para logo en barra-->
	</head>
	



	<body>
		<?php 
			$datos = get_felicitacion();
		?>
		<form action="" method="post" enctype="multipart/form-data">
			<a href="panel.php" title=""><< Regresar</a><hr><br><br><br>
			<label >Remitente: </label>		<input  name="remitente" value="<?php echo  $datos[1]; ?>"></input><br>
			<label >Destinatarios:</label>  <p>Lista de correos de pacientes y empleados</p><br>
			<label >Asunto: </label> 		<input name="asunto" value="<?php echo $datos[2]; ?>"></input><br>
			<hr><br>
			<textarea name="msj"><?php echo $datos[4]; ?>. </textarea><br>
		   	<!--center><input name="img" type="file" ></input></center-->
			<img src='images/<?php echo $datos[3]; ?>'>
		   <input type="submit" value="modificar" name="put" />
		</form>
	</body>
</html>
