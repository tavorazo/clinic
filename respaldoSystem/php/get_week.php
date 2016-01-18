<?php 
//query para sacar fecha
//calcular que semana es
//meter semana 

function get_date(){
	include("base.php");
	$select = "SELECT  mes, dia, ano, id_cita, n_semana FROM  `agenda`  WHERE ano =2015 and mes = 11 ORDER BY n_semana, mes";
	// $select = "SELECT   FROM agenda where ano=2015 and mes= 12";
	$dates = $conn -> query($select);
	$hora = $min = $seg = 0; 
	while ($date = $dates->fetch_row()) {
		$fecha =  $date[0]."-".$date[1]."-".$date[2];
		$id = $date[3];
		$datecomplete = mktime ($hora, $min, $seg, $date[0], $date[1], $date[2]);
		$week = date("W", $datecomplete);
		echo " - ".$fecha." - ".$datecomplete." - ".$week." - ".$id."<br>";
		// $sql = "UPDATE agenda SET n_semana=".$week." WHERE id_cita=".$id;
		// if ($conn->query($sql) === TRUE) {
		//      echo "Record updated successfully <br>	";
		//  } else {
	 //    	echo "Error updating record: " . $conn->error ."<br>";
		//  }

	}
	$conn -> close();
}

get_date();


 ?>