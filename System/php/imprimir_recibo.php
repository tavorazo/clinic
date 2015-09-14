<?php
	include('base.php');
	include('base2.php');
	include('base3.php');

	$id_recibo = $_GET['id_recibo'];

    $select = 'select * from recibos where id_recibo="'.$id_recibo.'";';
    $resul = mysqli_query($conn,) or die ("problema con la solicitud");
    $renglon = mysql_fetch_assoc($resul);

    $cantidad = $renglon['cantidad'];
    $descripcion = $renglon['descripcion'];
    $total = $renglon['total'];
    $fecha = $renglon['fecha'];
    $comprador = $renglon['comprador'];
    $vendedor = $renglon['vendedor'];

    $select_usuario = 'select * from paciente where id_paciente="'.$comprador.'";';
    $resul_usuario = mysqli_query($conn,) or die ("problema con la solicitud");
    $renglon_usuario = mysql_fetch_assoc($resul_usuario);

    if($renglon_usuario['nombres']==''){
	    $select_usuario = 'select * from usuarios where id_usuario="'.$comprador.'";';
	    $resul_usuario = mysqli_query($conn,) or die ("problema con la solicitud");
	    $renglon_usuario = mysql_fetch_assoc($resul_usuario);    	
    }

    $select_vendedor = 'select * from usuarios where id_usuario="'.$vendedor.'";';
    //echo $select_vendedor;
    $resul_vendedor = mysqli_query($conn,) or die ("problema con la solicitud");
    $renglon_vendedor = mysql_fetch_assoc($resul_vendedor);


    echo "Comprador: ", $renglon_usuario['nombres'], " ", $renglon_usuario['apellido_paterno'], " ", $renglon_usuario['apellido_materno'];
    echo "<br>Fecha: ", $renglon['fecha'];

    echo "<br>Descripcion: ", $renglon['descripcion'];
    echo "<br>Cantidad: ", $renglon['cantidad'];
    echo "<br>Total: $ ", $renglon['total'];
    echo "<br>Recibo emitido por: ", $renglon_vendedor['nombres'], " ", $renglon_vendedor['apellido_paterno'], " ", $renglon_vendedor['apellido_materno'];

?>