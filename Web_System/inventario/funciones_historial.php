<html lang="es">
<?php 
date_default_timezone_set("Mexico/General");

function get_producto($id){
  include("../php/base.php"); 
  $result = $conn->query('SELECT * FROM inventario WHERE id_producto ='.$id);
  $producto = $result->fetch_row();
  return $producto[1]." - ";
}

function get_user($id){
  include("../php/base.php"); 
  $result = $conn->query('SELECT nombres, apellido_paterno FROM usuarios WHERE id_usuario="'.$id.'"');
  $name = $result->fetch_row();
  return $name[0]." ".$name[1]." - ";
}

//pinta los datos
function paint($material, $usuario, $cantidad, $fecha){
  echo'<tr><td>'.$material.'</td><td>'.$usuario.'</td><td>'.$cantidad.'</td><td>'.$fecha.'</td></tr>';
}

//respecto a lo que busque selecciona los datos
function listar_historial($date, $month, $week){
  include("../php/base.php"); 
  echo "<table>";
  echo "<tr><th>Material usado</th><th>Encargado de movimiento</th><th>Cantidad</th><th>Fecha</th></tr>";
  //buscar el dia de hoy
  if ($date == '' && $month == '' && $week == '') {
    $date =date('Y-m-d');
    echo "<h2> Historial del dia de hoy ( ".$date." )<br><br> </h2>";
    $result = $conn->query('SELECT * FROM inventario_historial WHERE CAST( fecha AS DATE ) =  "'.$date.'" order by fecha desc');
    while ($xdia = $result->fetch_row()) {
      paint(get_producto($xdia[2]), get_user($xdia[1]),$xdia[3] , $xdia[4] );
    }
  }
  //buscar dia especifico
  else if ($date != '' && $month == '' && $week == '') {
    echo "<h2> Usted eligió listar historial del dia ( ".$date." )<br><br> </h2>";
    $result = $conn->query('SELECT * FROM inventario_historial WHERE CAST( fecha AS DATE ) =  "'.$date.'" order by fecha desc');
    while ($xdia = $result->fetch_row()) {
      paint(get_producto($xdia[2]), get_user($xdia[1]),$xdia[3] , $xdia[4] );
    }  
  }
  //buscar por mes especifico
  else if ($date == '' && $month != '' && $week == '') {
    echo "<h2> Usted eligió listar historial del mes de ( ".strftime("%B", strtotime($month))." )<br><br> </h2>";
    $year = strftime("%Y", strtotime($month)); //sacar año
    $month = strftime("%m", strtotime($month)); //sacar mes
    $result = $conn->query('SELECT * FROM inventario_historial WHERE YEAR(fecha) = "'.$year.'" AND MONTH(fecha) = "'.$month.'" order by fecha desc');
    while ($xmonth = $result->fetch_row()) {
      paint(get_producto($xmonth[2]), get_user($xmonth[1]),$xmonth[3] , $xmonth[4] );
    }
  }

  //buscar por semana especifica
  else if ($date == '' && $month == '' && $week != '') {
    $n_week = explode("W", $week);
    $date = date("Y-m-d", strtotime($week)); //rescatar fecha de semana
    echo "<h2> Usted eligió listar historial de la semana ( ".$n_week[1]." )<br><br> </h2>";
    $n_week = strftime("%m", strtotime($week)); //sacar mes
    $result = $conn->query('SELECT * FROM `inventario_historial` WHERE  WEEK(fecha) = WEEK("'.$date.'") order by fecha desc');
    while ($xweek = $result->fetch_row()) {
      paint(get_producto($xweek[2]), get_user($xweek[1]),$xweek[3] , $xweek[4] );
    } 
  }
  else
    echo "Error - revisa que solo marcas una casilla para la busqueda, si no es así avisalo a tu administrador de sistema";

  echo "</table>";

}

function n_movimientos($id){
  include("../php/base.php"); 
  $result = $conn->query('SELECT cantidad FROM inventario_historial WHERE id_producto ='.$id);
  $movimientos = $result->num_rows;
  
  $result = $conn->query('SELECT cantidad FROM inventario_historial WHERE id_producto ='.$id.' AND cantidad < 0');
  $salidas = $result->num_rows;

  $producto = array( "id" => $id, "movimientos" => $movimientos, "salidas" => $salidas);
  //print_r($p_semana);
  return $producto;
}

function destacados($producto){
  include("../php/base.php"); 
  $id = $producto["id"];
  $result = $conn->query('SELECT nombre, cantidad FROM inventario WHERE id_producto ='.$id);
  while ($destacado = $result->fetch_row()) {
    echo "<h5> <strong>".$destacado[0]."</strong> tuvó un total de <strong>".$producto["movimientos"]."</strong> movimientos en la semana, y termino con un total de <strong>".$destacado[1]."1</strong> productos en almacén. </h5>" ;
  }
  
    
}

function inventario(){
  include("../php/base.php"); 
  $result = $conn->query('SELECT id_producto FROM inventario_historial WHERE WEEK(fecha) = WEEK(NOW()) order by cantidad ASC');
  while ($id_producto = $result->fetch_row()) {
    $producto = n_movimientos($id_producto[0]);
    destacados($producto);
  } 
}


?>
</html>