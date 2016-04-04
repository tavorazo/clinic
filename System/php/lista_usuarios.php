<?php
@session_start();
if($_SESSION['u']=='')
	header('location: ../../index.php');
	//if($_SESSION['rol']!='admin')
	//		header('location: ../panel.php');
$u= $_SESSION['u'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Lista usuarios</title>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
	<link rel="stylesheet" type="text/css" href="../css/s1.css"/>
	<link rel="stylesheet" type="text/css" href="../css/texto.css"/>
	<link rel="shortcut icon" type="x-icon" href="../images/icon.png" /><!--para logo en barra-->
</head>
<body>

	<?php
	$tabla="usuarios";
	
	include('base.php');
	//include('base3.php');
	//include('base2.php');

     //$result = $conn->query("SHOW COLUMNS FROM $tabla");
	$result = $conn->query("SHOW COLUMNS FROM $tabla");

	echo "<a href='../panel.php'><img src='../images/endoperio-logo.png' width='200px' style='margin-left:120px; margin-top:40px; float:left'></a>
	<h9 style='position:absolute; margin-top:42px; margin-left:40px '>Lista de usuarios en el Sistema</h9><br><br><br><br><br><br>";
	echo '<center><a href="../panel.php">Regresar</a></center>';

      //ahora consultamos a la base de datos para sacar los registros contenidos
	if($_SESSION['rol']=='admin'){
	      //$result2 = $conn->query("SELECT * FROM $tabla");
	      //while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {
		$result2 = $conn->query("SELECT * FROM $tabla");
		while ($row2 = $result2->fetch_row()) {
			echo "<div style='width:80%; margin:10px auto; padding:20px; border: #2d455f 1px solid;'
			<br>
			<div style='padding:10px; width:190px; min-height:300px; float:left; padding-right:40px'>
			<img src='../usuarios/",$row2[11],"' style='float:left; margin-right:30px; margin-top:20px; width:100%'>
			</div>
			<br>
			<label>Id: </label>", $row2[0];
			echo "<br><label>Nombre: </label>", utf8_encode($row2[1])," ",utf8_encode($row2[2])," ", utf8_encode($row2[3]);
			echo "<br><label>Fecha de Nacimiento: </label>", $row2[4];
			echo "<br><label>Rol: </label>", $row2[5];
			echo "<br><label>Correo: </label>", $row2[6];
			echo "<br><label>Contacto de emergencia: </label>",$row2[8];
			echo "<br><label>Telefono de emergencia: </label>", $row2[7];
			echo "<br><label>Fecha de alta: </label>", $row2[9];
			echo "<br><label>Diplomados e Instrumental:  </label><a href='diplomados.php?id=", $row2[0],"'>Comprar</a><br>";
	             		//	echo "<br><label>Password: </label>", $row2[10];
		//$resul = $conn->query($select) or die ("problema con la solicitud");
		//$renglon = mysql_fetch_assoc($resul);
			$select = "SELECT * from curriculum where id_usuario= '$row2[0]'";
			$result = $conn->query($select);
			$renglon = $result->fetch_assoc();
			echo "	<br><a href='ver_curriculum.php?id=",$row2[0],"&n=",$row2[1],"&a1=",$row2[2],"&a2=",$row2[3],"&fn=",$row2[4],"' style='margin-top:10px; float:left'>Ver Curriculum >> </a><br>";
			echo "<br><a href='editar_curriculum.php?id=",$row2[0],"' >Editar Curriculum>> </a><br>";

			echo "<br><br>
			<div style='padding:9px; float:right;  position:absulute;  margin-top:-100px; border:1px solid #2d455f; height:16px; width:250px; text-align:center '>
			<a href='nomina_personal.php?id=",$row2[0],"'>Revisar Nomina</a>  
			</div><br><br><br>
			<div style='padding:9px; float:right;  position:absulute;  margin-top:-100px; border:1px solid #2d455f; height:16px; width:250px; text-align:center '>
			<a href='edit-usuario.php?id=",$row2[0],"'>Editar</a>  
			</div>
			<div style='padding:9px;  float:right; border:1px solid #2d455f; margin-top:-50px; height:16px; width:250px; text-align:center '>
			<a href='delete-usuario.php?id=",$row2[0],"'>Eliminar</a> ';
			</div>

			</div><br>";
		}
	}else{
		if($_SESSION['rol']!='secretaria'){
 	      	//$result2 = $conn->query("SELECT * FROM usuarios where id_usuario='$u'");
 	     	//print "SELECT * FROM usuarios where id_usuario=$usuario";
	      	//while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {
			$result2 = $conn->query("SELECT * FROM usuarios where id_usuario='$u'");
			while ($row2 = $result2->fetch_row()){
				echo "<div style='width:80%; margin:10px auto; padding:20px; border: #2d455f 1px solid;'>
				<label>Id: </label>", $row2[0];
				echo "<br><label>Nombre: </label>", utf8_encode($row2[1])," ",utf8_encode($row2[2])," ", utf8_encode($row2[3]);
				echo "<br><label>Fecha de Nacimiento: </label>", $row2[4];
				echo "<br><label>Rol: </label>", $row2[5];
				echo "<br><label>Correo: </label>", $row2[6];
				echo "<br><label>Contacto de emergencia: </label>",$row2[8];
				echo "<br><label>Telefono de emergencia: </label>", $row2[7];
				echo "<br><label>Fecha de alta: </label>", $row2[9];
	             			//echo "<br><label>Password: </label>", $row2[10];
				$select = 'SELECT * from curriculum where id_usuario="'.$row2[0].'";';
				$result = $conn->query($select);
				$renglon = $result->fetch_assoc();
		//$resul = $conn->query($select) or die ("problema con la solicitud");
		//$renglon = mysql_fetch_assoc($resul);
				echo "	<br><a href='ver_curriculum.php?id=",$row2[0],"&n=",$row2[1],"&a1=",$row2[2],"&a2=",$row2[3],"&fn=",$row2[4],"&c=",$renglon['descripcion'],"' style='margin-top:10px; float:left'>Ver Curriculum >> </a><br>
				<br><a href='editar_curriculum.php?id=",$row2[0],"' style=''>Editar Curriculum>> </a><br>"; 
				echo "<br><br>
				<div style='padding:9px; float:right;  position:absulute;  margin-top:-100px; border:1px solid #2d455f; height:16px; width:250px; text-align:center '>
				<a href='nomina_personal.php?id=",$row2[0],"'>Revisar Nomina</a>  
				</div><br><br><br>
				<div style='padding:9px; float:right;  position:absulute;  margin-top:-100px; border:1px solid #2d455f; height:16px; width:250px; text-align:center '>
				<a href='edit-usuario.php?id=",$row2[0],"'>Editar</a>  
				</div>";
	            /*<div style='padding:9px;  float:right; border:1px solid #2d455f; margin-top:-50px; height:16px; width:250px; text-align:center '>
	            <a href='delete-usuario.php?id=",$row2[0],"'>Eliminar</a>
	            </div>*/
	            echo "</div><br>";
	        }     
	    }else{
	      //$result2 = $conn->query("SELECT * FROM $tabla");
	      //while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {
	        $result2 = $conn->query("SELECT * FROM $tabla");
	        while ($row2 = $result->fetch_row()){
	            echo "<div style='width:80%; margin:10px auto; padding:20px; border: #2d455f 1px solid;'
	            <br>
	            <div style='padding:10px; width:190px; min-height:300px; float:left; padding-right:40px'>
	            <img src='../usuarios/",$row2[11],"' style='float:left; margin-right:30px; margin-top:20px; width:100%'>
	            </div>
	            <br>
	            <label>Id: </label>", $row2[0];
	            echo "<br><label>Nombre: </label>", utf8_encode($row2[1])," ",utf8_encode($row2[2])," ", utf8_encode($row2[3]);
	            echo "<br><label>Fecha de Nacimiento: </label>", $row2[4];
	            echo "<br><label>Rol: </label>", $row2[5];
	            echo "<br><label>Correo: </label>", $row2[6];
	            echo "<br><label>Contacto de emergencia: </label>",$row2[8];
	            echo "<br><label>Telefono de emergencia: </label>", $row2[7];
	            echo "<br><label>Fecha de alta: </label>", $row2[9];
	            echo "<br><label>Diplomados e Instrumental:  </label><a href='diplomados.php?id=", $row2[0],"'>Comprar</a><br>";
	            //	echo "<br><label>Password: </label>", $row2[10];
	            $select = 'SELECT * from curriculum where id_usuario="'.$row2[0].'";';
	            $result = $conn->query($select);
	            $renglon = $result->fetch_assoc();
				//$resul = $conn->query($select) or die ("problema con la solicitud");
				//$renglon = mysql_fetch_assoc($resul);
	            echo "	<br><a href='ver_curriculum.php?id=",$row2[0],"&n=",$row2[1],"&a1=",$row2[2],"&a2=",$row2[3],"&fn=",$row2[4],"' style='margin-top:10px; float:left'>Ver Curriculum >> </a><br>";
	            echo "<br><a href='editar_curriculum.php?id=",$row2[0],"' >Editar Curriculum>> </a><br>";

	            echo "<br><br>
	            <div style='padding:9px; float:right;  position:absulute;  margin-top:-100px; border:1px solid #2d455f; height:16px; width:250px; text-align:center '>
	            	<a href='nomina_personal.php?id=",$row2[0],"'>Revisar Nomina</a>  ";
	                                  		/*</div><br><br><br>*/

	            if($row2[0]==$_SESSION['u']){
	                echo "<div style='padding:9px; float:right;  position:absulute;  margin-top:-100px; border:1px solid #2d455f; height:16px; width:250px; text-align:center '>
	                <a href='edit-usuario.php?id=",$row2[0],"'>Editar</a>  
	                </div>";
	            }
	                /*<div style='padding:9px;  float:right; border:1px solid #2d455f; margin-top:-50px; height:16px; width:250px; text-align:center '>
	                <a href='delete-usuario.php?id=",$row2[0],"'>Eliminar</a> 
	                </div>*/
	                echo "</div><br><br><br></div><br>";
	        }
	    }
	}

 ?>
	</table>
</body>
</html>   
