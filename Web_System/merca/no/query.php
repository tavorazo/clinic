
<?php
  include('../../php/base.php');

  $result = $conn->query("SELECT  nombres, apellido_paterno, apellido_paterno  FROM  paciente ORDER BY $by DESC LIMIT $size ");
  $return = array();
  $n_pacientes = 0;
  while ($pacientes = $result->fetch_row()) {
    $return[$n_pacientes] = $pacientes;
    $n_pacientes++;
  }
  //$return = json_encode($return);
  echo ''.
    '<h2>Lista de '.$size.' pacientes filtrados por' .$by.' </h2>';  
    for ($i=0; $i < $n_pacientes; $i++) {
      for ($j=0; $j< 3; $j++) {
        echo $return[$i][$j]. ' '; 
    }echo'<br>';  
  }
?>
