<!DOCTYPE html>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Listo</title>
	  <link rel="stylesheet" type="text/css" href="../css/texto.css"/>

	<style type="text/css" media="screen">

	 body{
	  background: steelblue;
	  color: #1C1C1C;
	 }
	 a, a:hover{
	  color: white;
	  text-decoration: none;
	 }
	</style>

</head>
<body>
<?php
	@session_start();
	date_default_timezone_set("Mexico/General");
	include('../php/base.php');
	include('../php/base2.php');
	include('../php/base3.php');
	
	$id_usuario = $_SESSION['u'];
	
	$adeudo = $_POST['adeudo'];
	$pago = $_POST['pago'];
	$pagos_tipo = $_POST['pagos_tipo'];
	$id_paciente = $_POST['id_paciente'];
	$detalles = $_POST['detalles'];
	
	$y = date(Y);
	$s = date(W);

	$insertar = "insert into pagos_historia (id_tipo, id_paciente, id_adeudo, abono, fecha, descripcion, id_usuario, semana, y) values ('$pagos_tipo', '$id_paciente', '$adeudo','$pago', now(), '$detalles', '$id_usuario','$s','$y')";

		if(!mysqli_query($conn,))
			die('Error de consulta: '.mysql_error());
		else
			echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';
			echo "Proceso &eacute;xitoso<br><br><br>";
			//echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
			//echo "<a href='pago.php.php' > <font color='white'>Regresar </a></center></div>";
			//echo "Pago Generado... <br> PROCESANDO";
			
		$result = mysql_query("SELECT * FROM pagos_historia where id_adeudo='$adeudo'");
		$total = 0;
		while ($row2 = mysql_fetch_array($result, MYSQL_NUM)) 
			$total = $total + $row2[4];
			
		$update = "update pago_adeudo set pagado = '$total', fecha = now() where id_adeudo = '$adeudo'";



		if(!mysqli_query($conn,))
			die('Error de consulta: '.mysql_error());


		$select = 'select * from pago_adeudo where id_adeudo="'.$adeudo.'";';
		$resul = mysqli_query($conn,) or die ("problema con la solicitud");
		$renglon = mysql_fetch_assoc($resul);

		$desc = $renglon['descripcion'];
		$recibo = "insert into recibos (cantidad, descripcion, total, fecha, comprador, vendedor) values ('1','$desc','$pago',now(),'$id_paciente','$id_usuario')";

		if(!mysqli_query($conn,))
			die('Error de consulta: '.mysql_error());
		//echo "<br><br>ultimo registro: ", mysql_insert_id(),"<br><br>";
		$id_recibo = mysql_insert_id();
		/*$select = 'select * from recibos order by id_recibo desc;';
		$resul = mysqli_query($conn,) or die ("problema con la solicitud");
		$renglon = mysql_fetch_assoc($resul);
		$id_recibo = $renglon['id_recibo'];*/
		//echo "<br><br>ultimo registro: ", mysql_insert_id(),"<br><br>";
		mysqli_close($conn);
		

		echo '<a href="pago.php?id_paciente=',$id_paciente,'" style="color:white">Regresar</a><br><br>';
		echo '<a href="../php/imprimir_recibo.php?id_recibo=',$id_recibo,'" style="color:white">Imprimir Recibo</a>';

	
?>
</body>
</html>