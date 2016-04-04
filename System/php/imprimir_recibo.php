<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
<?php
include('base.php');
    //include('base2.php');
    //include('base3.php');
$id_recibo = $_GET['id_recibo'];
$select = 'SELECT * from recibos where id_recibo="'.$id_recibo.'";';
$result = $conn->query($select);
$renglon = $result->fetch_assoc();
//$resul = $conn->query($select) or die ("problema con la solicitud");
//$renglon = mysql_fetch_assoc($resul);
$cantidad = $renglon['cantidad'];
$descripcion = $renglon['descripcion'];
$total = $renglon['total'];
$fecha = $renglon['fecha'];
$comprador = $renglon['comprador'];
$vendedor = $renglon['vendedor'];
$select_usuario = 'SELECT * from paciente where id_paciente="'.$comprador.'";';
$result = $conn->query($select_usuario);
$renglon_usuario = $result->fetch_assoc();
//$resul_usuario = $conn->query($select_usuario) or die ("problema con la solicitud");
//$renglon_usuario = mysql_fetch_assoc($resul_usuario);
if($renglon_usuario['nombres']==''){
    $select_usuario = 'SELECT * from usuarios where id_usuario="'.$comprador.'";';
    $result = $conn->query($select_usuario);
    $renglon_usuario = $result->fetch_assoc();
    //$resul_usuario = $conn->query($select_usuario) or die ("problema con la solicitud");
    //$renglon_usuario = mysql_fetch_assoc($resul_usuario);       
}
$select_vendedor = 'SELECT * from usuarios where id_usuario="'.$vendedor.'";';
$result = $conn->query($select_vendedor);
$renglon_vendedor = $result->fetch_assoc();
//$resul_vendedor = $conn->query($select_vendedor) or die ("problema con la solicitud");
//$renglon_vendedor = mysql_fetch_assoc($resul_vendedor);
echo "Comprador: ", $renglon_usuario['nombres'], " ", $renglon_usuario['apellido_paterno'], " ", $renglon_usuario['apellido_materno'];
echo "<br>Fecha: ", $renglon['fecha'];
echo "<br>Descripcion: ", $renglon['descripcion'];
echo "<br>Cantidad: ", $renglon['cantidad'];
echo "<br>Total: $ ", $renglon['total'];
echo "<br><br><hr>Recibo emitido por: ", utf8_encode($renglon_vendedor['nombres']), " ", utf8_encode($renglon_vendedor['apellido_paterno']), " ", utf8_encode($renglon_vendedor['apellido_materno']);
?>