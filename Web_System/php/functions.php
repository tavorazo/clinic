<?php 
	

	function get_felicitacion(){
		include("base.php");
		$select = 'SELECT * from felicitacion';
        $resul = $conn->query($select);
        $datos = $resul->fetch_row();
		$conn->close();

        return $datos;
	}


	function put_felicitacion($datos){
		include("base.php");
		

		/*$target_path = "images/";
		$target_path = $target_path . basename( $_FILES['$datos[3]']['name']); if(move_uploaded_file($_FILES['$datos[3]']['tmp_name'], $target_path)) { 
			echo "
		    <div style='width:100%; background:#f2f2f2; border-bottom:1px solid red; font-size:13px; text-align:center;'>
				El archivo ". basename( $_FILES['$datos[3]']['name']). " ha sido subido
		    </div>";
		} else{
		 	echo "
		    <div style='width:100%; background:#f2f2f2; border-bottom:1px solid red; font-size:13px; text-align:center;'>
		    	Ha ocurrido un error, trate de nuevo!
		    </div>";
		    return;
		}*/

		$put = "UPDATE felicitacion SET remitente='$datos[0]', titulo='$datos[1]', mensaje='$datos[2]' where id = 1";
		if ($conn->query($put) === TRUE) {
		    echo "
		    <div style='width:100%; background:#f2f2f2; border-bottom:1px solid red; font-size:13px; text-align:center;'>
		    	Modificado correctamente
		    </div>";

		} else {
		    echo "
		    <div style='width:100%; background:#f2f2f2; border-bottom:1px solid red; font-size:13px; text-align:center;'>
		    	Contacta a servicio técnico y reporta el siguiente error: <br><br>Error updating record: " . $conn->error ."
		    </div>";
		}

		$conn->close();
	}
 ?>