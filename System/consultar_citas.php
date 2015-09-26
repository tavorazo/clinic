<?php
	@session_start();
	if($_SESSION['u']=='')
		header('location: index.php');
		//echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
	$usuario = $_SESSION['u'];
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<title>consultas</title>
	    		<link rel="shortcut icon" type="x-icon" href="images/icon.png" /><!--para logo en barra-->
	  	<link rel="stylesheet" type="text/css" href="css/s1.css"/>
  		<link rel="stylesheet" type="text/css" href="css/texto.css"/>
  	<style type="text/css" media="screen">
  		body{
  			background: #E6E6E6;
  		}	
 	 </style>
</head>
<body>

	<?php

				$doctor = $_SESSION['u'];
			
			include('php/base.php');
			include('php/base3.php');
				
				$select3 = 'select * from usuarios where id_usuario="'.$doctor.'";';
				$resul3 = $conn->query($select3) or die ("problema con la solicitud 1");

				$renglon3 = mysql_fetch_assoc($resul3);
				$rol = $renglon3['rol'];	

			$dia = $_GET['dia'];
			$mes_n = $_GET['mes'];
			$ano = $_GET['ano'];
			$n_dia = $_GET['n_dia'];
			
			$hora[1] = '8';
			$hora[2] = '9';
			$hora[3] = '10';
			$hora[4] = '11';
			$hora[5] = '12';
			$hora[6] = '13';
			$hora[7] = '14';
			$hora[8] = '15';
			$hora[9] = '16';
			$hora[10] = '17';
			$hora[11] = '18';
			$hora[12] = '19';

			$minuto[1] = '00';
			$minuto[2] = '15';
			$minuto[3] = '30';
			$minuto[4] = '45';

			$mes[1] = 'Enero';
			$mes[2] = 'Febrero';
			$mes[3] = 'Marzo';
			$mes[4] = 'Abril';
			$mes[5] = 'Mayo';
			$mes[6] = 'Junio';
			$mes[7] = 'Julio';
			$mes[8] = 'Agosto';
			$mes[9] = 'Septiembre';
			$mes[10] = 'Octubre';
			$mes[11] = 'Noviembre';
			$mes[12] = 'Diciembre';


			$tabla="agenda";
			include('php/base2.php');

			$arraymes = $mes[$mes_n];

			echo "<h9><br>
				<img src='images/endoperio-logo.png' width='180px' style='margin-right:50px; margin-left:20px'> 
				 Citas para el: ",$n_dia," ", $dia," de ",$arraymes," del ",$ano,"</h9><hr><br>";

			$i=1;
			$j=1;

			if($rol!='dentista'){
			$resultd = $conn->query("select * from usuarios where rol='dentista';");
		  
		  	echo " <center>
		  	<div style='background: #F4F4F4; padding:20px; width:450px'>
		  		<h12>Buscar por Doctor:</h12>
		  		<form action='?ano=$ano&mes=$mes_n&dia=$dia&n_dia=$n_dia' method='POST'>
		  		<select name='d' class='campoT'>
		  		<option value=''>Todos</option>";
			 	while ($rowlista = mysql_fetch_array($resultd, MYSQL_NUM)){
			  		echo "<option value='",$rowlista[0],"'>",$rowlista[1]," ",$rowlista[2],"</option>";
			  	}
				echo "	</select>
						<input type='submit' value='Revisar'>
						</form></center>
			</div><br><br>";
			$dorevisar = $_POST['d'];
				while($i<13){
					while($j<5){
						if($dorevisar!='')
						$result2 = $conn->query("SELECT * FROM $tabla where ano='$ano' and mes='$mes_n' and dia='$dia' and hora='$hora[$i]' and minuto='$minuto[$j]' and id_usuario='$dorevisar'");
						else
							$result2 = $conn->query("SELECT * FROM $tabla where ano='$ano' and mes='$mes_n' and dia='$dia' and hora='$hora[$i]' and minuto='$minuto[$j]'");
						$nfilas = mysql_num_rows($result2);
					
							
							if($hora[$i]!=14 && $hora[$i]!=15){
					echo '
					<div style="width:80%; margin-left:60px; min-height:10px;  border: 1px solid #B8CCD8; background:#F4F4F4">';

							echo '<div style="width:10%; min-height:0px; padding:0px; background:#A1BADA; text-align: center; " >
								<h8>', $hora[$i],':',$minuto[$j],'</h8>
							</div>';}
							else 
								echo "";
							
					echo "<table style='width:90%'>";
					   while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {
					 	  	$select2 = 'select * from usuarios where id_usuario="'.$row2[1].'";';
							$select = 'select * from paciente where id_paciente="'.$row2[2].'";';
							$resul = $conn->query($select) or die ("problema con la solicitud 2");
							$resul2 = $conn->query($select2) or die ("problema con la solicitud 3");
							$renglon = mysql_fetch_assoc($resul);
							$renglon2 = mysql_fetch_assoc($resul2);
								
							echo "
						<tr><td>";
						if($renglon['foto_ingreso'] == NULL)
							echo "<img src='pacientes/images_pacientes/predeterminado.png' width='80px' height='80px' style='border-radius:50%;  border: 1px solid #D8D8D8; '>";
						else
						     	echo "<img src='pacientes/images_pacientes/",$renglon['foto_ingreso'],"' width='80px' height='80px' style='border-radius:50%;  border: 1px solid #D8D8D8; '>";
							echo "
						</td><td>

								<h3><label>Doctor: </label>", $renglon2['nombres']," ",$renglon2['apellido_paterno']," ",$renglon2['apellido_materno'],"
									<br><label>Paciente: </label>", $renglon['nombres']," ",$renglon['apellido_paterno']," ",$renglon['apellido_materno'],"
									<br><label>Obsevaciones:</label><br> ", $row2[8],"
								</h3>
						</td><td>";

							echo "<br><a href='pacientes/ficha-paciente.php?id=",$renglon['id_paciente'],"' style='text-decoration:none; color:black'>
							<div style='margin-left:10px; padding:8px;  border:1px solid #6FCCE3; height:16px; width:170px; margin-top:10px; text-align:center'>
								 Ver Ficha
							</div></a> 
								<a href='pacientes/ficha-paciente.php?id=",$renglon['id_paciente'],"' style='text-decoration:none; color:black'>
								</a><br><br><br>
						</td></th>";
					   	}echo"
				</table></div><br>";
					   	$j++;
					}
					$i++;
					$j=1;
				}

			}else{
				$i=1;
				$j=1;

 			/*----------------Desntista------------------*/
				echo " <center>
		  		<div style='background: #F4F4F4; padding:20px; width:450px'>
		  			<h13>Doctor: ", $renglon3['nombres']," ",$renglon3['apellido_paterno']," ",$renglon3['apellido_materno'],"
		  			</h13>
		  		</div></center>";
				while($i<13){
					while($j<5){
						$result2 = $conn->query("SELECT * FROM $tabla where id_usuario='$doctor' and ano='$ano' and mes='$mes_n' and dia='$dia' and hora='$hora[$i]' and minuto='$minuto[$j]'");
						
					echo '<br><br>
					<div style="width:80%; margin-left:60px; min-height:30px; border: 1px solid #B8CCD8; background:#F4F4F4">

							<div style="width:10%; height:30px; padding:10px; background:#A1BADA; text-align: center;  " >
								<h8>', $hora[$i],":",$minuto[$j],"</h8>
							</div>
							
						<table style='width:90%'>";
					   while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {
  						
						$select = 'select * from paciente where id_paciente="'.$row2[2].'";';
						$resul = $conn->query($select) or die ("problema con la solicitud 4");
						$renglon = mysql_fetch_assoc($resul);
												
  						echo "<tr><td>";
						//echo "<div  style='width:25%; margin-left:20px; float:left'>";
						if($renglon['foto_ingreso'] == NULL)
							echo "<img src='pacientes/images_pacientes/predeterminado.png' width='130px' height='130px' style='border-radius:50%;  border: 1px solid #D8D8D8;  '>";
						else
						     	echo "<img src='pacientes/images_pacientes/",$renglon['foto_ingreso'],"' width='130px' height='130px' style='border-radius:50%;  border: 1px solid #D8D8D8;  '>";
		
						     echo "
						</td><td>

						<h3><br>
						<label>Paciente: </label>", $renglon['nombres']," ",$renglon['apellido_paterno']," ",$renglon['apellido_materno'],"
						<br><label>Observaciones:</label><br> ", $row2[8]," </h3>

					 	</td><td style='background:none'>

					 	<a href='pacientes/ficha-paciente.php?id=",$renglon['id_paciente'],"' style='text-decoration:none; color:black'>			
						<div style='margin-left:10px; padding:9px; border:1px solid #6FCCE3; height:16px; width:170px; margin-top:25px; text-align:center'>
							Ver Ficha
						</div>
					     </a> <br>
					    </td></tr>"; 
					   }echo "
					</table></div><br>";
					   $j++;
					}
					$i++;
					$j=1;
				}
			}
	   ?>
	
</body>
</html>