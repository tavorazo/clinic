<!DOCTYPE html>    

<?php
@session_start();
if($_SESSION['u']=='')
  header('location: ../index.php');

$enlace="../panel.php";
$titulo = "control de asistencia de pacientes";
$sucursal = $_SESSION['sucursal'];

include("../+/head2.php");


?>

<head>
    <style>
        h1{ font-size: 20px;}
        table{ margin: 30px 0;}
        th{ background: grey; color:#fff; padding: 0 10px    ;}
        tr{ height: 30px; text-align: left;}
        tr:nth-child(even){ background: #f2f2f2;}
    </style>
</head>


<?php 


if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista'){ 
    
    include("base.php");
    $select = ($sucursal==0) ? 'SELECT * from paciente where inasistencia = 1 ' : 'SELECT * from paciente where inasistencia = 1 AND id_sucursal = '.$sucursal;
    $resul = $conn->query($select);
    echo "<br><br><br><h1>Pacientes con una falta</h1>";
    echo "<table width='100%'>";
    echo "<tr><th>id</th><th>Sucursal</th><th>Nombre</th><th>Telefono</th></tr>";
        while ($r = $resul->fetch_row()) {
            $result_sucursal    =   mysqli_query($conn, "SELECT sucursal from sucursales WHERE id_sucursal=".$r[33]);
            $renglon_sucursal  =   $result_sucursal->fetch_assoc();
            echo "<tr><td>".$r[0]."</td><td>".$renglon_sucursal['sucursal']."</td><td>".utf8_encode($r[1]). " ".utf8_encode($r[2])." ".utf8_encode($r[3])."</td><td>".$r[11]."</td></tr>";
        }

    echo "</table>";
    
    $select = ($sucursal==0) ? 'SELECT * from paciente where inasistencia = 2 ' : 'SELECT * from paciente where inasistencia = 2 AND id_sucursal = '.$sucursal;
    $resul = $conn->query($select);
    echo "<h1>Pacientes con 2 faltas</h1>";
    echo "<table width='100%'>";
    echo "<tr><th>id</th><th>Sucursal</th><th>Nombre</th><th>Telefono</th></tr>";
        while ($r = $resul->fetch_row()) {
            $result_sucursal    =   mysqli_query($conn, "SELECT sucursal from sucursales WHERE id_sucursal=".$r[33]);
            $renglon_sucursal  =   $result_sucursal->fetch_assoc();
            echo "<tr><td>".$r[0]."</td><td>".$renglon_sucursal['sucursal']."</td><td>".utf8_encode($r[1]). " ".utf8_encode($r[2])." ".utf8_encode($r[3])."</td><td>".$r[11]."</td></tr>";
        }

    echo "</table>";
    
    $select = ($sucursal==0) ? 'SELECT * from paciente where inasistencia >= 3 ' : 'SELECT * from paciente where inasistencia = 3 AND id_sucursal = '.$sucursal;
    $resul = $conn->query($select);
    echo "<h1>Pacientes con más de 3 faltas</h1>";
    echo "<table width='100%'>";
    echo "<tr><th>id</th><th>Sucursal</th><th>Nombre</th><th>Telefono</th></tr>";
        while ($r = $resul->fetch_row()) {
            $result_sucursal    =   mysqli_query($conn, "SELECT sucursal from sucursales WHERE id_sucursal=".$r[33]);
            $renglon_sucursal  =   $result_sucursal->fetch_assoc();
            echo "<tr><td>".$r[0]."</td><td>".$renglon_sucursal['sucursal']."</td><td>".utf8_encode($r[1]). " ".utf8_encode($r[2])." ".utf8_encode($r[3])."</td><td>".$r[11]."</td></tr>";
        }

    echo "</table>";
   
    
    $sql = ($sucursal==0) ? "SELECT  id_paciente, descripcion, adeudo, pagado, fecha_adeudo FROM pago_adeudo WHERE adeudo > pagado" : "SELECT  id_paciente, descripcion, adeudo, pagado, fecha_adeudo FROM pago_adeudo WHERE adeudo > pagado AND exists (select id_sucursal from paciente where  id_sucursal='$sucursal' and id_paciente=pago_adeudo.id_paciente)";
    $resul = $conn->query($sql);
    echo "<h1>Pacientes con adeudos</h1>";
    echo "<table width='100%'>";
    echo "<tr><th>id</th><th>Sucursal</th><th>Nombre</th><th>Descripción</th><th>Adeudo</th><th>Pagado</th><th>Telefono</th></tr>";
        while ($r = $resul->fetch_row()) {
            $s = "SELECT  nombres, apellido_paterno, apellido_materno, telefono, id_sucursal FROM paciente WHERE id_paciente =".$r[0];
            $paciente = $conn->query($s);
            $d_p = $paciente->fetch_row();

            $result_sucursal    =   mysqli_query($conn, "SELECT sucursal from sucursales WHERE id_sucursal=".$d_p[4]);
            $renglon_sucursal  =   $result_sucursal->fetch_assoc();

            echo "<tr><td>".$r[0]. "</td><td>".$renglon_sucursal['sucursal']."</td><td>".$d_p[0]." ".$d_p[1]." ".$d_p[2]."</td><td>".$r[1]. "</td><td>".$r[2]."</td><td>".$r[3]."</td><td>".$d_p[3]."</td></tr>";
        }
    echo "</table>";
?>
    
<?php 

} 

include("../+/footer1.php");
?>