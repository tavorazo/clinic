<!DOCTYPE html>    

<?php
@session_start();
if($_SESSION['u']=='')
  header('location: ../index.php');

$enlace="../panel.php";
$titulo = "control de asistencia de pacientes";

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
    $select = 'SELECT * from paciente where inasistencia = 1 ';
    $resul = $conn->query($select);
    echo "<br><br><br><h1>Pacientes con una falta</h1>";
    echo "<table width='100%'>";
    echo "<tr><th>id</th><th>Nombre</th><th>Telefono</th></tr>";
        while ($r = $resul->fetch_row()) 
            echo "<tr><td>".$r[0]."</td><td>".$r[1]. " ".$r[2]." ".$r[3]."</td><td>".$r[11]."</td></tr>";
    echo "</table>";
    
    $select = 'SELECT * from paciente where inasistencia = 2 ';
    $resul = $conn->query($select);
    echo "<h1>Pacientes con 2 faltas</h1>";
    echo "<table width='100%'>";
    echo "<tr><th>id</th><th>Nombre</th><th>Telefono</th></tr>";
        while ($r = $resul->fetch_row()) 
            echo "<tr><td>".$r[0]."</td><td>".$r[1]. " ".$r[2]." ".$r[3]."</td><td>".$r[11]."</td></tr>";
    echo "</table>";
    
    $select = 'SELECT * from paciente where inasistencia >= 3 ';
    $resul = $conn->query($select);
    echo "<h1>Pacientes con más de 3 faltas</h1>";
    echo "<table width='100%'>";
    echo "<tr><th>id</th><th>Nombre</th><th>Telefono</th></tr>";
        while ($r = $resul->fetch_row()) 
            echo "<tr><td>".$r[0]."</td><td>".$r[1]. " ".$r[2]." ".$r[3]."</td><td>".$r[11]."</td></tr>";
    echo "</table>";
   
    
    $sql = "SELECT  id_paciente, descripcion, adeudo, pagado, fecha_adeudo FROM pago_adeudo WHERE adeudo > pagado  ";
    $resul = $conn->query($sql);
    echo "<h1>Pacientes con adeudos</h1>";
    echo "<table width='100%'>";
    echo "<tr><th>id</th><th>Nombre</th><th>Descripción</th><th>Adeudo</th><th>Pagado</th><th>Telefono</th></tr>";
        while ($r = $resul->fetch_row()) {
            $s = "SELECT  nombres, apellido_paterno, apellido_materno, telefono FROM paciente WHERE id_paciente =".$r[0];
            $paciente = $conn->query($s);
            $d_p = $paciente->fetch_row();
            echo "<tr><td>".$r[0]. "</td><td>".$d_p[0]." ".$d_p[1]." ".$d_p[2]."</td><td>".$r[1]. "</td><td>".$r[2]."</td><td>".$r[3]."</td><td>".$d_p[3]."</td></tr>";
        }
    echo "</table>";
?>
    
<?php 

} 

include("../+/footer1.php");
?>