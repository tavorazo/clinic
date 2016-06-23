<html>
<head>
  <title>Panel Administrador</title>
</head>
<body>
  <?php
  date_default_timezone_set("Mexico/General");
  

  if($_FILES['imagen']['name']!=""){
      copy($_FILES['imagen']['tmp_name'],$_FILES['imagen']['name']);
      $imagen=$_FILES['imagen']['name'];
      $imagen=htmlspecialchars($imagen);
    }

  $a = $_POST['id'];
  $b = $_POST['descripcion'];
  $c = $_POST['nombre_foto'];

    if($imagen!=''){
      include('../../php/base.php');
    //include('../../php/base3.php');
      $insertar = "insert into fotografias_clinicas (id_paciente, fecha_foto, descripcion, nombre_foto) values ('$a', now(),'$b', '$c')";
      if(!$conn->query($insertar))
        die('Error de consulta: '.mysqli_error($conn));
      /****************************************/
      mysqli_close($conn);
      rename($imagen,"imagenes/$c");
      chmod("imagenes/$c", 0777);
      /****************************************/
      $a = '../ficha-paciente.php?id='.$a;
      echo '<br><br><br><center><img src="../../images/endoperio2.png" width="100px" alt=""> <br> ';
      echo "Foto subida con exito<br><br><br>";
      echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
      //header('location: ../ficha-paciente.php?id='.$ficha);
      echo "<a href='",$a,"' > <font color='white'>Regresar </a></center></div>";
      echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=',$a,'">';
    }
    else{
      echo '<br><br><br><center><img src="../../images/endoperio2.png" width="100px" alt=""> <br> ';
      echo "Error: No ha seleccionado ninguna imagen, regrese<br><br><br>";
      echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
    }
    
  ?>
</body>
</html>