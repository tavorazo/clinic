<?php
if (is_ajax()) {
  if (isset($_POST["action"]) && !empty($_POST["action"])) { //Checks if action value exists
    $action = $_POST["action"];
    switch($action) { //Switch case for value of action
      case "test": test_function(); break;
    }
  }
}

//Function to check if the request is an AJAX request
function is_ajax() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}


function test_function(){
  $valores = $_POST;
  $by = $valores['by'];
  $size = $valores['size'];

  include('../../php/base.php');

    $result = $conn->query("SELECT  nombres, apellido_paterno, apellido_paterno  FROM  paciente ORDER BY $by DESC LIMIT $size ");

    $return = array();
    $i = 0;
    while ($pacientes = $result->fetch_assoc()) {
        $return[$i] = $pacientes;
        $i++;
    }
  
  $return = json_encode($return);
  echo json_encode($return);
}







